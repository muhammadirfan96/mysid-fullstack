<?php

namespace App\Models;

use CodeIgniter\Model;

class DataNkksModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data_nkks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nkk',
        'id_tingkat_kesejahteraans',
        'id_sumber_penghasilan_utamas',
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
        'nkk' => 'required|is_unique[data_nkks.nkk]',
        'id_tingkat_kesejahteraans' => 'required|is_not_unique[tingkat_kesejahteraans.id]',
        'id_sumber_penghasilan_utamas' => 'required|is_not_unique[sumber_penghasilan_utamas.id]',
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
