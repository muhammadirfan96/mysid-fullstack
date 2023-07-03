<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Berita extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'berita'
        ];

        return view('frontend/berita', $data);
    }
}
