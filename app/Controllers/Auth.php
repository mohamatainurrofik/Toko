<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cashflow;

class Auth extends BaseController
{

    public function __construct()
    {
        $this->kas = new Cashflow();
    }

    public function index()
    {
        return view('account/login');
    }

    public function login()
    {
        $cek = $this->user->get_data_login($this->request->getPost('nrp'));
        if ($cek != null) {
            if (password_verify($this->request->getPost('pass'), $cek['passwd'])) {
                $session = array(
                    'id_user' => $cek['id_user'],
                    'karyawan_id' => $cek['karyawan_id'],
                    'level' => $cek['level'],
                    'status' => $cek['status_user'],
                );
                session()->set($session);
                return redirect()->to('/dashboard');
            }
        }

        $datacashflow = $this->db->query("SELECT MAX(tanggal) as tanggal from cashflow")->getRowArray();
        if ($datacashflow['tanggal'] != date('Y-m-d')) {
            $data = $this->kas->get_data_cashflow('2022-04-08', '2022-04-08');
            $totalkas = ($data['penjualanbulan']['total'] + $data['piutangcustomer']['total']) - ($data['hutangtoko']['total'] + $data['pembelianbulan']['total']);

            $datakas = array(
                'jenis_cashflow' => 'MASUK',
                'tanggal' => date('Y-m-d'),
                'grand_total' => $totalkas,
                'keterangan' => 'Kas hari ini'
            );

            $this->kas->tambahcashflow($datakas);
        }

        return redirect()->to('/');
    }
}
