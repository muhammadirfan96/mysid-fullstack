<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class DataPenduduk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'data penduduk'
        ];
        return view('frontend/data_penduduk', $data);
    }
}
