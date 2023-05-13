<?php

namespace App\Controllers\Auth;

use App\Libraries\GetUser;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Register extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    protected $modelName = 'App\Models\UsersModel';
    protected $format    = 'json';
    protected $user;

    public function __construct()
    {
        $this->user = new GetUser();
    }

    public function index()
    {
        $currUser = $this->user->currLogin();
        if ($currUser['desa'] != 'admin') return $this->fail('desa not allowed');

        helper(['form']);

        $rules = $this->model->myValidationRules;
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $data = [
            'desa' => $this->request->getVar('desa'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'email' => $this->request->getVar('email'),
            'created_by' => $this->request->getVar('created_by'),
            'updated_by' => $this->request->getVar('updated_by'),
        ];

        $this->model->save($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'registered successfully'
            ]
        ];
        return $this->respondCreated($response);
    }
}
