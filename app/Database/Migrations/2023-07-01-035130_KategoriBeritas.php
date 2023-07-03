<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriBeritas extends Migration
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
            'kategori_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kategori_beritas');
    }

    public function down()
    {
        //
    }
}
