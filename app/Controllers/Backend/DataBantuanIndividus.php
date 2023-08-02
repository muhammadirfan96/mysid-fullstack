<?php

namespace App\Controllers\Backend;

use App\Libraries\GetDesa;
use App\Libraries\GetUser;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class DataBantuanIndividus extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\DataBantuanIndividusModel';
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

        $foto = $this->request->getFile('foto');
        $namaFile = $foto->getRandomName();
        $foto->move('img/bantuan_individu', $namaFile);

        $data = [
            'id_provinsis' => $this->request->getVar('id_provinsis'),
            'id_kabupatens' => $this->request->getVar('id_kabupatens'),
            'id_kecamatans' => $this->request->getVar('id_kecamatans'),
            'id_desas' => $this->request->getVar('id_desas'),
            'id_bantuan_individus' => $this->request->getVar('id_bantuan_individus'),
            'id_data_penduduks' => $this->request->getVar('id_data_penduduks'),
            'waktu_terima' => $this->request->getVar('waktu_terima'),
            'ket' => $this->request->getVar('ket'),
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
        unset($rules['id_provinsis'], $rules['id_kabupatens'], $rules['id_kecamatans'], $rules['id_desas'], $rules['created_by']);

        if ($foto == '') {
            unset($rules['foto']);
        }
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $currUser = $this->user->currLogin();
        if ($currUser['desa'] != 'admin') {
            return $this->fail('user not allowed');
        }

        $data = [
            'id_bantuan_individus' => $this->request->getVar('id_bantuan_individus'),
            'id_data_penduduks' => $this->request->getVar('id_data_penduduks'),
            'waktu_terima' => $this->request->getVar('waktu_terima'),
            'ket' => $this->request->getVar('ket'),
            'updated_by' => $this->request->getVar('updated_by'),
        ];

        if ($foto != '') {
            $namaFile = $foto->getRandomName();
            $data['foto'] = $namaFile;
            if (file_exists('img/bantuan_individu/' . $findData['foto'])) {
                unlink('img/bantuan_individu/' . $findData['foto']);
            }
            $foto->move('img/bantuan_individu', $namaFile);
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

        $currUser = $this->user->currLogin();
        if ($currUser['desa'] != 'admin') {
            return $this->fail('user not allowed');
        }

        if (file_exists('img/bantuan_individu/' . $findData['foto'])) {
            unlink('img/bantuan_individu/' . $findData['foto']);
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
            if (str_contains($key, 'bantuan_individu')) {
                $bantuan_individusCrr = $this->db->table('bantuan_individus')
                    ->getWhere("bantuan_individu LIKE '%$keys[1]%'")
                    ->getResultArray();
                $bantuan_individuId = $bantuan_individusCrr[0]['id'];
                $where = "id_bantuan_individus = '$bantuan_individuId'";
            }
            if (str_contains($key, 'nama_lengkap')) {
                $data_penduduksCrr = $this->db->table('data_penduduks')
                    ->getWhere("nama_lengkap LIKE '%$keys[1]%'")
                    ->getResultArray();
                $data_pendudukId = $data_penduduksCrr[0]['id'];
                $where = "id_data_penduduks = '$data_pendudukId'";
            }
        } else {
            $where = null;
        }

        $data_bantuan_individus = $this->db->table('data_bantuan_individus')
            ->orderBy('data_bantuan_individus.id', 'DESC')
            ->getWhere($where, $limit, $offset)
            ->getResultArray();

        $provinsis = $this->db->table('provinsis')
            ->get()
            ->getResultArray();

        foreach ($data_bantuan_individus as $key => $data_bantuan_individu) {
            foreach ($provinsis as $provinsi) {
                if ($data_bantuan_individu['id_provinsis'] == $provinsi['id']) {
                    $data_bantuan_individus[$key]['provinsi'] = $provinsi['provinsi'];
                }
            }
        }

        $kabupatens = $this->db->table('kabupatens')
            ->get()
            ->getResultArray();

        foreach ($data_bantuan_individus as $key => $data_bantuan_individu) {
            foreach ($kabupatens as $kabupaten) {
                if ($data_bantuan_individu['id_kabupatens'] == $kabupaten['id']) {
                    $data_bantuan_individus[$key]['kabupaten'] = $kabupaten['kabupaten'];
                }
            }
        }

        $kecamatans = $this->db->table('kecamatans')
            ->get()
            ->getResultArray();

        foreach ($data_bantuan_individus as $key => $data_bantuan_individu) {
            foreach ($kecamatans as $kecamatan) {
                if ($data_bantuan_individu['id_kecamatans'] == $kecamatan['id']) {
                    $data_bantuan_individus[$key]['kecamatan'] = $kecamatan['kecamatan'];
                }
            }
        }

        $desas = $this->db->table('desas')
            ->get()
            ->getResultArray();

        foreach ($data_bantuan_individus as $key => $data_bantuan_individu) {
            foreach ($desas as $desa) {
                if ($data_bantuan_individu['id_desas'] == $desa['id']) {
                    $data_bantuan_individus[$key]['desa'] = $desa['desa'];
                }
            }
        }

        $provinsis = $this->db->table('provinsis')
            ->get()
            ->getResultArray();

        foreach ($data_bantuan_individus as $key => $data_bantuan_individu) {
            foreach ($provinsis as $provinsi) {
                if ($data_bantuan_individu['id_provinsis'] == $provinsi['id']) {
                    $data_bantuan_individus[$key]['provinsi'] = $provinsi['provinsi'];
                }
            }
        }

        $kabupatens = $this->db->table('kabupatens')
            ->get()
            ->getResultArray();

        foreach ($data_bantuan_individus as $key => $data_bantuan_individu) {
            foreach ($kabupatens as $kabupaten) {
                if ($data_bantuan_individu['id_kabupatens'] == $kabupaten['id']) {
                    $data_bantuan_individus[$key]['kabupaten'] = $kabupaten['kabupaten'];
                }
            }
        }

        $kecamatans = $this->db->table('kecamatans')
            ->get()
            ->getResultArray();

        foreach ($data_bantuan_individus as $key => $data_bantuan_individu) {
            foreach ($kecamatans as $kecamatan) {
                if ($data_bantuan_individu['id_kecamatans'] == $kecamatan['id']) {
                    $data_bantuan_individus[$key]['kecamatan'] = $kecamatan['kecamatan'];
                }
            }
        }

        $desas = $this->db->table('desas')
            ->get()
            ->getResultArray();

        foreach ($data_bantuan_individus as $key => $data_bantuan_individu) {
            foreach ($desas as $desa) {
                if ($data_bantuan_individu['id_desas'] == $desa['id']) {
                    $data_bantuan_individus[$key]['desa'] = $desa['desa'];
                }
            }
        }

        $bantuan_individus = $this->db->table('bantuan_individus')
            ->get()
            ->getResultArray();

        foreach ($data_bantuan_individus as $key => $data_bantuan_individu) {
            foreach ($bantuan_individus as $bantuan_individu) {
                if ($data_bantuan_individu['id_bantuan_individus'] == $bantuan_individu['id']) {
                    $data_bantuan_individus[$key]['bantuan_individu'] = $bantuan_individu['bantuan_individu'];
                }
            }
        }

        $data_penduduks = $this->db->table('data_penduduks')
            ->get()
            ->getResultArray();

        foreach ($data_bantuan_individus as $key => $data_bantuan_individu) {
            foreach ($data_penduduks as $data_penduduk) {
                if ($data_bantuan_individu['id_data_penduduks'] == $data_penduduk['id']) {
                    $data_bantuan_individus[$key]['nama_penerima'] = $data_penduduk['nama_lengkap'];
                }
            }
        }

        return $this->respond($data_bantuan_individus);
    }
}
