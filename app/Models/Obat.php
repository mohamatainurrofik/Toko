<?php

namespace App\Models;

use CodeIgniter\Model;

class Obat extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'obat';
    protected $primaryKey       = 'id_obat';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_obat', 'kategori_obat', 'jenis_obat', 'nama_obat', 'satuan', 'hna', 'hpp_avg', 'hj', 'max_diskon', 'stok', 'minimum_stok', 'deskripsi'
    ];

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
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = ["callAfterInsert"];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = ["callBeforeDelete"];
    protected $afterDelete = ["callAfterDelete"];

    protected function callAfterInsert(array $data)
    {
        $logmodel = new LogActivities();
        $data = array(
            'table_names' => 'obat',
            'table_id' => $data['id'],
            'description' => "tambah data barang {$data['data']['nama_obat']} dengan id : {$data['id']}",
            'before' => '',
            'after' => $data['id'],
            'created_by' => user()->username,
        );
        $logmodel->save($data);
    }

    protected function callAfterUpdate(array $data)
    {
    }

    public function tambahobat($data)
    {
        $obat = new Obat();
        $query = $obat->insert($data);
        return $query;
    }
    public function updateobat($data, $id, $description)
    {

        $obat1 = new Obat();
        $logModel = new LogActivities();
        $sql_val = array();
        $sql_val1 = array();
        $obat = $this->db->query("SELECT * FROM obat where id_obat ={$id}")->getRowArray();
        foreach ($obat as $key => $value) {
            foreach ($data as $key1 => $value1) {
                if ($data[$key1] != $obat[$key] && $key == $key1) {
                    $sql_val[] = "<li class='list-group-item'>{$key1} :  => '{$data[$key1]}'</li>";
                    $sql_val1[] = "<li class='list-group-item'>{$key1} :  => '{$obat[$key]}'</li>";
                }
            }
        }
        $string = implode(', ', $sql_val);
        $string1 = implode(', ', $sql_val1);
        $data1 = [
            'table_names' => 'obat',
            'table_id' => $id,
            'description' => $description,
            'before' => "<ul class='list-group list-group-flush'>{$string1}</ul>",
            'after' => "<ul class='list-group list-group-flush'>{$string}</ul>",
            'created_by' => user()->username,
        ];
        $query = $obat1->update($id, $data);
        $logModel->save($data1);
        return $query;
    }

    public function get_dataobat_by_id($id)
    {
        $query = $this->db->query("SELECT obat.*,satuan.satuan as namasatuan,kategoriobat.kategori_obat as namakategoriobat,jenisobat.jenis_obat as namajenisobat 
                                        FROM obat
                                            INNER JOIN satuan ON satuan.id_satuan = obat.satuan
                                            INNER JOIN jenisobat ON jenisobat.id_jenis_obat = obat.jenis_obat
                                            INNER JOIN kategoriobat ON kategoriobat.id_kategori_obat = obat.kategori_obat
                                                WHERE obat.id_obat = $id");
        $log = $query->getRowArray();
        return $log;
    }

    public function get_obat_by_search($searchTerm)
    {
        if ($searchTerm == null) {
            $query = $this->db->query("SELECT *
                                                FROM obat
                                                        WHERE obat.deleted_at is null LIMIT 5");
            $log = $query->getResultArray();
        } else {
            $query1 = $this->db->query("SELECT *
                                            FROM obat
                                                WHERE obat.nama_obat like '%$searchTerm%' AND obat.deleted_at is null");
            $log = $query1->getResultArray();
        }
        return $log;
    }



    public function get_rekap_stok($start_date, $end_date, $id)
    {

        $obat = $this->db->query("SELECT * FROM obat WHERE id_obat = '$id'")->getRowArray();

        $penjualan = $this->db->query("SELECT SUM(detailpenjualan.qty) as totalpenjualan
                                            FROM penjualan
                                                INNER JOIN detailpenjualan on penjualan.id_penjualan = detailpenjualan.penjualan_id
                                                INNER JOIN obat on obat.id_obat = detailpenjualan.obat_id
                                                    WHERE penjualan.tanggal_penjualan < '$start_date' AND obat.id_obat = '$id'")->getRowArray();
        $pembelian = $this->db->query("SELECT SUM(detailpembelian.qty) as totalpembelian
                                            FROM pembelian
                                                INNER JOIN detailpembelian on pembelian.id_pembelian = detailpembelian.pembelian_id
                                                INNER JOIN obat on obat.id_obat = detailpembelian.obat_id
                                                    WHERE pembelian.tanggal_pembelian < '$start_date'  AND obat.id_obat = '$id'")->getRowArray();

        $log['stokawal'] = array(
            'stokawal' => $pembelian['totalpembelian'] - $penjualan['totalpenjualan'],
            'nama' => $obat['nama_obat']
        );

        $log['datastok'] = $this->db->query("SELECT (qty*-1) as qty,penjualan.tanggal_penjualan as tanggal, penjualan.kode_penjualan as kode
                                                    FROM penjualan
                                                        INNER JOIN detailpenjualan on penjualan.id_penjualan = detailpenjualan.penjualan_id
                                                        INNER JOIN obat on obat.id_obat = detailpenjualan.obat_id
                                                            WHERE penjualan.tanggal_penjualan >= '$start_date' AND penjualan.tanggal_penjualan <= '$end_date' AND obat.id_obat = '$id'
                                                UNION ALL
                                                SELECT qty,pembelian.tanggal_pembelian as tanggal, pembelian.kode_pembelian as kode
                                                    FROM pembelian
                                                        INNER JOIN detailpembelian on pembelian.id_pembelian = detailpembelian.pembelian_id
                                                        INNER JOIN obat on obat.id_obat = detailpembelian.obat_id
                                                            WHERE pembelian.tanggal_pembelian >= '$start_date' AND pembelian.tanggal_pembelian <= '$end_date' AND obat.id_obat = '$id'       
                                                order by 2 asc
                                                ")->getResultArray();

        return $log;
    }
}
