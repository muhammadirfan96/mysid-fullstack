<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Bantuan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'bantuan'
        ];
        return view('bantuan/index', $data);
    }
}
