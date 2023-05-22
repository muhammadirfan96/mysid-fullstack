<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NamaBantuanKelompok extends Migration
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
            'nama_bantuan_kelompok' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('nama_bantuan_kelompoks');
    }

    public function down()
    {
        //
    }
}
