<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cashflow;
use App\Models\Customer;
use App\Models\Detailpembelian;
use App\Models\Detailpenjualan;
use App\Models\Obat;
use App\Models\Pembayarancustomer;
use App\Models\Pembayarantoko;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Supplier;

class Pembayaran extends BaseController
{
    public function __construct()
    {
        require_once FCPATH . 'ssp/ssp.class.php';
        $this->supplier = new Supplier();
        $this->obat = new Obat();
        $this->pembelian = new Pembelian();
        $this->detailpembelian = new Detailpembelian();
        $this->pembayarantoko = new Pembayarantoko();
        $this->customer = new Customer();
        $this->penjualan = new Penjualan();
        $this->detailpenjualan = new Detailpenjualan();
        $this->pembayarancustomer = new Pembayarancustomer();
        $this->kas = new Cashflow();
    }

    public function index()
    {
        //
    }

    public function viewpembayarantoko()
    {
        // $data['supplier'] = $this->supplier->findAll();
        // $data['obat'] = $this->obat->findAll();
        return view('pembayaran/pembayarantoko');
    }

    public function viewpembayarancustomer()
    {
        return view('pembayaran/pembayarancustomer');
    }

    public function addpembayarantoko()
    {
        $datapembayaran = $this->request->getPost('datapembayaran');
        $query = $this->db->query("SELECT MAX(kode_pembayarantoko) as kode, MAX(id_pembayarantoko) as id, YEAR(tanggal_pembayaran) as tahun, MONTH(tanggal_pembayaran) as bulan FROM pembayarantoko where YEAR(tanggal_pembayaran) = YEAR('" . date('Y-m-d') . "') AND MONTH(tanggal_pembayaran) = MONTH('" . date('Y-m-d') . "')");
        $pembayarantoko1 = $query->getRowArray();
        $no = substr($pembayarantoko1['kode'], -5, 5);
        $urut = (int) $no;
        $urut++;
        $data = array(
            'pembelian_id' => $datapembayaran[0]['pembelian_id'],
            'kode_pembayarantoko' => 'PT' . date('Y')  . '/' . date('n')  . '/' . sprintf("%05s", $urut) . '',
            'tanggal_pembayaran' => $datapembayaran[0]['tanggal_pembayaran'],
            'metode_pembayaran' => $datapembayaran[0]['metode_pembayaran'],
            'total_pembayaran' => $datapembayaran[0]['total_pembayaran'],
            'deskripsi' => $datapembayaran[0]['deskripsi'],
            'created_by' => $datapembayaran[0]['created_by'],
        );
        $tambahpembayarantoko = $this->pembayarantoko->tambahpembayarantoko($data);
        $data2 = array(
            'jenis_cashflow' => 'KELUAR',
            'tanggal' => $datapembayaran[0]['tanggal_pembayaran'],
            'grand_total' => $datapembayaran[0]['total_pembayaran'],
            'keterangan' => 'KAS KELUAR UNTUK PELUNASAN pembelian dengan kode pembelian = ' . $datapembayaran[0]['kode_pembelian'] . '',
            'created_by' => $datapembayaran[0]['created_by'],
        );
        $tambahkas = $this->kas->tambahcashflow($data2);
        $datapembayarantoko = $this->pembayarantoko->getWhere(['pembelian_id' => $datapembayaran[0]['pembelian_id']]);
        $datapembelian = $this->pembelian->getWhere(['id_pembelian' => $datapembayaran[0]['pembelian_id']]);
        $pembayarantoko = $datapembayarantoko->getResultArray();
        $pembelian = $datapembelian->getRowArray();
        if (sizeof($pembayarantoko) > 0) {
            $sisa = array();
            $datapembelian1 = array();
            for ($i = 0; $i < sizeof($pembayarantoko); $i++) {
                array_push($sisa, $pembayarantoko[$i]['total_pembayaran']);
            }
            $sum = array_sum($sisa);
            $fixsisa = $pembelian['total_sisa'] - $sum;
            if ($fixsisa <= 0) {
                $datapembelian1 = array(
                    'total_sisa' => 0,
                    'grand_kembalian' => $datapembayaran[0]['grand_kembalian'],
                    'status_pembelian' => 0,
                );
            } else {
                $datapembelian1 = array(
                    'total_sisa' => $fixsisa,
                    'grand_kembalian' => 0,
                    'status_pembelian' => 1,
                );
            }

            $this->pembelian->updatepembelian($datapembelian1, $datapembayaran[0]['pembelian_id']);
        } else {
            $fixsisa1 = $pembelian['total_sisa'] - $datapembayaran[0]['total_pembayaran'];
            $datapembelian2 = array();
            if ($fixsisa1 <= 0) {
                $datapembelian2 = array(
                    'total_sisa' => 0,
                    'grand_kembalian' => $datapembayaran[0]['grand_kembalian'],
                    'status_pembelian' => 0,
                );
            } else {
                $datapembelian2 = array(
                    'total_sisa' => $fixsisa1,
                    'grand_kembalian' => 0,
                    'status_pembelian' => 1,
                );
            }
            $this->pembelian->updatepembelian($datapembelian2, $datapembayaran[0]['pembelian_id']);
        }

        $status = array('statuspembayarantoko' => $tambahpembayarantoko, 'statustambahkas' => $tambahkas);
        return json_encode($status);
    }

