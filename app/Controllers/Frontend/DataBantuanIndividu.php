<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class DataBantuanIndividu extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'bantuan individu'
        ];
        return view('frontend/data_bantuan_individu', $data);
    }
}
