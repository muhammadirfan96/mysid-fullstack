<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BantuanIndividu extends Migration
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
            'bantuan_individu' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bantuan_individus');
    }

    public function down()
    {
        //
    }
}
