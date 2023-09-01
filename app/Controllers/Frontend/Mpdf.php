<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Mpdf extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'arsip'
        ];
        return view('frontend/mpdf', $data);
    }
}
