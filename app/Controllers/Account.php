<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Menu;
use App\Models\Permissions;
use App\Models\Roles;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class Account extends BaseController
{

    public function __construct()
    {
        require_once FCPATH . 'ssp/ssp.class.php';
        $this->users = new UserModel();
        $this->menu = new Menu();
        $this->roles = new Roles();
        $this->permissions = new Permissions();
    }

    public function index()
    {
        return view('account/overview');
    }

    public function viewmasteraccount()
    {
        $data['roles'] = $this->roles->get_all_role();
        return view('account/account', $data);
    }
    public function viewmasterroles()
    {
        $data['menu'] = $this->menu->get_all_menus();
        $data['permission'] = $this->roles->get_all_permission();
        return view('account/roles', $data);
    }
    public function viewmasterpermissions()
    {
        $data['menu'] = $this->menu->get_all_menus();
        return view('account/permission', $data);
    }

    public function addroles()
    {
        $dataroles = array(
            'name' => $this->request->getPost('namaroles'),
            'description' => $this->request->getPost('deskripsiroles'),
        );
        $tambah = $this->roles->tambahroles($dataroles);
        $id = $this->users->insertID();
        // echo "<script>console.log('Debug Objects: " . $id . "' );</script>";
        // $roles_permission = $this->menu->get_permission_roles($id);
        // echo "<script>console.log('Debug Objects: " . print_r($roles_permission)  . "' );</script>";
        // $menu = $this->request->getPost('menu');
        // echo "<script>console.log('Debug Objects: " . print_r($menu) . "' );</script>";
        // for ($i = 0; $i < sizeof($menu); $i++) {
        //     $datapermissionmenu_roles[] = array(
        //         'permission_id' => $roles_permission['permission_id'],
        //         'menu_id' => $menu[$i],
        //     );
        //     $this->menu->tambah_permission_menu($datapermissionmenu_roles[$i]);
        // }
        $datarolespermission = array(
            'group_id' => $id,
            'permission_id' => $this->request->getPost('permission'),
        );
        $tambah1 = $this->roles->tambah_permission_roles($datarolespermission);
        if ($tambah == true && $tambah1 == true) {
            session()->setFlashdata('message', 'Data Berhasil Ditambah!');
            return redirect()->to('/account/roles');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Ditambah!');
            return redirect()->to('/account/roles');
        }
    }

    public function addpermissions()
    {
        $datapermissions = array(
            'name' => $this->request->getPost('namapermissions'),
            'description' => $this->request->getPost('deskripsipermissions'),
        );
        $tambah = $this->permissions->tambahpermissions($datapermissions);
        $id = $this->permissions->insertID();
        $menu = $this->request->getPost('menu');
        for ($i = 0; $i < sizeof($menu); $i++) {
            $datapermissionmenu_roles[] = array(
                'permission_id' => $id,
                'menu_id' => $menu[$i],
            );
            $this->permissions->tambah_permission_menu($datapermissionmenu_roles[$i]);
        }
        if ($tambah == true) {
            session()->setFlashdata('message', 'Data Berhasil Ditambah!');
            return redirect()->to('/account/permissions');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Ditambah!');
            return redirect()->to('/account/permissions');
        }
    }


    public function edituser()
    {
        $id_user = $this->request->getPost('id_user');
        $datauser = $this->users->getWhere(['id' => $id_user])->getRowArray();
        $data = array(
            'email' => $this->request->getPost('emailuser'),
            'username' => $this->request->getPost('usernameuser'),
            'password_hash' => $this->request->getPost('passworduser') == null ? $datauser['password_hash'] : Password::hash($this->request->getPost('passworduser')),
        );
        $datagroup = array(
            'group_id' => $this->request->getPost('roles_user')
        );
        $ubah = $this->users->updateuser(['data' => $data, 'datagroup' => $datagroup], $id_user);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Diubah!');
            return redirect()->to('/account/account');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Diubah!');
            return redirect()->to('/account/account');
        }
    }

    public function editroles()
    {
        $id_roles = $this->request->getPost('id_roles');
        $dataroles = array(
            'name' => $this->request->getPost('namaroles'),
            'description' => $this->request->getPost('deskripsiroles'),
        );
        $permission_role = $this->roles->get_roles_group($id_roles);
        $datarolespermission = array(
            'group_id' => $id_roles,
            'permission_id' => $this->request->getPost('permission'),
        );
        $tempdata = null;
        if ($permission_role['permission_id'] == null) {
            $tambah1 = $this->roles->tambah_permission_roles($datarolespermission);
            $ubah = $this->roles->updateroles(['dataroles' => $dataroles, 'datarolepermission' => $tempdata], $id_roles);
        } else {
            $ubah = $this->roles->updateroles(['dataroles' => $dataroles, 'datarolepermission' => $datarolespermission], $id_roles);
        }

        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Diubah!');
            return redirect()->to('/account/roles');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Diubah!');
            return redirect()->to('/account/roles');
        }
    }

    public function editpermissions()
    {
        $id_permissions = $this->request->getPost('id_permissions');
        $datapermissions = array(
            'name' => $this->request->getPost('namapermissions'),
            'description' => $this->request->getPost('deskripsipermissions'),
        );
        $ubah = $this->permissions->updatepermissions($datapermissions, $id_permissions);
        echo "<script>console.log('Debug Objects: " . $datapermissions['name'] . "' );</script>";
        $menu = $this->request->getPost('menu');
        for ($i = 0; $i < sizeof($menu); $i++) {
            $datapermissionmenu_roles[] = array(
                'permission_id' => $id_permissions,
                'menu_id' => $menu[$i],
            );
        }
        $ubah1 = $this->permissions->update_permission_menu($datapermissionmenu_roles, $id_permissions);
        if ($ubah == true && $ubah1 == true) {
            session()->setFlashdata('message', 'Data Berhasil Diubah!');
            return redirect()->to('/account/permissions');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Diubah!');
            return redirect()->to('/account/permissions');
        }
    }

    public function deleteroles()
    {
        $id_roles = $this->request->getPost('id_roles');
        $delete = $this->roles->delete($id_roles);

        if ($delete == true) {
            session()->setFlashdata('message', 'Data Berhasil Dihapus!');
            return redirect()->to('/account/roles');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Dihapus!');
            return redirect()->to('/account/roles');
        }
    }
    public function deleteuser()
    {
        $id_user = $this->request->getPost('id_user');
        $data_jenis = $this->users->getdeleteduser($id_user);
        echo "<script>console.log('Debug Objects: " . 'null' . $data_jenis['deleted_at'] . "' );</script>";
        if ($data_jenis['deleted_at'] == null) {
            $delete = $this->users->delete($id_user);
        } else {
            echo "<script>console.log('Debug Objects: " . $data_jenis['deleted_at'] . "' );</script>";
            $delete = $this->users->delete($id_user, true);
        }

        if ($delete == true) {
            session()->setFlashdata('message', 'Data Berhasil Dihapus!');
            return redirect()->to('/account/account');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Dihapus!');
            return redirect()->to('/account/account');
        }
    }

    public function deletepermissions()
    {
        $id_permissions = $this->request->getPost('id_permissions');
        $delete = $this->permissions->deletepermissions($id_permissions);

        if ($delete == true) {
            session()->setFlashdata('message', 'Data Berhasil Dihapus!');
            return redirect()->to('/account/permissions');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Dihapus!');
            return redirect()->to('/account/permissions');
        }
    }


    public function restoreuser($id)
    {
        $data = array(
            'deleted_at'        => null,
        );
        $ubah = $this->users->rest($data, $id);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Di restore!');
            return redirect()->to('/master/kategoriobat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Di restore!');
            return redirect()->to('/master/kategoriobat');
        }
    }

    function fetch_data_menu()
    {
        $has_roles = $this->permissions->get_menu_permissions($this->request->getPost('id_permissions'));
        return json_encode($has_roles);
    }

    public function listdata_user()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "users";

        //primary key
        $primaryKey = "id";

        $columns = array(

            array(
                "db" => "id",
                "dt" => 0,
            ),
            array(
                "db" => "username",
                "dt" => 1,
            ),
            array(
                "db" => "email",
                "dt" => 2,
            ),
            array(
                "db" => "id",
                "dt" => 3,
                "formatter" => function ($value, $row) {
                    $user = $this->users->get_data_user($value);;
                    return $user;
                },
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is null")
        );
    }

    public function listdata_sampahuser()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "users";

        //primary key
        $primaryKey = "id";

        $columns = array(

            array(
                "db" => "id",
                "dt" => 0,
            ),
            array(
                "db" => "username",
                "dt" => 1,
            ),
            array(
                "db" => "email",
                "dt" => 2,
            ),
            array(
                "db" => "id",
                "dt" => 3,
                "formatter" => function ($value, $row) {
                    $user = $this->users->get_data_user($value);;
                    return $user;
                },
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is not null")
        );
    }


    public function listdata_roles()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "auth_groups";

        //primary key
        $primaryKey = "id";

        $columns = array(

            array(
                "db" => "id",
                "dt" => 0,
            ),
            array(
                "db" => "name",
                "dt" => 1,
            ),
            array(
                "db" => "id",
                "dt" => 2,
                "formatter" => function ($value, $row) {
                    $has_roles = $this->roles->get_roles_group($value);;
                    return $has_roles;
                },
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, null)
        );
    }

    public function listdata_permissions()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "auth_permissions";

        //primary key
        $primaryKey = "id";

        $columns = array(

            array(
                "db" => "id",
                "dt" => 0,
            ),
            array(
                "db" => "name",
                "dt" => 1,
            ),
            array(
                "db" => "description",
                "dt" => 2,
            ),
            array(
                "db" => "id",
                "dt" => 3,
                // "formatter" => function ($value, $row) {
                //     $has_roles = $this->permissions->get_menu_permissions($value);
                //     return $has_roles;
                // },
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, null)
        );
    }
}
