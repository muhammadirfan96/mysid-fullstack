<?php

namespace App\Controllers\Backend;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class KategoriBeritas extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\KategoriBeritasModel';
    protected $format    = 'json';

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

            $kategori_berita = $this->request->getGet('kategori_berita') ?? '';

            // Membangun objek filter untuk query
            $filter = [];
            if ($kategori_berita !== '') {
                $filter['kategori_berita LIKE'] = "%$kategori_berita%";
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

    public function find($key, $limit = 0, $offset = 0)
    {
        $where = "kategori_berita LIKE '%$key%'";
        $data = $this->model->where($where)->orderBy('id', 'DESC')->findAll($limit, $offset);
        if ($key == '*') $data = $this->model->orderBy('id', 'DESC')->findAll($limit, $offset);
        return $this->respond($data);
    }
}
