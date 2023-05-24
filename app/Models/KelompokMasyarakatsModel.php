<?php

namespace App\Models;

use CodeIgniter\Model;

class KelompokMasyarakatsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kelompok_masyarakats';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_provinsis',
        'id_kabupatens',
        'id_kecamatans',
        'id_desas',
        'kelompok_masyarakat',
        'created_by',
        'updated_by',
    ];

    // Dates
    protected $useTimestamps = false;
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
        'id_desas' => 'required|is_not_unique[desas.id]',
        'kelompok_masyarakat' => 'required',
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
