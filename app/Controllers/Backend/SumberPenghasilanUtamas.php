<?php

namespace App\Controllers\Backend;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class SumberPenghasilanUtamas extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\SumberPenghasilanUtamasModel';
    protected $format    = 'json';
    // /**
    //  * Return an array of resource objects, themselves in array format
    //  *
    //  * @return mixed
    //  */
    // public function index()
    // {
    //     $data = $this->model->orderBy('id', 'DESC')->findAll();
    //     return $this->respond($data);
    // }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) return $this->failNotFound('no data found');
        return $this->respond($data);
    }

    // /**
    //  * Create a new resource object, from "posted" parameters
    //  *
    //  * @return mixed
    //  */
    // public function create()
    // {
    //     helper(['form']);

    //     $rules = $this->model->myValidationRules;
    //     if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

    //     $data = [
    //         'sumber_penghasilan_utama' => $this->request->getVar('sumber_penghasilan_utama'),
    //         'created_by' => $this->request->getVar('created_by'),
    //         'updated_by' => $this->request->getVar('updated_by'),
    //     ];

    //     $this->model->save($data);
    //     $response = [
    //         'status' => 201,
    //         'error' => null,
    //         'messages' => [
    //             'success' => 'data inserted'
    //         ]
    //     ];
    //     return $this->respondCreated($response);
    // }

    // /**
    //  * Add or update a model resource, from "posted" properties
    //  *
    //  * @return mixed
    //  */
    // public function update($id = null)
    // {
    //     $findData = $this->model->find($id);
    //     if (!$findData) return $this->failNotFound('no data found');

    //     helper(['form']);

    //     $rules = $this->model->myValidationRules;
    //     $rules['sumber_penghasilan_utama'] = 'required';
    //     if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

    //     $data = [
    //         'sumber_penghasilan_utama' => $this->request->getVar('sumber_penghasilan_utama'),
    //         'created_by' => $this->request->getVar('created_by'),
    //         'updated_by' => $this->request->getVar('updated_by'),
    //     ];

    //     $this->model->update($id, $data);
    //     $response = [
    //         'status' => 200,
    //         'error' => null,
    //         'messages' => [
    //             'success' => 'data updated'
    //         ]
    //     ];
    //     return $this->respondUpdated($response);
    // }

    // /**
    //  * Delete the designated resource object from the model
    //  *
    //  * @return mixed
    //  */
    // public function delete($id = null)
    // {
    //     $findData = $this->model->find($id);
    //     if (!$findData) return $this->failNotFound('no data found');

    //     $this->model->delete($id);
    //     $response = [
    //         'status' => 200,
    //         'error' => null,
    //         'messages' => [
    //             'success' => 'data deleted'
    //         ]
    //     ];

    //     return $this->respondDeleted($response);
    // }

    public function find($key, $limit = 0, $offset = 0)
    {
        $where = "sumber_penghasilan_utama LIKE '%$key%'";
        $data = $this->model->where($where)->orderBy('id', 'DESC')->findAll($limit, $offset);
        if ($key == '*') $data = $this->model->orderBy('id', 'DESC')->findAll($limit, $offset);
        return $this->respond($data);
    }
}
