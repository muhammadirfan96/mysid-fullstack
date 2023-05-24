<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataAwal extends Seeder
{
    public function run()
    {
        $this->call('Agama');
        $this->call('GolonganDarah');
        $this->call('JenisKelamin');
        $this->call('Kewarganegaraan');
        $this->call('Pendidikan');
        $this->call('StatusHubDlmKel');
        $this->call('SumberPenghasilanUtama');
        $this->call('TingkatKesejahteraan');
        $this->call('BantuanIndividu');
    }
}
