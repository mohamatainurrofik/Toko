<?php

namespace App\Models;

use CodeIgniter\Model;

class Permissions extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'auth_permissions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
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

    public function tambahpermissions($data)
    {
        $query = $this->db->table('auth_permissions')->insert($data);
        return $query;
    }

    public function tambah_permission_menu($data)
    {
        $query = $this->db->table('auth_permissions_menu')->insert($data);
        return $query;
    }

    public function updatepermissions($data, $id)
    {
        $query = $this->db->table('auth_permissions')->update($data, array('id' => $id));
        return $query;
    }

    public function deletepermissions($id)
    {
        $query = $this->db->table('auth_permissions')->delete(['id' => $id]);
        $query1 = $this->db->table('auth_permissions_menu')->delete(['permission_id' => $id]);
        if ($query == true && $query1 == true) {
            return true;
        } else {
            return false;
        }
    }

    public function update_permission_menu($data, $id)
    {
        $query1 = $this->db->table('auth_permissions_menu')->delete(['permission_id' => $id]);
        if ($query1 == true) {
            for ($i = 0; $i < count($data); $i++) {
                $permission_menu[] = array(
                    'permission_id' => $data[$i]['permission_id'],
                    'menu_id' => $data[$i]['menu_id'],
                );
            }
            for ($i = 0; $i < count($data); $i++) {
                $query = $this->db->table('auth_permissions_menu')->insert($permission_menu[$i]);
                if ($query == true) {
                    $log = true;
                } else {
                    $log = false;
                }
            }
            return $log;
        }
        return false;
    }

    public function get_menu_permissions($id)
    {
        $query = $this->db->query("SELECT *
                                        FROM auth_permissions_menu
                                                INNER JOIN menu ON auth_permissions_menu.menu_id = menu.id_menu
                                                    WHERE auth_permissions_menu.permission_id = $id");
        $log = $query->getResultArray();
        return $log;
    }
}
