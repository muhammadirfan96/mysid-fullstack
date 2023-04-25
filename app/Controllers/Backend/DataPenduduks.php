<?php

namespace App\Controllers\Backend;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class DataPenduduks extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\DataPenduduksModel';
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

        $foto = $this->request->getFile('foto');
        $namaFile = $foto->getRandomName();
        $foto->move('img/data_penduduk', $namaFile);

        $data = [
            'nik' => $this->request->getVar('nik'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'id_data_nkks' => $this->request->getVar('id_data_nkks'),
            'id_agamas' => $this->request->getVar('id_agamas'),
            'id_golongan_darahs' => $this->request->getVar('id_golongan_darahs'),
            'id_pendidikans' => $this->request->getVar('id_pendidikans'),
            'id_status_hub_dlm_kels' => $this->request->getVar('id_status_hub_dlm_kels'),
            'id_kewarganegaraans' => $this->request->getVar('id_kewarganegaraans'),
            'id_jenis_kelamins' => $this->request->getVar('id_jenis_kelamins'),
            'id_provinsis' => $this->request->getVar('id_provinsis'),
            'id_kabupatens' => $this->request->getVar('id_kabupatens'),
            'id_kecamatans' => $this->request->getVar('id_kecamatans'),
            'id_desas' => $this->request->getVar('id_desas'),
            'alamat_lengkap' => $this->request->getVar('alamat_lengkap'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'foto' => $namaFile,
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

        $foto = $this->request->getFile('foto');
        $rules = $this->model->myValidationRules;
        if ($foto == '') {
            unset($rules['foto']);
        }
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $data = [
            'nik' => $this->request->getVar('nik'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'id_data_nkks' => $this->request->getVar('id_data_nkks'),
            'id_agamas' => $this->request->getVar('id_agamas'),
            'id_golongan_darahs' => $this->request->getVar('id_golongan_darahs'),
            'id_pendidikans' => $this->request->getVar('id_pendidikans'),
            'id_status_hub_dlm_kels' => $this->request->getVar('id_status_hub_dlm_kels'),
            'id_kewarganegaraans' => $this->request->getVar('id_kewarganegaraans'),
            'id_jenis_kelamins' => $this->request->getVar('id_jenis_kelamins'),
            'id_provinsis' => $this->request->getVar('id_provinsis'),
            'id_kabupatens' => $this->request->getVar('id_kabupatens'),
            'id_kecamatans' => $this->request->getVar('id_kecamatans'),
            'id_desas' => $this->request->getVar('id_desas'),
            'alamat_lengkap' => $this->request->getVar('alamat_lengkap'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'created_by' => $this->request->getVar('created_by'),
            'updated_by' => $this->request->getVar('updated_by'),
        ];

        if ($foto != '') {
            $namaFile = $foto->getRandomName();
            $data['foto'] = $namaFile;
            if (file_exists('img/data_penduduk/' . $findData['foto'])) {
                unlink('img/data_penduduk/' . $findData['foto']);
            }
            $foto->move('img/data_penduduk', $namaFile);
        }

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

        if (file_exists('img/data_penduduk/' . $findData['foto'])) {
            unlink('img/data_penduduk/' . $findData['foto']);
        }

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
}
