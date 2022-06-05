<?php

namespace App\Controllers;

use App\Models\Cashflow;
use App\Models\Menu;

class Home extends BaseController
{

    public function __construct()
    {
        $this->menu = new Menu();
        $this->kas = new Cashflow();
    }

    public function tes()
    {
        $data = $this->kas->get_data_cashflow(date('Y-m-d'), date('Y-m-d'));
        var_dump($data);
    }

    public function index()
    {
        return view('index');
    }
}
