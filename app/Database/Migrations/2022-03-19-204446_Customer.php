<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_customer'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'customer'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'email_customer'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'alamat_customer'       => [
                'type'       => 'VARCHAR',
                'constraint' => '256',
            ],
            'contact1_customer'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'contact2_customer'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
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
        $this->forge->addKey('id_customer', true);

        $this->forge->createTable('customer');
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
