<?php

namespace App\Models;

use CodeIgniter\Model;

class Detailpembelian extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'detailpembelian';
    protected $primaryKey       = 'id_detailpembelian';
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

    public function tambahdetailpembelian($data)
    {
        $query = $this->db->table('detailpembelian')->insert($data);
        return $query;
    }

    public function updatehpp($id)
    {
        $query = $this->db->query("SELECT detailpembelian.*
                                                FROM detailpembelian
                                                    INNER JOIN pembelian on pembelian.id_pembelian = detailpembelian.pembelian_id
                                                        WHERE detailpembelian.obat_id = $id");
        $log = $query->getResultArray();
        return $log;
    }

    public function updatedetailpembelian($data, $id)
    {
        $query = $this->db->table('detailpembelian')->update($data, array('id_detailpembelian' => $id));
        return $query;
    }

    public function getdetailpembelian_by_pembelianid($id)
    {
        $query = $this->db->query("SELECT detailpembelian.*,obat.nama_obat, satuan.satuan, jenisobat.jenis_obat, kategoriobat.kategori_obat
                                        FROM detailpembelian
                                            INNER JOIN obat ON obat.id_obat = detailpembelian.obat_id
                                            INNER JOIN satuan ON satuan.id_satuan = obat.satuan
                                            INNER JOIN jenisobat ON jenisobat.id_jenis_obat = obat.jenis_obat
                                            INNER JOIN kategoriobat ON kategoriobat.id_kategori_obat = obat.kategori_obat
                                                WHERE detailpembelian.pembelian_id = $id");
        $log = $query->getResultArray();
        return $log;
    }
}
