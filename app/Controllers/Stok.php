<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bankflow;
use App\Models\Cashflow;
use App\Models\Customer;
use App\Models\Detailpembelian;
use App\Models\Detailpenjualan;
use App\Models\Obat;
use App\Models\Pembayarancustomer;
use App\Models\Pembelianlainnya;
use App\Models\Pembayarantoko;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Supplier;

class Stok extends BaseController
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
        $this->pembelianlainnya = new Pembelianlainnya();
        $this->kas = new Cashflow();
        $this->bank = new Bankflow();
    }

    public function index()
    {
        //
    }

    public function printstruk($id_penjualan)
    {
        $data['data'] = $this->penjualan->get_detaildatapenjualan($id_penjualan);
        return view('faktur/fakturpembelian', $data);
    }

    public function viewstokin()
    {
        $data['supplier'] = $this->supplier->findAll();
        $data['obat'] = $this->obat->findAll();
        $query = $this->db->query("SELECT MAX(kode_pembelian) as kode, MAX(id_pembelian) as id, YEAR(tanggal_pembelian) as tahun, MONTH(tanggal_pembelian) as bulan FROM pembelian where YEAR(tanggal_pembelian) = YEAR('" . date('Y-m-d') . "') AND MONTH(tanggal_pembelian) = MONTH('" . date('Y-m-d') . "')");
        $pembelian1 = $query->getRowArray();
        $no = substr($pembelian1['kode'], -5, 5);
        $urut = (int) $no;
        $urut++;
        $data['kode_pembelian'] = 'PO' . date('Y') . '/' . date('n') . '/' . sprintf("%05s", $urut) . '';

        return view('stok/stokin', $data);
    }

    public function viewstokout()
    {
        $data['customer'] = $this->customer->findAll();
        $data['obat'] = $this->obat->findAll();
        $query = $this->db->query("SELECT MAX(kode_penjualan) as kode, MAX(id_penjualan) as id, YEAR(tanggal_penjualan) as tahun, MONTH(tanggal_penjualan) as bulan FROM penjualan where YEAR(tanggal_penjualan) = YEAR('" . date('Y-m-d') . "') AND MONTH(tanggal_penjualan) = MONTH('" . date('Y-m-d') . "')");
        $penjualan1 = $query->getRowArray();
        $no = substr($penjualan1['kode'], -5, 5);
        $urut = (int) $no;
        $urut++;
        $data['kode_penjualan'] = 'JCN' . date('Y') . '/' . date('n') . '/' . sprintf("%05s", $urut) . '';
        return view('stok/stokout', $data);
    }

    public function updatekodepembelian()
    {
        $penjualan = $this->penjualan->where('updated_at', '0000-00-00')->findAll();
        for ($i = 0; $i < sizeof($penjualan); $i++) {
            $tanggal = $penjualan[$i]['tanggal_penjualan'];
            if ($penjualan[$i]['updated_at'] != '2022-04-15') {
                $query = $this->db->query("SELECT id_penjualan, YEAR(tanggal_penjualan) as tahun, MONTH(tanggal_penjualan) as bulan FROM penjualan where YEAR(tanggal_penjualan) = YEAR('$tanggal') AND MONTH(tanggal_penjualan) = MONTH('$tanggal')");
                $penjualan1 = $query->getResultArray();
                $increment = 1;
                for ($j = 0; $j < sizeof($penjualan1); $j++) {
                    $updatekode = array(
                        'kode_penjualan' => 'JCN' . $penjualan1[$j]['tahun'] . '/' . $penjualan1[$j]['bulan'] . '/' . sprintf("%05s", $increment) . '',
                        'updated_at' => '2022-04-15',
                    );
                    $increment++;
                    $update = $this->penjualan->updatepenjualan($updatekode, $penjualan1[$j]['id_penjualan']);
                }
            }
        }
    }

    public function updatehpp()
    {
        $obat = $this->obat->findAll();
        for ($i = 0; $i < sizeof($obat); $i++) {
            $datadetailpembelian = $this->detailpembelian->where('obat_id', $obat[$i]['id_obat'])->findAll();
            if (sizeof($datadetailpembelian) > 0) {
                $netto = array();
                for ($j = 0; $j < sizeof($datadetailpembelian); $j++) {
                    array_push($netto, $datadetailpembelian[$j]['harga'] - ($datadetailpembelian[$j]['harga'] * ($datadetailpembelian[$j]['diskon'] / 100)));
                }
                $average = array_sum($netto) / count($netto);
                $hpp_average = array(
                    'hpp_avg' => $average,
                );
                $this->obat->updateobat($hpp_average, $obat[$i]['id_obat']);
            } else {
                $hpp_average = array(
                    'hpp_avg' => 0,
                );
                $this->obat->updateobat($hpp_average, $obat[$i]['id_obat']);
            }
            var_dump($hpp_average);
        }
    }

    public function addpembelianlainnya()
    {
        $query = $this->db->query("SELECT MAX(kode_pembelianlainnya) as kode, MAX(id_pembelianlainnya) as id, YEAR(tanggal_pembelian) as tahun, MONTH(tanggal_pembelian) as bulan FROM pembelianlainnya where YEAR(tanggal_pembelian) = YEAR('" . date('Y-m-d') . "') AND MONTH(tanggal_pembelian) = MONTH('" . date('Y-m-d') . "')");
        $pembelian1 = $query->getRowArray();
        $no = substr($pembelian1['kode'], -5, 5);
        $urut = (int) $no;
        $urut++;

        $datapembelianlainnya = array(
            'kode_pembelianlainnya' => 'PL' . date('Y') . '/' . date('n') . '/' . sprintf("%05s", $urut) . '',
            'tanggal_pembelian' => $this->request->getPost('tanggalpembelianlainnya'),
            'grand_total' => $this->request->getPost('totalpembelianlainnya'),
            'keterangan' => $this->request->getPost('deskripsipembelian'),
            'created_by' => $this->request->getPost('created_bypembelianlainnya'),
        );

        $tambah = $this->pembelianlainnya->tambahpembelianlainnya($datapembelianlainnya);
        $data2 = array(
            'jenis_cashflow' => 'KELUAR',
            'tanggal' => $datapembelianlainnya['tanggal_pembelian'],
            'grand_total' => $datapembelianlainnya['grand_total'],
            'keterangan' => 'KAS KELUAR UNTUK PEMBAYARAN pembelian Lainnya dengan kode = ' . $datapembelianlainnya['kode_pembelianlainnya'] . '',
            'created_by' => $datapembelianlainnya['created_by'],
        );
        $this->kas->tambahcashflow($data2);
        if ($tambah == true) {
            session()->setFlashdata('message', 'Data Berhasil Ditambah!');
            return redirect()->to('/stok/stok_in');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Ditambah!');
            return redirect()->to('/stok/stok_in');
        }
    }

    public function editpembelianlainnya()
    {
        $id_pembelianlainnya = $this->request->getPost('id_pembelianlainnya');
        $datapembelianlainnya = array(
            'tanggal_pembelian' => $this->request->getPost('tanggalpembelianlainnya'),
            'grand_total' => $this->request->getPost('totalpembelianlainnya'),
            'keterangan' => $this->request->getPost('deskripsipembelian'),
            'created_by' => $this->request->getPost('created_bypembelianlainnya'),
        );
        $ubah = $this->pembelianlainnya->updatepembelianlainnya($datapembelianlainnya, $id_pembelianlainnya);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Diubah!');
            return redirect()->to('/stok/stok_in');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Diubah!');
            return redirect()->to('/stok/stok_in');
        }
    }


    public function addpembelian()
    {
        $datapembelian = $this->request->getPost('datapembelian');
        $datadetailpembelian = $this->request->getPost('datadetailpembelian');
        $datapembayarantoko = $this->request->getPost('datapembayaran');
        $query = $this->db->query("SELECT MAX(kode_pembelian) as kode, MAX(id_pembelian) as id, YEAR(tanggal_pembelian) as tahun, MONTH(tanggal_pembelian) as bulan FROM pembelian where YEAR(tanggal_pembelian) = YEAR('" . date('Y-m-d') . "') AND MONTH(tanggal_pembelian) = MONTH('" . date('Y-m-d') . "')");
        $pembelian1 = $query->getRowArray();
        $no = substr($pembelian1['kode'], -5, 5);
        $urut = (int) $no;
        $urut++;
        $data = array(
            'kode_pembelian' => 'PO' . date('Y') . '/' . date('n') . '/' . sprintf("%05s", $urut) . '',
            'supplier_id' => $datapembelian[0]['supplier_id'],
            'no_nota' => $datapembelian[0]['no_nota'],
            'grand_total' => $datapembelian[0]['grand_total'],
            'grand_kembalian' => $datapembelian[0]['grand_kembalian'],
            'total_sisa' => $datapembelian[0]['total_sisa'],
            'status_pembelian' => $datapembelian[0]['status_pembelian'],
            'tanggal_pembelian' => $datapembelian[0]['tanggal_pembelian'],
            'created_by' => $datapembelian[0]['created_by'],
            'keterangan_pembelian' => $datapembelian[0]['keterangan_pembelian'],
        );
        $tambahpembelian = $this->pembelian->tambahpembelian($data);
        $id = $this->pembelian->insertID();
        if (sizeof($datadetailpembelian) > 0) {
            for ($j = 0; $j < sizeof($datadetailpembelian); $j++) {
                $netto = array();
                $input = array(
                    'pembelian_id' => $id,
                    'obat_id' => $datadetailpembelian[$j]['obat_id'],
                    'qty' => $datadetailpembelian[$j]['qty'],
                    'harga' => $datadetailpembelian[$j]['harga'],
                    'diskon' => $datadetailpembelian[$j]['diskon'],
                );
                $tambahdetailpembelian = $this->detailpembelian->tambahdetailpembelian($input);
                $dataobat = $this->obat->getWhere(['id_obat' => $datadetailpembelian[$j]['obat_id']])->getRowArray();
                $dataupdateobat = $dataobat['stok'] + $datadetailpembelian[$j]['qty'];
                $obat = $this->detailpembelian->updatehpp($datadetailpembelian[$j]['obat_id']);
                if (sizeof($obat) > 0) {
                    for ($k = 0; $k < sizeof($obat); $k++) {
                        if ($datadetailpembelian[$j]['obat_id'] == $obat[$k]['obat_id']) {
                            array_push($netto, $obat[$k]['harga'] - ($obat[$k]['harga'] * ($obat[$k]['diskon'] / 100)));
                        }
                    }
                    $average = array_sum($netto) / count($netto);
                    $hpp_average = array(
                        'hna' => $datadetailpembelian[$j]['harga'],
                        'hpp_avg' => $average,
                        'stok' => $dataupdateobat
                    );
                    $description = "update data barangg {$dataobat['nama_obat']} melalui pembelian dengan kode {$data['kode_pembelian']}";
                    $this->obat->updateobat($hpp_average, $datadetailpembelian[$j]['obat_id'], $description);
                }
            }
        }
        if (sizeof($datapembayarantoko) > 0 && $datapembayarantoko[0]['pembelian_id'] != 1) {
            $data1 = array(
                'pembelian_id' => $id,
                'tanggal_pembayaran' => $datapembayarantoko[0]['tanggal_pembayaran'],
                'metode_pembayaran' => $datapembayarantoko[0]['metode_pembayaran'],
                'total_pembayaran' => $datapembayarantoko[0]['total_pembayaran'],
                'deskripsi' => $datapembayarantoko[0]['deskripsi'],
                'created_by' => $datapembayarantoko[0]['created_by'],
            );
            $pembayaran = $this->pembayarantoko->tambahpembayarantoko($data1);
            if ($pembayaran == true && $datapembayarantoko[0]['metode_pembayaran'] == 'CASH') {
                $data2 = array(
                    'jenis_cashflow' => 'KELUAR',
                    'tanggal' => $datapembayarantoko[0]['tanggal_pembayaran'],
                    'grand_total' => $datapembayarantoko[0]['total_pembayaran'],
                    'keterangan' => 'KAS KELUAR UNTUK PEMBAYARAN dengan pembelian kode = ' . $data['kode_pembelian'] . '',
                    'created_by' => $datapembayarantoko[0]['created_by'],
                );
                $this->kas->tambahcashflow($data2);
            }
            if ($pembayaran == true && $datapembayarantoko[0]['metode_pembayaran'] == 'DEBIT') {
                $data2 = array(
                    'jenis_bankflow' => 'KELUAR',
                    'tanggal' => $datapembayarantoko[0]['tanggal_pembayaran'],
                    'grand_total' => $datapembayarantoko[0]['total_pembayaran'],
                    'keterangan' => 'BANK KELUAR UNTUK PEMBAYARAN dengan pembelian kode = ' . $data['kode_pembelian'] . '',
                    'created_by' => $datapembayarantoko[0]['created_by'],
                );
                $this->bank->tambahbankflow($data2);
            }
        }
        $status = array('tambahpembelian' => $tambahpembelian, 'tambahdetailpembelian' => $tambahdetailpembelian);
        return $status;
    }

    public function editpembelian()
    {
        $datapembelian = $this->request->getPost('datapembelian');
        $datadetailpembelian = $this->request->getPost('datadetailpembelian');
        $datadetailpembelianbefore = $this->detailpembelian->getWhere(['pembelian_id' => $datapembelian[0]['id_pembelian']])->getResultArray();

        $data = array(
            'kode_pembelian' => $datapembelian[0]['kode_pembelian'],
            'supplier_id' => $datapembelian[0]['supplier_id'],
            'no_nota' => $datapembelian[0]['no_nota'],
            'grand_total' => $datapembelian[0]['grand_total'],
            'grand_kembalian' => $datapembelian[0]['grand_kembalian'],
            'total_sisa' => $datapembelian[0]['total_sisa'],
            'status_pembelian' => $datapembelian[0]['status_pembelian'],
            'tanggal_pembelian' => $datapembelian[0]['tanggal_pembelian'],
            'created_by' => $datapembelian[0]['created_by'],
            'keterangan_pembelian' => $datapembelian[0]['keterangan_pembelian'],
        );
        $tambahpembelian = $this->pembelian->updatepembelian($data, $datapembelian[0]['id_pembelian']);
        if (sizeof($datadetailpembelianbefore) > 0) {
            for ($i = 0; $i < sizeof($datadetailpembelianbefore); $i++) {
                $dataobat = $this->obat->getWhere(['id_obat' => $datadetailpembelianbefore[$i]['obat_id']])->getRowArray();
                $dataupdateobat = array(
                    'stok' => $dataobat['stok'] -  $datadetailpembelianbefore[$i]['qty'],
                );
                $this->obat->updateobat(
                    $dataupdateobat,
                    $datadetailpembelianbefore[$i]['obat_id']
                );
                $this->detailpembelian->delete($datadetailpembelianbefore[$i]['id_detailpembelian'], true);
            }
        }
        if (sizeof($datadetailpembelian) > 0) {
            for ($i = 0; $i < sizeof($datadetailpembelian); $i++) {
                $input[] = array(
                    'pembelian_id' => $datapembelian[0]['id_pembelian'],
                    'obat_id' => $datadetailpembelian[$i]['obat_id'],
                    'qty' => $datadetailpembelian[$i]['qty'],
                    'harga' => $datadetailpembelian[$i]['harga'],
                    'diskon' => $datadetailpembelian[$i]['diskon'],
                );
                $dataobat = $this->obat->getWhere(['id_obat' => $input[$i]['obat_id']])->getRowArray();
                $dataupdateobat = array(
                    'stok' => $dataobat['stok'] + $datadetailpembelian[$i]['qty'],
                );
                $this->obat->updateobat($dataupdateobat, $datadetailpembelian[$i]['obat_id']);
            }
            $tambahdetailpembelian = $this->detailpembelian->tambahdetailpembelian($input);
            for ($j = 0; $j < sizeof($datadetailpembelian); $j++) {
                $netto = array();
                $obat = $this->detailpembelian->updatehpp($datadetailpembelian[$j]['obat_id']);
                if (sizeof($obat) > 0) {
                    for ($k = 0; $k < sizeof($obat); $k++) {
                        if ($datadetailpembelian[$j]['obat_id'] == $obat[$k]['obat_id']) {
                            array_push($netto, $obat[$k]['harga'] - ($obat[$k]['harga'] * ($obat[$k]['diskon'] / 100)));
                        }
                    }
                    $average = array_sum($netto) / count($netto);
                    $hpp_average = array(
                        'hpp_avg' => $average,
                    );
                    $this->obat->updateobat($hpp_average, $datadetailpembelian[$j]['obat_id']);
                } else {
                    $hpp_average = array(
                        'hpp_avg' => 0,
                    );
                    $this->obat->updateobat($hpp_average, $datadetailpembelian[$j]['obat_id']);
                }
            }
        }
        $status = array('tambahpembelian' => $tambahpembelian, 'tambahdetailpembelian' => $tambahdetailpembelian);
        return $status;
    }

    public function tes()
    {
        $datapenjualan = $this->request->getPost('datapenjualan');
        $datadetailpenjualan = $this->request->getPost('datadetailpenjualan');
        $datapembayarancustomer = $this->request->getPost('datapembayaran');
        if (isset($datapembayarancustomer) && $datapembayarancustomer[0]['penjualan_id'] != 1) {
            return json_encode($datadetailpenjualan);
        } else {
            return json_encode($datapembayarancustomer);
        }
    }

    public function addpenjualan()
    {
        $datapenjualan = $this->request->getPost('datapenjualan');
        $datahistory = $this->request->getPost('datahistory');
        $datadetailpenjualan = $this->request->getPost('datadetailpenjualan');
        $datapembayarancustomer = $this->request->getPost('datapembayaran');
        $query = $this->db->query("SELECT MAX(kode_penjualan) as kode, MAX(id_penjualan) as id, YEAR(tanggal_penjualan) as tahun, MONTH(tanggal_penjualan) as bulan FROM penjualan where YEAR(tanggal_penjualan) = YEAR('" . date('Y-m-d') . "') AND MONTH(tanggal_penjualan) = MONTH('" . date('Y-m-d') . "')");
        $penjualan1 = $query->getRowArray();
        $no = substr($penjualan1['kode'], -5, 5);
        $urut = (int) $no;
        $urut++;
        $data = array(
            'kode_penjualan' => 'JCN' . date('Y')  . '/' . date('n')  . '/' . sprintf("%05s", $urut) . '',
            'customer_id' => $datapenjualan[0]['customer_id'],
            'grand_total' => $datapenjualan[0]['grand_total'],
            'grand_kembalian' => $datapenjualan[0]['grand_kembalian'],
            'total_sisa' => $datapenjualan[0]['total_sisa'],
            'status_penjualan' => $datapenjualan[0]['status_penjualan'],
            'tanggal_penjualan' => $datapenjualan[0]['tanggal_penjualan'],
            'created_by' => $datapenjualan[0]['created_by'],
        );
        $this->penjualan->tambahpenjualan($data);
        $id = $this->penjualan->insertID();
        if (sizeof($datadetailpenjualan) > 0) {
            for ($i = 0; $i < sizeof($datadetailpenjualan); $i++) {
                $input[] = array(
                    'penjualan_id' => $id,
                    'obat_id' => $datadetailpenjualan[$i]['obat_id'],
                    'qty' => $datadetailpenjualan[$i]['qty'],
                    'harga' => $datadetailpenjualan[$i]['harga'],
                    'hpp' => $datadetailpenjualan[$i]['hpp'],
                    'diskon' => $datadetailpenjualan[$i]['diskon'],
                );
                $dataobat = $this->obat->getWhere(['id_obat' => $input[$i]['obat_id']])->getRowArray();
                $dataupdateobat = array(
                    'stok' => $dataobat['stok'] - $datadetailpenjualan[$i]['qty'],
                );
                $this->obat->updateobat($dataupdateobat, $datadetailpenjualan[$i]['obat_id']);
            }
            $tambahdetailpenjualan = $this->detailpenjualan->tambahdetailpenjualan($input);
        }
        if (sizeof($datapembayarancustomer) > 0 && $datapembayarancustomer[0]['penjualan_id'] != 1) {
            $data1 = array(
                'penjualan_id' => $id,
                'tanggal_pembayaran' => $datapembayarancustomer[0]['tanggal_pembayaran'],
                'metode_pembayaran' => $datapembayarancustomer[0]['metode_pembayaran'],
                'total_pembayaran' => $datapembayarancustomer[0]['total_pembayaran'],
                'deskripsi' => $datapembayarancustomer[0]['deskripsi'],
                'created_by' => $datapembayarancustomer[0]['created_by'],
            );
            $pembayaran = $this->pembayarancustomer->tambahpembayarancustomer($data1);
            if ($pembayaran == true && $datapembayarancustomer[0]['metode_pembayaran'] == 'CASH') {
                $data2 = array(
                    'jenis_cashflow' => 'MASUK',
                    'tanggal' => $datapembayarancustomer[0]['tanggal_pembayaran'],
                    'grand_total' => $datapembayarancustomer[0]['total_pembayaran'],
                    'keterangan' => 'KAS MASUK UNTUK PEMBAYARAN dengan penjualan kode = ' . $data['kode_penjualan'] . '',
                    'created_by' => $datapembayarancustomer[0]['created_by'],
                );
                $this->kas->tambahcashflow($data2);
            } else if ($pembayaran == true && $datapembayarancustomer[0]['metode_pembayaran'] == 'DEBIT') {
                $data3 = array(
                    'jenis_bankflow' => 'MASUK',
                    'tanggal' => $datapembayarancustomer[0]['tanggal_pembayaran'],
                    'grand_total' => $datapembayarancustomer[0]['total_pembayaran'],
                    'keterangan' => 'BANK MASUK UNTUK PEMBAYARAN dengan penjualan kode = ' . $data['kode_penjualan'] . '',
                    'created_by' => $datapembayarancustomer[0]['created_by'],
                );
                $this->bank->tambahbankflow($data3);
            }
        }

        return json_encode($id);
    }


    public function editpenjualan()
    {
        $datapenjualan = $this->request->getPost('datapenjualan');
        $datadetailpenjualan = $this->request->getPost('datadetailpenjualan');
        $datadetailpenjualanbefore = $this->detailpenjualan->getWhere(['penjualan_id' => $datapenjualan[0]['id_penjualan']])->getResultArray();

        $data = array(
            'kode_penjualan' => $datapenjualan[0]['kode_penjualan'],
            'customer_id' => $datapenjualan[0]['customer_id'],
            'grand_total' => $datapenjualan[0]['grand_total'],
            'grand_kembalian' => $datapenjualan[0]['grand_kembalian'],
            'total_sisa' => $datapenjualan[0]['total_sisa'],
            'status_penjualan' => $datapenjualan[0]['status_penjualan'],
            'tanggal_penjualan' => $datapenjualan[0]['tanggal_penjualan'],
            'created_by' => $datapenjualan[0]['created_by'],
            'keterangan_penjualan' => $datapenjualan[0]['keterangan_penjualan'],
        );
        $tambahpenjualan = $this->penjualan->updatepenjualan($data, $datapenjualan[0]['id_penjualan']);
        if (sizeof($datadetailpenjualanbefore) > 0) {
            for ($i = 0; $i < sizeof($datadetailpenjualanbefore); $i++) {
                $dataobat = $this->obat->getWhere(['id_obat' => $datadetailpenjualanbefore[$i]['obat_id']])->getRowArray();
                $dataupdateobat = array(
                    'stok' => $dataobat['stok'] -  $datadetailpenjualanbefore[$i]['qty'],
                );
                $this->obat->updateobat($dataupdateobat, $datadetailpenjualanbefore[$i]['obat_id']);
                $this->detailpenjualan->delete($datadetailpenjualanbefore[$i]['id_detailpenjualan'], true);
            }
        }
        if (sizeof($datadetailpenjualan) > 0) {
            for ($i = 0; $i < sizeof($datadetailpenjualan); $i++) {
                $input[] = array(
                    'penjualan_id' => $datapenjualan[0]['id_penjualan'],
                    'obat_id' => $datadetailpenjualan[$i]['obat_id'],
                    'qty' => $datadetailpenjualan[$i]['qty'],
                    'harga' => $datadetailpenjualan[$i]['harga'],
                    'diskon' => $datadetailpenjualan[$i]['diskon'],
                );
                $dataobat = $this->obat->getWhere(['id_obat' => $input[$i]['obat_id']])->getRowArray();
                $dataupdateobat = array(
                    'stok' => $dataobat['stok'] + $datadetailpenjualan[$i]['qty'],
                );
                $this->obat->updateobat($dataupdateobat, $datadetailpenjualan[$i]['obat_id']);
            }
            $tambahdetailpenjualan = $this->detailpenjualan->tambahdetailpenjualan($input);
        }
        $status = array('tambahpenjualan' => $tambahpenjualan, 'tambahdetailpenjualan' => $tambahdetailpenjualan);
        return $status;
    }

    public function deletepembelianlainnya($id_pembelianlainnya)
    {
        $data_pembelianlainnya = $this->pembelianlainnya->withdeleted()->find($id_pembelianlainnya);
        if ($data_pembelianlainnya['deleted_at'] == null) {
            $delete = $this->pembelianlainnya->delete($id_pembelianlainnya, true);
        } else {
            $delete = $this->pembelianlainnya->delete($id_pembelianlainnya, true);
        }


        if ($delete == true) {
            session()->setFlashdata('message', 'Data Berhasil Dihapus!');
            return redirect()->to('/stok/stok_in');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Dihapus!');
            return redirect()->to('/stok/stok_in');
        }
    }


    public function deletepembelian($id_pembelian)
    {
        $data_pembelian = $this->pembelian->withdeleted()->find($id_pembelian);
        $data_detailpembelian = $this->detailpembelian->withdeleted()->where('pembelian_id', $id_pembelian)->findAll();
        $data_pembayarantoko = $this->pembayarantoko->withdeleted()->where('pembelian_id', $id_pembelian)->findAll();

        if ($data_pembelian['deleted_at'] == null) {
            $delete = $this->pembelian->delete($id_pembelian);
            if (sizeof($data_detailpembelian) > 0) {
                for ($i = 0; $i < sizeof($data_detailpembelian); $i++) {
                    $this->detailpembelian->delete($data_detailpembelian[$i]['id_detailpembelian']);
                }
            }
            if (sizeof($data_pembayarantoko) > 0) {
                for ($j = 0; $j < sizeof($data_pembayarantoko); $j++) {
                    $this->pembayarantoko->delete($data_pembayarantoko[$j]['id_pembayarantoko']);
                }
            }
        } else {
            $delete = $this->pembelian->delete($id_pembelian, true);
            if (sizeof($data_detailpembelian) > 0) {
                for ($i = 0; $i < sizeof($data_detailpembelian); $i++) {
                    $this->detailpembelian->delete($data_detailpembelian[$i]['id_detailpembelian'], true);
                    $data_obat = $this->obat->withdeleted()->where('id_obat', $data_detailpembelian[$i]['obat_id'])->findAll();
                    $dataupdateobat = array(
                        'stok' => $data_obat[0]['stok'] - $data_detailpembelian[$i]['qty'],
                    );
                    $this->obat->updateobat($dataupdateobat, $data_detailpembelian[$i]['obat_id']);
                }
            }
            if (sizeof($data_pembayarantoko) > 0) {
                for ($j = 0; $j < sizeof($data_pembayarantoko); $j++) {
                    $this->pembayarantoko->delete($data_pembayarantoko[$j]['id_pembayarantoko'], true);
                }
            }
        }
        return redirect()->to('/stok/stok_in');
    }

    public function deletepenjualan($id_penjualan)
    {
        $data_penjualan = $this->penjualan->withdeleted()->find($id_penjualan);
        $data_detailpenjualan = $this->detailpenjualan->withdeleted()->where('penjualan_id', $id_penjualan)->findAll();
        $data_pembayarancustomer = $this->pembayarancustomer->withdeleted()->where('penjualan_id', $id_penjualan)->findAll();
        if ($data_penjualan['deleted_at'] == null) {
            $delete = $this->penjualan->delete($id_penjualan);
            if (sizeof($data_detailpenjualan) > 0) {
                for ($i = 0; $i < sizeof($data_detailpenjualan); $i++) {
                    $this->detailpenjualan->delete($data_detailpenjualan[$i]['id_detailpenjualan']);
                }
            }
            if (sizeof($data_pembayarancustomer) > 0) {
                for ($j = 0; $j < sizeof($data_pembayarancustomer); $j++) {
                    $this->pembayarancustomer->delete($data_pembayarancustomer[$j]['id_pembayarancustomer']);
                }
            }
        } else {
            $delete = $this->penjualan->delete($id_penjualan, true);
            if (sizeof($data_detailpenjualan) > 0) {
                for ($i = 0; $i < sizeof($data_detailpenjualan); $i++) {
                    $this->detailpenjualan->delete($data_detailpenjualan[$i]['id_detailpenjualan'], true);
                    $data_obat = $this->obat->withdeleted()->where('id_obat', $data_detailpenjualan[$i]['obat_id'])->findAll();
                    $dataupdateobat = array(
                        'stok' => $data_obat[0]['stok'] + $data_detailpenjualan[$i]['qty'],
                    );
                    $this->obat->updateobat($dataupdateobat, $data_detailpenjualan[$i]['obat_id']);
                }
            }
            if (sizeof($data_pembayarancustomer) > 0) {
                for ($j = 0; $j < sizeof($data_pembayarancustomer); $j++) {
                    $this->pembayarancustomer->delete($data_pembayarancustomer[$j]['id_pembayarancustomer'], true);
                }
            }
        }
        return redirect()->to('/stok/stok_out');
    }


    public function restorepembelian($id)
    {
        $data = array(
            'deleted_at'        => null,
        );
        $data_detailpembelian = $this->detailpembelian->onlyDeleted()->where('pembelian_id', $id)->findAll();
        $data_pembayarantoko = $this->pembayarantoko->onlyDeleted()->where('pembelian_id', $id)->findAll();
        $ubah = $this->pembelian->updatepembelian($data, $id);

        if (sizeof($data_detailpembelian) > 0) {
            for ($i = 0; $i < sizeof($data_detailpembelian); $i++) {
                $this->detailpembelian->updatedetailpembelian($data, $data_detailpembelian[$i]['id_detailpembelian']);
            }
        }

        if (sizeof($data_pembayarantoko) > 0) {
            for ($i = 0; $i < sizeof($data_pembayarantoko); $i++) {
                $this->pembayarantoko->updatepembayarantoko($data, $data_pembayarantoko[$i]['id_pembayarantoko']);
            }
        }



        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Di restore!');
            return redirect()->to('/stok/stok_in');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Di restore!');
            return redirect()->to('/stok/stok_in');
        }
    }

    public function restorepenjualan($id)
    {
        $data = array(
            'deleted_at'        => null,
        );
        $data_detailpenjualan = $this->detailpenjualan->onlyDeleted()->where('penjualan_id', $id)->findAll();
        $data_pembayarancustomer = $this->pembayarancustomer->onlyDeleted()->where('penjualan_id', $id)->findAll();
        $ubah = $this->penjualan->updatepenjualan($data, $id);
        if (sizeof($data_detailpenjualan) > 0) {
            for ($i = 0; $i < sizeof($data_detailpenjualan); $i++) {
                $this->detailpenjualan->updatedetailpenjualan($data, $data_detailpenjualan[$i]['id_detailpenjualan']);
            }
        }
        if (sizeof($data_pembayarancustomer) > 0) {
            for ($i = 0; $i < sizeof($data_pembayarancustomer); $i++) {
                $this->pembayarancustomer->updatepembayarancustomer($data, $data_pembayarancustomer[$i]['id_pembayarancustomer']);
            }
        }
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Di restore!');
            return redirect()->to('/stok/stok_out');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Di restore!');
            return redirect()->to('/stok/stok_out');
        }
    }
    public function listdata_pembelian()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );


        $table = <<<EOT
        (
           SELECT
             pembelian.*, supplier.supplier as namasupplier
                FROM pembelian
                    INNER JOIN supplier ON supplier.id_supplier = pembelian.supplier_id 
                        WHERE pembelian.deleted_at is null
        ) temp
       EOT;

        //primary key
        $primaryKey = "id_pembelian";

        $columns = array(

            array(
                "db" => "id_pembelian",
                "dt" => 0,
            ),
            array(
                "db" => "tanggal_pembelian",
                "dt" => 1,
            ),
            array(
                "db" => "kode_pembelian",
                "dt" => 2,
            ),
            array(
                "db" => "no_nota",
                "dt" => 3,
            ),
            array(
                "db" => "namasupplier",
                "dt" => 4,
            ),
            array(
                "db" => "grand_total",
                "dt" => 5,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },

            ),
            array(
                "db" => "total_sisa",
                "dt" => 6,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },

            ),
            array(
                "db" => "status_pembelian",
                "dt" => 7,
            ),
            array(
                "db" => "created_by",
                "dt" => 8,
            ),
        );

        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function listdata_penjualan()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = <<<EOT
        (
           SELECT
             penjualan.*, customer.customer as namacustomer
                FROM penjualan
                    INNER JOIN customer ON customer.id_customer = penjualan.customer_id 
                        WHERE penjualan.deleted_at is null
        ) temp
       EOT;


        //primary key
        $primaryKey = "id_penjualan";

        $columns = array(

            array(
                "db" => "id_penjualan",
                "dt" => 0,
            ),
            array(
                "db" => "tanggal_penjualan",
                "dt" => 1,
            ),
            array(
                "db" => "kode_penjualan",
                "dt" => 2,
            ),
            array(
                "db" => "namacustomer",
                "dt" => 3,
            ),
            array(
                "db" => "grand_total",
                "dt" => 4,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },

            ),
            array(
                "db" => "total_sisa",
                "dt" => 5,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },

            ),
            array(
                "db" => "status_penjualan",
                "dt" => 6,
            ),
            array(
                "db" => "created_by",
                "dt" => 7,
            ),
        );

        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function listdata_pembelianlainnya()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "pembelianlainnya";

        //primary key
        $primaryKey = "id_pembelianlainnya";

        $columns = array(

            array(
                "db" => "id_pembelianlainnya",
                "dt" => 0,
            ),
            array(
                "db" => "kode_pembelianlainnya",
                "dt" => 1,
            ),
            array(
                "db" => "tanggal_pembelian",
                "dt" => 2,
            ),
            array(
                "db" => "grand_total",
                "dt" => 3,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },
            ),
            array(
                "db" => "created_by",
                "dt" => 4,
            ),
            array(
                "db" => "keterangan",
                "dt" => 5,
            ),
            array(
                "db" => "keterangan",
                "dt" => 6,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is null")
        );
    }

    public function listdata_sampah_pembelian()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "pembelian";

        //primary key
        $primaryKey = "id_pembelian";

        $columns = array(

            array(
                "db" => "id_pembelian",
                "dt" => 0,
            ),
            array(
                "db" => "tanggal_pembelian",
                "dt" => 1,
                "formatter" => function ($value, $row) {
                    $date = date_create($value);
                    return date_format($date, "j F Y");
                },
            ),
            array(
                "db" => "id_pembelian",
                "dt" => 2,
            ),
            array(
                "db" => "no_nota",
                "dt" => 3,

            ),
            array(
                "db" => "supplier_id",
                "dt" => 4,
                "formatter" => function ($value, $row) {
                    $supplier = $this->supplier->getWhere(['id_supplier' => $value]);
                    $data = $supplier->getRowArray();
                    return $data['supplier'];
                },
            ),
            array(
                "db" => "grand_total",
                "dt" => 5,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },

            ),
            array(
                "db" => "total_sisa",
                "dt" => 6,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },

            ),
            array(
                "db" => "status_pembelian",
                "dt" => 7,
            ),
            array(
                "db" => "created_by",
                "dt" => 8,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is not null")
        );
    }

    public function listdata_sampah_penjualan()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "penjualan";

        //primary key
        $primaryKey = "id_penjualan";

        $columns = array(

            array(
                "db" => "id_penjualan",
                "dt" => 0,
            ),
            array(
                "db" => "tanggal_penjualan",
                "dt" => 1,
                "formatter" => function ($value, $row) {
                    $date = date_create($value);
                    return date_format($date, "j F Y");
                },
            ),
            array(
                "db" => "id_penjualan",
                "dt" => 2,
            ),
            array(
                "db" => "customer_id",
                "dt" => 3,
                "formatter" => function ($value, $row) {
                    $customer = $this->customer->getWhere(['id_customer' => $value]);
                    $data = $customer->getRowArray();
                    return $data['customer'];
                },
            ),
            array(
                "db" => "grand_total",
                "dt" => 4,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },

            ),
            array(
                "db" => "total_sisa",
                "dt" => 5,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },

            ),
            array(
                "db" => "status_penjualan",
                "dt" => 6,
            ),
            array(
                "db" => "created_by",
                "dt" => 7,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is not null")
        );
    }

    public function listdata_sampah_pembelianlainnya()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "pembelianlainnya";

        //primary key
        $primaryKey = "id_pembelianlainnya";

        $columns = array(

            array(
                "db" => "id_pembelianlainnya",
                "dt" => 0,
            ),
            array(
                "db" => "tanggal_pembelian",
                "dt" => 1,
            ),
            array(
                "db" => "grand_total",
                "dt" => 2,
                "formatter" => function ($value, $row) {
                    return "Rp. " . number_format($value, 2, ',', '.');
                },
            ),
            array(
                "db" => "created_by",
                "dt" => 3,
            ),
            array(
                "db" => "keterangan",
                "dt" => 4,
            ),
            array(
                "db" => "keterangan",
                "dt" => 5,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is not null")
        );
    }


    function get_obat_by_id()
    {
        $obat = $this->obat->get_dataobat_by_id($this->request->getPost('id_obat'));
        return json_encode($obat);
    }

    function fetch_data_detailpembelian()
    {
        $id_pembelian = $this->request->getPost('id_pembelian');
        $data['detailpembelian'] = $this->detailpembelian->getdetailpembelian_by_pembelianid($id_pembelian);
        $data['pembelian'] =  $this->pembelian->getWhere(['id_pembelian' => $id_pembelian])->getRowArray();

        return json_encode($data);
    }

    function fetch_data_detailpenjualan()
    {
        $id_penjualan = $this->request->getPost('id_penjualan');
        $data['detailpenjualan'] = $this->detailpenjualan->getdetailpenjualan_by_penjualanid($id_penjualan);
        $data['penjualan'] =  $this->penjualan->getWhere(['id_penjualan' => $id_penjualan])->getRowArray();
        return json_encode($data);
    }

    function get_rekap_penjualan()
    {
        $start_date = $this->request->getPost('tanggal_awal');
        $end_date = $this->request->getPost('tanggal_akhir');
        $id = $this->request->getPost('customer_id');
        $data = $this->penjualan->get_rekap_penjualan($start_date, $end_date, $id);
        return json_encode($data);
    }

    function get_rekap_stok()
    {
        $start_date = $this->request->getPost('tanggal_awal');
        $end_date = $this->request->getPost('tanggal_akhir');
        $id = $this->request->getPost('obat_id');
        $data = $this->obat->get_rekap_stok($start_date, $end_date, $id);
        return json_encode($data);
    }

    function get_rekap_pembelian()
    {
        $start_date = $this->request->getPost('tanggal_awal');
        $end_date = $this->request->getPost('tanggal_akhir');
        $id = $this->request->getPost('supplier_id');
        $data = $this->pembelian->get_rekap_pembelian($start_date, $end_date, $id);
        return json_encode($data);
    }
}
