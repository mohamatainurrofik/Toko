<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penjualan'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'customer_id'       => [
                'type'       => 'INT',
                'constraint' => 5,
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
            'status_penjualan'      => [
                'type'       => 'BOOL',
            ],
            'tanggal_penjualan'      => [
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
            'keterangan_penjualan'      => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id_penjualan', true);

        $this->forge->createTable('penjualan');
    }

    public function down()
    {
        $this->forge->dropTable('penjualan');
    }
}
