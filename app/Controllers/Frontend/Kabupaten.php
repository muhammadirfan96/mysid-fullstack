<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Kabupaten extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'kabupaten'
        ];
        return view('kabupaten/index', $data);
    }
}
