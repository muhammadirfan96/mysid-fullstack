<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusHubDlmKels extends Migration
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
            'status_hub_dlm_kel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->createTable('status_hub_dlm_kels');
    }

    public function down()
    {
        //
    }
}
