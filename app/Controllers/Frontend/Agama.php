<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Agama extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'agama'
        ];
        return view('agama/index', $data);
    }
}
