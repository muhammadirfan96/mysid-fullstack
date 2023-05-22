<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kewarganegaraan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kewarganegaraan' => 'wni',
            ],
        ];

        $this->db->table('kewarganegaraans')->insertBatch($data);
    }
}
