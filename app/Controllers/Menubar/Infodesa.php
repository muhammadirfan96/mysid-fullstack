<?php

namespace App\Controllers\Menubar;

use App\Controllers\BaseController;

class Infodesa extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'info desa'
        ];
        return view('menubar/info_desa', $data);
    }
}
