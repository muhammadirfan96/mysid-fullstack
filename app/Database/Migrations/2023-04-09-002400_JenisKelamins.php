<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisKelamins extends Migration
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
            'jenis_kelamin' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jenis_kelamins');
    }

    public function down()
    {
        //
    }
}
