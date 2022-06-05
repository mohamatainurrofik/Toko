<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategoriobat extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'kategoriobat';
    protected $primaryKey       = 'id_kategori_obat';
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
        'kategori_obat'        => 'required|is_unique[kategoriobat.kategori_obat]',
    ];
    protected $validationMessages   = [
        'kategori_obat' => [
            'is_unique' => 'Maaf. Nama kategori obat tersebut sudah digunakan . Mohon gunakan nama yang lain.',
            'required' => 'Nama kategori obat harus terisi !!.',
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


    public function tambahkategori($data)
    {
        $query = $this->db->table('kategoriobat')->insert($data);
        return $query;
    }

    public function updatekategori($data, $id)
    {
        $query = $this->db->table('kategoriobat')->update($data, array('id_kategori_obat' => $id));
        return $query;
    }

    public function deletekategori($id)
    {
        $query = $this->db->table('kategoriobat')->delete(['id_kategori_obat' => $id]);
    }
}
