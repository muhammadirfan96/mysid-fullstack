<?php

namespace App\Models;

use CodeIgniter\Model;

class ResumeDataPenduduksModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'resume_data_penduduks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'jumlah_penduduk',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'umur_kurang_dari_1',
        'umur_1_sd_4',
        'umur_5_sd_14',
        'umur_15_sd_39',
        'umur_40_sd_65',
        'umur_lebih_dari_65',
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
        'jumlah_penduduk'  => 'required',
        'jumlah_laki_laki'  => 'required',
        'jumlah_perempuan'  => 'required',
        'umur_kurang_dari_1'  => 'required',
        'umur_1_sd_4'  => 'required',
        'umur_5_sd_14'  => 'required',
        'umur_15_sd_39'  => 'required',
        'umur_40_sd_65'  => 'required',
        'umur_lebih_dari_65'  => 'required',
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
