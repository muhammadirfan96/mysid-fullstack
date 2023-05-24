<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BantuanIndividu extends Seeder
{
    public function run()
    {
        $data = [
            [
                'bantuan_individu' => 'PKH',
            ],
            [
                'bantuan_individu' => 'BNPT',
            ],
            [
                'bantuan_individu' => 'BLT',
            ],
        ];

        $this->db->table('bantuan_individus')->insertBatch($data);
    }
}
