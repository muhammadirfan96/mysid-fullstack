<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kebiasaans extends Migration
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
            'kebiasaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'ket' => [
                'type' => 'TEXT',
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
        $this->forge->createTable('kebiasaans');
    }

    public function down()
    {
        //
    }
}
