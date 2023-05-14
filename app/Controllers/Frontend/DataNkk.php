<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class DataNkk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'data nkk'
        ];
        return view('frontend/data_nkk', $data);
    }
}
