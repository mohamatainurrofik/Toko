<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Detailpenjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detailpenjualan'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'penjualan_id'       => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'obat_id'       => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'qty'      => [
                'type'       => 'INT',
            ],
            'harga'      => [
                'type'       => 'INT',
            ],
            'diskon'      => [
                'type'       => 'DECIMAL',
                'constraint'     => '10,2',
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
        $this->forge->addKey('id_detailpenjualan', true);

        $this->forge->createTable('detailpenjualan');
    }

    public function down()
    {
        $this->forge->dropTable('detailpenjualan');
    }
}
