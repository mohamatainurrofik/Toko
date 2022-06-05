<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayarancustomer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayarancustomer'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'penjualan_id'       => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'tanggal_pembayaran'       => [
                'type'       => 'DATE',
            ],
            'metode_pembayaran'      => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'total_pembayaran'      => [
                'type'       => 'INT',
            ],
            'deskripsi'      => [
                'type'       => 'TEXT',
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
        $this->forge->addKey('id_pembayarancustomer', true);

        $this->forge->createTable('pembayarancustomer');
    }

    public function down()
    {
        $this->forge->dropTable('pembayarancustomer');
    }
}
