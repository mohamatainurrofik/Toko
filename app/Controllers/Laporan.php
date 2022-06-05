<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cashflow;
use App\Models\Pembelian;
use App\Models\Penjualan;

class Laporan extends BaseController
{

    public function __construct()
    {
        $this->pembelian = new Pembelian();
        $this->penjualan = new Penjualan();
        $this->kas = new Cashflow();
    }

    public function index()
    {
        //
    }

    public function viewformlaporan()
    {
        return view('laporan/formlaporan');
    }



    function fetchdata_laporan1()
    {
        $action = $this->request->getPost('action');
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        $laporantipe = $this->request->getPost('laporantipe');

        if ($action) {
            if ($action == 'fetch') {
                if ($laporantipe == 'Aruskas' || $laporantipe == 'Labarugi') {
                    $data = $this->kas->get_data_cashflow($start_date, $end_date);
                    echo json_encode($data['dataaruskas']);
                }
            }
        }
    }

    function fetchdata_laporan()
    {
        $action = $this->request->getPost('action');
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        $laporantipe = $this->request->getPost('laporantipe');

        if ($action) {
            if ($action == 'fetch') {
                if ($laporantipe == 'Penjualan') {
                    $data = $this->penjualan->get_data_penjualan($start_date, $end_date);
                } else {
                    $data = $this->pembelian->get_data_pembelian($start_date, $end_date);
                }


                $output = array(
                    "data"            =>    $data
                );

                echo json_encode($output);
            }
        }
    }
}
