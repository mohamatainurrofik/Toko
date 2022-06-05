<?php

namespace App\Models;

use CodeIgniter\Model;

class Detailpenjualan extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'detailpenjualan';
    protected $primaryKey       = 'id_detailpenjualan';
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

    public function tambahdetailpenjualan($data)
    {
        $query = $this->db->table('detailpenjualan')->insertBatch($data);
        return $query;
    }

    public function updatedetailpenjualan($data, $id)
    {
        $query = $this->db->table('detailpenjualan')->update($data, array('id_detailpenjualan' => $id));
        return $query;
    }

    public function getdetailpenjualan_by_penjualanid($id)
    {
        $query = $this->db->query("SELECT detailpenjualan.*,obat.nama_obat, satuan.satuan, jenisobat.jenis_obat, kategoriobat.kategori_obat
                                        FROM detailpenjualan
                                            INNER JOIN obat ON obat.id_obat = detailpenjualan.obat_id
                                            INNER JOIN satuan ON satuan.id_satuan = obat.satuan
                                            INNER JOIN jenisobat ON jenisobat.id_jenis_obat = obat.jenis_obat
                                            INNER JOIN kategoriobat ON kategoriobat.id_kategori_obat = obat.kategori_obat
                                                WHERE detailpenjualan.penjualan_id = $id");
        $log = $query->getResultArray();
        return $log;
    }
}
