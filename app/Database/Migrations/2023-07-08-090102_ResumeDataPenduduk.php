<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ResumeDataPenduduk extends Migration
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
            'jumlah_penduduk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jumlah_laki_laki' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jumlah_perempuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'umur_kurang_dari_1' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'umur_1_sd_4' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'umur_5_sd_14' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'umur_15_sd_39' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'umur_40_sd_65' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'umur_lebih_dari_65' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('resume_data_penduduks');
    }

    public function down()
    {
        //
    }
}
