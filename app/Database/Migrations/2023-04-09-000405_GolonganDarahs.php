<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GolonganDarahs extends Migration
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
            'golongan_darah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('golongan_darahs');
    }

    public function down()
    {
        //
    }
}
