<?php

namespace App\Controllers\Backend;

use App\Libraries\GetDesa;
use App\Libraries\GetUser;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class DataNkks extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\DataNkksModel';
    protected $format    = 'json';

    protected $db, $user, $desa;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->user = new GetUser();
        $this->desa = new GetDesa();
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
            'id_provinsis' => $this->request->getVar('id_provinsis'),
            'id_kabupatens' => $this->request->getVar('id_kabupatens'),
            'id_kecamatans' => $this->request->getVar('id_kecamatans'),
            'id_desas' => $this->request->getVar('id_desas'),
            'id_rt_rws' => $this->request->getVar('id_rt_rws'),
            'nkk' => $this->request->getVar('nkk'),
            'alamat_lengkap' => $this->request->getVar('alamat_lengkap'),
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
        unset($rules['id_provinsis'], $rules['id_kabupatens'], $rules['id_kecamatans'], $rules['id_desas'], $rules['created_by']);
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $currUser = $this->user->currLogin();
        if ($currUser['desa'] != 'admin') {
            return $this->fail('user not allowed');
        }

        $data = [
            'id_rt_rws' => $this->request->getVar('id_rt_rws'),
            'nkk' => $this->request->getVar('nkk'),
            'alamat_lengkap' => $this->request->getVar('alamat_lengkap'),
            'id_tingkat_kesejahteraans' => $this->request->getVar('id_tingkat_kesejahteraans'),
            'id_sumber_penghasilan_utamas' => $this->request->getVar('id_sumber_penghasilan_utamas'),
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

        $currUser = $this->user->currLogin();
        if ($currUser['desa'] != 'admin') {
            return $this->fail('user not allowed');
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

    public function find($key, $limit = 0, $offset = 0)
    {
        if (str_contains($key, '@')) {
            $keys = explode("@", $key);
            if (str_contains($key, 'nkk')) $where = "nkk LIKE '%$keys[1]%'";
            if (str_contains($key, 'provinsi')) {
                $provinsisCrr = $this->db->table('provinsis')
                    ->getWhere("provinsi LIKE '%$keys[1]%'")
                    ->getResultArray();
                $provinsiId = $provinsisCrr[0]['id'];
                $where = "id_provinsis = '$provinsiId'";
            }
            if (str_contains($key, 'kabupaten')) {
                $kabupatensCrr = $this->db->table('kabupatens')
                    ->getWhere("kabupaten LIKE '%$keys[1]%'")
                    ->getResultArray();
                $kabupatenId = $kabupatensCrr[0]['id'];
                $where = "id_kabupatens = '$kabupatenId'";
            }
            if (str_contains($key, 'kecamatan')) {
                $kecamatansCrr = $this->db->table('kecamatans')
                    ->getWhere("kecamatan LIKE '%$keys[1]%'")
                    ->getResultArray();
                $kecamatanId = $kecamatansCrr[0]['id'];
                $where = "id_kecamatans = '$kecamatanId'";
            }
            if (str_contains($key, 'desa')) {
                $desasCrr = $this->db->table('desas')
                    ->getWhere("desa LIKE '%$keys[1]%'")
                    ->getResultArray();
                $desaId = $desasCrr[0]['id'];
                $where = "id_desas = '$desaId'";
            }
        } else {
            $where = null;
        }

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

        $provinsis = $this->db->table('provinsis')
            ->get()
            ->getResultArray();

        foreach ($data_nkks as $key => $data_nkk) {
            foreach ($provinsis as $provinsi) {
                if ($data_nkk['id_provinsis'] == $provinsi['id']) {
                    $data_nkks[$key]['provinsi'] = $provinsi['provinsi'];
                }
            }
        }

        $kabupatens = $this->db->table('kabupatens')
            ->get()
            ->getResultArray();

        foreach ($data_nkks as $key => $data_nkk) {
            foreach ($kabupatens as $kabupaten) {
                if ($data_nkk['id_kabupatens'] == $kabupaten['id']) {
                    $data_nkks[$key]['kabupaten'] = $kabupaten['kabupaten'];
                }
            }
        }

        $kecamatans = $this->db->table('kecamatans')
            ->get()
            ->getResultArray();

        foreach ($data_nkks as $key => $data_nkk) {
            foreach ($kecamatans as $kecamatan) {
                if ($data_nkk['id_kecamatans'] == $kecamatan['id']) {
                    $data_nkks[$key]['kecamatan'] = $kecamatan['kecamatan'];
                }
            }
        }

        $desas = $this->db->table('desas')
            ->get()
            ->getResultArray();

        foreach ($data_nkks as $key => $data_nkk) {
            foreach ($desas as $desa) {
                if ($data_nkk['id_desas'] == $desa['id']) {
                    $data_nkks[$key]['desa'] = $desa['desa'];
                }
            }
        }

        $rt_rws = $this->db->table('rt_rws')
            ->get()
            ->getResultArray();

        foreach ($data_nkks as $key => $data_nkk) {
            foreach ($rt_rws as $rt_rw) {
                if ($data_nkk['id_rt_rws'] == $rt_rw['id']) {
                    $data_nkks[$key]['rt_rw'] = $rt_rw['rt_rw'];
                }
            }
        }

        return $this->respond($data_nkks);
    }
}
