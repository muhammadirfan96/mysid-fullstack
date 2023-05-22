<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SumberPenghasilanUtamas extends Migration
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
            'sumber_penghasilan_utama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('sumber_penghasilan_utamas');
    }

    public function down()
    {
        //
    }
}
