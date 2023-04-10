<?php

namespace App\Controllers\Backend;

use App\Models\AgamasModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Agama extends ResourceController
{
    use ResponseTrait;
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new AgamasModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new AgamasModel();
        $data = $model->find($id);
        if (!$data) return $this->failNotFound('no data found');
        return $this->respond($data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new AgamasModel();
        helper(['form']);

        $rules = $model->getValidationRules();
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $data = [
            'agama' => $this->request->getVar('agama'),
            'created_by' => $this->request->getVar('created_by'),
            'updated_by' => $this->request->getVar('updated_by'),
        ];

        $model->save($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'data inserted'
            ]
        ];
        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new AgamasModel();
        helper(['form']);

        $rules = $model->getValidationRules();
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $findData = $model->find($id);
        if (!$findData) return $this->failNotFound('no data found');

        $data = [
            'agama' => $this->request->getVar('agama'),
            'created_by' => $this->request->getVar('created_by'),
            'updated_by' => $this->request->getVar('updated_by'),
        ];

        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'data updated'
            ]
        ];
        return $this->respondUpdated($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new AgamasModel();

        $findData = $model->find($id);
        if (!$findData) return $this->failNotFound('no data found');

        $model->delete($id);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'data deleted'
            ]
        ];

        return $this->respondDeleted($response);
    }
}
