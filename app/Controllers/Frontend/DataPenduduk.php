<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class DataPenduduk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'data_penduduk'
        ];
        return view('data_penduduk/index', $data);
    }
}
