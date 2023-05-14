<?php

namespace App\Controllers\Menubar;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'home'
        ];
        return view('menubar/home', $data);
    }
}
