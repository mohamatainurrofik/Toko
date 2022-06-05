<?php

namespace App\Models;

use CodeIgniter\Model;

class Cashflow extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'cashflow';
    protected $primaryKey       = 'id_cashflow';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];


    public function tambahcashflow($data)
    {
        $query = $this->db->table('cashflow')->insert($data);
        return $query;
    }

    public function updatecashflow($data, $id)
    {
        $query = $this->db->table('cashflow')->update($data, array('id_cashflow' => $id));
        return $query;
    }

    public function get_data_cashflow($start_date, $end_date)
    {
        $query = $this->db->query('SELECT SUM(grand_total) as total,SUM(total_sisa) as sisa,SUM(grand_kembalian) as kembalian FROM pembelian WHERE tanggal_pembelian >= "' . $start_date . '" AND tanggal_pembelian <= "' . $end_date . '"');
        $query1 = $this->db->query('SELECT SUM(detailpenjualan.hpp*detailpenjualan.qty) as hpp FROM penjualan INNER JOIN detailpenjualan on detailpenjualan.penjualan_id = penjualan.id_penjualan WHERE tanggal_penjualan >= "' . $start_date . '" AND tanggal_penjualan <= "' . $end_date . '"');
        $query7 = $this->db->query('SELECT SUM(grand_total) as total,SUM(total_sisa) as sisa,SUM(grand_kembalian) as kembalian FROM penjualan WHERE tanggal_penjualan >= "' . $start_date . '" AND tanggal_penjualan <= "' . $end_date . '"');
        $query2 = $this->db->query('SELECT SUM(grand_total) as total FROM pembelianlainnya WHERE tanggal_pembelian >= "' . $start_date . '" AND tanggal_pembelian <= "' . $end_date . '"');
        $query3 = $this->db->query('SELECT SUM(pembayarantoko.total_pembayaran) as total FROM `pembayarantoko` WHERE pembayarantoko.tanggal_pembayaran <= "' . $end_date . '"  AND pembayarantoko.tanggal_pembayaran >= "' . $start_date . '"  AND pembayarantoko.pembelian_id NOT IN (SELECT id_pembelian FROM `pembelian` WHERE pembelian.tanggal_pembelian <= "' . $end_date . '"  AND pembelian.tanggal_pembelian >= "' . $start_date . '" )');
        $query6 = $this->db->query('SELECT SUM(pembayarantoko.total_pembayaran) as total FROM `pembayarantoko` WHERE pembayarantoko.tanggal_pembayaran <= "' . $end_date . '"  AND pembayarantoko.tanggal_pembayaran >= "' . $start_date . '"  AND pembayarantoko.pembelian_id IN (SELECT id_pembelian FROM `pembelian` WHERE pembelian.tanggal_pembelian <= "' . $end_date . '"  AND pembelian.tanggal_pembelian >= "' . $start_date . '" )');
        $query4 = $this->db->query('SELECT SUM(pembayarancustomer.total_pembayaran) as total FROM `pembayarancustomer` WHERE pembayarancustomer.tanggal_pembayaran <= "' . $end_date . '"  AND pembayarancustomer.tanggal_pembayaran >= "' . $start_date . '"  AND pembayarancustomer.penjualan_id NOT IN (SELECT id_penjualan FROM `penjualan` WHERE penjualan.tanggal_penjualan <= "' . $end_date . '"  AND penjualan.tanggal_penjualan >= "' . $start_date . '" )');
        $query5 = $this->db->query('SELECT SUM(pembayarancustomer.total_pembayaran) as total FROM `pembayarancustomer` WHERE pembayarancustomer.tanggal_pembayaran <= "' . $end_date . '"  AND pembayarancustomer.tanggal_pembayaran >= "' . $start_date . '"  AND pembayarancustomer.penjualan_id IN (SELECT id_penjualan FROM `penjualan` WHERE penjualan.tanggal_penjualan <= "' . $end_date . '"  AND penjualan.tanggal_penjualan >= "' . $start_date . '" )');

        $query8 = $this->db->query("SELECT SUM(cashflow.grand_total) as total
                                        FROM cashflow
                                                WHERE cashflow.tanggal < '$start_date'");

        $log['dataaruskas'] = array(
            'hutangtoko' => $query3->getRowArray(),
            'penjualanbulan' => $query5->getRowArray(),
            'pembelianbulan' => $query6->getRowArray(),
            'piutangcustomer' => $query4->getRowArray(),
            'datapembelian' => $query->getRowArray(),
            'datapenjualan' => $query7->getRowArray(),
            'dataoperasional' => $query2->getRowArray(),
            'datahpp' => $query1->getRowArray(),
            'kasawal' => $query8->getRowArray(),
        );
        return $log;
    }

    public function get_kas($start_date, $end_date)
    {
        $query7 = $this->db->query('SELECT  * FROM cashflow WHERE tanggal >= "' . $start_date . '" AND tanggal <= "' . $end_date . '"');
        $query8 = $this->db->query("SELECT SUM(cashflow.grand_total) as total
                                        FROM cashflow
                                                WHERE cashflow.tanggal < '$start_date'");
        $log = array(
            'datakas' => $query7->getResultArray(),
            'kaswal' => $query8->getRowArray(),
        );

        return $log;
    }
}
