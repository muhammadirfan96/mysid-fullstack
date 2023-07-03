<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'beritas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul',
        'paragraf',
        'foto',
        'id_kategori_beritas',
        'active',
        'created_by',
        'updated_by',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    public $myValidationRules = [
        'judul' => 'required',
        'paragraf' => 'required',
        'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        'id_kategori_beritas' => 'required',
        'active' => 'required',
        'created_by' => 'required',
        'updated_by' => 'required',
    ];

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
