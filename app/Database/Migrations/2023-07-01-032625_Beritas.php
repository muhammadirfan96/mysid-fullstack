<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Beritas extends Migration
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
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'paragraf' => [
                'type'       => 'TEXT',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_kategori_beritas' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'active' => [
                'type' => 'INT',
                'constraint' => 11,
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
        $this->forge->createTable('beritas');
    }

    public function down()
    {
        //
    }
}
