<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bantuans extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'bantuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'sumber' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'penerima' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'satuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'waktu_terima' => [
                'type'       => 'DATETIME',
            ],
            'ket' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
            ],
            'created_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'updated_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bantuans');
    }

    public function down()
    {
        //
    }
}