    public function updatepiutang()
    {
        $datapembelian = $this->pembelian->where('status_pembelian', 1)->findAll();
        for ($i = 0; $i < sizeof($datapembelian); $i++) {
            $datapembayarantoko = $this->pembayarantoko->where('pembelian_id', $datapembelian[$i]['id_pembelian'])->findAll();
            for ($j = 0; $j < sizeof($datapembayarantoko); $j++) {
                $sum = 0;
                for ($k = 0; $k < sizeof($datapembayarantoko); $k++) {
                    if ($datapembayarantoko[$k]['pembelian_id'] == $datapembayarantoko[$j]['pembelian_id']) {
                        $sum += $datapembayarantoko[$k]['total_pembayaran'];
                    }
                }
                if ($sum >= $datapembelian[$i]['grand_total']) {
                    $update = array(
                        'grand_kembalian' => $sum - $datapembelian[$i]['grand_total'],
                        'total_sisa' => $sum - $datapembelian[$i]['grand_total'],
                        'status_pembelian' => 0,
                        'updated_at' => '2022-04-10',
                    );
                    $this->pembelian->updatepembelian($update, $datapembelian[$i]['id_pembelian']);
                } elseif ($sum < $datapembelian[$i]['grand_total']) {
                    $update = array(
                        'grand_kembalian' => $sum - $datapembelian[$i]['grand_total'],
                        'total_sisa' => $datapembelian[$i]['grand_total'] - $sum,
                        'status_pembelian' => 1,
                        'updated_at' => '2022-04-10',
                    );
                    $this->pembelian->updatepembelian($update, $datapembelian[$i]['id_pembelian']);
                }
            }
        }
    }

