<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Obat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_obat'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_obat'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'kategori_obat'       => [
                'type'       => 'VARCHAR',
                'constraint' => 5,
            ],
            'jenis_obat'       => [
                'type'       => 'VARCHAR',
                'constraint' => 5,
            ],
            'nama_obat'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'satuan'       => [
                'type'       => 'VARCHAR',
                'constraint' => 5,
            ],
            'hna'       => [
                'type'       => 'INT',
            ],
            'hpp_avg'       => [
                'type'       => 'INT',
            ],
            'hj'       => [
                'type'       => 'INT',
            ],
            'max_diskon'      => [
                'type'       => 'DECIMAL',
                'constraint'     => '10,2',
            ],
            'stok'       => [
                'type'       => 'INT',
                'default' => 0,
            ],
            'minimum_stok'       => [
                'type'       => 'INT',
            ],
            'deskripsi'      => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME default current_timestamp',
            ],
            'updated_at' => [
                'type' => 'DATETIME default current_timestamp on update current_timestamp',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_obat', true);

        $this->forge->createTable('obat');
    }

    public function down()
    {
        $this->forge->dropTable('obat');
    }
}
