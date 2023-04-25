<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class SumberPenghasilanUtama extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'sumber_penghasilan_utama'
        ];
        return view('sumber_penghasilan_utama/index', $data);
    }
}
