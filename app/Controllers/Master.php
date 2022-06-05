<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer;
use App\Models\Jenisobat;
use App\Models\Kategoriobat;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\User;

class Master extends BaseController
{
    public function __construct()
    {
        require_once FCPATH . 'ssp/ssp.class.php';
        $this->kategori = new Kategoriobat();
        $this->jenis = new Jenisobat();
        $this->satuan = new Satuan();
        $this->user = new User();
        $this->supplier = new Supplier();
        $this->customer = new Customer();
    }

    public function index()
    {
    }

    public function viewmasterkategori()
    {
        return view('master/kategori');
    }
    public function viewmasterjenis()
    {
        return view('master/jenis');
    }
    public function viewmastersatuan()
    {
        return view('master/satuan');
    }
    public function viewmastersupplier()
    {
        return view('master/supplier');
    }
    public function viewmastercustomer()
    {
        return view('master/customer');
    }

    public function addkategoriobat()
    {
        $datakategori = array(
            'kategori_obat' => $this->request->getPost('namakategori'),
            'deskripsi_kategori_obat' => $this->request->getPost('deskripsikategori'),
        );

        $tambah = $this->kategori->tambahkategori($datakategori);
        if ($tambah == true) {
            session()->setFlashdata('message', 'Data Berhasil Ditambah!');
            return redirect()->to('/master/kategoriobat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Ditambah!');
            return redirect()->to('/master/kategoriobat');
        }
    }

    public function addjenisobat()
    {
        $datajenis = array(
            'jenis_obat' => $this->request->getPost('namajenis'),
            'deskripsi_jenis_obat' => $this->request->getPost('deskripsijenis'),
        );

        $tambah = $this->jenis->tambahjenis($datajenis);
        if ($tambah == true) {
            session()->setFlashdata('message', 'Data Berhasil Ditambah!');
            return redirect()->to('/master/jenisobat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Ditambah!');
            return redirect()->to('/master/jenisobat');
        }
    }

    public function addsatuan()
    {
        $datasatuan = array(
            'satuan' => $this->request->getPost('namasatuan'),
            'deskripsi_satuan' => $this->request->getPost('deskripsisatuan'),
        );

        $tambah = $this->satuan->tambahsatuan($datasatuan);
        if ($tambah == true) {
            session()->setFlashdata('message', 'Data Berhasil Ditambah!');
            return redirect()->to('/master/satuan');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Ditambah!');
            return redirect()->to('/master/satuan');
        }
    }
    public function addsupplier()
    {
        $datasupplier = array(
            'supplier' => $this->request->getPost('namasupplier'),
            'email_supplier' => $this->request->getPost('emailsupplier'),
            'alamat' => $this->request->getPost('alamatsupplier'),
            'contact1' => $this->request->getPost('contact1'),
            'fax' => $this->request->getPost('contact2'),
        );

        $tambah = $this->supplier->tambahsupplier($datasupplier);
        if ($tambah == true) {
            session()->setFlashdata('message', 'Data Berhasil Ditambah!');
            return redirect()->to('/master/supplier');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Ditambah!');
            return redirect()->to('/master/supplier');
        }
    }

    public function addcustomer()
    {
        $datacustomer = array(
            'customer' => $this->request->getPost('namacustomer'),
            'email_customer' => $this->request->getPost('emailcustomer'),
            'alamat_customer' => $this->request->getPost('alamatcustomer'),
            'contact1_customer' => $this->request->getPost('contact1'),
            'contact2_customer' => $this->request->getPost('contact2'),
        );

        $tambah = $this->customer->tambahcustomer($datacustomer);
        if ($tambah == true) {
            session()->setFlashdata('message', 'Data Berhasil Ditambah!');
            return redirect()->to('/master/customer');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Ditambah!');
            return redirect()->to('/master/customer');
        }
    }



