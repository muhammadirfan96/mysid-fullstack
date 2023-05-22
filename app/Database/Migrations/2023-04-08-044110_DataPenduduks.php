<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPenduduks extends Migration
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
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '225',
            ],
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'id_data_nkks' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_agamas' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'tempat_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '225',
            ],
            'tanggal_lahir' => [
                'type' => 'DATETIME',
            ],
            'id_golongan_darahs' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_pendidikans' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_status_hub_dlm_kels' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_kewarganegaraans' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_jenis_kelamins' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_provinsis' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_kabupatens' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_kecamatans' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_desas' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'active' => [
                'type' => 'INT',
                'constraint' => 11,
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
        $this->forge->createTable('data_penduduks');
    }

    public function down()
    {
        //
    }
}
