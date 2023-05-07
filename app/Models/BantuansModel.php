<?php

namespace App\Models;

use CodeIgniter\Model;

class BantuansModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bantuans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_provinsis',
        'id_kabupatens',
        'id_kecamatans',
        'id_desas',
        'bantuan',
        'sumber',
        'penerima',
        'jumlah',
        'satuan',
        'foto',
        'waktu_terima',
        'ket',
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
        'id_provinsis' => 'required|is_not_unique[provinsis.id]',
        'id_kabupatens' => 'required|is_not_unique[kabupatens.id]',
        'id_kecamatans' => 'required|is_not_unique[kecamatans.id]',
        'id_desas' => 'required|is_not_unique[desas.id]|',
        'bantuan' => 'required',
        'sumber' => 'required',
        'penerima' => 'required',
        'jumlah' => 'required|integer',
        'satuan' => 'required',
        'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        'waktu_terima' => 'required',
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
