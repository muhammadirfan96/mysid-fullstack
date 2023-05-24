<?php

namespace App\Controllers\Backend;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class BantuanIndividus extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\BantuanIndividusModel';
    protected $format    = 'json';

    // /**
    //  * Return an array of resource objects, themselves in array format
    //  *
    //  * @return mixed
    //  */
    // public function index()
    // {
    //     //
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
    //  * Return a new resource object, with default properties
    //  *
    //  * @return mixed
    //  */
    // public function new()
    // {
    //     //
    // }

    // /**
    //  * Create a new resource object, from "posted" parameters
    //  *
    //  * @return mixed
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Return the editable properties of a resource object
    //  *
    //  * @return mixed
    //  */
    // public function edit($id = null)
    // {
    //     //
    // }

    // /**
    //  * Add or update a model resource, from "posted" properties
    //  *
    //  * @return mixed
    //  */
    // public function update($id = null)
    // {
    //     //
    // }

    // /**
    //  * Delete the designated resource object from the model
    //  *
    //  * @return mixed
    //  */
    // public function delete($id = null)
    // {
    //     //
    // }

    public function find($key, $limit = 0, $offset = 0)
    {
        $where = "bantuan_individu LIKE '%$key%'";
        $data = $this->model->where($where)->orderBy('id', 'DESC')->findAll($limit, $offset);
        if ($key == '*') $data = $this->model->orderBy('id', 'DESC')->findAll($limit, $offset);
        return $this->respond($data);
    }
}
