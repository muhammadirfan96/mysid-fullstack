<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPenduduksModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data_penduduks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
    'nik',
    'id_data_nkks',
    'id_agama',
    'id_golongan_darahs',
    'id_pendidikans',
    'id_status_hub_dlm_kels',
    'id_kewarganegaraans',
    'id_jenis_kelamins',
    'id_provinsis',
    'id_kabupatens',
    'id_kecamatans',
    'id_desas',
    'alamat_lengkap',
    'pekerjaan',
    'foto',
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