    public function addpembayarancustomer()
    {
        $datapembayaran = $this->request->getPost('datapembayaran');
        $query = $this->db->query("SELECT MAX(kode_pembayarancustomer) as kode, MAX(id_pembayarancustomer) as id, YEAR(tanggal_pembayaran) as tahun, MONTH(tanggal_pembayaran) as bulan FROM pembayarancustomer where YEAR(tanggal_pembayaran) = YEAR('" . date('Y-m-d') . "') AND MONTH(tanggal_pembayaran) = MONTH('" . date('Y-m-d') . "')");
        $pembayarancustomer1 = $query->getRowArray();
        $no = substr($pembayarancustomer1['kode'], -5, 5);
        $urut = (int) $no;
        $urut++;
        $data = array(
            'penjualan_id' => $datapembayaran[0]['penjualan_id'],
            'kode_pembayarancustomer' => 'PC' . date('Y')  . '/' . date('n')  . '/' . sprintf("%05s", $urut) . '',
            'tanggal_pembayaran' => $datapembayaran[0]['tanggal_pembayaran'],
            'metode_pembayaran' => $datapembayaran[0]['metode_pembayaran'],
            'total_pembayaran' => $datapembayaran[0]['total_pembayaran'],
            'deskripsi' => $datapembayaran[0]['deskripsi'],
            'created_by' => $datapembayaran[0]['created_by'],
        );
        $tambahpembayarancustomer = $this->pembayarancustomer->tambahpembayarancustomer($data);
        $data2 = array(
            'jenis_cashflow' => 'MASUK',
            'tanggal' => $datapembayaran[0]['tanggal_pembayaran'],
            'grand_total' => $datapembayaran[0]['total_pembayaran'],
            'keterangan' => 'KAS MASUK dari PELUNASAN penjualan dengan kode penjualan = ' . $datapembayaran[0]['kode_penjualan'] . '',
            'created_by' => $datapembayaran[0]['created_by'],
        );
        $tambahkas = $this->kas->tambahcashflow($data2);
        $datapembayarancustomer = $this->pembayarancustomer->getWhere(['penjualan_id' => $datapembayaran[0]['penjualan_id']]);
        $datapenjualan = $this->penjualan->getWhere(['id_penjualan' => $datapembayaran[0]['penjualan_id']]);
        $pembayarancustomer = $datapembayarancustomer->getResultArray();
        $penjualan = $datapenjualan->getRowArray();
        if (sizeof($pembayarancustomer) > 0) {
            $sisa = array();
            for ($i = 0; $i < sizeof($pembayarancustomer); $i++) {
                array_push($sisa, $pembayarancustomer[$i]['total_pembayaran']);
            }
            $sum = array_sum($sisa);
            $fixsisa = $penjualan['total_sisa'] - $sum;
            if ($fixsisa <= 0) {
                $datapenjualan1 = array(
                    'total_sisa' => 0,
                    'grand_kembalian' => $datapembayaran[0]['grand_kembalian'],
                    'status_penjualan' => 0,
                );
            } else {
                $datapenjualan1 = array(
                    'total_sisa' => $fixsisa,
                    'grand_kembalian' => 0,
                    'status_penjualan' => 1,
                );
            }
            $this->penjualan->updatepenjualan($datapenjualan1, $datapembayaran[0]['penjualan_id']);
        } else {
            $fixsisa1 = $penjualan['total_sisa'] - $datapembayaran[0]['total_pembayaran'];
            $datapenjualan2 = array();
            if ($fixsisa1 <= 0) {
                $datapenjualan2 = array(
                    'total_sisa' => 0,
                    'grand_kembalian' => $datapembayaran[0]['grand_kembalian'],
                    'status_penjualan' => 0,
                );
            } else {
                $datapenjualan2 = array(
                    'total_sisa' => $fixsisa1,
                    'grand_kembalian' => 0,
                    'status_penjualan' => 1,
                );
            }
            $this->penjualan->updatepenjualan($datapenjualan2, $datapembayaran[0]['penjualan_id']);
        }


        return $tambahpembayarancustomer;
    }

    public function editpembayarantoko()
    {
        $id_pembayarantoko = $this->request->getPost('id_pembayarantoko');

        // $data = array(
        //     'pembelian_id' => $this->request->getPost('pembelian_id') == '' ? $this->request->getPost('editkodepembelian') : $this->request->getPost('pembelian_id') ,
        //     'tanggal_pembayaran' => $this->request->getPost('pembelian_id') == '' ? $this->request->getPost('editkodepembelian') : $this->request->getPost('pembelian_id'),
        //     'metode_pembayaran' => ,
        //     'total_pembayaran' => ,
        //     'deskripsi' => ,
        //     'created_by' => ,
        // );
    }

