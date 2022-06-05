<?php

namespace App\Models;

use CodeIgniter\Model;

class Penjualan extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'penjualan';
    protected $primaryKey       = 'id_penjualan';
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

    public function tambahpenjualan($data)
    {
        $query = $this->db->table('penjualan')->insert($data);
        return $query;
    }

    public function updatepenjualan($data, $id)
    {
        $query = $this->db->table('penjualan')->update($data, array('id_penjualan' => $id));
        return $query;
    }

    public function get_data_penjualan($start_date, $end_date)
    {

        $query = $this->db->query('SELECT *,SUM(grand_total) as total,SUM(`total_sisa`) as sisa,SUM(grand_kembalian) as kembalian, tanggal_penjualan as tanggal, MONTHNAME(tanggal_penjualan) as namabulan FROM penjualan WHERE tanggal_penjualan >= "' . $start_date . '" AND tanggal_penjualan <= "' . $end_date . '" GROUP BY tanggal_penjualan ORDER BY tanggal_penjualan DESC ');

        $log = $query->getResultArray();

        return $log;
    }

    public function get_penjualan_by_search($searchTerm)
    {
        if ($searchTerm == null) {
            $query = $this->db->query("SELECT *
                                                FROM penjualan
                                                        WHERE penjualan.deleted_at is null AND penjualan.status_penjualan = 1 LIMIT 5 ");
            $log = $query->getResultArray();
        } else {
            $query1 = $this->db->query("SELECT *
                                            FROM penjualan
                                                WHERE penjualan.kode_penjualan like '%$searchTerm%' AND penjualan.deleted_at is null AND penjualan.status_penjualan = 1");
            $log = $query1->getResultArray();
        }
        return $log;
    }

    public function get_detaildatapenjualan($id_penjualan)
    {
        $query = $this->db->query("SELECT penjualan.*,customer.customer
                                        FROM penjualan
                                                INNER JOIN customer on customer.id_customer = penjualan.customer_id
                                                    WHERE penjualan.id_penjualan = $id_penjualan");
        $query1 = $this->db->query("SELECT detailpenjualan.*,obat.nama_obat,obat.satuan,satuan.satuan
                                        FROM detailpenjualan
                                            INNER JOIN obat on obat.id_obat = detailpenjualan.obat_id
                                            INNER JOIN satuan on satuan.id_satuan = obat.satuan
                                                WHERE detailpenjualan.penjualan_id = $id_penjualan");
        $log['penjualan'] = $query->getRowArray();
        $log['detailpenjualan'] = $query1->getResultArray();
        return $log;
    }

    public function get_rekap_penjualan($start_date, $end_date, $id)
    {
        if ($id == '') {
            $query2 = $this->db->query("SELECT MAX(id_penjualan) as id, MIN(id_penjualan) as id1
                                            FROM penjualan
                                                        WHERE penjualan.tanggal_penjualan >= '$start_date' AND penjualan.tanggal_penjualan <= '$end_date'");
            $penjualan = $query2->getRowArray();
            $query = $this->db->query("SELECT penjualan.*,customer.customer
                                            FROM penjualan
                                                    INNER JOIN customer on customer.id_customer = penjualan.customer_id
                                                        WHERE penjualan.tanggal_penjualan >= '$start_date' AND penjualan.tanggal_penjualan <= '$end_date'");
            $query1 = $this->db->query("SELECT detailpenjualan.*,obat.nama_obat,obat.satuan,satuan.satuan
                                                FROM detailpenjualan
                                                    INNER JOIN obat on obat.id_obat = detailpenjualan.obat_id
                                                    INNER JOIN satuan on satuan.id_satuan = obat.satuan
                                                        WHERE detailpenjualan.penjualan_id <= {$penjualan['id']} AND detailpenjualan.penjualan_id >= {$penjualan['id1']}");
            $log['penjualan'] = $query->getResultArray();
            $log['detailpenjualan'] = $query1->getResultArray();
            return $log;
        } else {
            $query2 = $this->db->query("SELECT MAX(id_penjualan) as id, MIN(id_penjualan) as id1
                                            FROM penjualan
                                                        WHERE penjualan.tanggal_penjualan >= '$start_date' AND penjualan.tanggal_penjualan <= '$end_date' AND penjualan.customer_id = $id");
            $penjualan = $query2->getRowArray();
            $query = $this->db->query("SELECT penjualan.*,customer.customer
                                                FROM penjualan
                                                        INNER JOIN customer on customer.id_customer = penjualan.customer_id
                                                            WHERE penjualan.tanggal_penjualan >= '$start_date' AND penjualan.tanggal_penjualan <= '$end_date' AND penjualan.customer_id = $id");
            $query1 = $this->db->query("SELECT detailpenjualan.*,obat.nama_obat,obat.satuan,satuan.satuan
                                                FROM detailpenjualan
                                                    INNER JOIN obat on obat.id_obat = detailpenjualan.obat_id
                                                    INNER JOIN satuan on satuan.id_satuan = obat.satuan
                                                        WHERE detailpenjualan.penjualan_id <= {$penjualan['id']} AND detailpenjualan.penjualan_id >= {$penjualan['id1']}");
            $log['penjualan'] = $query->getResultArray();
            $log['detailpenjualan'] = $query1->getResultArray();
            return $log;
        }
    }
}
