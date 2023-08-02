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
                'umur_15_sd_17' => "0 orang",
                'umur_18_sd_39' => "0 orang",
                'umur_40_sd_65' => "0 orang",
                'umur_lebih_dari_65' => "0 orang",
                'jumlah_kk' => "0 orang",
                'jumlah_kk_laki_laki' => "0 orang",
                'jumlah_kk_perempuan' => "0 orang",
                'pns' => "0 orang",
                'karyawan_honorer' => "0 orang",
                'petani' => "0 orang",
                'peternak' => "0 orang",
                'pedagang' => "0 orang",
                'nelayan' => "0 orang",
                'teknisi' => "0 orang",
                'tukang' => "0 orang",
                'kosong' => "0 orang",
                'ibu_rumah_tangga' => "0 orang",
                'pelajar' => "0 orang",
                'pekerja_lepas' => "0 orang",
                'karyawan_swasta' => "0 orang",
                'sdtt' => "0 orang",
                'tk' => "0 orang",
                'sd' => "0 orang",
                'smp' => "0 orang",
                'sma' => "0 orang",
                's1' => "0 orang",
                's2' => "0 orang",
                's3' => "0 orang",
                'belum_sekolah' => "0 orang",
                'd1' => "0 orang",
                'd2' => "0 orang",
                'd3' => "0 orang",
            ],
        ];

        $this->db->table('resume_data_penduduks')->insertBatch($data);
    }
}
