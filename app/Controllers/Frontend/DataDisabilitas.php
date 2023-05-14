<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class DataDisabilitas extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'data disabilitas'
        ];
        return view('frontend/data_disabilitas', $data);
    }
}
