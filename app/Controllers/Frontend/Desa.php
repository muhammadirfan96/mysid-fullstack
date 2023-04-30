<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Desa extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'desa'
        ];

        return view('desa/index', $data);
    }
}
