<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembelian extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'pembelian';
    protected $primaryKey       = 'id_pembelian';
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

    public function tambahpembelian($data)
    {
        $query = $this->db->table('pembelian')->insert($data);
        return $query;
    }
    public function updatepembelian($data, $id)
    {
        $query = $this->db->table('pembelian')->update($data, array('id_pembelian' => $id));
        return $query;
    }

    public function get_data_pembelian($start_date, $end_date)
    {

        $query = $this->db->query('SELECT *,SUM(grand_total) as total,SUM(grand_kembalian) as kembalian,SUM(`total_sisa`) as sisa, tanggal_pembelian as tanggal, MONTHNAME(tanggal_pembelian) as namabulan FROM pembelian WHERE tanggal_pembelian >= "' . $start_date . '" AND tanggal_pembelian <= "' . $end_date . '" GROUP BY tanggal_pembelian ORDER BY tanggal_pembelian DESC ');

        $log = $query->getResultArray();

        return $log;
    }

    public function get_pembelian_by_search($searchTerm)
    {
        if ($searchTerm == null) {
            $query = $this->db->query("SELECT *
                                                FROM pembelian
                                                        WHERE pembelian.deleted_at is null AND pembelian.status_pembelian = 1 LIMIT 5 ");
            $log = $query->getResultArray();
        } else {
            $query1 = $this->db->query("SELECT *
                                            FROM pembelian
                                                WHERE pembelian.kode_pembelian like '%$searchTerm%' AND pembelian.deleted_at is null AND pembelian.status_pembelian = 1");
            $log = $query1->getResultArray();
        }
        return $log;
    }

    public function get_detaildatapembelian($id_pembelian)
    {
        $query = $this->db->query("SELECT pembelian.*,supplier.supplier
                                        FROM pembelian
                                                INNER JOIN supplier on supplier.id_supplier = pembelian.supplier_id
                                                    WHERE pembelian.id_pembelian = $id_pembelian");
        $query1 = $this->db->query("SELECT detailpembelian.*,obat.nama_obat,obat.satuan,satuan.satuan
                                        FROM detailpembelian
                                            INNER JOIN obat on obat.id_obat = detailpembelian.obat_id
                                            INNER JOIN satuan on satuan.id_satuan = obat.satuan
                                                WHERE detailpembelian.pembelian_id = $id_pembelian");
        $log['pembelian'] = $query->getRowArray();
        $log['detailpembelian'] = $query1->getResultArray();
        return $log;
    }

    public function get_rekap_pembelian($start_date, $end_date, $id)
    {
        if ($id == '') {
            $query2 = $this->db->query("SELECT MAX(id_pembelian) as id, MIN(id_pembelian) as id1
                                            FROM pembelian
                                                        WHERE pembelian.tanggal_pembelian >= '$start_date' AND pembelian.tanggal_pembelian <= '$end_date'");
            $pembelian = $query2->getRowArray();
            $query = $this->db->query("SELECT pembelian.*,supplier.supplier
                                            FROM pembelian
                                                    INNER JOIN supplier on supplier.id_supplier = pembelian.supplier_id
                                                        WHERE pembelian.tanggal_pembelian >= '$start_date' AND pembelian.tanggal_pembelian <= '$end_date'");
            $query1 = $this->db->query("SELECT detailpembelian.*,obat.nama_obat,obat.satuan,satuan.satuan
                                                FROM detailpembelian
                                                    INNER JOIN obat on obat.id_obat = detailpembelian.obat_id
                                                    INNER JOIN satuan on satuan.id_satuan = obat.satuan
                                                        WHERE detailpembelian.pembelian_id <= {$pembelian['id']} AND detailpembelian.pembelian_id >= {$pembelian['id1']}");
            $log['pembelian'] = $query->getResultArray();
            $log['detailpembelian'] = $query1->getResultArray();
            return $log;
        } else {
            $query2 = $this->db->query("SELECT MAX(id_pembelian) as id, MIN(id_pembelian) as id1
                                            FROM pembelian
                                                        WHERE pembelian.tanggal_pembelian >= '$start_date' AND pembelian.tanggal_pembelian <= '$end_date' AND pembelian.supplier_id = $id");
            $pembelian = $query2->getRowArray();
            $query = $this->db->query("SELECT pembelian.*,supplier.supplier
                                                FROM pembelian
                                                        INNER JOIN supplier on supplier.id_supplier = pembelian.supplier_id
                                                            WHERE pembelian.tanggal_pembelian >= '$start_date' AND pembelian.tanggal_pembelian <= '$end_date' AND pembelian.supplier_id = $id");
            $query1 = $this->db->query("SELECT detailpembelian.*,obat.nama_obat,obat.satuan,satuan.satuan
                                                FROM detailpembelian
                                                    INNER JOIN obat on obat.id_obat = detailpembelian.obat_id
                                                    INNER JOIN satuan on satuan.id_satuan = obat.satuan
                                                        WHERE detailpembelian.pembelian_id <= {$pembelian['id']} AND detailpembelian.pembelian_id >= {$pembelian['id1']}");
            $log['pembelian'] = $query->getResultArray();
            $log['detailpembelian'] = $query1->getResultArray();
            return $log;
        }
    }
}
