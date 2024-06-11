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

    public function detail($id)
    {
        $data = [
            'title' => 'detail berita',
            'id' => $id
        ];

        return view('frontend/berita_detail', $data);
    }
}
