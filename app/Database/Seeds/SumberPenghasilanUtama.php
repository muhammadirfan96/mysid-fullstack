<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SumberPenghasilanUtama extends Seeder
{
    public function run()
    {
        $data = [
            [
                'sumber_penghasilan_utama' => 'petani',
            ],
            [
                'sumber_penghasilan_utama' => 'nelayan',
            ],
            [
                'sumber_penghasilan_utama' => 'pedagang',
            ],
            [
                'sumber_penghasilan_utama' => 'karyawan honorer',
            ],
            [
                'sumber_penghasilan_utama' => 'karyawan swasta',
            ],
            [
                'sumber_penghasilan_utama' => 'pns',
            ],
            [
                'sumber_penghasilan_utama' => 'tni',
            ],
            [
                'sumber_penghasilan_utama' => 'polri',
            ],
        ];

        $this->db->table('sumber_penghasilan_utamas')->insertBatch($data);
    }
}
