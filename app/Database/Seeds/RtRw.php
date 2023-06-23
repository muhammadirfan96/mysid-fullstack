<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RtRw extends Seeder
{
    public function run()
    {
        $data = [
            [
                'rt_rw' => 'RW 1 RT 1',
            ],
            [
                'rt_rw' => 'RW 1 RT 2',
            ],
            [
                'rt_rw' => 'RW 2 RT 1',
            ],
            [
                'rt_rw' => 'RW 2 RT 2',
            ],
        ];

        $this->db->table('rt_rws')->insertBatch($data);
    }
}
