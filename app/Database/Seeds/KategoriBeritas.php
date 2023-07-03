<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriBeritas extends Seeder
{
    public function run()
    {
        $data = [
            // [
            //     'kategori_berita' => 'berita',
            // ],
            // [
            //     'kategori_berita' => 'olahraga',
            // ],
            // [
            //     'kategori_berita' => 'hukum',
            // ],
            // [
            //     'kategori_berita' => 'kriminal',
            // ],
            // [
            //     'kategori_berita' => 'budaya',
            // ],
            // [
            //     'kategori_berita' => 'opini',
            // ],
        ];

        $this->db->table('kategori_beritas')->insertBatch($data);
    }
}
