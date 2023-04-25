<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class DataNkk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'data_nkk'
        ];
        return view('data_nkk/index', $data);
    }
}
