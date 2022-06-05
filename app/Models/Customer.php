<?php

namespace App\Models;

use CodeIgniter\Model;

class Customer extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'customer';
    protected $primaryKey       = 'id_customer';
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

    public function tambahcustomer($data)
    {
        $query = $this->db->table('customer')->insert($data);
        return $query;
    }

    public function updatecustomer($data, $id)
    {
        $query = $this->db->table('customer')->update($data, array('id_customer' => $id));
        return $query;
    }

    public function get_customer_by_search($searchTerm)
    {
        if ($searchTerm == null) {
            $query = $this->db->query("SELECT *
                                                FROM customer
                                                        WHERE customer.deleted_at is null LIMIT 5");
            $log = $query->getResultArray();
        } else {
            $query1 = $this->db->query("SELECT *
                                            FROM customer
                                                WHERE customer.customer like '%$searchTerm%' AND customer.deleted_at is null");
            $log = $query1->getResultArray();
        }
        return $log;
    }
}
