<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TingkatKesejahteraan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tingkat_kesejahteraan' => 'miskin ekstrim',
            ],
            [
                'tingkat_kesejahteraan' => 'miskin',
            ],
            [
                'tingkat_kesejahteraan' => 'rentan miskin',
            ],
            [
                'tingkat_kesejahteraan' => 'tidak miskin',
            ],
        ];

        $this->db->table('tingkat_kesejahteraans')->insertBatch($data);
    }
}
