<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pekerjaan extends Seeder
{
    public function run()
    {
        $data = [
            // [
            //     'pekerjaan' => 'PNS',
            // ],
            // [
            //     'pekerjaan' => 'karyawan honorer',
            // ],
            // [
            //     'pekerjaan' => 'petani',
            // ],
            // [
            //     'pekerjaan' => 'peternak',
            // ],
            // [
            //     'pekerjaan' => 'pedagang',
            // ],
            // [
            //     'pekerjaan' => 'nelayan',
            // ],
            // [
            //     'pekerjaan' => 'teknisi',
            // ],
            // [
            //     'pekerjaan' => 'mebel',
            // ],
            [
                'pekerjaan' => '-',
            ],
        ];

        $this->db->table('pekerjaans')->insertBatch($data);
    }
}
