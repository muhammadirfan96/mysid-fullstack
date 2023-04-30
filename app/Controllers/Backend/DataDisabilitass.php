<?php

namespace App\Controllers\Backend;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class DataDisabilitass extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\DataDisabilitassModel';
    protected $format    = 'json';

    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

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

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        helper(['form']);

        $rules = $this->model->myValidationRules;
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $data = [
            'disabilitas' => $this->request->getVar('disabilitas'),
            'id_data_penduduks' => $this->request->getVar('id_data_penduduks'),
            'created_by' => $this->request->getVar('created_by'),
            'updated_by' => $this->request->getVar('updated_by'),
        ];

        $this->model->save($data);
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
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $findData = $this->model->find($id);
        if (!$findData) return $this->failNotFound('no data found');

        helper(['form']);

        $rules = $this->model->myValidationRules;
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $data = [
            'disabilitas' => $this->request->getVar('disabilitas'),
            'id_data_penduduks' => $this->request->getVar('id_data_penduduks'),
            'created_by' => $this->request->getVar('created_by'),
            'updated_by' => $this->request->getVar('updated_by'),
        ];

        $this->model->update($id, $data);
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
        $findData = $this->model->find($id);
        if (!$findData) return $this->failNotFound('no data found');

        $this->model->delete($id);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'data deleted'
            ]
        ];

        return $this->respondDeleted($response);
    }

    public function find($key, $limit = 0, $offset = 0)
    {
        $where = "disabilitas LIKE '%$key%'";
        if ($key == '*') $where = null;

        $data_disabilitass = $this->db->table('data_disabilitass')
            ->orderBy('data_disabilitass.id', 'DESC')
            ->getWhere($where, $limit, $offset)
            ->getResultArray();

        $data_penduduks = $this->db->table('data_penduduks')
            ->get()
            ->getResultArray();

        foreach ($data_disabilitass as $key => $data_disabilitas) {
            foreach ($data_penduduks as $data_penduduk) {
                if ($data_disabilitas['id_data_penduduks'] == $data_penduduk['id']) {
                    $data_disabilitass[$key]['nik'] = $data_penduduk['nik'];
                    $data_disabilitass[$key]['nama_lengkap'] = $data_penduduk['nama_lengkap'];
                }
            }
        }

        return $this->respond($data_disabilitass);
    }
}
