<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionMenu extends Seeder
{
    public function run()
    {
        $data = [
            [
                'permission_id'     => 1,
                'menu_id'       => 1,
            ],
            [
                'permission_id'     => 1,
                'menu_id'       => 1,
            ],
            [
                'permission_id'     => 1,
                'menu_id'       => 2,
            ],
            [
                'permission_id'     => 1,
                'menu_id'       => 3,
            ],
            [
                'permission_id'     => 1,
                'menu_id'       => 4,
            ],
            [
                'permission_id'     => 1,
                'menu_id'       => 5,
            ],
            [
                'permission_id'     => 1,
                'menu_id'       => 6,
            ],
            [
                'permission_id'     => 1,
                'menu_id'       => 7,
            ],
            [
                'permission_id'     => 1,
                'menu_id'       => 8,
            ],
            [
                'permission_id'     => 1,
                'menu_id'       => 9,
            ],
            [
                'permission_id'     => 1,
                'menu_id'       => 10,
            ],
            [
                'permission_id'     => 1,
                'menu_id'       => 11,
            ],
            [
                'permission_id'     => 1,
                'menu_id'       => 12,
            ],
        ];
        $this->db->table('auth_permissions_menu')->insertBatch($data);
    }
}
