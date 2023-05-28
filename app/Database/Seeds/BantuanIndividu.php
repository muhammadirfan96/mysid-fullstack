<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BantuanIndividu extends Seeder
{
    public function run()
    {
        $data = [
            [
                'bantuan_individu' => 'BLT',
            ],
            [
                'bantuan_individu' => 'bantuan nelayan',
            ],
            [
                'bantuan_individu' => 'bantuan pertanian',
            ],
            [
                'bantuan_individu' => 'bantuan peternakan',
            ],
            [
                'bantuan_individu' => 'bantuan home industri',
            ],
            [
                'bantuan_individu' => 'bantuan perbengkelan',
            ],
            [
                'bantuan_individu' => 'bantuan usaha mebel',
            ],
        ];

        $this->db->table('bantuan_individus')->insertBatch($data);
    }
}
