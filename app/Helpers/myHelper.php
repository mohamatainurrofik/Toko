<?php


function get_rekap_kas()
{
    $db      = \Config\Database::connect();

    return $db->table('cashflow')->get()->getResultArray();
}


function customer()
{
    $db      = \Config\Database::connect();
    $data = $db->table('customer')->get()->getResultArray();
    return $data;
}
