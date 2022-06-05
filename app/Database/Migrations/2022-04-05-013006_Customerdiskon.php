<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customerdiskon extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'customer_id'      => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'obat_id'       => [
                'type'       => 'INT',
                'constraint'     => 5,
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
        $this->forge->createTable('customerdiskon');
    }

    public function down()
    {
        $this->forge->dropTable('customerdiskon');
    }
}
