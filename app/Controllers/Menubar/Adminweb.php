<?php

namespace App\Controllers\Menubar;

use App\Controllers\BaseController;

class Adminweb extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'admin web'
        ];
        return view('menubar/admin_web', $data);
    }
}
