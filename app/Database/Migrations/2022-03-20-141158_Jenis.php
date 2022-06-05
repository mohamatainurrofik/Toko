<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jenis extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_obat'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis_obat'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_jenis_obat'      => [
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
        $this->forge->addKey('id_jenis_obat', true);

        $this->forge->createTable('jenisobat');
    }

    public function down()
    {
        $this->forge->dropTable('jenisobat');
    }
}
