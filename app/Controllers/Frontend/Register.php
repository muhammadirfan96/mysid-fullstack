<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        return view('auth/register');
    }
}
