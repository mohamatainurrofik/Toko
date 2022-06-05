<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jenisobat;
use App\Models\Kategoriobat;
use App\Models\Obat as ModelsObat;
use App\Models\Satuan;

class Obat extends BaseController
{

    public function __construct()
    {
        require_once FCPATH . 'ssp/ssp.class.php';
        $this->kategori = new Kategoriobat();
        $this->jenis = new Jenisobat();
        $this->satuan = new Satuan();
        $this->obat = new ModelsObat();
    }

    public function index()
    {
        $data['kategori'] = $this->kategori->get()->getResultArray();
        $data['jenis'] = $this->jenis->get()->getResultArray();
        $data['satuan'] = $this->satuan->get()->getResultArray();

        return view('master/obat', $data);
    }
    public function addobat()
    {
        $obat = $this->obat->query("SELECT max(id_obat) as id_terbesar FROM obat")->getRowArray();



        $dataobat = array(
            'kode_obat' => 'OBT' . sprintf("%03s", $obat['id_terbesar']++) . '',
            'kategori_obat' => $this->request->getPost('kategori_obat'),
            'jenis_obat' => $this->request->getPost('jenis_obat'),
            'nama_obat' => $this->request->getPost('namaobat'),
            'satuan' => $this->request->getPost('satuan_obat'),
            'hna' => $this->request->getPost('hna'),
            'hpp_avg' => 0,
            'hj' => $this->request->getPost('hj'),
            'max_diskon' => $this->request->getPost('max_disc'),
            'minimum_stok' => $this->request->getPost('min_stok'),
            'deskripsi' => $this->request->getPost('deskripsiobat'),

        );

        $tambah = $this->obat->tambahobat($dataobat);
        if ($tambah == true) {
            session()->setFlashdata('message', 'Data Berhasil Ditambah!');
            return redirect()->to('/master/obat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Ditambah!');
            return redirect()->to('/master/obat');
        }
    }

