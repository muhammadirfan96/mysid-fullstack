<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Pendidikan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'pendidikan'
        ];
        return view('pendidikan/index', $data);
    }
}
