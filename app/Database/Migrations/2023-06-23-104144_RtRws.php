<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RtRws extends Migration
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
            'rt_rw' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('rt_rws');
    }

    public function down()
    {
        //
    }
}
