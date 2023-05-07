<?php

namespace App\Controllers\Backend;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class DataNkks extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\DataNkksModel';
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
            'nkk' => $this->request->getVar('nkk'),
            'id_tingkat_kesejahteraans' => $this->request->getVar('id_tingkat_kesejahteraans'),
            'id_sumber_penghasilan_utamas' => $this->request->getVar('id_sumber_penghasilan_utamas'),
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
        $rules['nkk'] = 'required';
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $data = [
            'nkk' => $this->request->getVar('nkk'),
            'id_tingkat_kesejahteraans' => $this->request->getVar('id_tingkat_kesejahteraans'),
            'id_sumber_penghasilan_utamas' => $this->request->getVar('id_sumber_penghasilan_utamas'),
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
        $where = "nkk LIKE '%$key%'";
        if ($key == '*') $where = null;

        $data_nkks = $this->db->table('data_nkks')
            ->orderBy('data_nkks.id', 'DESC')
            ->getWhere($where, $limit, $offset)
            ->getResultArray();

        $tingkat_kesejahteraans = $this->db->table('tingkat_kesejahteraans')
            ->get()
            ->getResultArray();

        foreach ($data_nkks as $key => $data_nkk) {
            foreach ($tingkat_kesejahteraans as $tingkat_kesejahteraan) {
                if ($data_nkk['id_tingkat_kesejahteraans'] == $tingkat_kesejahteraan['id']) {
                    $data_nkks[$key]['tingkat_kesejahteraan'] = $tingkat_kesejahteraan['tingkat_kesejahteraan'];
                }
            }
        }

        $sumber_penghasilan_utamas = $this->db->table('sumber_penghasilan_utamas')
            ->get()
            ->getResultArray();

        foreach ($data_nkks as $key => $data_nkk) {
            foreach ($sumber_penghasilan_utamas as $sumber_penghasilan_utama) {
                if ($data_nkk['id_sumber_penghasilan_utamas'] == $sumber_penghasilan_utama['id']) {
                    $data_nkks[$key]['sumber_penghasilan_utama'] = $sumber_penghasilan_utama['sumber_penghasilan_utama'];
                }
            }
        }

        return $this->respond($data_nkks);
    }
}
