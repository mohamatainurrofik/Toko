<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cashflow extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cashflow'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis_cashflow'       => [
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
        $this->forge->addKey('id_cashflow', true);

        $this->forge->createTable('cashflow');
    }

    public function down()
    {
        $this->forge->dropTable('cashflow');
    }
}
