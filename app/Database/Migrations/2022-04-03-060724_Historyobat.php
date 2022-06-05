<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Historyobat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'obat_id'      => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'keterangan'       => [
                'type'       => 'TEXT',
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
        $this->forge->createTable('historyobat');
    }

    public function down()
    {
        $this->forge->dropTable('historyobat');
    }
}
