<?php

namespace App\Controllers\Mpdf;

use App\Controllers\BaseController;
use App\Models\DataPenduduksModel;
use Config\Database;
use Mpdf\Mpdf;

class Mysid extends BaseController
{
    protected $db, $dataPenduduksModel;
    public function __construct()
    {
        $this->db = Database::connect();
        $this->dataPenduduksModel = new DataPenduduksModel();
    }
    public function data_penduduks($where)
    {
        $data_penduduks = $this->db->table('data_penduduks')
            ->orderBy('data_penduduks.id', 'DESC')
            ->getWhere($where)
            ->getResultArray();

        $agamas = $this->db->table('agamas')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($agamas as $agama) {
                if ($data_penduduk['id_agamas'] == $agama['id']) {
                    $data_penduduks[$key]['agama'] = $agama['agama'];
                }
            }
        }

        $status_hub_dlm_kels = $this->db->table('status_hub_dlm_kels')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($status_hub_dlm_kels as $status_hub_dlm_kel) {
                if ($data_penduduk['id_status_hub_dlm_kels'] == $status_hub_dlm_kel['id']) {
                    $data_penduduks[$key]['status_hub_dlm_kel'] = $status_hub_dlm_kel['status_hub_dlm_kel'];
                }
            }
        }

        $jenis_kelamins = $this->db->table('jenis_kelamins')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($jenis_kelamins as $jenis_kelamin) {
                if ($data_penduduk['id_jenis_kelamins'] == $jenis_kelamin['id']) {
                    $data_penduduks[$key]['jenis_kelamin'] = $jenis_kelamin['jenis_kelamin'];
                }
            }
        }

        $pekerjaans1 = $this->db->table('pekerjaans')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($pekerjaans1 as $pekerjaan1) {
                if ($data_penduduk['id_pekerjaans1'] == $pekerjaan1['id']) {
                    $data_penduduks[$key]['pekerjaan1'] = $pekerjaan1['pekerjaan'];
                }
            }
        }

        $golongan_darahs = $this->db->table('golongan_darahs')
            ->get()
            ->getResultArray();

        foreach ($data_penduduks as $key => $data_penduduk) {
            foreach ($golongan_darahs as $golongan_darah) {
                if ($data_penduduk['id_golongan_darahs'] == $golongan_darah['id']) {
                    $data_penduduks[$key]['golongan_darah'] = $golongan_darah['golongan_darah'];
                }
            }
        }

        return $data_penduduks;
    }

    public function suket_kenal_lahir()
    {
        $mpdf = new Mpdf();

        $id_nkk = $this->request->getVar('nkk');
        $data_nkks = $this->db->table('data_nkks')
            ->getWhere("id = '$id_nkk'")
            ->getResultArray()[0];

        $filter_ayah = "id_data_nkks = '$id_nkk' AND id_status_hub_dlm_kels = '1' AND id_jenis_kelamins = '1'";
        $filter_ibu = "id_data_nkks = '$id_nkk' AND id_status_hub_dlm_kels = '2' AND id_jenis_kelamins = '2'";

        $data_ayah = $this->data_penduduks($filter_ayah)[0];
        $data_ibu = $this->data_penduduks($filter_ibu)[0];

        $data = [
            'nama_ayah' => $data_ayah['nama_lengkap'],
            'ttl_ayah' => $data_ayah['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data_ayah['tanggal_lahir'])),
            'agama_ayah' => $data_ayah['agama'],
            'pekerjaan_ayah' => $data_ayah['pekerjaan1'],
            'nik_ayah' => $data_ayah['nik'],
            'alamat_ayah' => $data_nkks['alamat_lengkap'],
            'nama_ibu' => $data_ibu['nama_lengkap'],
            'ttl_ibu' => $data_ibu['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data_ibu['tanggal_lahir'])),
            'agama_ibu' => $data_ibu['agama'],
            'pekerjaan_ibu' => $data_ibu['pekerjaan1'],
            'nik_ibu' => $data_ibu['nik'],
            'alamat_ibu' => $data_nkks['alamat_lengkap'],
            'nama_anak' => $this->request->getVar('nama_anak'),
            'ttl_anak' => $this->request->getVar('ttl_anak'),
            'jk_anak' => $this->request->getVar('jk_anak'),
            'anak_ke' => $this->request->getVar('anak_ke'),
            'alamat_anak' => $this->request->getVar('alamat_anak'),
            'nomor_surat' => $this->request->getVar('nomor_surat'),
            'tanggal' => date("d-m-Y", strtotime($this->request->getVar('tanggal'))),
            'oleh' => $this->request->getVar('oleh'),
        ];

        $this->response->setContentType("application/pdf");
        $mpdf->WriteHTML(view('mpdf/suket_kenal_lahir', $data));
        return $mpdf->Output('suket_kenal_lahir.pdf', "D");
    }

    public function suket_tidak_mampu()
    {
        $mpdf = new Mpdf();

        $id_data_penduduk = $this->request->getVar('penduduk');
        $filter_anak = "id = '$id_data_penduduk'";
        $data_anak = $this->data_penduduks($filter_anak)[0];

        $id_nkk = $data_anak['id_data_nkks'];
        $data_nkks = $this->db->table('data_nkks')
            ->getWhere("id = '$id_nkk'")
            ->getResultArray()[0];

        $filter_ayah = "id_data_nkks = '$id_nkk' AND id_status_hub_dlm_kels = '1' AND id_jenis_kelamins = '1'";
        $filter_ibu = "id_data_nkks = '$id_nkk' AND id_status_hub_dlm_kels = '2' AND id_jenis_kelamins = '2'";

        $data_ayah = $this->data_penduduks($filter_ayah)[0];
        $data_ibu = $this->data_penduduks($filter_ibu)[0];

        $data = [
            'nama' => $data_anak['nama_lengkap'],
            'ttl' => $data_anak['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data_anak['tanggal_lahir'])),
            'jk' => $data_anak['jenis_kelamin'],
            'agama' => $data_anak['agama'],
            'pekerjaan' => $data_anak['pekerjaan1'],
            'nama_ayah' => $data_ayah['nama_lengkap'],
            'nama_ibu' => $data_ibu['nama_lengkap'],
            'alamat' => $data_nkks['alamat_lengkap'],
            'nomor_surat' => $this->request->getVar('nomor_surat'),
            'tanggal' => date("d-m-Y", strtotime($this->request->getVar('tanggal'))),
            'oleh' => $this->request->getVar('oleh'),
        ];

        $this->response->setContentType("application/pdf");
        $mpdf->WriteHTML(view('mpdf/suket_tidak_mampu', $data));
        return $mpdf->Output('suket_tidak_mampu.pdf', "D");
    }

    public function suket_domisili()
    {
        $mpdf = new Mpdf();

        $id_data_penduduk = $this->request->getVar('penduduk');
        $filter_anak = "id = '$id_data_penduduk'";
        $data_anak = $this->data_penduduks($filter_anak)[0];

        $id_nkk = $data_anak['id_data_nkks'];
        $data_nkks = $this->db->table('data_nkks')
            ->getWhere("id = '$id_nkk'")
            ->getResultArray()[0];

        $data = [
            'nama' => $data_anak['nama_lengkap'],
            'nik' => $data_anak['nik'],
            'ttl' => $data_anak['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data_anak['tanggal_lahir'])),
            'jk' => $data_anak['jenis_kelamin'],
            'alamat' => $data_nkks['alamat_lengkap'],
            'nomor_surat' => $this->request->getVar('nomor_surat'),
            'tanggal' => date("d-m-Y", strtotime($this->request->getVar('tanggal'))),
            'oleh' => $this->request->getVar('oleh'),
        ];

        $this->response->setContentType("application/pdf");
        $mpdf->WriteHTML(view('mpdf/suket_domisili', $data));
        return $mpdf->Output('suket_domisili.pdf', "I");
    }

    public function suket_usaha()
    {
        $mpdf = new Mpdf();

        $id_data_penduduk = $this->request->getVar('penduduk');
        $filter_penduduk = "id = '$id_data_penduduk'";
        $data_penduduk = $this->data_penduduks($filter_penduduk)[0];

        $id_nkk = $data_penduduk['id_data_nkks'];
        $data_nkks = $this->db->table('data_nkks')
            ->getWhere("id = '$id_nkk'")
            ->getResultArray()[0];

        $data = [
            'nama' => $data_penduduk['nama_lengkap'],
            'ttl' => $data_penduduk['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data_penduduk['tanggal_lahir'])),
            'jk' => $data_penduduk['jenis_kelamin'],
            'agama' => $data_penduduk['agama'],
            'pekerjaan' => $data_penduduk['pekerjaan1'],
            'alamat' => $data_nkks['alamat_lengkap'],
            'nama_usaha' => $this->request->getVar('nama_usaha'),
            'nomor_surat' => $this->request->getVar('nomor_surat'),
            'tanggal' => date("d-m-Y", strtotime($this->request->getVar('tanggal'))),
            'oleh' => $this->request->getVar('oleh'),
        ];

        $this->response->setContentType("application/pdf");
        $mpdf->WriteHTML(view('mpdf/suket_usaha', $data));
        return $mpdf->Output('suket_usaha.pdf', "D");
    }

    public function suket_belum_menikah()
    {
        $mpdf = new Mpdf();

        $id_data_penduduk = $this->request->getVar('penduduk');
        $filter_penduduk = "id = '$id_data_penduduk'";
        $data_penduduk = $this->data_penduduks($filter_penduduk)[0];

        $id_nkk = $data_penduduk['id_data_nkks'];
        $data_nkks = $this->db->table('data_nkks')
            ->getWhere("id = '$id_nkk'")
            ->getResultArray()[0];

        $data = [
            'nama' => $data_penduduk['nama_lengkap'],
            'nik' => $data_penduduk['nik'],
            'ttl' => $data_penduduk['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data_penduduk['tanggal_lahir'])),
            'jk' => $data_penduduk['jenis_kelamin'],
            'pekerjaan' => $data_penduduk['pekerjaan1'],
            'alamat' => $data_nkks['alamat_lengkap'],
            'nomor_surat' => $this->request->getVar('nomor_surat'),
            'tanggal' => date("d-m-Y", strtotime($this->request->getVar('tanggal'))),
            'oleh' => $this->request->getVar('oleh'),
        ];

        $this->response->setContentType("application/pdf");
        $mpdf->WriteHTML(view('mpdf/suket_belum_menikah', $data));
        return $mpdf->Output('suket_belum_menikah.pdf', "I");
    }

    public function suket_di_luar_daerah()
    {
        $mpdf = new Mpdf();

        $id_data_penduduk = $this->request->getVar('penduduk');
        $filter_penduduk = "id = '$id_data_penduduk'";
        $data_penduduk = $this->data_penduduks($filter_penduduk)[0];

        $id_nkk = $data_penduduk['id_data_nkks'];
        $data_nkks = $this->db->table('data_nkks')
            ->getWhere("id = '$id_nkk'")
            ->getResultArray()[0];

        $data = [
            'nama' => $data_penduduk['nama_lengkap'],
            'ttl' => $data_penduduk['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data_penduduk['tanggal_lahir'])),
            'jk' => $data_penduduk['jenis_kelamin'],
            'pekerjaan' => $data_penduduk['pekerjaan1'],
            'alamat' => $data_nkks['alamat_lengkap'],
            'keperluan' => $this->request->getVar('keperluan'),
            'nomor_surat' => $this->request->getVar('nomor_surat'),
            'tanggal' => date("d-m-Y", strtotime($this->request->getVar('tanggal'))),
            'oleh' => $this->request->getVar('oleh'),
        ];

        $this->response->setContentType("application/pdf");
        $mpdf->WriteHTML(view('mpdf/suket_di_luar_daerah', $data));
        return $mpdf->Output('suket_di_luar_daerah.pdf', "I");
    }

    public function suket_pengantar_kk()
    {
        $mpdf = new Mpdf();

        $id_data_penduduk = $this->request->getVar('penduduk');
        $filter_penduduk = "id = '$id_data_penduduk'";
        $data_penduduk = $this->data_penduduks($filter_penduduk)[0];

        $id_nkk = $data_penduduk['id_data_nkks'];
        $data_nkks = $this->db->table('data_nkks')
            ->getWhere("id = '$id_nkk'")
            ->getResultArray()[0];

        $id_data_istri = $this->request->getVar('penduduk_istri');
        $filter_istri = "id = '$id_data_istri'";
        $data_istri = $this->data_penduduks($filter_istri)[0];

        $data = [
            'nama_suami' => $data_penduduk['nama_lengkap'],
            'nik_suami' => $data_penduduk['nik'],
            'ttl_suami' => $data_penduduk['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data_penduduk['tanggal_lahir'])),
            'jk_suami' => $data_penduduk['jenis_kelamin'],
            'agama_suami' => $data_penduduk['agama'],
            'pekerjaan_suami' => $data_penduduk['pekerjaan1'],
            'golongan_darah_suami' => $data_penduduk['golongan_darah'],
            'alamat_suami' => $data_nkks['alamat_lengkap'],
            'nama_istri' => $data_istri['nama_lengkap'],
            'nik_istri' => $data_istri['nik'],
            'ttl_istri' => $data_istri['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data_istri['tanggal_lahir'])),
            'jk_istri' => $data_istri['jenis_kelamin'],
            'nomor_surat' => $this->request->getVar('nomor_surat'),
            'tanggal' => date("d-m-Y", strtotime($this->request->getVar('tanggal'))),
            'oleh' => $this->request->getVar('oleh'),
        ];

        $this->response->setContentType("application/pdf");
        $mpdf->WriteHTML(view('mpdf/suket_pengantar_kk', $data));
        return $mpdf->Output('suket_pengantar_kk.pdf', "I");
    }

    public function suket_pengantar_ktp()
    {
        $mpdf = new Mpdf();

        $id_data_penduduk = $this->request->getVar('penduduk');
        $filter_penduduk = "id = '$id_data_penduduk'";
        $data_penduduk = $this->data_penduduks($filter_penduduk)[0];

        $id_nkk = $data_penduduk['id_data_nkks'];
        $data_nkks = $this->db->table('data_nkks')
            ->getWhere("id = '$id_nkk'")
            ->getResultArray()[0];

        $data = [
            'nama' => $data_penduduk['nama_lengkap'],
            'nik' => $data_penduduk['nik'],
            'ttl' => $data_penduduk['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data_penduduk['tanggal_lahir'])),
            'jk' => $data_penduduk['jenis_kelamin'],
            'agama' => $data_penduduk['agama'],
            'pekerjaan' => $data_penduduk['pekerjaan1'],
            'golongan_darah' => $data_penduduk['golongan_darah'],
            'alamat' => $data_nkks['alamat_lengkap'],
            'nomor_surat' => $this->request->getVar('nomor_surat'),
            'tanggal' => date("d-m-Y", strtotime($this->request->getVar('tanggal'))),
            'oleh' => $this->request->getVar('oleh'),
        ];

        $this->response->setContentType("application/pdf");
        $mpdf->WriteHTML(view('mpdf/suket_pengantar_ktp', $data));
        return $mpdf->Output('suket_pengantar_ktp.pdf', "I");
    }

    public function suket_pengantar_pindah_domisili()
    {
        $mpdf = new Mpdf();

        $id_data_penduduk = $this->request->getVar('id_data_penduduk');
        $filter_penduduk = "id = '$id_data_penduduk'";
        $data_penduduk = $this->data_penduduks($filter_penduduk)[0];

        $id_nkk = $data_penduduk['id_data_nkks'];
        $data_nkks = $this->db->table('data_nkks')
            ->getWhere("id = '$id_nkk'")
            ->getResultArray()[0];

        $pengikut = [];
        $data_pengikut = $this->request->getVar('data_pengikut');
        if ($data_pengikut) {
            foreach ($data_pengikut as $value) {
                $pengikut[] =  explode("|", $value);
            }
        }

        $data = [
            'nama' => $data_penduduk['nama_lengkap'],
            'nik' => $data_penduduk['nik'],
            'ttl' => $data_penduduk['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data_penduduk['tanggal_lahir'])),
            'jk' => $data_penduduk['jenis_kelamin'],
            'agama' => $data_penduduk['agama'],
            'alamat' => $data_nkks['alamat_lengkap'],
            'nkk' => $data_nkks['nkk'],
            'alamat_tujuan_pindah' => $this->request->getVar('alamat_tujuan_pindah'),
            'alasan_pindah' => $this->request->getVar('alasan_pindah'),
            'jml_pengikut' => count($pengikut),
            'pengikut' => $pengikut,
            'nomor_surat' => $this->request->getVar('nomor_surat'),
            'tanggal' => date("d-m-Y", strtotime($this->request->getVar('tanggal'))),
            'oleh' => $this->request->getVar('oleh'),
        ];

        $this->response->setContentType("application/pdf");
        $mpdf->WriteHTML(view('mpdf/suket_pengantar_pindah_domisili', $data));
        return $mpdf->Output('suket_pengantar_ktp.pdf', "I");
    }
}
