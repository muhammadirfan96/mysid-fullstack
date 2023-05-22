<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pendidikan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'pendidikan' => 'sdtt',
            ],
            [
                'pendidikan' => 'tk',
            ],
            [
                'pendidikan' => 'sd',
            ],
            [
                'pendidikan' => 'smp',
            ],
            [
                'pendidikan' => 'sma',
            ],
            [
                'pendidikan' => 's1',
            ],
            [
                'pendidikan' => 's2',
            ],
            [
                'pendidikan' => 's3',
            ],
        ];

        $this->db->table('pendidikans')->insertBatch($data);
    }
}
