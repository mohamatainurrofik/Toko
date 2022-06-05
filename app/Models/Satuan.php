<?php

namespace App\Models;

use CodeIgniter\Model;

class Satuan extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'satuan';
    protected $primaryKey       = 'id_satuan';
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

    // Validation
    protected $validationRules      = [
        'satuan'        => 'required|is_unique[satuan.satuan]',
    ];
    protected $validationMessages   = [
        'satuan' => [
            'is_unique' => 'Maaf. Nama Satuan tersebut sudah digunakan . Mohon gunakan nama yang lain.',
            'required' => 'Nama Satuan harus terisi !!.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function tambahsatuan($data)
    {
        $query = $this->db->table('satuan')->insert($data);
        return $query;
    }
    public function updatesatuan($data, $id)
    {
        $query = $this->db->table('satuan')->update($data, array('id_satuan' => $id));
        return $query;
    }

    public function deletesatuan($id)
    {
        $query = $this->db->table('satuan')->delete(['id_satuan' => $id]);
    }
}
