<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Agama extends Seeder
{
    public function run()
    {
        $data = [
            [
                'agama' => 'islam',
            ],
            [
                'agama' => 'kristen',
            ],
            [
                'agama' => 'katolik',
            ],
            [
                'agama' => 'hindu',
            ],
            [
                'agama' => 'budha',
            ],
            [
                'agama' => 'kong hu chu',
            ],
        ];

        $this->db->table('agamas')->insertBatch($data);
    }
}