    public function deletepembayarantoko($id_pembayarantoko)
    {
        $data_pembayarantoko = $this->pembayarantoko->withdeleted()->find($id_pembayarantoko);
        $data_pembelian = $this->pembelian->withdeleted()->where('id_pembelian', $data_pembayarantoko['pembelian_id'])->findAll();
        if ($data_pembayarantoko['deleted_at'] == null) {
            $delete = $this->pembayarantoko->delete($id_pembayarantoko);
        } else {
            $delete = $this->pembayarantoko->delete($id_pembayarantoko, true);
        }
        $datapembayarantoko = $this->pembayarantoko->where('pembelian_id', $data_pembelian[0]['id_pembelian'])->findAll();
        if (sizeof($datapembayarantoko) > 0) {
            $sisa = array();
            for ($i = 0; $i < sizeof($datapembayarantoko); $i++) {
                array_push($sisa, $datapembayarantoko[$i]['total_pembayaran']);
            }
            $sum = array_sum($sisa);
            $fixsisa = $data_pembelian[0]['grand_total'] - $sum;
            $datapembelian = array(
                'total_sisa' => $fixsisa,
            );
            $this->pembelian->updatepembelian($datapembelian, $data_pembelian[0]['id_pembelian']);
        } else {
            $datapembelian = array(
                'total_sisa' => $data_pembelian[0]['grand_total'],
            );
            $this->pembelian->updatepembelian($datapembelian, $data_pembelian[0]['id_pembelian']);
        }
        return redirect()->to('/pembayaran/pembayarantoko');
    }

    public function deletepembayarancustomer($id_pembayarancustomer)
    {
        $data_pembayarancustomer = $this->pembayarancustomer->withdeleted()->find($id_pembayarancustomer);
        $data_penjualan = $this->penjualan->withdeleted()->where('id_penjualan', $data_pembayarancustomer['penjualan_id'])->findAll();
        if ($data_pembayarancustomer['deleted_at'] == null) {
            $delete = $this->pembayarancustomer->delete($id_pembayarancustomer);
        } else {
            $delete = $this->pembayarancustomer->delete($id_pembayarancustomer, true);
        }
        $datapembayarancustomer = $this->pembayarancustomer->where('penjualan_id', $data_penjualan[0]['id_penjualan'])->findAll();
        if (sizeof($datapembayarancustomer) > 0) {
            $sisa = array();
            for ($i = 0; $i < sizeof($datapembayarancustomer); $i++) {
                array_push($sisa, $datapembayarancustomer[$i]['total_pembayaran']);
            }
            $sum = array_sum($sisa);
            $fixsisa = $data_penjualan[0]['grand_total'] - $sum;
            $datapenjualan = array(
                'total_sisa' => $fixsisa,
            );
            $this->penjualan->updatepenjualan($datapenjualan, $data_penjualan[0]['id_penjualan']);
        } else {
            $datapenjualan = array(
                'total_sisa' => $data_penjualan[0]['grand_total'],
            );
            $this->penjualan->updatepenjualan($datapenjualan, $data_penjualan[0]['id_penjualan']);
        }
        return redirect()->to('/pembayaran/pembayarancustomer');
    }

