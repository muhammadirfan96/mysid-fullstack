<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Provinsi extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'provinsi'
        ];
        return view('frontend/provinsi', $data);
    }
}
