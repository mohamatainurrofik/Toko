<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cashflow;
use App\Models\Pembelian;
use App\Models\Penjualan;

class Kas extends BaseController
{

    public function __construct()
    {
        require_once FCPATH . 'ssp/ssp.class.php';
        $this->pembelian = new Pembelian();
        $this->penjualan = new Penjualan();
        $this->kas = new Cashflow();
    }

    public function index()
    {
        return view('kas/cashflow');
    }

    public function bank()
    {
        return view('kas/bank');
    }


    public function addkas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $datacashflow = $this->db->query("SELECT MAX(tanggal) as tanggal from cashflow")->getRowArray();
        if ($datacashflow['tanggal'] != date('Y-m-d')) {
            $data = $this->kas->get_data_cashflow(date('Y-m-d'), date('Y-m-d'));
            $totalkas = ($data['dataaruskas']['penjualanbulan']['total'] + $data['dataaruskas']['piutangcustomer']['total']) - ($data['dataaruskas']['hutangtoko']['total'] + $data['dataaruskas']['pembelianbulan']['total']);

            $datakas = array(
                'jenis_cashflow' => 'MASUK',
                'tanggal' => date('Y-m-d'),
                'grand_total' => $totalkas,
                'keterangan' => 'Kas hari ini'
            );

            $kas = $this->kas->tambahcashflow($datakas);
        }
        return redirect()->to('/Kas/');
    }

    public function addcashflow()
    {
        $datakas = array(
            'tanggal' => $this->request->getPost('tanggalcashflow'),
            'jenis_cashflow' => $this->request->getPost('jeniscashflow'),
            'grand_total' => $this->request->getPost('totalcashflow'),
            'keterangan' => $this->request->getPost('keterangancashflow'),
            'created_by' => user()->username,
        );

        $tambah = $this->kas->tambahcashflow($datakas);
        if ($tambah == true) {
            session()->setFlashdata('message', 'Data Berhasil Ditambah!');
            return redirect()->to('/Kas/');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Ditambah!');
            return redirect()->to('/Kas/');
        }
    }

    public function editcashflow()
    {
        $id_cashflow = $this->request->getPost('id_cashflow');
        $datakas = array(
            'tanggal' => $this->request->getPost('tanggalcashflow'),
            'jenis_cashflow' => $this->request->getPost('jeniscashflow'),
            'grand_total' => $this->request->getPost('totalcashflow'),
            'keterangan' => $this->request->getPost('keterangancashflow'),
            'created_by' => user()->username,
        );
        $ubah = $this->kas->updatecashflow($datakas, $id_cashflow);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Diubah!');
            return redirect()->to('/kas');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Diubah!');
            return redirect()->to('/kas');
        }
    }

    public function deletecashflow($id_cashflow)
    {
        $data_cashflow = $this->kas->withdeleted()->find($id_cashflow);
        if ($data_cashflow['deleted_at'] == null) {
            $delete = $this->kas->delete(
                $id_cashflow,
                true
            );
        } else {
            $delete = $this->kas->delete($id_cashflow, true);
        }

        if ($delete == true) {
            session()->setFlashdata('message', 'Data Berhasil Dihapus!');
            return redirect()->to('/kas/');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Dihapus!');
            return redirect()->to('/kas/');
        }
    }



    public function listdata_cash()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "cashflow";

        //primary key
        $primaryKey = "id_cashflow";

        $columns = array(

            array(
                "db" => "id_cashflow",
                "dt" => 0,
            ),
            array(
                "db" => "id_cashflow",
                "dt" => 1,
            ),
            array(
                "db" => "tanggal",
                "dt" => 2,
            ),
            array(
                "db" => "jenis_cashflow",
                "dt" => 3,
            ),
            array(
                "db" => "grand_total",
                "dt" => 4,
            ),
            array(
                "db" => "keterangan",
                "dt" => 5,
            ),
            array(
                "db" => "created_by",
                "dt" => 6,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is null")
        );
    }

    public function listdata_bank()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "bankflow";

        //primary key
        $primaryKey = "id_bankflow";

        $columns = array(

            array(
                "db" => "id_bankflow",
                "dt" => 0,
            ),
            array(
                "db" => "id_bankflow",
                "dt" => 1,
            ),
            array(
                "db" => "tanggal",
                "dt" => 2,
            ),
            array(
                "db" => "jenis_bankflow",
                "dt" => 3,
            ),
            array(
                "db" => "grand_total",
                "dt" => 4,
            ),
            array(
                "db" => "keterangan",
                "dt" => 5,
            ),
            array(
                "db" => "created_by",
                "dt" => 6,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is null")
        );
    }

    function get_rekap_kas()
    {
        $start_date = $this->request->getPost('tanggal_awal');
        $end_date = $this->request->getPost('tanggal_akhir');
        $data = $this->kas->get_kas($start_date, $end_date);
        return json_encode($data);
    }
}
