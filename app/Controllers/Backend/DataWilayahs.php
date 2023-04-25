<?php

namespace App\Controllers\Backend;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class DataWilayahs extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\DataWilayahsModel';
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

        $aset_prasarana_ekonomi = '';
        if (!is_array($this->request->getVar('nama_aset_prasarana_ekonomi')) || $this->request->getVar('nama_aset_prasarana_ekonomi') == [""]) return $this->fail('The nama_aset_prasarana_ekonomi key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_aset_prasarana_ekonomi')) || $this->request->getVar('jumlah_aset_prasarana_ekonomi') == [""]) return $this->fail('The jumlah_aset_prasarana_ekonomi key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_ekonomi') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_ekonomi') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_ekonomi .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_ibadah = '';
        if (!is_array($this->request->getVar('nama_aset_prasarana_ibadah')) || $this->request->getVar('nama_aset_prasarana_ibadah') == [""]) return $this->fail('The nama_aset_prasarana_ibadah key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_aset_prasarana_ibadah')) || $this->request->getVar('jumlah_aset_prasarana_ibadah') == [""]) return $this->fail('The jumlah_aset_prasarana_ibadah key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_ibadah') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_ibadah') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_ibadah .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_kesehatan = '';
        if (!is_array($this->request->getVar('nama_aset_prasarana_kesehatan')) || $this->request->getVar('nama_aset_prasarana_kesehatan') == [""]) return $this->fail('The nama_aset_prasarana_kesehatan key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_aset_prasarana_kesehatan')) || $this->request->getVar('jumlah_aset_prasarana_kesehatan') == [""]) return $this->fail('The jumlah_aset_prasarana_kesehatan key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_kesehatan') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_kesehatan') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_kesehatan .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_pemerintahan_desa = '';
        if (!is_array($this->request->getVar('nama_aset_prasarana_pemerintahan_desa')) || $this->request->getVar('nama_aset_prasarana_pemerintahan_desa') == [""]) return $this->fail('The nama_aset_prasarana_pemerintahan_desa key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_aset_prasarana_pemerintahan_desa')) || $this->request->getVar('jumlah_aset_prasarana_pemerintahan_desa') == [""]) return $this->fail('The jumlah_aset_prasarana_pemerintahan_desa key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_pemerintahan_desa') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_pemerintahan_desa') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_pemerintahan_desa .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_pendidikan = '';
        if (!is_array($this->request->getVar('nama_aset_prasarana_pendidikan')) || $this->request->getVar('nama_aset_prasarana_pendidikan') == [""]) return $this->fail('The nama_aset_prasarana_pendidikan key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_aset_prasarana_pendidikan')) || $this->request->getVar('jumlah_aset_prasarana_pendidikan') == [""]) return $this->fail('The jumlah_aset_prasarana_pendidikan key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_pendidikan') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_pendidikan') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_pendidikan .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_umum = '';
        if (!is_array($this->request->getVar('nama_aset_prasarana_umum')) || $this->request->getVar('nama_aset_prasarana_umum') == [""]) return $this->fail('The nama_aset_prasarana_umum key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_aset_prasarana_umum')) || $this->request->getVar('jumlah_aset_prasarana_umum') == [""]) return $this->fail('The jumlah_aset_prasarana_umum key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_umum') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_umum') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_umum .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $lembaga_pelayanan = '';
        if (!is_array($this->request->getVar('nama_lembaga_pelayanan')) || $this->request->getVar('nama_lembaga_pelayanan') == [""]) return $this->fail('The nama_lembaga_pelayanan key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_lembaga_pelayanan')) || $this->request->getVar('jumlah_lembaga_pelayanan') == [""]) return $this->fail('The jumlah_lembaga_pelayanan key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_lembaga_pelayanan') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_lembaga_pelayanan') as $k => $jumlah) {
                if ($k === $key) {
                    $lembaga_pelayanan .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $kebiasaan = '';
        if (!is_array($this->request->getVar('nama_kebiasaan')) || $this->request->getVar('nama_kebiasaan') == [""]) return $this->fail('The nama_kebiasaan key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('ket_kebiasaan')) || $this->request->getVar('ket_kebiasaan') == [""]) return $this->fail('The ket_kebiasaan key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_kebiasaan') as $key => $nama) {
            foreach ($this->request->getVar('ket_kebiasaan') as $k => $ket) {
                if ($k === $key) {
                    $kebiasaan .= $nama . '[' . $ket . ']|';
                }
            }
        }
        $sumber_daya_milik_warga = '';
        if (!is_array($this->request->getVar('nama_sumber_daya_milik_warga')) || $this->request->getVar('nama_sumber_daya_milik_warga') == [""]) return $this->fail('The nama_sumber_daya_milik_warga key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_sumber_daya_milik_warga')) || $this->request->getVar('jumlah_sumber_daya_milik_warga') == [""]) return $this->fail('The jumlah_sumber_daya_milik_warga key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_sumber_daya_milik_warga') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_sumber_daya_milik_warga') as $k => $jumlah) {
                if ($k === $key) {
                    $sumber_daya_milik_warga .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $sumber_daya_alam = '';
        if (!is_array($this->request->getVar('nama_sumber_daya_alam')) || $this->request->getVar('nama_sumber_daya_alam') == [""]) return $this->fail('The nama_sumber_daya_alam key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('ket_sumber_daya_alam')) || $this->request->getVar('ket_sumber_daya_alam') == [""]) return $this->fail('The ket_sumber_daya_alam key (not value) is most array or value is not null');
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

        helper(['form']);

        $rules = $this->model->myValidationRules;
        unset($rules['id_provinsis'], $rules['id_kabupatens'], $rules['id_kecamatans'], $rules['id_desas']);
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $aset_prasarana_ekonomi = '';
        if (!is_array($this->request->getVar('nama_aset_prasarana_ekonomi')) || $this->request->getVar('nama_aset_prasarana_ekonomi') == [""]) return $this->fail('The nama_aset_prasarana_ekonomi key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_aset_prasarana_ekonomi')) || $this->request->getVar('jumlah_aset_prasarana_ekonomi') == [""]) return $this->fail('The jumlah_aset_prasarana_ekonomi key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_ekonomi') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_ekonomi') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_ekonomi .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_ibadah = '';
        if (!is_array($this->request->getVar('nama_aset_prasarana_ibadah')) || $this->request->getVar('nama_aset_prasarana_ibadah') == [""]) return $this->fail('The nama_aset_prasarana_ibadah key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_aset_prasarana_ibadah')) || $this->request->getVar('jumlah_aset_prasarana_ibadah') == [""]) return $this->fail('The jumlah_aset_prasarana_ibadah key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_ibadah') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_ibadah') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_ibadah .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_kesehatan = '';
        if (!is_array($this->request->getVar('nama_aset_prasarana_kesehatan')) || $this->request->getVar('nama_aset_prasarana_kesehatan') == [""]) return $this->fail('The nama_aset_prasarana_kesehatan key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_aset_prasarana_kesehatan')) || $this->request->getVar('jumlah_aset_prasarana_kesehatan') == [""]) return $this->fail('The jumlah_aset_prasarana_kesehatan key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_kesehatan') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_kesehatan') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_kesehatan .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_pemerintahan_desa = '';
        if (!is_array($this->request->getVar('nama_aset_prasarana_pemerintahan_desa')) || $this->request->getVar('nama_aset_prasarana_pemerintahan_desa') == [""]) return $this->fail('The nama_aset_prasarana_pemerintahan_desa key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_aset_prasarana_pemerintahan_desa')) || $this->request->getVar('jumlah_aset_prasarana_pemerintahan_desa') == [""]) return $this->fail('The jumlah_aset_prasarana_pemerintahan_desa key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_pemerintahan_desa') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_pemerintahan_desa') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_pemerintahan_desa .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_pendidikan = '';
        if (!is_array($this->request->getVar('nama_aset_prasarana_pendidikan')) || $this->request->getVar('nama_aset_prasarana_pendidikan') == [""]) return $this->fail('The nama_aset_prasarana_pendidikan key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_aset_prasarana_pendidikan')) || $this->request->getVar('jumlah_aset_prasarana_pendidikan') == [""]) return $this->fail('The jumlah_aset_prasarana_pendidikan key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_pendidikan') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_pendidikan') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_pendidikan .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $aset_prasarana_umum = '';
        if (!is_array($this->request->getVar('nama_aset_prasarana_umum')) || $this->request->getVar('nama_aset_prasarana_umum') == [""]) return $this->fail('The nama_aset_prasarana_umum key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_aset_prasarana_umum')) || $this->request->getVar('jumlah_aset_prasarana_umum') == [""]) return $this->fail('The jumlah_aset_prasarana_umum key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_aset_prasarana_umum') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_aset_prasarana_umum') as $k => $jumlah) {
                if ($k === $key) {
                    $aset_prasarana_umum .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $lembaga_pelayanan = '';
        if (!is_array($this->request->getVar('nama_lembaga_pelayanan')) || $this->request->getVar('nama_lembaga_pelayanan') == [""]) return $this->fail('The nama_lembaga_pelayanan key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_lembaga_pelayanan')) || $this->request->getVar('jumlah_lembaga_pelayanan') == [""]) return $this->fail('The jumlah_lembaga_pelayanan key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_lembaga_pelayanan') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_lembaga_pelayanan') as $k => $jumlah) {
                if ($k === $key) {
                    $lembaga_pelayanan .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $kebiasaan = '';
        if (!is_array($this->request->getVar('nama_kebiasaan')) || $this->request->getVar('nama_kebiasaan') == [""]) return $this->fail('The nama_kebiasaan key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('ket_kebiasaan')) || $this->request->getVar('ket_kebiasaan') == [""]) return $this->fail('The ket_kebiasaan key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_kebiasaan') as $key => $nama) {
            foreach ($this->request->getVar('ket_kebiasaan') as $k => $ket) {
                if ($k === $key) {
                    $kebiasaan .= $nama . '[' . $ket . ']|';
                }
            }
        }
        $sumber_daya_milik_warga = '';
        if (!is_array($this->request->getVar('nama_sumber_daya_milik_warga')) || $this->request->getVar('nama_sumber_daya_milik_warga') == [""]) return $this->fail('The nama_sumber_daya_milik_warga key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('jumlah_sumber_daya_milik_warga')) || $this->request->getVar('jumlah_sumber_daya_milik_warga') == [""]) return $this->fail('The jumlah_sumber_daya_milik_warga key (not value) is most array or value is not null');
        foreach ($this->request->getVar('nama_sumber_daya_milik_warga') as $key => $nama) {
            foreach ($this->request->getVar('jumlah_sumber_daya_milik_warga') as $k => $jumlah) {
                if ($k === $key) {
                    $sumber_daya_milik_warga .= $nama . '[' . $jumlah . ' unit]|';
                }
            }
        }
        $sumber_daya_alam = '';
        if (!is_array($this->request->getVar('nama_sumber_daya_alam')) || $this->request->getVar('nama_sumber_daya_alam') == [""]) return $this->fail('The nama_sumber_daya_alam key (not value) is most array or value is not null');
        if (!is_array($this->request->getVar('ket_sumber_daya_alam')) || $this->request->getVar('ket_sumber_daya_alam') == [""]) return $this->fail('The ket_sumber_daya_alam key (not value) is most array or value is not null');
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

    public function find($key = null, $limit = 0, $offset = 0)
    {
        $keys = explode("@", $key);
        if (str_contains($key, 'provinsi')) {
            $where = "id_provinsis = '$keys[1]'";
        }
        if (str_contains($key, 'kabupaten')) {
            $where = "id_kabupatens = '$keys[1]'";
        }
        if (str_contains($key, 'kecamatan')) {
            $where = "id_kecamatans = '$keys[1]'";
        }
        if (str_contains($key, 'desa')) {
            $where = "id_desas = '$keys[1]'";
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
