<?php

namespace App\Controllers\Backend;

use App\Libraries\GetDesa;
use App\Libraries\GetUser;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class DataWilayahs extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\DataWilayahsModel';
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

        $aset_prasarana_ekonomi = '';
        if ($this->request->getVar('nama_aset_prasarana_ekonomi') == [""]) return $this->fail('The nama_aset_prasarana_ekonomi value is not null');
        if ($this->request->getVar('jumlah_aset_prasarana_ekonomi') == [""]) return $this->fail('The jumlah_aset_prasarana_ekonomi value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_ekonomi') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_ekonomi') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_ekonomi .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_ibadah = '';
        if ($this->request->getVar('nama_aset_prasarana_ibadah') == [""]) return $this->fail('The nama_aset_prasarana_ibadah value is not null');
        if ($this->request->getVar('jumlah_aset_prasarana_ibadah') == [""]) return $this->fail('The jumlah_aset_prasarana_ibadah value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_ibadah') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_ibadah') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_ibadah .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_kesehatan = '';
        if ($this->request->getVar('nama_aset_prasarana_kesehatan') == [""]) return $this->fail('The nama_aset_prasarana_kesehatan value is not null');
        if ($this->request->getVar('jumlah_aset_prasarana_kesehatan') == [""]) return $this->fail('The jumlah_aset_prasarana_kesehatan value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_kesehatan') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_kesehatan') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_kesehatan .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_pemerintahan_desa = '';
        if ($this->request->getVar('nama_aset_prasarana_pemerintahan_desa') == [""]) return $this->fail('The nama_aset_prasarana_pemerintahan_desa value is not null');
        if ($this->request->getVar('jumlah_aset_prasarana_pemerintahan_desa') == [""]) return $this->fail('The jumlah_aset_prasarana_pemerintahan_desa value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_pemerintahan_desa') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_pemerintahan_desa') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_pemerintahan_desa .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_pendidikan = '';
        if ($this->request->getVar('nama_aset_prasarana_pendidikan') == [""]) return $this->fail('The nama_aset_prasarana_pendidikan value is not null');
        if ($this->request->getVar('jumlah_aset_prasarana_pendidikan') == [""]) return $this->fail('The jumlah_aset_prasarana_pendidikan value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_pendidikan') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_pendidikan') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_pendidikan .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_umum = '';
        if ($this->request->getVar('nama_aset_prasarana_umum') == [""]) return $this->fail('The nama_aset_prasarana_umum value is not null');
        if ($this->request->getVar('jumlah_aset_prasarana_umum') == [""]) return $this->fail('The jumlah_aset_prasarana_umum value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_umum') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_umum') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_umum .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $lembaga_pelayanan = '';
        if ($this->request->getVar('nama_lembaga_pelayanan') == [""]) return $this->fail('The nama_lembaga_pelayanan value is not null');
        if ($this->request->getVar('jumlah_lembaga_pelayanan') == [""]) return $this->fail('The jumlah_lembaga_pelayanan value is not null');
        foreach ($this->request->getVar('nama_lembaga_pelayanan') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_lembaga_pelayanan') as $k => $jumlah) {
                if ($k === $key) {
                    $lembaga_pelayanan .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $kebiasaan = '';
        if ($this->request->getVar('nama_kebiasaan') == [""]) return $this->fail('The nama_kebiasaan value is not null');
        if ($this->request->getVar('ket_kebiasaan') == [""]) return $this->fail('The ket_kebiasaan value is not null');
        foreach ($this->request->getVar('nama_kebiasaan') as $key => $nama) {
            foreach ($this->request->getVar('ket_kebiasaan') as $k => $ket) {
                if ($k === $key) {
                    $kebiasaan .= $nama . '[' . $ket . ']|';
                }
            }
        }
        $sumber_daya_milik_warga = '';
        if ($this->request->getVar('nama_sumber_daya_milik_warga') == [""]) return $this->fail('The nama_sumber_daya_milik_warga value is not null');
        if ($this->request->getVar('jumlah_sumber_daya_milik_warga') == [""]) return $this->fail('The jumlah_sumber_daya_milik_warga value is not null');
        foreach ($this->request->getVar('nama_sumber_daya_milik_warga') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_sumber_daya_milik_warga') as $k => $jumlah) {
                if ($k === $key) {
                    $sumber_daya_milik_warga .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $sumber_daya_alam = '';
        if ($this->request->getVar('nama_sumber_daya_alam') == [""]) return $this->fail('The nama_sumber_daya_alam value is not null');
        if ($this->request->getVar('ket_sumber_daya_alam') == [""]) return $this->fail('The ket_sumber_daya_alam value is not null');
        foreach ($this->request->getVar('nama_sumber_daya_alam') as $key => $nama) {
            foreach ($this->request->getVar('ket_sumber_daya_alam') as $k => $ket) {
                if ($k === $key) {
                    $sumber_daya_alam .= $nama . '[' . $ket . ']|';
                }
            }
        }

        $data = [
            'id_provinsis' => $this->request->getVar('id_provinsis'),
            'id_kabupatens' => $this->request->getVar('id_kabupatens'),
            'id_kecamatans' => $this->request->getVar('id_kecamatans'),
            'id_desas' => $this->request->getVar('id_desas'),
            'aset_prasarana_ekonomi' => $aset_prasarana_ekonomi,
            'aset_prasarana_ibadah' => $aset_prasarana_ibadah,
            'aset_prasarana_kesehatan' => $aset_prasarana_kesehatan,
            'aset_prasarana_pemerintahan_desa' => $aset_prasarana_pemerintahan_desa,
            'aset_prasarana_pendidikan' => $aset_prasarana_pendidikan,
            'aset_prasarana_umum' => $aset_prasarana_umum,
            'lembaga_pelayanan' => $lembaga_pelayanan,
            'kebiasaan' => $kebiasaan,
            'sumber_daya_milik_warga' => $sumber_daya_milik_warga,
            'sumber_daya_alam' => $sumber_daya_alam,
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

        $rules = $this->model->myValidationRules;
        unset($rules['id_provinsis'], $rules['id_kabupatens'], $rules['id_kecamatans'], $rules['id_desas']);
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $aset_prasarana_ekonomi = '';
        if ($this->request->getVar('nama_aset_prasarana_ekonomi') == [""]) return $this->fail('The nama_aset_prasarana_ekonomi value is not null');
        if ($this->request->getVar('jumlah_aset_prasarana_ekonomi') == [""]) return $this->fail('The jumlah_aset_prasarana_ekonomi value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_ekonomi') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_ekonomi') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_ekonomi .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_ibadah = '';
        if ($this->request->getVar('nama_aset_prasarana_ibadah') == [""]) return $this->fail('The nama_aset_prasarana_ibadah value is not null');
        if ($this->request->getVar('jumlah_aset_prasarana_ibadah') == [""]) return $this->fail('The jumlah_aset_prasarana_ibadah value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_ibadah') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_ibadah') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_ibadah .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_kesehatan = '';
        if ($this->request->getVar('nama_aset_prasarana_kesehatan') == [""]) return $this->fail('The nama_aset_prasarana_kesehatan value is not null');
        if ($this->request->getVar('jumlah_aset_prasarana_kesehatan') == [""]) return $this->fail('The jumlah_aset_prasarana_kesehatan value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_kesehatan') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_kesehatan') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_kesehatan .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_pemerintahan_desa = '';
        if ($this->request->getVar('nama_aset_prasarana_pemerintahan_desa') == [""]) return $this->fail('The nama_aset_prasarana_pemerintahan_desa value is not null');
        if ($this->request->getVar('jumlah_aset_prasarana_pemerintahan_desa') == [""]) return $this->fail('The jumlah_aset_prasarana_pemerintahan_desa value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_pemerintahan_desa') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_pemerintahan_desa') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_pemerintahan_desa .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_pendidikan = '';
        if ($this->request->getVar('nama_aset_prasarana_pendidikan') == [""]) return $this->fail('The nama_aset_prasarana_pendidikan value is not null');
        if ($this->request->getVar('jumlah_aset_prasarana_pendidikan') == [""]) return $this->fail('The jumlah_aset_prasarana_pendidikan value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_pendidikan') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_pendidikan') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_pendidikan .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_umum = '';
        if ($this->request->getVar('nama_aset_prasarana_umum') == [""]) return $this->fail('The nama_aset_prasarana_umum value is not null');
        if ($this->request->getVar('jumlah_aset_prasarana_umum') == [""]) return $this->fail('The jumlah_aset_prasarana_umum value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_umum') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_umum') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_umum .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $lembaga_pelayanan = '';
        if ($this->request->getVar('nama_lembaga_pelayanan') == [""]) return $this->fail('The nama_lembaga_pelayanan value is not null');
        if ($this->request->getVar('jumlah_lembaga_pelayanan') == [""]) return $this->fail('The jumlah_lembaga_pelayanan value is not null');
        foreach ($this->request->getVar('nama_lembaga_pelayanan') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_lembaga_pelayanan') as $k => $jumlah) {
                if ($k === $key) {
                    $lembaga_pelayanan .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $kebiasaan = '';
        if ($this->request->getVar('nama_kebiasaan') == [""]) return $this->fail('The nama_kebiasaan value is not null');
        if ($this->request->getVar('ket_kebiasaan') == [""]) return $this->fail('The ket_kebiasaan value is not null');
        foreach ($this->request->getVar('nama_kebiasaan') as $key => $nama) {
            foreach ($this->request->getVar('ket_kebiasaan') as $k => $ket) {
                if ($k === $key) {
                    $kebiasaan .= $nama . '[' . $ket . ']|';
                }
            }
        }
        $sumber_daya_milik_warga = '';
        if ($this->request->getVar('nama_sumber_daya_milik_warga') == [""]) return $this->fail('The nama_sumber_daya_milik_warga value is not null');
        if ($this->request->getVar('jumlah_sumber_daya_milik_warga') == [""]) return $this->fail('The jumlah_sumber_daya_milik_warga value is not null');
        foreach ($this->request->getVar('nama_sumber_daya_milik_warga') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_sumber_daya_milik_warga') as $k => $jumlah) {
                if ($k === $key) {
                    $sumber_daya_milik_warga .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $sumber_daya_alam = '';
        if ($this->request->getVar('nama_sumber_daya_alam') == [""]) return $this->fail('The nama_sumber_daya_alam value is not null');
        if ($this->request->getVar('ket_sumber_daya_alam') == [""]) return $this->fail('The ket_sumber_daya_alam value is not null');
        foreach ($this->request->getVar('nama_sumber_daya_alam') as $key => $nama) {
            foreach ($this->request->getVar('ket_sumber_daya_alam') as $k => $ket) {
                if ($k === $key) {
                    $sumber_daya_alam .= $nama . '[' . $ket . ']|';
                }
            }
        }

        $data = [
            'aset_prasarana_ekonomi' => $aset_prasarana_ekonomi,
            'aset_prasarana_ibadah' => $aset_prasarana_ibadah,
            'aset_prasarana_kesehatan' => $aset_prasarana_kesehatan,
            'aset_prasarana_pemerintahan_desa' => $aset_prasarana_pemerintahan_desa,
            'aset_prasarana_pendidikan' => $aset_prasarana_pendidikan,
            'aset_prasarana_umum' => $aset_prasarana_umum,
            'lembaga_pelayanan' => $lembaga_pelayanan,
            'kebiasaan' => $kebiasaan,
            'sumber_daya_milik_warga' => $sumber_daya_milik_warga,
            'sumber_daya_alam' => $sumber_daya_alam,
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

        $currUser = $this->user->currLogin();
        $currDesa = $this->desa->currDesa($findData('id_desas'));
        if ($currUser['desa'] != 'admin') {
            if ($currUser['desa'] != $currDesa['desa']) return $this->fail('desa not allowed');
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

        $data_wilayahs = $this->db->table('data_wilayahs')
            ->orderBy('data_wilayahs.id', 'DESC')
            ->getWhere($where, $limit, $offset)
            ->getResultArray();

        $provinsis = $this->db->table('provinsis')
            ->get()
            ->getResultArray();

        foreach ($data_wilayahs as $key => $data_wilayah) {
            foreach ($provinsis as $provinsi) {
                if ($data_wilayah['id_provinsis'] == $provinsi['id']) {
                    $data_wilayahs[$key]['provinsi'] = $provinsi['provinsi'];
                }
            }
        }

        $kabupatens = $this->db->table('kabupatens')
            ->get()
            ->getResultArray();

        foreach ($data_wilayahs as $key => $data_wilayah) {
            foreach ($kabupatens as $kabupaten) {
                if ($data_wilayah['id_kabupatens'] == $kabupaten['id']) {
                    $data_wilayahs[$key]['kabupaten'] = $kabupaten['kabupaten'];
                }
            }
        }

        $kecamatans = $this->db->table('kecamatans')
            ->get()
            ->getResultArray();

        foreach ($data_wilayahs as $key => $data_wilayah) {
            foreach ($kecamatans as $kecamatan) {
                if ($data_wilayah['id_kecamatans'] == $kecamatan['id']) {
                    $data_wilayahs[$key]['kecamatan'] = $kecamatan['kecamatan'];
                }
            }
        }

        $desas = $this->db->table('desas')
            ->get()
            ->getResultArray();

        foreach ($data_wilayahs as $key => $data_wilayah) {
            foreach ($desas as $desa) {
                if ($data_wilayah['id_desas'] == $desa['id']) {
                    $data_wilayahs[$key]['desa'] = $desa['desa'];
                }
            }
        }

        return $this->respond($data_wilayahs);
    }
}
