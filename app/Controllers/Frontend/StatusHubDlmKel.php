<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class StatusHubDlmKel extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'status_hub_dlm_kel'
        ];
        return view('status_hub_dlm_kel/index', $data);
    }
}
