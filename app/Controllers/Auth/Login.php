<?php

namespace App\Controllers\Auth;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

class Login extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    protected $modelName = 'App\Models\UsersModel';
    protected $format    = 'json';

    public function index()
    {
        helper(['form']);

        $rules = $this->model->myValidationRules;
        $rules['desa'] = 'required';
        unset($rules['passconf'], $rules['email'], $rules['created_by'], $rules['updated_by']);

        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $user = $this->model->where('desa', $this->request->getVar('desa'))->first();
        if (!$user) return $this->failNotFound('desa not found');

        $verify = password_verify($this->request->getVar('password'), $user['password']);
        if (!$verify) return $this->fail('wrong password');

        $key = getenv('TOKEN_SECRET');
        $payload = [
            'iat' => 1356999524,
            'nbf' => 1357000000,
            'uid' => $user['id'],
            'desa' => $user['desa']
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        $response = [
            'token' => $token
        ];

        return $this->respond($response);
    }
}
