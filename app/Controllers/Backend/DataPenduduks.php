<?php

namespace App\Controllers\Backend;

use App\Libraries\GetDesa;
use App\Libraries\GetUser;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class DataPenduduks extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\DataPenduduksModel';
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
        // $currUser = $this->user->currLogin();
        // if ($currUser['desa'] != 'admin') return $this->fail('desa not allowed');

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

        // $currUser = $this->user->currLogin();
        // $currDesa = $this->desa->currDesa($data['id_desas']);
        // if ($currUser['desa'] != 'admin') {
        //     if ($currUser['desa'] != $currDesa['desa']) return $this->fail('desa not allowed');
        // }

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

        // $currUser = $this->user->currLogin();
        // $currDesa = $this->desa->currDesa($this->request->getVar('id_desas'));
        // if ($currUser['desa'] != 'admin') {
        //     if ($currUser['desa'] != $currDesa['desa']) return $this->fail('desa not allowed');
        // }

        $foto = $this->request->getFile('foto');
        $namaFile = $foto->getRandomName();
        $foto->move('img/data_penduduk', $namaFile);

        $data = [
            'nik' => $this->request->getVar('nik'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'id_data_nkks' => $this->request->getVar('id_data_nkks'),
            'id_agamas' => $this->request->getVar('id_agamas'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'id_golongan_darahs' => $this->request->getVar('id_golongan_darahs'),
            'id_pendidikans' => $this->request->getVar('id_pendidikans'),
            'id_status_hub_dlm_kels' => $this->request->getVar('id_status_hub_dlm_kels'),
            'id_kewarganegaraans' => $this->request->getVar('id_kewarganegaraans'),
            'id_jenis_kelamins' => $this->request->getVar('id_jenis_kelamins'),
            'id_provinsis' => $this->request->getVar('id_provinsis'),
            'id_kabupatens' => $this->request->getVar('id_kabupatens'),
            'id_kecamatans' => $this->request->getVar('id_kecamatans'),
            'id_desas' => $this->request->getVar('id_desas'),
            'id_pekerjaans1' => $this->request->getVar('id_pekerjaans1'),
            'id_pekerjaans2' => $this->request->getVar('id_pekerjaans2'),
            'id_pekerjaans3' => $this->request->getVar('id_pekerjaans3'),
            'foto' => $namaFile,
            'active' => $this->request->getVar('active'),
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
        $rules['nik'] = 'required';
        unset($rules['created_by']);
        if ($foto == '') {
            unset($rules['foto']);
        }
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $currUser = $this->user->currLogin();
        // $currDesa = $this->desa->currDesa($findData['id_desas']);
        if ($currUser['desa'] != 'admin') {
            // if ($currUser['desa'] != $currDesa['desa']) return $this->fail('desa not allowed');
            return $this->fail('user not allowed');
        }

        $data = [
            'nik' => $this->request->getVar('nik'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'id_data_nkks' => $this->request->getVar('id_data_nkks'),
            'id_agamas' => $this->request->getVar('id_agamas'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'id_golongan_darahs' => $this->request->getVar('id_golongan_darahs'),
            'id_pendidikans' => $this->request->getVar('id_pendidikans'),
            'id_status_hub_dlm_kels' => $this->request->getVar('id_status_hub_dlm_kels'),
            'id_kewarganegaraans' => $this->request->getVar('id_kewarganegaraans'),
            'id_jenis_kelamins' => $this->request->getVar('id_jenis_kelamins'),
            'id_provinsis' => $this->request->getVar('id_provinsis'),
            'id_kabupatens' => $this->request->getVar('id_kabupatens'),
            'id_kecamatans' => $this->request->getVar('id_kecamatans'),
            'id_desas' => $this->request->getVar('id_desas'),
            'id_pekerjaans1' => $this->request->getVar('id_pekerjaans1'),
            'id_pekerjaans2' => $this->request->getVar('id_pekerjaans2'),
            'id_pekerjaans3' => $this->request->getVar('id_pekerjaans3'),
            'active' => $this->request->getVar('active'),
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

        $currUser = $this->user->currLogin();
        // $currDesa = $this->desa->currDesa($findData['id_desas']);
        if ($currUser['desa'] != 'admin') {
            // if ($currUser['desa'] != $currDesa['desa']) return $this->fail('desa not allowed');
            return $this->fail('user not allowed');
        }

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

    public function find($key, $limit = 0, $offset = 0)
    {
        if (str_contains($key, '@')) {
            $keys = explode("@", $key);
            if (str_contains($key, 'nama_lengkap')) $where = "nama_lengkap LIKE '%$keys[1]%'";
            if (str_contains($key, 'nik')) $where = "nik LIKE '%$keys[1]%'";
            if (str_contains($key, 'pekerjaans1')) $where = "id_pekerjaans1 = '$keys[1]'";
            if (str_contains($key, 'pekerjaans2')) $where = "id_pekerjaans2 = '$keys[1]'";
            if (str_contains($key, 'pekerjaans3')) $where = "id_pekerjaans3 = '$keys[1]'";
            if (str_contains($key, 'nkk')) {
                $data_nkksCrr = $this->db->table('data_nkks')
                    ->getWhere("nkk LIKE '%$keys[1]%'")
                    ->getResultArray();
                $data_nkksId = $data_nkksCrr[0]['id'];
                $where = "id_data_nkks = '$data_nkksId'";
            }
            if (str_contains($key, 'work')) {
                $pekerjaansCrr = $this->db->table('pekerjaans')
                    ->getWhere("pekerjaan LIKE '%$keys[1]%'")
                    ->getResultArray();
                $pekerjaansId = $pekerjaansCrr[0]['id'];
                $where = "id_pekerjaans1 = '$pekerjaansId'";
            }
            if (str_contains($key, 'pendidikan')) {
                $pendidikansCrr = $this->db->table('pendidikans')
                    ->getWhere("pendidikan LIKE '%$keys[1]%'")
                    ->getResultArray();
                $pendidikansId = $pendidikansCrr[0]['id'];
                $where = "id_pendidikans = '$pendidikansId'";
            }
            if (str_contains($key, 'rtrw')) {
                $data_rt_rwsCrr = $this->db->table('rt_rws')
                    ->getWhere("rt_rw LIKE '%$keys[1]%'")
                    ->getResultArray();
                $data_rt_rwId = $data_rt_rwsCrr[0]['id'];

                $data_nkksCrr = $this->db->table('data_nkks')
                    ->getWhere("id_rt_rws = '$data_rt_rwId'")
                    ->getResultArray();

                $wheres = [];
                foreach ($data_nkksCrr as $key => $value) {
                    $valueId = $value['id'];
                    $wheres[] = "id_data_nkks = '$valueId'";
                }
                $wheresnya = implode(" OR ", $wheres);
                $where = "$wheresnya";
            }
        } else {
            $where = null;
        }

        // $currUser = $this->user->currLogin();
        // if ($currUser['desa'] != 'admin') {
        //     $currDesa = $currUser['desa'];
        //     $desasCrr = $this->db->table('desas')
        //         ->getWhere("desa = '$currDesa'")
        //         ->getResultArray();
        //     $desaId = $desasCrr[0]['id'];
        //     $where = "id_desas = '$desaId'";
        // }


        $data_penduduks = $this->db->table('data_penduduks')
            ->orderBy('data_penduduks.id', 'DESC')
            ->getWhere($where, $limit, $offset)
            ->getResultArray();

        $data_nkks = $this->db->table('data_nkks')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($data_nkks as $data_nkk) {
                if ($data_penduduk['id_data_nkks'] == $data_nkk['id']) {
                    $data_penduduks[$key]['nkk'] = $data_nkk['nkk'];
                }
            }
        }

        $agamas = $this->db->table('agamas')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($agamas as $agama) {
                if ($data_penduduk['id_agamas'] == $agama['id']) {
                    $data_penduduks[$key]['agama'] = $agama['agama'];
                }
            }
        }

        $golongan_darahs = $this->db->table('golongan_darahs')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($golongan_darahs as $golongan_darah) {
                if ($data_penduduk['id_golongan_darahs'] == $golongan_darah['id']) {
                    $data_penduduks[$key]['golongan_darah'] = $golongan_darah['golongan_darah'];
                }
            }
        }

        $pendidikans = $this->db->table('pendidikans')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($pendidikans as $pendidikan) {
                if ($data_penduduk['id_pendidikans'] == $pendidikan['id']) {
                    $data_penduduks[$key]['pendidikan'] = $pendidikan['pendidikan'];
                }
            }
        }

        $pendidikans = $this->db->table('pendidikans')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($pendidikans as $pendidikan) {
                if ($data_penduduk['id_pendidikans'] == $pendidikan['id']) {
                    $data_penduduks[$key]['pendidikan'] = $pendidikan['pendidikan'];
                }
            }
        }

        $status_hub_dlm_kels = $this->db->table('status_hub_dlm_kels')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($status_hub_dlm_kels as $status_hub_dlm_kel) {
                if ($data_penduduk['id_status_hub_dlm_kels'] == $status_hub_dlm_kel['id']) {
                    $data_penduduks[$key]['status_hub_dlm_kel'] = $status_hub_dlm_kel['status_hub_dlm_kel'];
                }
            }
        }

        $kewarganegaraans = $this->db->table('kewarganegaraans')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($kewarganegaraans as $kewarganegaraan) {
                if ($data_penduduk['id_kewarganegaraans'] == $kewarganegaraan['id']) {
                    $data_penduduks[$key]['kewarganegaraan'] = $kewarganegaraan['kewarganegaraan'];
                }
            }
        }

        $jenis_kelamins = $this->db->table('jenis_kelamins')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($jenis_kelamins as $jenis_kelamin) {
                if ($data_penduduk['id_jenis_kelamins'] == $jenis_kelamin['id']) {
                    $data_penduduks[$key]['jenis_kelamin'] = $jenis_kelamin['jenis_kelamin'];
                }
            }
        }

        $provinsis = $this->db->table('provinsis')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($provinsis as $provinsi) {
                if ($data_penduduk['id_provinsis'] == $provinsi['id']) {
                    $data_penduduks[$key]['provinsi'] = $provinsi['provinsi'];
                }
            }
        }

        $kabupatens = $this->db->table('kabupatens')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($kabupatens as $kabupaten) {
                if ($data_penduduk['id_kabupatens'] == $kabupaten['id']) {
                    $data_penduduks[$key]['kabupaten'] = $kabupaten['kabupaten'];
                }
            }
        }

        $kecamatans = $this->db->table('kecamatans')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($kecamatans as $kecamatan) {
                if ($data_penduduk['id_kecamatans'] == $kecamatan['id']) {
                    $data_penduduks[$key]['kecamatan'] = $kecamatan['kecamatan'];
                }
            }
        }

        $desas = $this->db->table('desas')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($desas as $desa) {
                if ($data_penduduk['id_desas'] == $desa['id']) {
                    $data_penduduks[$key]['desa'] = $desa['desa'];
                }
            }
        }

        $pekerjaans1 = $this->db->table('pekerjaans')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($pekerjaans1 as $pekerjaan1) {
                if ($data_penduduk['id_pekerjaans1'] == $pekerjaan1['id']) {
                    $data_penduduks[$key]['pekerjaan1'] = $pekerjaan1['pekerjaan'];
                }
            }
        }

        $pekerjaans2 = $this->db->table('pekerjaans')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($pekerjaans2 as $pekerjaan2) {
                if ($data_penduduk['id_pekerjaans2'] == $pekerjaan2['id']) {
                    $data_penduduks[$key]['pekerjaan2'] = $pekerjaan2['pekerjaan'];
                }
            }
        }

        $pekerjaans3 = $this->db->table('pekerjaans')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($pekerjaans3 as $pekerjaan3) {
                if ($data_penduduk['id_pekerjaans3'] == $pekerjaan3['id']) {
                    $data_penduduks[$key]['pekerjaan3'] = $pekerjaan3['pekerjaan'];
                }
            }
        }

        return $this->respond($data_penduduks);
    }
}
