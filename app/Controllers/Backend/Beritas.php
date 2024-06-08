<?php

namespace App\Controllers\Backend;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Beritas extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\BeritasModel';
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
        try {
            $limit = $this->request->getGet('limit') ?? 20;
            $page = $this->request->getGet('page') ?? 1;
            $offset = $limit * $page - $limit;

            $judul = $this->request->getGet('judul') ?? '';
            $id_kategori_beritas = $this->request->getGet('id_kategori_beritas') ?? '';
            $active = $this->request->getGet('active') ?? '';
            $created_at = $this->request->getGet('created_at') ?? '';

            // Membangun objek filter untuk query
            $filter = [];
            if ($judul !== '') {
                $filter['judul LIKE'] = "%$judul%";
            }
            if ($id_kategori_beritas !== '') {
                $filter['id_kategori_beritas LIKE'] = "%$id_kategori_beritas%";
            }
            if ($active !== '') {
                $filter['active LIKE'] = "%$active%";
            }

            if ($created_at !== '') {
                $created_atRange = explode('@', $created_at);
                if (count($created_atRange) === 2) {
                    $filter['created_at >='] = $created_atRange[0];
                    $filter['created_at <='] = $created_atRange[1];
                }
            }

            // Menambahkan filter tambahan berdasarkan peran pengguna,
            // $user = $this->user->currLogin();
            // if ($user['desa'] !== 'admin') {
            //     $filter['created_by ='] = $user['desa'];
            // }

            // Menghitung total dokumen yang sesuai
            $all_data = $this->model->where($filter)->countAllResults(false);

            // Mengambil data dengan pagination
            $data = $this->model->where($filter)
                ->orderBy('id', 'desc')
                ->findAll($limit, $offset);

            $result = [
                'all_data' => $all_data,
                'all_page' => ceil($all_data / $limit),
                'crr_page' => $page,
                'data' => $data,
            ];

            return $this->respond($result);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
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
        // $currUser = $this->user->currLogin();
        // if ($currUser['desa'] != 'admin') return $this->fail('desa not allowed');

        helper(['form']);

        $rules = $this->model->myValidationRules;
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $foto = $this->request->getFile('foto');
        $namaFile = $foto->getRandomName();
        $foto->move('img/berita', $namaFile);

        $data = [
            'judul' => $this->request->getVar('judul'),
            'paragraf' => $this->request->getVar('paragraf'),
            'id_kategori_beritas' => $this->request->getVar('id_kategori_beritas'),
            'active' => $this->request->getVar('active'),
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
        // $currUser = $this->user->currLogin();
        // if ($currUser['desa'] != 'admin') return $this->fail('desa not allowed');

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
            'judul' => $this->request->getVar('judul'),
            'paragraf' => $this->request->getVar('paragraf'),
            'id_kategori_beritas' => $this->request->getVar('id_kategori_beritas'),
            'active' => $this->request->getVar('active'),
            'updated_by' => $this->request->getVar('updated_by'),
        ];

        if ($foto != '') {
            $namaFile = $foto->getRandomName();
            $data['foto'] = $namaFile;
            if (file_exists('img/berita/' . $findData['foto'])) {
                unlink('img/berita/' . $findData['foto']);
            }
            $foto->move('img/berita', $namaFile);
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
        // $currUser = $this->user->currLogin();
        // if ($currUser['desa'] != 'admin') return $this->fail('desa not allowed');

        $findData = $this->model->find($id);
        if (!$findData) return $this->failNotFound('no data found');

        if (file_exists('img/berita/' . $findData['foto'])) {
            unlink('img/berita/' . $findData['foto']);
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
            if (str_contains($key, 'judul')) $where = "judul LIKE '%$keys[1]%'";
            if (str_contains($key, 'kategori_berita')) {
                $kategori_beritasCrr = $this->db->table('kategori_beritas')
                    ->getWhere("kategori_berita LIKE '%$keys[1]%'")
                    ->getResultArray();
                $kategori_beritaId = $kategori_beritasCrr[0]['id'];
                $where = "id_kategori_beritas = '$kategori_beritaId'";
            }
        } else {
            $where = null;
        }

        $beritas = $this->db->table('beritas')
            ->orderBy('beritas.id', 'DESC')
            ->getWhere($where, $limit, $offset)
            ->getResultArray();

        $kategori_beritas = $this->db->table('kategori_beritas')
            ->get()
            ->getResultArray();

        foreach ($beritas as $key => $berita) {
            foreach ($kategori_beritas as $kategori_berita) {
                if ($berita['id_kategori_beritas'] == $kategori_berita['id']) {
                    $beritas[$key]['kategori_berita'] = $kategori_berita['kategori_berita'];
                }
            }
        }

        return $this->respond($beritas);
    }
}
