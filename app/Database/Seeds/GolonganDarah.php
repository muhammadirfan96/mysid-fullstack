<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GolonganDarah extends Seeder
{
    public function run()
    {
        $data = [
            [
                'golongan_darah' => 'a',
            ],
            [
                'golongan_darah' => 'b',
            ],
            [
                'golongan_darah' => 'ab',
            ],
            [
                'golongan_darah' => 'o',
            ],
            [
                'golongan_darah' => '-',
            ],
        ];

        $this->db->table('golongan_darahs')->insertBatch($data);
    }
}
