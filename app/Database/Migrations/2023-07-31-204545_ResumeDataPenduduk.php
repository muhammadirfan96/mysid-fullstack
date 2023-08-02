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
            'umur_15_sd_17' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'umur_18_sd_39' => [
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
            'jumlah_kk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jumlah_kk_laki_laki' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jumlah_kk_perempuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pns' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'karyawan_honorer' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'petani' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'peternak' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pedagang' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nelayan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'teknisi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tukang' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kosong' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'ibu_rumah_tangga' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pelajar' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pekerja_lepas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'karyawan_swasta' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'sdtt' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'sd' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'smp' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'sma' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            's1' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            's2' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            's3' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'belum_sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'd1' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'd2' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'd3' => [
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
