<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataWilayahs extends Migration
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
            'aset_prasarana_ekonomi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'aset_prasarana_ibadah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'aset_prasarana_kesehatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'aset_prasarana_pemerintahan_desa' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'aset_prasarana_pendidikan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'aset_prasarana_umum' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'lembaga_pelayanan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kebiasaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'sumber_daya_milik_warga' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'sumber_daya_alam' => [
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
        $this->forge->createTable('data_wilayahs');
    }

    public function down()
    {
        //
    }
}
