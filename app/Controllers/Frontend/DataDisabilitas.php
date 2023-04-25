<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class DataDisabilitas extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'data_disabilitas'
        ];
        return view('data_disabilitas/index', $data);
    }
}
