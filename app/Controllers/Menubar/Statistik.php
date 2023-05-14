<?php

namespace App\Controllers\Menubar;

use App\Controllers\BaseController;

class Statistik extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'statistik'
        ];
        return view('menubar/statistik', $data);
    }
}
