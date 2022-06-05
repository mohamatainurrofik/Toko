<?php

namespace App\Models;

use CodeIgniter\Model;

class Jenisobat extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'jenisobat';
    protected $primaryKey       = 'id_jenis_obat';
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
        'jenis_obat'        => 'required|is_unique[jenisobat.jenis_obat]',
    ];
    protected $validationMessages   = [
        'jenis_obat' => [
            'is_unique' => 'Maaf. Nama Jenis obat tersebut sudah digunakan . Mohon gunakan nama yang lain.',
            'required' => 'Nama Jenis obat harus terisi !!.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

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

    public function tambahjenis($data)
    {
        $query = $this->db->table('jenisobat')->insert($data);
        return $query;
    }

    public function updatejenis($data, $id)
    {
        $query = $this->db->table('jenisobat')->update($data, array('id_jenis_obat' => $id));
        return $query;
    }
}
