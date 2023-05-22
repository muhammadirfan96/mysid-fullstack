<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TingkatKesejahteraans extends Migration
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
            'tingkat_kesejahteraan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tingkat_kesejahteraans');
    }

    public function down()
    {
        //
    }
}
