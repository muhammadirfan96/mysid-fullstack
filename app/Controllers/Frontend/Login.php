<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }
}