    public function restorepembayarantoko($id)
    {
        $data = array(
            'deleted_at'        => null,
        );
        $data_pembayarantoko = $this->pembayarantoko->onlyDeleted()->where('id_pembayarantoko', $id)->findAll();

        $ubah = $this->pembayarantoko->updatepembayarantoko($data, $data_pembayarantoko[0]['id_pembayarantoko']);

        $data_pembelian = $this->pembelian->withdeleted()->where('id_pembelian', $data_pembayarantoko[0]['pembelian_id'])->findAll();
        $datapembayarantoko = $this->pembayarantoko->where('pembelian_id', $data_pembayarantoko[0]['pembelian_id'])->findAll();
        if (sizeof($datapembayarantoko) > 0) {
            $sisa = array();
            for ($i = 0; $i < sizeof($datapembayarantoko); $i++) {
                array_push($sisa, $datapembayarantoko[$i]['total_pembayaran']);
            }
            $sum = array_sum($sisa);
            $fixsisa = $data_pembelian[0]['grand_total'] - $sum;
            $datapembelian = array(
                'total_sisa' => $fixsisa,
            );
            $this->pembelian->updatepembelian($datapembelian, $data_pembelian[0]['id_pembelian']);
        } else {
            $datapembelian = array(
                'total_sisa' => $data_pembelian[0]['grand_total'],
            );
            $this->pembelian->updatepembelian($datapembelian, $data_pembelian[0]['id_pembelian']);
        }
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Di restore!');
            return redirect()->to('/pembayaran/pembayarantoko');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Di restore!');
            return redirect()->to('/pembayaran/pembayarantoko');
        }
    }

    public function restorepembayarancustomer($id)
    {
        $data = array(
            'deleted_at'        => null,
        );
        $data_pembayarancustomer = $this->pembayarancustomer->onlyDeleted()->where('id_pembayarancustomer', $id)->findAll();

        $ubah = $this->pembayarancustomer->updatepembayarancustomer($data, $data_pembayarancustomer[0]['id_pembayarancustomer']);

        $data_penjualan = $this->penjualan->withdeleted()->where('id_penjualan', $data_pembayarancustomer[0]['penjualan_id'])->findAll();
        $datapembayarancustomer = $this->pembayarancustomer->where('penjualan_id', $data_pembayarancustomer[0]['penjualan_id'])->findAll();
        if (sizeof($datapembayarancustomer) > 0) {
            $sisa = array();
            for ($i = 0; $i < sizeof($datapembayarancustomer); $i++) {
                array_push($sisa, $datapembayarancustomer[$i]['total_pembayaran']);
            }
            $sum = array_sum($sisa);
            $fixsisa = $data_penjualan[0]['grand_total'] - $sum;
            $datapenjualan = array(
                'total_sisa' => $fixsisa,
            );
            $this->penjualan->updatepenjualan($datapenjualan, $data_penjualan[0]['id_penjualan']);
        } else {
            $datapenjualan = array(
                'total_sisa' => $data_penjualan[0]['grand_total'],
            );
            $this->penjualan->updatepenjualan($datapenjualan, $data_penjualan[0]['id_penjualan']);
        }
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Di restore!');
            return redirect()->to('/pembayaran/pembayarancustomer');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Di restore!');
            return redirect()->to('/pembayaran/pembayarancustomer');
        }
    }


    public function listdata_pembayarantoko()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = <<<EOT
        (
           SELECT
             a.*, pembelian.kode_pembelian
                FROM pembayarantoko as a
                    INNER JOIN pembelian ON pembelian.id_pembelian = a.pembelian_id 
                        WHERE a.deleted_at is null
        ) temp
       EOT;

        //primary key
        $primaryKey = "id_pembayarantoko";

        $columns = array(

            array(
                "db" => "id_pembayarantoko",
                "dt" => 0,
            ),
            array(
                "db" => "tanggal_pembayaran",
                "dt" => 1,
            ),
            array(
                "db" => "kode_pembayarantoko",
                "dt" => 2,
            ),
            array(
                "db" => "kode_pembelian",
                "dt" => 3,
            ),
            array(
                "db" => "metode_pembayaran",
                "dt" => 4,
            ),
            array(
                "db" => "total_pembayaran",
                "dt" => 5,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },
            ),
            array(
                "db" => "created_by",
                "dt" => 6,
            ),

        );

        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }


    public function listdata_pembayarancustomer()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = <<<EOT
        (
           SELECT
             a.*, penjualan.kode_penjualan
                FROM pembayarancustomer as a
                    INNER JOIN penjualan ON penjualan.id_penjualan = a.penjualan_id 
                        WHERE a.deleted_at is null
        ) temp
       EOT;

        //primary key
        $primaryKey = "id_pembayarancustomer";

        $columns = array(

            array(
                "db" => "id_pembayarancustomer",
                "dt" => 0,
            ),
            array(
                "db" => "tanggal_pembayaran",
                "dt" => 1,
            ),
            array(
                "db" => "kode_pembayarancustomer",
                "dt" => 2,
            ),
            array(
                "db" => "kode_penjualan",
                "dt" => 3,
            ),
            array(
                "db" => "metode_pembayaran",
                "dt" => 4,
            ),
            array(
                "db" => "total_pembayaran",
                "dt" => 5,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },
            ),
            array(
                "db" => "created_by",
                "dt" => 6,
            ),
            array(
                "db" => "deskripsi",
                "dt" => 7,
            ),

        );

        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function listdata_sampah_pembayarantoko()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "pembayarantoko";

        //primary key
        $primaryKey = "id_pembayarantoko";

        $columns = array(

            array(
                "db" => "id_pembayarantoko",
                "dt" => 0,
            ),
            array(
                "db" => "tanggal_pembayaran",
                "dt" => 1,
                "formatter" => function ($value, $row) {
                    $date = date_create($value);
                    return date_format($date, "j F Y");
                },
            ),
            array(
                "db" => "pembelian_id",
                "dt" => 2,
            ),
            array(
                "db" => "metode_pembayaran",
                "dt" => 3,
            ),
            array(
                "db" => "total_pembayaran",
                "dt" => 4,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },
            ),
            array(
                "db" => "created_by",
                "dt" => 5,
            ),


        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is not null")
        );
    }

    public function listdata_sampah_pembayarancustomer()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "pembayarancustomer";

        //primary key
        $primaryKey = "id_pembayarancustomer";

        $columns = array(

            array(
                "db" => "id_pembayarancustomer",
                "dt" => 0,
            ),
            array(
                "db" => "tanggal_pembayaran",
                "dt" => 1,
                "formatter" => function ($value, $row) {
                    $date = date_create($value);
                    return date_format($date, "j F Y");
                },
            ),
            array(
                "db" => "penjualan_id",
                "dt" => 2,
            ),
            array(
                "db" => "metode_pembayaran",
                "dt" => 3,
            ),
            array(
                "db" => "total_pembayaran",
                "dt" => 4,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },
            ),
            array(
                "db" => "created_by",
                "dt" => 5,
            ),
            array(
                "db" => "deskripsi",
                "dt" => 6,
            ),

        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is not null")
        );
    }

    function list_pembelian()
    {
        $list_pembelian = $this->pembelian->get_pembelian_by_search($this->request->getPost('searchTerm'));

        for ($i = 0; $i < sizeof($list_pembelian); $i++) {
            $data[] = array(
                'id' => $list_pembelian[$i]['id_pembelian'],
                'text' => $list_pembelian[$i]['kode_pembelian'],
            );
        }
        return json_encode($data);
    }

    function list_penjualan()
    {
        $list_penjualan = $this->penjualan->get_penjualan_by_search($this->request->getPost('searchTerm'));

        for ($i = 0; $i < sizeof($list_penjualan); $i++) {
            $data[] = array(
                'id' => $list_penjualan[$i]['id_penjualan'],
                'text' => $list_penjualan[$i]['kode_penjualan'],
            );
        }
        return json_encode($data);
    }


    function get_datapembelian_by_id($id_pembelian)
    {
        $datapembelian = $this->pembelian->get_detaildatapembelian($id_pembelian);
        return json_encode($datapembelian);
    }

    function get_datapenjualan_by_id($id_penjualan)
    {
        $datapenjualan = $this->penjualan->get_detaildatapenjualan($id_penjualan);
        return json_encode($datapenjualan);
    }
}
