<?php

namespace App\Libraries;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Config\Services;

class GetUser
{
    public function currLogin()
    {
        $key = getenv('TOKEN_SECRET');
        $header = Services::request()->getServer('HTTP_AUTHORIZATION');
        $token = explode(' ', $header)[1];
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $response = [
            'id' => $decoded->uid,
            'desa' => $decoded->desa
        ];

        return $response;
    }
}
