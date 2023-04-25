<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class TingkatKesejahteraan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'tingkat_kesejahteraan'
        ];
        return view('tingkat_kesejahteraan/index', $data);
    }
}
