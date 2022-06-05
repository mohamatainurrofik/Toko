<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembayarantoko extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'pembayarantoko';
    protected $primaryKey       = 'id_pembayarantoko';
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

    public function tambahpembayarantoko($data)
    {
        $query = $this->db->table('pembayarantoko')->insert($data);
        return $query;
    }

    public function updatepembayarantoko($data, $id)
    {
        $query = $this->db->table('pembayarantoko')->update($data, array('id_pembayarantoko' => $id));
        return $query;
    }
}
