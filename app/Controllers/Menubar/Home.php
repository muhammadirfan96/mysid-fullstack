<?php

namespace App\Controllers\Menubar;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'MySID | Sistem Informasi Desa  (Latompa)'
        ];
        return view('menubar/home', $data);
    }
}
