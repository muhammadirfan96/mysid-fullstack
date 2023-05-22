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
        'nama_lengkap',
        'id_data_nkks',
        'id_agamas',
        'tempat_lahir',
        'tanggal_lahir',
        'id_golongan_darahs',
        'id_pendidikans',
        'id_status_hub_dlm_kels',
        'id_kewarganegaraans',
        'id_jenis_kelamins',
        'id_provinsis',
        'id_kabupatens',
        'id_kecamatans',
        'id_desas',
        'pekerjaan',
        'foto',
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
        'nik' => 'required|is_unique[data_penduduks.nik]',
        'nama_lengkap' => 'required',
        'id_data_nkks' => 'required|is_not_unique[data_nkks.id]',
        'id_agamas' => 'required|is_not_unique[agamas.id]',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'id_golongan_darahs' => 'required|is_not_unique[golongan_darahs.id]',
        'id_pendidikans' => 'required|is_not_unique[pendidikans.id]',
        'id_status_hub_dlm_kels' => 'required|is_not_unique[status_hub_dlm_kels.id]',
        'id_kewarganegaraans' => 'required|is_not_unique[kewarganegaraans.id]',
        'id_jenis_kelamins' => 'required|is_not_unique[jenis_kelamins.id]',
        'id_provinsis' => 'required|is_not_unique[provinsis.id]',
        'id_kabupatens' => 'required|is_not_unique[kabupatens.id]',
        'id_kecamatans' => 'required|is_not_unique[kecamatans.id]',
        'id_desas' => 'required|is_not_unique[desas.id]',
        'pekerjaan' => 'required',
        'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
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