    public function editobat()
    {
        $id_obat = $this->request->getPost('id_obat');
        $dataobat = $this->obat->getWhere(['id_obat' => $id_obat])->getRowArray();
        $data = array(
            'kode_obat' => $this->request->getPost('kode_obat'),
            'kategori_obat' => $this->request->getPost('kategori_obat'),
            'jenis_obat' => $this->request->getPost('jenis_obat'),
            'nama_obat' => $this->request->getPost('namaobat'),
            'satuan' => $this->request->getPost('satuan_obat'),
            'hna' => $this->request->getPost('hna'),
            'hpp_avg' => $this->request->getPost('hpp_avg'),
            'hj' => $this->request->getPost('hj'),
            'max_diskon' => $this->request->getPost('max_disc'),
            'minimum_stok' => $this->request->getPost('min_stok'),
            'deskripsi' => $this->request->getPost('deskripsiobat'),
        );
        $description = "update data barang {$dataobat['nama_obat']}";
        $ubah = $this->obat->updateobat($data, $id_obat, $description);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Diubah!');
            return redirect()->to('/master/obat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Diubah!');
            return redirect()->to('/master/obat');
        }
    }

    public function deleteobat()
    {
        $id_obat = $this->request->getPost('id_obat');
        $data_obat = $this->obat->withdeleted()->find($id_obat);
        if ($data_obat['deleted_at'] == null) {
            $delete = $this->obat->delete($id_obat);
        } else {
            $delete = $this->obat->delete($id_obat, true);
        }

        if ($delete == true) {
            session()->setFlashdata('message', 'Data Berhasil Dihapus!');
            return redirect()->to('/master/obat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Dihapus!');
            return redirect()->to('/master/obat');
        }
    }

    public function restoreobat($id)
    {
        $data = array(
            'deleted_at'        => null,
        );
        $ubah = $this->obat->updateobat($data, $id);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Di restore!');
            return redirect()->to('/master/obat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Di restore!');
            return redirect()->to('/master/obat');
        }
    }

    public function updatestok()
    {
        $obat = $this->obat->get()->getResultArray();

        for ($i = 0; $i < sizeof($obat); $i++) {
            $query = $this->db->query("SELECT SUM(qty) as stok FROM detailpembelian WHERE detailpembelian.obat_id = {$obat[$i]['id_obat']} ");
            $query1 = $this->db->query("SELECT SUM(qty) as stok FROM detailpenjualan WHERE detailpenjualan.obat_id = {$obat[$i]['id_obat']} ");
            $data = $query->getRowArray();
            $data1 = $query1->getRowArray();
            var_dump($data);
            $stok = $data['stok'] - $data1['stok'];
            $datastok = array(
                'stok' => $data['stok'] ==  null ? 0 : $stok,
            );

            $this->obat->updateobat($datastok, $obat[$i]['id_obat']);
        }
    }

    public function listdata_historyobat($id)
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "logactivities";

        //primary key
        $primaryKey = "id_log";

        $columns = array(

            array(
                "db" => "table_id",
                "dt" => 0,
            ),
            array(
                "db" => "created_at",
                "dt" => 1,
            ),
            array(
                "db" => "created_by",
                "dt" => 2,
            ),
            array(
                "db" => "description",
                "dt" => 3,
            ),
            array(
                "db" => "before",
                "dt" => 4,
            ),
            array(
                "db" => "after",
                "dt" => 5,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "table_names = 'obat' AND table_id = '$id'")
        );
    }


    public function listdata_masterobat()
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
             obat.*, satuan.satuan as namasatuan,jenisobat.jenis_obat as namajenisobat,kategoriobat.kategori_obat as namakategoriobat
                FROM obat
                    INNER JOIN satuan ON satuan.id_satuan = obat.satuan 
                    INNER JOIN kategoriobat ON kategoriobat.id_kategori_obat = obat.kategori_obat 
                    INNER JOIN jenisobat ON jenisobat.id_jenis_obat = obat.jenis_obat
                        WHERE obat.deleted_at is null
        ) temp
       EOT;

        //primary key
        $primaryKey = "id_obat";

        $columns = array(

            array(
                "db" => "id_obat",
                "dt" => 0,
            ),
            array(
                "db" => "kode_obat",
                "dt" => 1,
            ),
            array(
                "db" => "namakategoriobat",
                "dt" => 2,
            ),
            array(
                "db" => "namajenisobat",
                "dt" => 3,
            ),
            array(
                "db" => "nama_obat",
                "dt" => 4,
            ),
            array(
                "db" => "stok",
                "dt" => 5,
            ),
            array(
                "db" => "namasatuan",
                "dt" => 6,
            ),
            array(
                "db" => "hna",
                "dt" => 7,
            ),
            array(
                "db" => "hpp_avg",
                "dt" => 8,
            ),
            array(
                "db" => "hj",
                "dt" => 9,
            ),
            array(
                "db" => "max_diskon",
                "dt" => 10,
            ),
            array(
                "db" => "minimum_stok",
                "dt" => 11,
            ),
            array(
                "db" => "deskripsi",
                "dt" => 12,
            ),
            array(
                "db" => "kategori_obat",
                "dt" => 13,
            ),
            array(
                "db" => "jenis_obat",
                "dt" => 14,
            ),
            array(
                "db" => "satuan",
                "dt" => 15,
            ),
        );

        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    // public function listdata_mastersampahobat()
    // {
    //     // this is database details

    //     $dbDetails = array(
    //         "host" => $this->db->hostname,
    //         "user" => $this->db->username,
    //         "pass" => $this->db->password,
    //         "db" => $this->db->database,
    //     );

    //     $table = "obat";

    //     //primary key
    //     $primaryKey = "id_obat";

    //     $columns = array(

    //         array(
    //             "db" => "id_obat",
    //             "dt" => 0,
    //         ),
    //         array(
    //             "db" => "id_obat",
    //             "dt" => 1,
    //             "formatter" => function ($value, $row) {
    //                 return 'OBT00' . $value . '';
    //             },
    //         ),
    //         array(
    //             "db" => "kategori_obat",
    //             "dt" => 2,
    //             "formatter" => function ($value, $row) {
    //                 $kategori = $this->kategori->getWhere(['id_kategori_obat' => $value]);;
    //                 $data = $kategori->getRowArray();
    //                 return $data;
    //             },
    //         ),
    //         array(
    //             "db" => "jenis_obat",
    //             "dt" => 3,
    //             "formatter" => function ($value, $row) {
    //                 $jenis = $this->jenis->getWhere(['id_jenis_obat' => $value]);;
    //                 $data = $jenis->getRowArray();
    //                 return $data;
    //             },
    //         ),
    //         array(
    //             "db" => "nama_obat",
    //             "dt" => 4,
    //         ),
    //         array(
    //             "db" => "id_obat",
    //             "dt" => 5,
    //             "formatter" => function ($value, $row) {
    //                 $query = $this->db->query("SELECT SUM(qty) as stok FROM detailpembelian WHERE detailpembelian.obat_id = '$value' ");
    //                 $query1 = $this->db->query("SELECT SUM(qty) as stok FROM detailpenjualan WHERE detailpenjualan.obat_id = '$value' ");
    //                 $data = $query->getRowArray();
    //                 $data1 = $query1->getRowArray();
    //                 $stok = $data['stok'] - $data1['stok'];
    //                 if ($data['stok'] = null) {
    //                     return '0';
    //                 } else {
    //                     return '' . $stok . '';
    //                 }
    //             },
    //         ),
    //         array(
    //             "db" => "satuan",
    //             "dt" => 6,
    //             "formatter" => function ($value, $row) {
    //                 $satuan = $this->satuan->getWhere(['id_satuan' => $value]);;
    //                 $data = $satuan->getRowArray();
    //                 return $data;
    //             },
    //         ),
    //         array(
    //             "db" => "hna",
    //             "dt" => 7,
    //         ),
    //         array(
    //             "db" => "hpp_avg",
    //             "dt" => 8,
    //         ),
    //         array(
    //             "db" => "hj",
    //             "dt" => 9,
    //         ),
    //         array(
    //             "db" => "max_diskon",
    //             "dt" => 10,
    //         ),
    //         array(
    //             "db" => "minimum_stok",
    //             "dt" => 11,
    //         ),
    //         array(
    //             "db" => "deskripsi",
    //             "dt" => 12,
    //         ),
    //     );

    //     echo json_encode(
    //         \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is not null")
    //     );
    // }

    function list_obat()
    {
        $list_obat = $this->obat->get_obat_by_search($this->request->getPost('searchTerm'));

        for ($i = 0; $i < sizeof($list_obat); $i++) {
            $data[] = array(
                'id' => $list_obat[$i]['id_obat'],
                'text' => $list_obat[$i]['nama_obat'],
                'stok' => $list_obat[$i]['stok'],
                'hna' => $list_obat[$i]['hna'],
                'hpp' => $list_obat[$i]['hpp_avg'],
                'hj' => $list_obat[$i]['hj'],
                'max_diskon' => $list_obat[$i]['max_diskon'],
                'minimum_stok' => $list_obat[$i]['minimum_stok'],
            );
        }
        return json_encode($data);
    }
}
