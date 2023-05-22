<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NamaBantuanIndividu extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_bantuan_individu' => 'PKH',
            ],
            [
                'nama_bantuan_individu' => 'BNPT',
            ],
            [
                'nama_bantuan_individu' => 'BLT',
            ],
        ];

        $this->db->table('nama_bantuan_individus')->insertBatch($data);
    }
}
