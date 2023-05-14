<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class DataWilayah extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'data wilayah'
        ];
        return view('frontend/data_wilayah', $data);
    }
}
