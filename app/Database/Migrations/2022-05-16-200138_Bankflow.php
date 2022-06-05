<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bankflow extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bankflow'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis_bankflow'       => [
                'type'       => 'VARCHAR',
                'constraint'     => '50',
            ],
            'tanggal'       => [
                'type'       => 'DATE',
            ],
            'grand_total'      => [
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
        $this->forge->addKey('id_bankflow', true);

        $this->forge->createTable('bankflow');
    }

    public function down()
    {
        $this->forge->dropTable('bankflow');
    }
}
