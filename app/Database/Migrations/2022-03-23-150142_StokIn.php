<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StokIn extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_stokin'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'obat_id'       => [
                'type'       => 'VARCHAR',
                'constraint' => 5,
            ],
            'qty'      => [
                'type'       => 'INT',
            ],
            'hpp'      => [
                'type'       => 'INT',
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
        ]);
        $this->forge->addKey('id_stokin', true);

        $this->forge->createTable('stokin');
    }

    public function down()
    {
        $this->forge->dropTable('stokin');
    }
}
