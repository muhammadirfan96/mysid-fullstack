<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Kecamatan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'kecamatan'
        ];
        return view('frontend/kecamatan', $data);
    }
}
