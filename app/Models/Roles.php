<?php

namespace App\Models;

use CodeIgniter\Model;

class Roles extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'auth_groups';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
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

    public function tambahroles($data)
    {
        $query = $this->db->table('auth_groups')->insert($data);
        return $query;
    }

    public function tambah_permission_roles($data)
    {
        $query = $this->db->table('auth_groups_permissions')->insert($data);
        return $query;
    }

    public function updateroles($data, $id)
    {
        $query = $this->db->table('auth_groups')->update($data['dataroles'], array('id' => $id));
        if ($data['datarolepermission'] == null) {
        } else {
            $query1 = $this->db->table('auth_groups_permissions')->update($data['datarolepermission'], array('group_id' => $id));
        }

        return $query;
    }

    public function get_all_role()
    {
        $query = $this->db->query("SELECT * FROM auth_groups ");
        $log = $query->getResultArray();
        return $log;
    }

    public function get_all_permission()
    {
        $query = $this->db->query("SELECT * FROM auth_permissions ");
        $log = $query->getResultArray();
        return $log;
    }

    public function get_roles_group($id)
    {
        $query = $this->db->query("SELECT auth_groups.*,auth_groups_permissions.* 
                                        FROM auth_groups
                                                LEFT JOIN auth_groups_permissions ON auth_groups_permissions.group_id = auth_groups.id
                                                    WHERE auth_groups.id = $id");
        $log = $query->getRowArray();
        return $log;
    }
}
