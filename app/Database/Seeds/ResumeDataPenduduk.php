<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ResumeDataPenduduk extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jumlah_penduduk' => "0 orang",
                'jumlah_laki_laki' => "0 orang",
                'jumlah_perempuan' => "0 orang",
                'umur_kurang_dari_1' => "0 orang",
                'umur_1_sd_4' => "0 orang",
                'umur_5_sd_14' => "0 orang",
                'umur_15_sd_39' => "0 orang",
                'umur_40_sd_65' => "0 orang",
                'umur_lebih_dari_65' => "0 orang",
            ],
        ];

        $this->db->table('resume_data_penduduks')->insertBatch($data);
    }
}
