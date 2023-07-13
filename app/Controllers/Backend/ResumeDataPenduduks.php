<?php

namespace App\Controllers\Backend;

use App\Libraries\GetUser;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class ResumeDataPenduduks extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\ResumeDataPenduduksModel';
    protected $format    = 'json';

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
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
        //
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
        $findData = $this->model->find($id);
        if (!$findData) return $this->failNotFound('no data found');

        helper(['form']);

        $rules = $this->model->myValidationRules;
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $data = [
            'jumlah_penduduk' => $this->request->getVar('jumlah_penduduk'),
            'jumlah_laki_laki' => $this->request->getVar('jumlah_laki_laki'),
            'jumlah_perempuan' => $this->request->getVar('jumlah_perempuan'),
            'umur_kurang_dari_1' => $this->request->getVar('umur_kurang_dari_1'),
            'umur_1_sd_4' => $this->request->getVar('umur_1_sd_4'),
            'umur_5_sd_14' => $this->request->getVar('umur_5_sd_14'),
            'umur_15_sd_39' => $this->request->getVar('umur_15_sd_39'),
            'umur_40_sd_65' => $this->request->getVar('umur_40_sd_65'),
            'umur_lebih_dari_65' => $this->request->getVar('umur_lebih_dari_65'),
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
        //
    }
}