    public function editkategoriobat()
    {
        $id_kategori = $this->request->getPost('id_kategori');
        $data = array(
            'kategori_obat' => $this->request->getPost('namakategori'),
            'deskripsi_kategori_obat' => $this->request->getPost('deskripsikategori'),
        );
        $ubah = $this->kategori->updatekategori($data, $id_kategori);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Diubah!');
            return redirect()->to('/master/kategoriobat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Diubah!');
            return redirect()->to('/master/kategoriobat');
        }
    }

    public function editjenisobat()
    {
        $id_jenis = $this->request->getPost('id_jenis');
        $data = array(
            'jenis_obat' => $this->request->getPost('namajenis'),
            'deskripsi_jenis_obat' => $this->request->getPost('deskripsijenis'),
        );
        $ubah = $this->jenis->updatejenis($data, $id_jenis);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Diubah!');
            return redirect()->to('/master/jenisobat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Diubah!');
            return redirect()->to('/master/jenisobat');
        }
    }

    public function editsatuan()
    {
        $id_satuan = $this->request->getPost('id_satuan');
        $data = array(
            'satuan' => $this->request->getPost('namasatuan'),
            'deskripsi_satuan' => $this->request->getPost('deskripsisatuan'),
        );
        $ubah = $this->satuan->updatesatuan($data, $id_satuan);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Diubah!');
            return redirect()->to('/master/satuan');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Diubah!');
            return redirect()->to('/master/satuan');
        }
    }

    public function editsupplier()
    {
        $id_supplier = $this->request->getPost('id_supplier');
        $data = array(
            'supplier' => $this->request->getPost('namasupplier'),
            'email_supplier' => $this->request->getPost('emailsupplier'),
            'alamat' => $this->request->getPost('alamatsupplier'),
            'contact1' => $this->request->getPost('contact1'),
            'fax' => $this->request->getPost('contact2'),
        );
        $ubah = $this->supplier->updatesupplier($data, $id_supplier);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Diubah!');
            return redirect()->to('/master/supplier');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Diubah!');
            return redirect()->to('/master/supplier');
        }
    }

    public function editcustomer()
    {
        $id_customer = $this->request->getPost('id_customer');
        $data = array(
            'customer' => $this->request->getPost('namacustomer'),
            'email_customer' => $this->request->getPost('emailcustomer'),
            'alamat_customer' => $this->request->getPost('alamatcustomer'),
            'contact1_customer' => $this->request->getPost('contact1'),
            'contact2_customer' => $this->request->getPost('contact2'),
        );
        $ubah = $this->customer->updatecustomer($data, $id_customer);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Diubah!');
            return redirect()->to('/master/customer');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Diubah!');
            return redirect()->to('/master/customer');
        }
    }


    public function deletekategoriobat()
    {
        $id_kategori = $this->request->getPost('id_kategori');
        $data_kategori = $this->kategori->withdeleted()->find($id_kategori);
        if ($data_kategori['deleted_at'] == null) {
            $delete = $this->kategori->delete($id_kategori);
        } else {
            $delete = $this->kategori->delete($id_kategori, true);
        }

        if ($delete == true) {
            session()->setFlashdata('message', 'Data Berhasil Dihapus!');
            return redirect()->to('/master/kategoriobat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Dihapus!');
            return redirect()->to('/master/kategoriobat');
        }
    }
    public function deletejenisobat()
    {
        $id_jenis = $this->request->getPost('id_jenis');
        $data_jenis = $this->jenis->withdeleted()->find($id_jenis);
        if ($data_jenis['deleted_at'] == null) {
            $delete = $this->jenis->delete($id_jenis);
        } else {
            $delete = $this->jenis->delete($id_jenis, true);
        }

        if ($delete == true) {
            session()->setFlashdata('message', 'Data Berhasil Dihapus!');
            return redirect()->to('/master/jenisobat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Dihapus!');
            return redirect()->to('/master/jenisobat');
        }
    }
    public function deletesatuan()
    {
        $id_satuan = $this->request->getPost('id_satuan');
        $data_satuan = $this->satuan->withdeleted()->find($id_satuan);
        if ($data_satuan['deleted_at'] == null) {
            $delete = $this->satuan->delete($id_satuan);
        } else {
            $delete = $this->satuan->delete($id_satuan, true);
        }

        if ($delete == true) {
            session()->setFlashdata('message', 'Data Berhasil Dihapus!');
            return redirect()->to('/master/satuan');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Dihapus!');
            return redirect()->to('/master/satuan');
        }
    }
    public function deletesupplier()
    {
        $id_supplier = $this->request->getPost('id_supplier');
        $data_supplier = $this->supplier->withdeleted()->find($id_supplier);
        if ($data_supplier['deleted_at'] == null) {
            $delete = $this->supplier->delete($id_supplier);
        } else {
            $delete = $this->supplier->delete($id_supplier, true);
        }

        if ($delete == true) {
            session()->setFlashdata('message', 'Data Berhasil Dihapus!');
            return redirect()->to('/master/supplier');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Dihapus!');
            return redirect()->to('/master/supplier');
        }
    }

    public function deletecustomer()
    {
        $id_customer = $this->request->getPost('id_customer');
        $data_customer = $this->customer->withdeleted()->find($id_customer);
        if ($data_customer['deleted_at'] == null) {
            $delete = $this->customer->delete($id_customer);
        } else {
            $delete = $this->customer->delete($id_customer, true);
        }

        if ($delete == true) {
            session()->setFlashdata('message', 'Data Berhasil Dihapus!');
            return redirect()->to('/master/customer');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Dihapus!');
            return redirect()->to('/master/customer');
        }
    }

    public function restorekategoriobat($id)
    {
        $data = array(
            'deleted_at'        => null,
        );
        $ubah = $this->kategori->updatekategori($data, $id);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Di restore!');
            return redirect()->to('/master/kategoriobat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Di restore!');
            return redirect()->to('/master/kategoriobat');
        }
    }
    public function restorejenisobat($id)
    {
        $data = array(
            'deleted_at'        => null,
        );
        $ubah = $this->jenis->updatejenis($data, $id);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Di restore!');
            return redirect()->to('/master/jenisobat');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Di restore!');
            return redirect()->to('/master/jenisobat');
        }
    }

    public function restoresatuan($id)
    {
        $data = array(
            'deleted_at'        => null,
        );
        $ubah = $this->satuan->updatesatuan($data, $id);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Di restore!');
            return redirect()->to('/master/satuan');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Di restore!');
            return redirect()->to('/master/satuan');
        }
    }
    public function restoresupplier($id)
    {
        $data = array(
            'deleted_at'        => null,
        );
        $ubah = $this->supplier->updatesupplier($data, $id);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Di restore!');
            return redirect()->to('/master/supplier');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Di restore!');
            return redirect()->to('/master/supplier');
        }
    }
    public function restorecustomer($id)
    {
        $data = array(
            'deleted_at'        => null,
        );
        $ubah = $this->customer->updatecustomer($data, $id);
        if ($ubah == true) {
            session()->setFlashdata('message', 'Data Berhasil Di restore!');
            return redirect()->to('/master/customer');
        } else {
            session()->setFlashdata('errormessage', 'Data Gagal Di restore!');
            return redirect()->to('/master/customer');
        }
    }

    public function listdata_masterkategori()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "kategoriobat";

        //primary key
        $primaryKey = "id_kategori_obat";

        $columns = array(

            array(
                "db" => "id_kategori_obat",
                "dt" => 0,
            ),
            array(
                "db" => "kategori_obat",
                "dt" => 1,
            ),
            array(
                "db" => "deskripsi_kategori_obat",
                "dt" => 2,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is null")
        );
    }

    public function listdata_masterjenis()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "jenisobat";

        //primary key
        $primaryKey = "id_jenis_obat";

        $columns = array(

            array(
                "db" => "id_jenis_obat",
                "dt" => 0,
            ),
            array(
                "db" => "jenis_obat",
                "dt" => 1,
            ),
            array(
                "db" => "deskripsi_jenis_obat",
                "dt" => 2,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is null")
        );
    }

    public function listdata_mastersatuan()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "satuan";

        //primary key
        $primaryKey = "id_satuan";

        $columns = array(

            array(
                "db" => "id_satuan",
                "dt" => 0,
            ),
            array(
                "db" => "satuan",
                "dt" => 1,
            ),
            array(
                "db" => "deskripsi_satuan",
                "dt" => 2,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is null")
        );
    }

    public function listdata_mastersupplier()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "supplier";

        //primary key
        $primaryKey = "id_supplier";

        $columns = array(

            array(
                "db" => "id_supplier",
                "dt" => 0,
            ),
            array(
                "db" => "supplier",
                "dt" => 1,
            ),
            array(
                "db" => "email_supplier",
                "dt" => 2,
            ),
            array(
                "db" => "contact1",
                "dt" => 3,
            ),
            array(
                "db" => "fax",
                "dt" => 4,
            ),
            array(
                "db" => "alamat",
                "dt" => 5,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is null")
        );
    }

    public function listdata_mastercustomer()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "customer";

        //primary key
        $primaryKey = "id_customer";

        $columns = array(

            array(
                "db" => "id_customer",
                "dt" => 0,
            ),
            array(
                "db" => "customer",
                "dt" => 1,
            ),
            array(
                "db" => "email_customer",
                "dt" => 2,
            ),
            array(
                "db" => "contact1_customer",
                "dt" => 3,
            ),
            array(
                "db" => "contact2_customer",
                "dt" => 4,
            ),
            array(
                "db" => "alamat_customer",
                "dt" => 5,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is null")
        );
    }

    public function listdata_mastersampahkategori()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "kategoriobat";

        //primary key
        $primaryKey = "id_kategori_obat";

        $columns = array(

            array(
                "db" => "id_kategori_obat",
                "dt" => 0,
            ),
            array(
                "db" => "kategori_obat",
                "dt" => 1,
            ),
            array(
                "db" => "deskripsi_kategori_obat",
                "dt" => 2,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is not null")
        );
    }

    public function listdata_mastersampahjenis()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "jenisobat";

        //primary key
        $primaryKey = "id_jenis_obat";

        $columns = array(

            array(
                "db" => "id_jenis_obat",
                "dt" => 0,
            ),
            array(
                "db" => "jenis_obat",
                "dt" => 1,
            ),
            array(
                "db" => "deskripsi_jenis_obat",
                "dt" => 2,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is not null")
        );
    }

    public function listdata_mastersampahsatuan()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "satuan";

        //primary key
        $primaryKey = "id_satuan";

        $columns = array(

            array(
                "db" => "id_satuan",
                "dt" => 0,
            ),
            array(
                "db" => "satuan",
                "dt" => 1,
            ),
            array(
                "db" => "deskripsi_satuan",
                "dt" => 2,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is not null")
        );
    }

    public function listdata_mastersampahsupplier()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "supplier";

        //primary key
        $primaryKey = "id_supplier";

        $columns = array(

            array(
                "db" => "id_supplier",
                "dt" => 0,
            ),
            array(
                "db" => "supplier",
                "dt" => 1,
            ),
            array(
                "db" => "email_supplier",
                "dt" => 2,
            ),
            array(
                "db" => "contact1",
                "dt" => 3,
            ),
            array(
                "db" => "fax",
                "dt" => 4,
            ),
            array(
                "db" => "alamat",
                "dt" => 5,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is not null")
        );
    }

    public function listdata_mastersampahcustomer()
    {
        // this is database details

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "customer";

        //primary key
        $primaryKey = "id_customer";

        $columns = array(

            array(
                "db" => "id_customer",
                "dt" => 0,
            ),
            array(
                "db" => "customer",
                "dt" => 1,
            ),
            array(
                "db" => "email_customer",
                "dt" => 2,
            ),
            array(
                "db" => "contact1_customer",
                "dt" => 3,
            ),
            array(
                "db" => "contact2_customer",
                "dt" => 4,
            ),
            array(
                "db" => "alamat_customer",
                "dt" => 5,
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at is not null")
        );
    }

    function get_customer()
    {
        $customer = $this->customer->get_customer_by_search($this->request->getPost('searchTerm'));

        for ($i = 0; $i < sizeof($customer); $i++) {
            $data[] = array(
                'id' => $customer[$i]['id_customer'],
                'text' => $customer[$i]['customer'],
            );
        }
        return json_encode($data);
    }

    function get_supplier()
    {
        $supplier = $this->supplier->get_supplier_by_search($this->request->getPost('searchTerm'));

        for ($i = 0; $i < sizeof($supplier); $i++) {
            $data[] = array(
                'id' => $supplier[$i]['id_supplier'],
                'text' => $supplier[$i]['supplier'],
            );
        }
        return json_encode($data);
    }
}
