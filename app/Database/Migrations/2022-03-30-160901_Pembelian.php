<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembelian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembelian'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'supplier_id'       => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'no_nota'       => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'grand_total'      => [
                'type'       => 'INT',
            ],
            'grand_kembalian'      => [
                'type'       => 'INT',
            ],
            'total_sisa'      => [
                'type'       => 'INT',
            ],
            'status_pembelian'      => [
                'type'       => 'BOOL',
            ],
            'tanggal_pembelian'      => [
                'type'       => 'DATE',
            ],
            'created_by' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
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
            'keterangan_pembelian'      => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id_pembelian', true);

        $this->forge->createTable('pembelian');
    }

    public function down()
    {
        $this->forge->dropTable('pembelian');
    }
}
