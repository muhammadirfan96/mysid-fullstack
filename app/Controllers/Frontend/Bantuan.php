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
        return view('frontend/bantuan', $data);
    }
}
