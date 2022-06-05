<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'menu';
    protected $primaryKey       = 'id_menu';
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



    public function get_all_menu($id_user)
    {
        $query = $this->db->query("SELECT menu.*
                                        FROM users
                                            INNER JOIN auth_groups_users ON auth_groups_users.user_id = users.id
                                            INNER JOIN auth_groups ON auth_groups.id = auth_groups_users.group_id
                                            INNER JOIN auth_groups_permissions ON auth_groups_permissions.group_id = auth_groups.id
                                            INNER JOIN auth_permissions_menu ON auth_permissions_menu.permission_id = auth_groups_permissions.permission_id
                                            INNER JOIN menu ON menu.id_menu = auth_permissions_menu.menu_id
                                                WHERE users.id = $id_user AND menu.level =0 ORDER BY menu.menuorder ASC");

        $query1 = $this->db->query("SELECT menu.*
                                            FROM users
                                                INNER JOIN auth_groups_users ON auth_groups_users.user_id = users.id
                                                INNER JOIN auth_groups ON auth_groups.id = auth_groups_users.group_id
                                                INNER JOIN auth_groups_permissions ON auth_groups_permissions.group_id = auth_groups.id
                                                INNER JOIN auth_permissions_menu ON auth_permissions_menu.permission_id = auth_groups_permissions.permission_id
                                                INNER JOIN menu ON menu.id_menu = auth_permissions_menu.menu_id
                                                    WHERE users.id = $id_user AND menu.level = 1 ORDER BY menu.menuorder ASC");
        $log['menu'] = $query->getResultArray();
        $log['sub_menu'] = $query1->getResultArray();
        return $log;
    }
    public function get_all_menus()
    {
        $query = $this->db->query("SELECT * FROM menu WHERE menu.level = 0");
        $query1 = $this->db->query("SELECT * FROM menu WHERE menu.level = 1");
        $log['menu'] = $query->getResultArray();
        $log['sub_menu'] = $query1->getResultArray();
        return $log;
    }

    public function get_data_user($id)
    {
        $query = $this->db->query("SELECT auth_groups.*,auth_groups_users.group_id,auth_groups_permissions.permission_id
                                            FROM users
                                                INNER JOIN auth_groups_users ON auth_groups_users.user_id = users.id
                                                INNER JOIN auth_groups ON auth_groups.id = auth_groups_users.group_id
                                                INNER JOIN auth_groups_permissions ON auth_groups_permissions.group_id = auth_groups.id
                                                INNER JOIN auth_permissions ON auth_permissions.id = auth_groups_permissions.permission_id
                                                    WHERE users.id = $id");
        $log = $query->getRowArray();
        return $log;
    }


    public function get_permission_roles($id)
    {
        $query = $this->db->query("SELECT permission_id FROM auth_groups_permissions WHERE group_id = $id");
        $log = $query->getRowArray();
        return $log;
    }
}
