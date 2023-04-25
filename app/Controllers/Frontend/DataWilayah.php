<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class DataWilayah extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'data_wilayah'
        ];
        return view('data_wilayah/index', $data);
    }
}
