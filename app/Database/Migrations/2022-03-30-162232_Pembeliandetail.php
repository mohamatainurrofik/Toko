<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembeliandetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detailpembelian'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pembelian_id'       => [
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
        $this->forge->addKey('id_detailpembelian', true);

        $this->forge->createTable('detailpembelian');
    }

    public function down()
    {
        $this->forge->dropTable('detailpembelian');
    }
}
