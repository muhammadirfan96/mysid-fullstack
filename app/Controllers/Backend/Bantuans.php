<?php

namespace App\Controllers\Backend;

use App\Libraries\GetDesa;
use App\Libraries\GetUser;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Bantuans extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\BantuansModel';
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
        $currUser = $this->user->currLogin();
        if ($currUser['desa'] != 'admin') return $this->fail('desa not allowed');

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

        $currUser = $this->user->currLogin();
        $currDesa = $this->desa->currDesa($data['id_desas']);
        if ($currUser['desa'] != 'admin') {
            if ($currUser['desa'] != $currDesa['desa']) return $this->fail('desa not allowed');
        }

        return $this->respond($data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $currUser = $this->user->currLogin();
        $currDesa = $this->desa->currDesa($this->request->getVar('id_desas'));
        if ($currUser['desa'] != 'admin') {
            if ($currUser['desa'] != $currDesa['desa']) return $this->fail('desa not allowed');
        }

        helper(['form']);

        $rules = $this->model->myValidationRules;
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $foto = $this->request->getFile('foto');
        $namaFile = $foto->getRandomName();
        $foto->move('img/bantuan', $namaFile);

        $data = [
            'id_provinsis' => $this->request->getVar('id_provinsis'),
            'id_kabupatens' => $this->request->getVar('id_kabupatens'),
            'id_kecamatans' => $this->request->getVar('id_kecamatans'),
            'id_desas' => $this->request->getVar('id_desas'),
            'bantuan' => $this->request->getVar('bantuan'),
            'sumber' => $this->request->getVar('sumber'),
            'penerima' => $this->request->getVar('penerima'),
            'jumlah' => $this->request->getVar('jumlah'),
            'satuan' => $this->request->getVar('satuan'),
            'foto' => $namaFile,
            'waktu_terima' => $this->request->getVar('waktu_terima'),
            'ket' => $this->request->getVar('ket'),
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

        $currUser = $this->user->currLogin();
        $currDesa = $this->desa->currDesa($findData('id_desas'));
        if ($currUser['desa'] != 'admin') {
            if ($currUser['desa'] != $currDesa['desa']) return $this->fail('desa not allowed');
        }

        helper(['form']);

        $foto = $this->request->getFile('foto');
        $rules = $this->model->myValidationRules;
        unset($rules['id_provinsis'], $rules['id_kabupatens'], $rules['id_kecamatans'], $rules['id_desas']);
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        if ($foto == '') {
            unset($rules['foto']);
        }
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $data = [
            'bantuan' => $this->request->getVar('bantuan'),
            'sumber' => $this->request->getVar('sumber'),
            'penerima' => $this->request->getVar('penerima'),
            'jumlah' => $this->request->getVar('jumlah'),
            'satuan' => $this->request->getVar('satuan'),
            'waktu_terima' => $this->request->getVar('waktu_terima'),
            'ket' => $this->request->getVar('ket'),
            'created_by' => $this->request->getVar('created_by'),
            'updated_by' => $this->request->getVar('updated_by'),
        ];

        if ($foto != '') {
            $namaFile = $foto->getRandomName();
            $data['foto'] = $namaFile;
            if (file_exists('img/bantuan/' . $findData['foto'])) {
                unlink('img/bantuan/' . $findData['foto']);
            }
            $foto->move('img/bantuan', $namaFile);
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
        $currDesa = $this->desa->currDesa($findData('id_desas'));
        if ($currUser['desa'] != 'admin') {
            if ($currUser['desa'] != $currDesa['desa']) return $this->fail('desa not allowed');
        }

        if (file_exists('img/bantuan/' . $findData['foto'])) {
            unlink('img/bantuan/' . $findData['foto']);
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
        } else {
            $where = null;
        }

        $currUser = $this->user->currLogin();
        if ($currUser['desa'] != 'admin') {
            $currDesa = $currUser['desa'];
            $desasCrr = $this->db->table('desas')
                ->getWhere("desa = '$currDesa'")
                ->getResultArray();
            $desaId = $desasCrr[0]['id'];
            $where = "id_desas = '$desaId'";
        }

        $bantuans = $this->db->table('bantuans')
            ->orderBy('bantuans.id', 'DESC')
            ->getWhere($where, $limit, $offset)
            ->getResultArray();

        $provinsis = $this->db->table('provinsis')
            ->get()
            ->getResultArray();

        foreach ($bantuans as $key => $bantuan) {
            foreach ($provinsis as $provinsi) {
                if ($bantuan['id_provinsis'] == $provinsi['id']) {
                    $bantuans[$key]['provinsi'] = $provinsi['provinsi'];
                }
            }
        }

        $kabupatens = $this->db->table('kabupatens')
            ->get()
            ->getResultArray();

        foreach ($bantuans as $key => $bantuan) {
            foreach ($kabupatens as $kabupaten) {
                if ($bantuan['id_kabupatens'] == $kabupaten['id']) {
                    $bantuans[$key]['kabupaten'] = $kabupaten['kabupaten'];
                }
            }
        }

        $kecamatans = $this->db->table('kecamatans')
            ->get()
            ->getResultArray();

        foreach ($bantuans as $key => $bantuan) {
            foreach ($kecamatans as $kecamatan) {
                if ($bantuan['id_kecamatans'] == $kecamatan['id']) {
                    $bantuans[$key]['kecamatan'] = $kecamatan['kecamatan'];
                }
            }
        }

        $desas = $this->db->table('desas')
            ->get()
            ->getResultArray();

        foreach ($bantuans as $key => $bantuan) {
            foreach ($desas as $desa) {
                if ($bantuan['id_desas'] == $desa['id']) {
                    $bantuans[$key]['desa'] = $desa['desa'];
                }
            }
        }

        $provinsis = $this->db->table('provinsis')
            ->get()
            ->getResultArray();

        foreach ($bantuans as $key => $bantuan) {
            foreach ($provinsis as $provinsi) {
                if ($bantuan['id_provinsis'] == $provinsi['id']) {
                    $bantuans[$key]['provinsi'] = $provinsi['provinsi'];
                }
            }
        }

        $kabupatens = $this->db->table('kabupatens')
            ->get()
            ->getResultArray();

        foreach ($bantuans as $key => $bantuan) {
            foreach ($kabupatens as $kabupaten) {
                if ($bantuan['id_kabupatens'] == $kabupaten['id']) {
                    $bantuans[$key]['kabupaten'] = $kabupaten['kabupaten'];
                }
            }
        }

        $kecamatans = $this->db->table('kecamatans')
            ->get()
            ->getResultArray();

        foreach ($bantuans as $key => $bantuan) {
            foreach ($kecamatans as $kecamatan) {
                if ($bantuan['id_kecamatans'] == $kecamatan['id']) {
                    $bantuans[$key]['kecamatan'] = $kecamatan['kecamatan'];
                }
            }
        }

        $desas = $this->db->table('desas')
            ->get()
            ->getResultArray();

        foreach ($bantuans as $key => $bantuan) {
            foreach ($desas as $desa) {
                if ($bantuan['id_desas'] == $desa['id']) {
                    $bantuans[$key]['desa'] = $desa['desa'];
                }
            }
        }

        return $this->respond($bantuans);
    }
}
