<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembelianlainnya extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembelianlainnya'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tanggal_pembelian'       => [
                'type'       => 'DATE',
            ],
            'grand_total'       => [
                'type'       => 'INT',
            ],
            'keterangan'      => [
                'type'       => 'TEXT',
            ],
            'created_by'      => [
                'type'       => 'VARCHAR',
                'constraint'     => '50',
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
        $this->forge->addKey('id_pembelianlainnya', true);

        $this->forge->createTable('pembelianlainnya');
    }

    public function down()
    {
        $this->forge->dropTable('pembelianlainnya');
    }
}
