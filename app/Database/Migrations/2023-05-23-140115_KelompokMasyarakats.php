<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KelompokMasyarakats extends Migration
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
            'id_provinsis' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'id_kabupatens' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'id_kecamatans' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'id_desas' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'kelompok_masyarakat' => [
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
        $this->forge->createTable('kelompok_masyarakats');
    }

    public function down()
    {
        //
    }
}
