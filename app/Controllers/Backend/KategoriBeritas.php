<?php

namespace App\Controllers\Backend;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class KategoriBeritas extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\KategoriBeritasModel';
    protected $format    = 'json';

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

    public function find($key, $limit = 0, $offset = 0)
    {
        $where = "kategori_berita LIKE '%$key%'";
        $data = $this->model->where($where)->orderBy('id', 'DESC')->findAll($limit, $offset);
        if ($key == '*') $data = $this->model->orderBy('id', 'DESC')->findAll($limit, $offset);
        return $this->respond($data);
    }
}
