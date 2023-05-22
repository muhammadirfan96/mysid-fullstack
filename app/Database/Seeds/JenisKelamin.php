<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisKelamin extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jenis_kelamin' => 'laki-laki',
            ],
            [
                'jenis_kelamin' => 'perempuan',
            ],
        ];

        $this->db->table('jenis_kelamins')->insertBatch($data);
    }
}
