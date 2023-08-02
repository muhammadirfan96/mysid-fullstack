<?= $this->extend('index_admin'); ?>
<?= $this->section('page'); ?>

<div>
    <div class="bg-cyan-200 rounded-md m-2 p-2 relative">
        <div class="absolute right-0">
            <button onclick="open_modal_resume()" class="text-2xl mr-2 text-cyan-700" type="button">
                <i class="bi-menu-button-wide-fill"></i>
            </button>
        </div>
        <p class="text-center text-lg font-semibold uppercase"><?= $title; ?></p>
    </div>

    <div class="m-2">
        <!-- >>>> modal tambah/update data -->
        <div id="modal_form" class="fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10">
            <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[50%] my-4 max-h-[95%] mx-auto overflow-auto">
                <button class="absolute right-1 top-0" onclick="close_modal()" type="button"><i class="bi-x-square-fill text-red-700 rounded-md text-xl"></i></button>
                <p class="text-center font-medium text-lg" id="head_form"></p>
                <div class="bg-red-50 rounded-md p-1 my-1 text-xs italic text-red-700 border border-red-900" id="err_msg"></div>
                <form class="mt-2" enctype="multipart/form-data" id="form_input">
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan nik" type="text" id="nik" autocomplete="off">

                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan nama_lengkap" type="text" id="nama_lengkap" autocomplete="off">

                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan tempat_lahir" type="text" id="tempat_lahir" autocomplete="off">

                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan tanggal_lahir" type="date" id="tanggal_lahir" autocomplete="off">

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="data_nkk"></select>
                        <input id="cari_nkk" class="w-[50%] p-1 mb-2 outline-none border border-l-0 border-cyan-500 rounded-r-md text-sm" type="text" placeholder="cari_nkk" onkeyup="generate_isi_option_select_data_nkk()" autocomplete="off">
                    </div>

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="agama"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_agama()">show agama</button>
                    </div>

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="golongan_darah"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_golongan_darah()">show golongan_darah</button>
                    </div>

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="pendidikan"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_pendidikan()">show pendidikan</button>
                    </div>

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="status_hub_dlm_kel"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_status_hub_dlm_kel()">show status_hub_dlm_kel</button>
                    </div>

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="kewarganegaraan"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_kewarganegaraan()">show kewarganegaraan</button>
                    </div>

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="jenis_kelamin"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_jenis_kelamin()">show jenis_kelamin</button>
                    </div>

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="pekerjaan1"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_pekerjaan1()">show pekerjaan1</button>
                    </div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="pekerjaan2"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_pekerjaan2()">show pekerjaan2</button>
                    </div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="pekerjaan3"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_pekerjaan3()">show pekerjaan3</button>
                    </div>

                    <div class="flex flex-wrap my-2">
                        <div>
                            <label class="p-1 border border-cyan-500 rounded-md" for="foto">foto</label>
                            <input type="file" id="foto" onchange="generate_img_preview()">
                        </div>
                        <img class="w-24 h-24 rounded-full" id="img_preview">
                    </div>

                    <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">submit</button>
                </form>
            </div>
        </div>

        <!-- modal resume -->
        <div id="modal_resume" class="fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10" style="display: none;">
            <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[70%] lg:w-[60%] my-4 max-h-[95%] mx-auto overflow-auto">
                <button class="absolute right-1 top-0" onclick="close_modal_resume()" type="button"><i class="bi-x-square-fill text-red-700 rounded-md text-xl"></i></button>
                <p class="text-center font-medium text-lg" id="head_resume">Resume</p>
                <div class="m-2 flex flex-wrap gap-1 justify-between">
                    <div class="w-full md:w-[32%]">
                        <table class="w-full">
                            <tr>
                                <table class="w-full">
                                    <tr>
                                        <td colspan="2" class="text-cyan-900 uppercase text-base underline">total</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[60%]">jumlah penduduk</td>
                                        <td id="jumlah_penduduk" class="w-[40%] text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>jumlah laki laki</td>
                                        <td id="jumlah_laki_laki" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>jumlah perempuan</td>
                                        <td id="jumlah_perempuan" class="text-right">0 orang</td>
                                    </tr>
                                </table>
                            </tr>
                            <tr>
                                <table class="w-full">
                                    <tr>
                                        <td colspan="2" class="text-cyan-900 uppercase text-base underline">klasifikasi berdasarkan KK</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[60%]">jumlah kk</td>
                                        <td id="jumlah_kk" class="w-[40%] text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>kk laki laki</td>
                                        <td id="jumlah_kk_laki_laki" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>kk perempuan</td>
                                        <td id="jumlah_kk_perempuan" class="text-right">0 orang</td>
                                    </tr>
                                </table>
                            </tr>
                            <tr>
                                <table class="w-full">
                                    <tr>
                                        <td colspan="2" class="text-cyan-900 uppercase text-base underline">klasifikasi berdasarkan usia</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[60%]">dibawah 1 tahun</td>
                                        <td id="umur_kurang_dari_1" class="w-[40%] text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>1 sampai 4 tahun</td>
                                        <td id="umur_1_sd_4" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>5 sampai 14 tahun</td>
                                        <td id="umur_5_sd_14" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>15 sampai 16 tahun</td>
                                        <td id="umur_15_sd_17" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>17 sampai 39 tahun</td>
                                        <td id="umur_18_sd_39" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>40 sampai 64 tahun</td>
                                        <td id="umur_40_sd_65" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>diatas 65 tahun</td>
                                        <td id="umur_lebih_dari_65" class="text-right">0 orang</td>
                                    </tr>
                                </table>
                            </tr>
                        </table>
                    </div>
                    <div class="w-full md:w-[32%]">
                        <table class="w-full">
                            <tr>
                                <table class="w-full">
                                    <tr>
                                        <td colspan="2" class="text-cyan-900 uppercase text-base underline">klasifikasi berdasarkan pekerjaan</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[60%]">PNS</td>
                                        <td id="pns" class="w-[40%] text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>karyawan_honorer</td>
                                        <td id="karyawan_honorer" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>petani</td>
                                        <td id="petani" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>peternak</td>
                                        <td id="peternak" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>pedagang</td>
                                        <td id="pedagang" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>nelayan</td>
                                        <td id="nelayan" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>teknisi</td>
                                        <td id="teknisi" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>tukang</td>
                                        <td id="tukang" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td id="kosong" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>ibu_rumah_tangga</td>
                                        <td id="ibu_rumah_tangga" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>pelajar</td>
                                        <td id="pelajar" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>pekerja_lepas</td>
                                        <td id="pekerja_lepas" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>karyawan_swasta</td>
                                        <td id="karyawan_swasta" class="text-right">0 orang</td>
                                    </tr>
                                </table>
                            </tr>
                        </table>
                    </div>
                    <div class="w-full md:w-[32%]">
                        <table class="w-full">
                            <tr>
                                <table class="w-full">
                                    <tr>
                                        <td colspan="2" class="text-cyan-900 uppercase text-base underline">klasifikasi berdasarkan pendidikan</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[60%]">sdtt</td>
                                        <td id="sdtt" class="w-[40%] text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>tk</td>
                                        <td id="tk" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>sd</td>
                                        <td id="sd" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>smp</td>
                                        <td id="smp" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>sma</td>
                                        <td id="sma" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>s1</td>
                                        <td id="s1" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>s2</td>
                                        <td id="s2" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>s3</td>
                                        <td id="s3" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>belum_sekolah</td>
                                        <td id="belum_sekolah" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>d1</td>
                                        <td id="d1" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>d2</td>
                                        <td id="d2" class="text-right">0 orang</td>
                                    </tr>
                                    <tr>
                                        <td>d3</td>
                                        <td id="d3" class="text-right">0 orang</td>
                                    </tr>
                                </table>
                            </tr>
                        </table>
                    </div>
                </div>
                <button onclick="save_resume()" class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full">save</button>
            </div>
        </div>

        <div class="flex flex-wrap justify-evenly">
            <div class="w-[42%] md:w-[23%] border-2 border-cyan-700 rounded-md m-2 text-cyan-700">
                <!-- tombol tambah data -->
                <button class="p-2 outline-none w-full" onclick="show_tambah()" type="button">+ tambah data</button>
            </div>

            <div class="w-[42%] md:w-[23%] border-2 border-cyan-700 rounded-md m-2 text-cyan-700">
                <!-- >>>> cari data -->
                <input class="p-2 outline-none w-full" onkeyup="update_page()" key type="text" id="key_pencarian" value="*" placeholder="key_pencarian" autocomplete="off" autofocus>
            </div>

            <div class="w-[42%] md:w-[23%] overflow-auto border-2 border-cyan-700 rounded-md m-2 p-2 text-cyan-700 text-center">
                <!-- pagination -->
                <select class="outline-none" onchange="update_page()" id="per_page">
                    <option value="5">5</option>
                    <option selected value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
                per page
            </div>

            <div class="w-[42%] md:w-[23%] flex overflow-auto border-2 border-cyan-700 rounded-md m-2 p-2 text-cyan-700 text-center" id="page_list">
                <!-- isi page list -->
            </div>
        </div>

        <!-- tabel data -->
        <div class="overflow-auto">
            <table cellpadding="5" class="w-full">
                <thead class="bg-cyan-100 p-1 border-b-2">
                    <tr>
                        <th width="1%">action</th>
                        <th>foto</th>
                        <th>nik</th>
                        <th>nama lengkap</th>
                        <th>nkk</th>
                        <th>tempat lahir</th>
                        <th>tanggal lahir</th>
                        <th>agama</th>
                        <th>gol. darah</th>
                        <th>pendidikan</th>
                        <th>status hub dlm kel</th>
                        <th>kewarganegaraan</th>
                        <th>jenis kelamin</th>
                        <th>provinsi</th>
                        <th>kabupaten</th>
                        <th>kecamatan</th>
                        <th>desa</th>
                        <th>pekerjaan1</th>
                        <th>pekerjaan2</th>
                        <th>pekerjaan3</th>
                        <th>created_at</th>
                        <th>created_by</th>
                        <th>updated_at</th>
                        <th>updated_by</th>
                    </tr>
                </thead>
                <tbody class="border-b-2 text-center" id="tbody"></tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const api = '<?= base_url('/datapenduduks') ?>'
    const api_data_nkk = '<?= base_url('/datankks') ?>'
    const api_agama = '<?= base_url('/agamas') ?>'
    const api_golongan_darah = '<?= base_url('/golongandarahs') ?>'
    const api_pendidikan = '<?= base_url('/pendidikans') ?>'
    const api_status_hub_dlm_kel = '<?= base_url('/statushubdlmkels') ?>'
    const api_kewarganegaraan = '<?= base_url('/kewarganegaraans') ?>'
    const api_jenis_kelamin = '<?= base_url('/jeniskelamins') ?>'
    const api_provinsi = '<?= base_url('/provinsis') ?>'
    const api_kabupaten = '<?= base_url('/kabupatens') ?>'
    const api_kecamatan = '<?= base_url('/kecamatans') ?>'
    const api_desa = '<?= base_url('/desas') ?>'
    const api_pekerjaan = '<?= base_url('/pekerjaans') ?>'
    const api_resume_data_penduduk = '<?= base_url('/resumedatapenduduks') ?>'

    const nik = document.querySelector('#nik')
    const nama_lengkap = document.querySelector('#nama_lengkap')
    const data_nkk = document.querySelector('#data_nkk')
    const tempat_lahir = document.querySelector('#tempat_lahir')
    const tanggal_lahir = document.querySelector('#tanggal_lahir')
    const agama = document.querySelector('#agama')
    const golongan_darah = document.querySelector('#golongan_darah')
    const pendidikan = document.querySelector('#pendidikan')
    const status_hub_dlm_kel = document.querySelector('#status_hub_dlm_kel')
    const kewarganegaraan = document.querySelector('#kewarganegaraan')
    const jenis_kelamin = document.querySelector('#jenis_kelamin')
    const pekerjaan1 = document.querySelector('#pekerjaan1')
    const pekerjaan2 = document.querySelector('#pekerjaan2')
    const pekerjaan3 = document.querySelector('#pekerjaan3')
    const foto = document.querySelector('#foto')

    const modal_form = document.querySelector('#modal_form')
    const head_form = document.querySelector('#head_form')
    const err_msg = document.querySelector('#err_msg')
    const form_input = document.querySelector('#form_input')
    const key_pencarian = document.querySelector('#key_pencarian')
    const per_page = document.querySelector('#per_page')
    const page_list = document.querySelector('#page_list')
    const tbody = document.querySelector('#tbody')
    const img_preview = document.querySelector('#img_preview')

    const cari_nkk = document.querySelector('#cari_nkk')
    let crrDesa = ''

    const modal_resume = document.querySelector('#modal_resume')
    const head_resume = document.querySelector('#head_resume')
    const jumlah_penduduk = document.querySelector('#jumlah_penduduk')
    const jumlah_laki_laki = document.querySelector('#jumlah_laki_laki')
    const jumlah_perempuan = document.querySelector('#jumlah_perempuan')
    const umur_kurang_dari_1 = document.querySelector('#umur_kurang_dari_1')
    const umur_1_sd_4 = document.querySelector('#umur_1_sd_4')
    const umur_5_sd_14 = document.querySelector('#umur_5_sd_14')
    const umur_15_sd_17 = document.querySelector('#umur_15_sd_17')
    const umur_18_sd_39 = document.querySelector('#umur_18_sd_39')
    const umur_40_sd_65 = document.querySelector('#umur_40_sd_65')
    const umur_lebih_dari_65 = document.querySelector('#umur_lebih_dari_65')
    const jumlah_kk = document.querySelector('#jumlah_kk')
    const jumlah_kk_laki_laki = document.querySelector('#jumlah_kk_laki_laki')
    const jumlah_kk_perempuan = document.querySelector('#jumlah_kk_perempuan')

    const pns = document.querySelector('#pns')
    const karyawan_honorer = document.querySelector('#karyawan_honorer')
    const petani = document.querySelector('#petani')
    const peternak = document.querySelector('#peternak')
    const pedagang = document.querySelector('#pedagang')
    const nelayan = document.querySelector('#nelayan')
    const teknisi = document.querySelector('#teknisi')
    const tukang = document.querySelector('#tukang')
    const kosong = document.querySelector('#kosong')
    const ibu_rumah_tangga = document.querySelector('#ibu_rumah_tangga')
    const pelajar = document.querySelector('#pelajar')
    const pekerja_lepas = document.querySelector('#pekerja_lepas')
    const karyawan_swasta = document.querySelector('#karyawan_swasta')
    const sdtt = document.querySelector('#sdtt')
    const tk = document.querySelector('#tk')
    const sd = document.querySelector('#sd')
    const smp = document.querySelector('#smp')
    const sma = document.querySelector('#sma')
    const s1 = document.querySelector('#s1')
    const s2 = document.querySelector('#s2')
    const s3 = document.querySelector('#s3')
    const belum_sekolah = document.querySelector('#belum_sekolah')
    const d1 = document.querySelector('#d1')
    const d2 = document.querySelector('#d2')
    const d3 = document.querySelector('#d3')

    const save_resume = async () => {
        try {
            const formData = new FormData()
            formData.append('jumlah_penduduk', jumlah_penduduk.innerHTML)
            formData.append('jumlah_laki_laki', jumlah_laki_laki.innerHTML)
            formData.append('jumlah_perempuan', jumlah_perempuan.innerHTML)
            formData.append('umur_kurang_dari_1', umur_kurang_dari_1.innerHTML)
            formData.append('umur_1_sd_4', umur_1_sd_4.innerHTML)
            formData.append('umur_5_sd_14', umur_5_sd_14.innerHTML)
            formData.append('umur_15_sd_17', umur_15_sd_17.innerHTML)
            formData.append('umur_18_sd_39', umur_18_sd_39.innerHTML)
            formData.append('umur_40_sd_65', umur_40_sd_65.innerHTML)
            formData.append('umur_lebih_dari_65', umur_lebih_dari_65.innerHTML)
            formData.append('jumlah_kk', jumlah_kk.innerHTML)
            formData.append('jumlah_kk_laki_laki', jumlah_kk_laki_laki.innerHTML)
            formData.append('jumlah_kk_perempuan', jumlah_kk_perempuan.innerHTML)
            formData.append('pns', pns.innerHTML)
            formData.append('karyawan_honorer', karyawan_honorer.innerHTML)
            formData.append('petani', petani.innerHTML)
            formData.append('peternak', peternak.innerHTML)
            formData.append('pedagang', pedagang.innerHTML)
            formData.append('nelayan', nelayan.innerHTML)
            formData.append('teknisi', teknisi.innerHTML)
            formData.append('tukang', tukang.innerHTML)
            formData.append('kosong', kosong.innerHTML)
            formData.append('ibu_rumah_tangga', ibu_rumah_tangga.innerHTML)
            formData.append('pelajar', pelajar.innerHTML)
            formData.append('pekerja_lepas', pekerja_lepas.innerHTML)
            formData.append('karyawan_swasta', karyawan_swasta.innerHTML)
            formData.append('sdtt', sdtt.innerHTML)
            formData.append('tk', tk.innerHTML)
            formData.append('sd', sd.innerHTML)
            formData.append('smp', smp.innerHTML)
            formData.append('sma', sma.innerHTML)
            formData.append('s1', s1.innerHTML)
            formData.append('s2', s2.innerHTML)
            formData.append('s3', s3.innerHTML)
            formData.append('belum_sekolah', belum_sekolah.innerHTML)
            formData.append('d1', d1.innerHTML)
            formData.append('d2', d2.innerHTML)
            formData.append('d3', d3.innerHTML)
            formData.append('_method', 'PATCH')

            const response = await fetch(`${api_resume_data_penduduk}/1`, {
                method: 'POST',
                body: formData
            })

            const result = await response.json();
            if (result.status == 400) {
                close_modal_resume()
                errorAlert('ada kesalahan')
            } else if (result.status == 200) {
                close_modal_resume()
                successAlert(result.messages.success)
            }
        } catch (error) {
            console.error("Error:", error)
        }
    }


    const open_modal_resume = () => {
        modal_resume.style.display = ''
        isi_modal_resume()
    }
    const close_modal_resume = () => modal_resume.style.display = 'none'

    const isi_modal_resume = async () => {
        try {
            const response = await fetch(`${api}/find/${key_pencarian.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            if (result == null) alert('null')

            // berdasarkan jenis kelamin
            let total_jumlah_penduduk = 0
            let total_jumlah_laki_laki = 0
            let total_jumlah_perempuan = 0

            // berdasarkan umur
            let total_kurang_dari_1 = 0
            let total_1_sd_4 = 0
            let total_5_sd_14 = 0
            let total_15_sd_17 = 0
            let total_18_sd_39 = 0
            let total_40_sd_65 = 0
            let total_lebih_dari_65 = 0

            // berdasarkan KK
            let total_jumlah_kk = 0
            let total_jumlah_kk_perempuan = 0
            let total_jumlah_kk_laki_laki = 0

            // berdasarkan pekerjaan & pendidikan
            let total_pns = 0
            let total_karyawan_honorer = 0
            let total_petani = 0
            let total_peternak = 0
            let total_pedagang = 0
            let total_nelayan = 0
            let total_teknisi = 0
            let total_tukang = 0
            let total_kosong = 0
            let total_ibu_rumah_tangga = 0
            let total_pelajar = 0
            let total_pekerja_lepas = 0
            let total_karyawan_swasta = 0
            let total_sdtt = 0
            let total_tk = 0
            let total_sd = 0
            let total_smp = 0
            let total_sma = 0
            let total_s1 = 0
            let total_s2 = 0
            let total_s3 = 0
            let total_belum_sekolah = 0
            let total_d1 = 0
            let total_d2 = 0
            let total_d3 = 0

            const response_jenis_kelamin = await fetch(`${api_jenis_kelamin}/find/perempuan`)
            const result_jenis_kelamin = await response_jenis_kelamin.json()

            const response_status_hub_dlm_kels = await fetch(`${api_status_hub_dlm_kel}/find/kepala_keluarga`)
            const result_status_hub_dlm_kels = await response_status_hub_dlm_kels.json()

            const response_data_nkks = await fetch(`${api_data_nkk}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result_data_nkks = await response_data_nkks.json()

            const response_pekerjaan_pns = await fetch(`${api_pekerjaan}/find/pns`)
            const result_pekerjaan_pns = await response_pekerjaan_pns.json()

            const response_pekerjaan_karyawan_honorer = await fetch(`${api_pekerjaan}/find/karyawan_honorer`)
            const result_pekerjaan_karyawan_honorer = await response_pekerjaan_karyawan_honorer.json()

            const response_pekerjaan_petani = await fetch(`${api_pekerjaan}/find/petani`)
            const result_pekerjaan_petani = await response_pekerjaan_petani.json()

            const response_pekerjaan_peternak = await fetch(`${api_pekerjaan}/find/peternak`)
            const result_pekerjaan_peternak = await response_pekerjaan_peternak.json()

            const response_pekerjaan_pedagang = await fetch(`${api_pekerjaan}/find/pedagang`)
            const result_pekerjaan_pedagang = await response_pekerjaan_pedagang.json()

            const response_pekerjaan_nelayan = await fetch(`${api_pekerjaan}/find/nelayan`)
            const result_pekerjaan_nelayan = await response_pekerjaan_nelayan.json()

            const response_pekerjaan_teknisi = await fetch(`${api_pekerjaan}/find/teknisi`)
            const result_pekerjaan_teknisi = await response_pekerjaan_teknisi.json()

            const response_pekerjaan_tukang = await fetch(`${api_pekerjaan}/find/tukang_kayu_&_batu`)
            const result_pekerjaan_tukang = await response_pekerjaan_tukang.json()

            const response_pekerjaan_kosong = await fetch(`${api_pekerjaan}/find/-`)
            const result_pekerjaan_kosong = await response_pekerjaan_kosong.json()

            const response_pekerjaan_ibu_rumah_tangga = await fetch(`${api_pekerjaan}/find/ibu_rumah_tangga`)
            const result_pekerjaan_ibu_rumah_tangga = await response_pekerjaan_ibu_rumah_tangga.json()

            const response_pekerjaan_pelajar = await fetch(`${api_pekerjaan}/find/pelajar`)
            const result_pekerjaan_pelajar = await response_pekerjaan_pelajar.json()

            const response_pekerjaan_pekerja_lepas = await fetch(`${api_pekerjaan}/find/pekerja_lepas`)
            const result_pekerjaan_pekerja_lepas = await response_pekerjaan_pekerja_lepas.json()

            const response_pekerjaan_karyawan_swasta = await fetch(`${api_pekerjaan}/find/karyawan_swasta`)
            const result_pekerjaan_karyawan_swasta = await response_pekerjaan_karyawan_swasta.json()


            const response_pendidikan_sdtt = await fetch(`${api_pendidikan}/find/sdtt`)
            const result_pendidikan_sdtt = await response_pendidikan_sdtt.json()

            const response_pendidikan_tk = await fetch(`${api_pendidikan}/find/tk`)
            const result_pendidikan_tk = await response_pendidikan_tk.json()

            const response_pendidikan_sd = await fetch(`${api_pendidikan}/find/sd`)
            const result_pendidikan_sd = await response_pendidikan_sd.json()

            const response_pendidikan_smp = await fetch(`${api_pendidikan}/find/smp`)
            const result_pendidikan_smp = await response_pendidikan_smp.json()

            const response_pendidikan_sma = await fetch(`${api_pendidikan}/find/sma`)
            const result_pendidikan_sma = await response_pendidikan_sma.json()

            const response_pendidikan_s1 = await fetch(`${api_pendidikan}/find/s1`)
            const result_pendidikan_s1 = await response_pendidikan_s1.json()

            const response_pendidikan_s2 = await fetch(`${api_pendidikan}/find/s2`)
            const result_pendidikan_s2 = await response_pendidikan_s2.json()

            const response_pendidikan_s3 = await fetch(`${api_pendidikan}/find/s3`)
            const result_pendidikan_s3 = await response_pendidikan_s3.json()

            const response_pendidikan_belum_sekolah = await fetch(`${api_pendidikan}/find/belum_sekolah`)
            const result_pendidikan_belum_sekolah = await response_pendidikan_belum_sekolah.json()

            const response_pendidikan_d1 = await fetch(`${api_pendidikan}/find/d1`)
            const result_pendidikan_d1 = await response_pendidikan_d1.json()

            const response_pendidikan_d2 = await fetch(`${api_pendidikan}/find/d2`)
            const result_pendidikan_d2 = await response_pendidikan_d2.json()

            const response_pendidikan_d3 = await fetch(`${api_pendidikan}/find/d3`)
            const result_pendidikan_d3 = await response_pendidikan_d3.json()

            result.forEach(item => {
                total_jumlah_penduduk++
                if (item.id_jenis_kelamins == result_jenis_kelamin[0].id) total_jumlah_perempuan++

                if (item.id_status_hub_dlm_kels == result_status_hub_dlm_kels[0].id) total_jumlah_kk++
                if (item.id_status_hub_dlm_kels == result_status_hub_dlm_kels[0].id && item.id_jenis_kelamins == result_jenis_kelamin[0].id) total_jumlah_kk_perempuan++

                if (item.id_pekerjaans1 == result_pekerjaan_pns[0].id) total_pns++
                if (item.id_pekerjaans1 == result_pekerjaan_karyawan_honorer[0].id) total_karyawan_honorer++
                if (item.id_pekerjaans1 == result_pekerjaan_petani[0].id) total_petani++
                if (item.id_pekerjaans1 == result_pekerjaan_peternak[0].id) total_peternak++
                if (item.id_pekerjaans1 == result_pekerjaan_pedagang[0].id) total_pedagang++
                if (item.id_pekerjaans1 == result_pekerjaan_nelayan[0].id) total_nelayan++
                if (item.id_pekerjaans1 == result_pekerjaan_teknisi[0].id) total_teknisi++
                if (item.id_pekerjaans1 == result_pekerjaan_tukang[0].id) total_tukang++
                if (item.id_pekerjaans1 == result_pekerjaan_kosong[0].id) total_kosong++
                if (item.id_pekerjaans1 == result_pekerjaan_ibu_rumah_tangga[0].id) total_ibu_rumah_tangga++
                if (item.id_pekerjaans1 == result_pekerjaan_pelajar[0].id) total_pelajar++
                if (item.id_pekerjaans1 == result_pekerjaan_pekerja_lepas[0].id) total_pekerja_lepas++
                if (item.id_pekerjaans1 == result_pekerjaan_karyawan_swasta[0].id) total_karyawan_swasta++

                if (item.id_pendidikans == result_pendidikan_sdtt[0].id) total_sdtt++
                if (item.id_pendidikans == result_pendidikan_tk[0].id) total_tk++
                if (item.id_pendidikans == result_pendidikan_sd[0].id) total_sd++
                if (item.id_pendidikans == result_pendidikan_smp[0].id) total_smp++
                if (item.id_pendidikans == result_pendidikan_sma[0].id) total_sma++
                if (item.id_pendidikans == result_pendidikan_s1[0].id) total_s1++
                if (item.id_pendidikans == result_pendidikan_s2[0].id) total_s2++
                if (item.id_pendidikans == result_pendidikan_s3[0].id) total_s3++
                if (item.id_pendidikans == result_pendidikan_belum_sekolah[0].id) total_belum_sekolah++
                if (item.id_pendidikans == result_pendidikan_d1[0].id) total_d1++
                if (item.id_pendidikans == result_pendidikan_d2[0].id) total_d2++
                if (item.id_pendidikans == result_pendidikan_d3[0].id) total_d3++

                const date1 = new Date(item.tanggal_lahir)
                const date2 = new Date()
                let timeDiff = Math.abs(date2.getTime() - date1.getTime())
                let diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24))
                let age = Math.floor(diffDays / 365)

                if (age <= 0) total_kurang_dari_1++
                if (age >= 1 && age <= 4) total_1_sd_4++
                if (age >= 5 && age <= 14) total_5_sd_14++
                if (age >= 15 && age <= 16) total_15_sd_17++
                if (age >= 17 && age <= 39) total_18_sd_39++
                if (age >= 40 && age <= 65) total_40_sd_65++
                if (age > 65) total_lebih_dari_65++
            });
            total_jumlah_laki_laki = total_jumlah_penduduk - total_jumlah_perempuan
            total_jumlah_kk_laki_laki = total_jumlah_kk - total_jumlah_kk_perempuan

            // masukkan ke element
            jumlah_penduduk.innerHTML = total_jumlah_penduduk + ' orang'
            jumlah_laki_laki.innerHTML = total_jumlah_laki_laki + ' orang'
            jumlah_perempuan.innerHTML = total_jumlah_perempuan + ' orang'

            umur_kurang_dari_1.innerHTML = total_kurang_dari_1 + ' orang'
            umur_1_sd_4.innerHTML = total_1_sd_4 + ' orang'
            umur_5_sd_14.innerHTML = total_5_sd_14 + ' orang'
            umur_15_sd_17.innerHTML = total_15_sd_17 + ' orang'
            umur_18_sd_39.innerHTML = total_18_sd_39 + ' orang'
            umur_40_sd_65.innerHTML = total_40_sd_65 + ' orang'
            umur_lebih_dari_65.innerHTML = total_lebih_dari_65 + ' orang'

            jumlah_kk.innerHTML = total_jumlah_kk + ' orang'
            jumlah_kk_laki_laki.innerHTML = total_jumlah_kk_laki_laki + ' orang'
            jumlah_kk_perempuan.innerHTML = total_jumlah_kk_perempuan + ' orang'

            pns.innerHTML = total_pns + ' orang'
            karyawan_honorer.innerHTML = total_karyawan_honorer + ' orang'
            petani.innerHTML = total_petani + ' orang'
            peternak.innerHTML = total_peternak + ' orang'
            pedagang.innerHTML = total_pedagang + ' orang'
            nelayan.innerHTML = total_nelayan + ' orang'
            teknisi.innerHTML = total_teknisi + ' orang'
            tukang.innerHTML = total_tukang + ' orang'
            kosong.innerHTML = total_kosong + ' orang'
            ibu_rumah_tangga.innerHTML = total_ibu_rumah_tangga + ' orang'
            pelajar.innerHTML = total_pelajar + ' orang'
            pekerja_lepas.innerHTML = total_pekerja_lepas + ' orang'
            karyawan_swasta.innerHTML = total_karyawan_swasta + ' orang'
            sdtt.innerHTML = total_sdtt + ' orang'
            tk.innerHTML = total_tk + ' orang'
            sd.innerHTML = total_sd + ' orang'
            smp.innerHTML = total_smp + ' orang'
            sma.innerHTML = total_sma + ' orang'
            s1.innerHTML = total_s1 + ' orang'
            s2.innerHTML = total_s2 + ' orang'
            s3.innerHTML = total_s3 + ' orang'
            belum_sekolah.innerHTML = total_belum_sekolah + ' orang'
            d1.innerHTML = total_d1 + ' orang'
            d2.innerHTML = total_d2 + ' orang'
            d3.innerHTML = total_d3 + ' orang'

        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_pekerjaan1 = item => {
        return `<option value="${item.id}">${item.pekerjaan}</option>`
    }

    const generate_isi_option_select_pekerjaan1 = async () => {
        try {
            const response = await fetch(`${api_pekerjaan}/find/*`)
            const result = await response.json()

            let all_option_select_pekerjaan1 = ``
            result.forEach(item => {
                all_option_select_pekerjaan1 += option_select_pekerjaan1(item)
            });

            pekerjaan1.innerHTML = all_option_select_pekerjaan1
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_pekerjaan2 = item => {
        return `<option value="${item.id}">${item.pekerjaan}</option>`
    }

    const generate_isi_option_select_pekerjaan2 = async () => {
        try {
            const response = await fetch(`${api_pekerjaan}/find/*`)
            const result = await response.json()

            let all_option_select_pekerjaan2 = ``
            result.forEach(item => {
                all_option_select_pekerjaan2 += option_select_pekerjaan2(item)
            });

            pekerjaan2.innerHTML = all_option_select_pekerjaan2
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_pekerjaan3 = item => {
        return `<option value="${item.id}">${item.pekerjaan}</option>`
    }

    const generate_isi_option_select_pekerjaan3 = async () => {
        try {
            const response = await fetch(`${api_pekerjaan}/find/*`)
            const result = await response.json()

            let all_option_select_pekerjaan3 = ``
            result.forEach(item => {
                all_option_select_pekerjaan3 += option_select_pekerjaan3(item)
            });

            pekerjaan3.innerHTML = all_option_select_pekerjaan3
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_jenis_kelamin = item => {
        return `<option value="${item.id}">${item.jenis_kelamin}</option>`
    }

    const generate_isi_option_select_jenis_kelamin = async () => {
        try {
            const response = await fetch(`${api_jenis_kelamin}/find/*`)
            const result = await response.json()

            let all_option_select_jenis_kelamin = ``
            result.forEach(item => {
                all_option_select_jenis_kelamin += option_select_jenis_kelamin(item)
            });

            jenis_kelamin.innerHTML = all_option_select_jenis_kelamin
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_kewarganegaraan = item => {
        return `<option value="${item.id}">${item.kewarganegaraan}</option>`
    }

    const generate_isi_option_select_kewarganegaraan = async () => {
        try {
            const response = await fetch(`${api_kewarganegaraan}/find/*`)
            const result = await response.json()

            let all_option_select_kewarganegaraan = ``
            result.forEach(item => {
                all_option_select_kewarganegaraan += option_select_kewarganegaraan(item)
            });

            kewarganegaraan.innerHTML = all_option_select_kewarganegaraan
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_status_hub_dlm_kel = item => {
        return `<option value="${item.id}">${item.status_hub_dlm_kel}</option>`
    }

    const generate_isi_option_select_status_hub_dlm_kel = async () => {
        try {
            const response = await fetch(`${api_status_hub_dlm_kel}/find/*`)
            const result = await response.json()

            let all_option_select_status_hub_dlm_kel = ``
            result.forEach(item => {
                all_option_select_status_hub_dlm_kel += option_select_status_hub_dlm_kel(item)
            });

            status_hub_dlm_kel.innerHTML = all_option_select_status_hub_dlm_kel
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_pendidikan = item => {
        return `<option value="${item.id}">${item.pendidikan}</option>`
    }

    const generate_isi_option_select_pendidikan = async () => {
        try {
            const response = await fetch(`${api_pendidikan}/find/*`)
            const result = await response.json()

            let all_option_select_pendidikan = ``
            result.forEach(item => {
                all_option_select_pendidikan += option_select_pendidikan(item)
            });

            pendidikan.innerHTML = all_option_select_pendidikan
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_golongan_darah = item => {
        return `<option value="${item.id}">${item.golongan_darah}</option>`
    }

    const generate_isi_option_select_golongan_darah = async () => {
        try {
            const response = await fetch(`${api_golongan_darah}/find/*`)
            const result = await response.json()

            let all_option_select_golongan_darah = ``
            result.forEach(item => {
                all_option_select_golongan_darah += option_select_golongan_darah(item)
            });

            golongan_darah.innerHTML = all_option_select_golongan_darah
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_agama = item => {
        return `<option value="${item.id}">${item.agama}</option>`
    }

    const generate_isi_option_select_agama = async () => {
        try {
            const response = await fetch(`${api_agama}/find/*`)
            const result = await response.json()

            let all_option_select_agama = ``
            result.forEach(item => {
                all_option_select_agama += option_select_agama(item)
            });

            agama.innerHTML = all_option_select_agama
        } catch (error) {
            console.error("Error:", error)
        }
    }
    const option_select_data_nkk = item => {
        return `<option value="${item.id}|${item.id_provinsis}|${item.id_kabupatens}|${item.id_kecamatans}|${item.id_desas}">${item.nkk}</option>`
    }

    const generate_isi_option_select_data_nkk = async () => {
        try {
            const response = await fetch(`${api_data_nkk}/find/${cari_nkk.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_data_nkk = ``
            result.forEach(item => {
                all_option_select_data_nkk += option_select_data_nkk(item)
            });

            data_nkk.innerHTML = all_option_select_data_nkk
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const isi_page_list = halaman => {
        const offset = (per_page.value * halaman) - per_page.value
        return `<button class="px-1 mx-1 border rounded-sm border-cyan-500 text-center focus:text-white focus:bg-cyan-500" onclick="generate_isi_tr_tbody(${offset})" type="button">${halaman}</button>`
    }

    const generate_isi_page_list = async () => {
        try {
            const response = await fetch(`${api}/find/${key_pencarian.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()
            let total_data = 0
            result.forEach(item => total_data++);
            const total_halaman = Math.ceil(total_data / per_page.value)

            let all_isi_page_list = ``
            for (let index = 0; index < total_halaman; index++) {
                all_isi_page_list += isi_page_list(index + 1)
            }
            page_list.innerHTML = all_isi_page_list
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const tr_tbody = item => {
        return `<tr class="border-b border-cyan-500">
                    <td>
                        <button class="px-3 py-1 rounded-sm w-full mb-1 text-sm bg-green-300" onclick="show_ubah(${item.id})" type="button">update</button>
                        <button class="px-3 py-1 rounded-sm w-full text-sm bg-red-300" onclick="hapus(event, ${item.id})" type="button">delete</button>
                    </td>
                    <td>
                        <div class="w-16 mx-auto">
                            <img class="w-16 h-16 rounded-full mx-auto" src="img/data_penduduk/${item.foto}" alt="${item.foto}">
                        </div>
                    </td>
                    <td>${item.nik}</td>
                    <td>${item.nama_lengkap}</td>
                    <td>${item.nkk}</td>
                    <td>${item.tempat_lahir}</td>
                    <td>${item.tanggal_lahir}</td>
                    <td>${item.agama}</td>
                    <td>${item.golongan_darah}</td>
                    <td>${item.pendidikan}</td>
                    <td>${item.status_hub_dlm_kel}</td>
                    <td>${item.kewarganegaraan}</td>
                    <td>${item.jenis_kelamin}</td>
                    <td>${item.provinsi}</td>
                    <td>${item.kabupaten}</td>
                    <td>${item.kecamatan}</td>
                    <td>${item.desa}</td>
                    <td>${item.pekerjaan1}</td>
                    <td>${item.pekerjaan2}</td>
                    <td>${item.pekerjaan3}</td>
                    <td>${item.created_at}</td>
                    <td>${item.created_by}</td>
                    <td>${item.updated_at}</td>
                    <td>${item.updated_by}</td>
                </tr>`
    }

    const generate_isi_tr_tbody = async (offset = 0) => {
        try {
            const response = await fetch(`${api}/find/${key_pencarian.value}/${per_page.value}/${offset}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_tr_tbody = ``
            result.forEach(item => {
                all_tr_tbody += tr_tbody(item)
            });

            tbody.innerHTML = all_tr_tbody
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const update_page = () => {
        generate_isi_page_list()
        generate_isi_tr_tbody()
    }

    async function upload(url, formData) {
        try {
            const response = await fetch(url, {
                method: "POST",
                body: formData,
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            });
            const result = await response.json();
            if (result.status == 400) {
                let all_err_msg = ``
                for (message in result.messages) {
                    all_err_msg += `<p>${result.messages[message]}</p>`
                }
                err_msg.innerHTML = all_err_msg
                err_msg.style.display = ''
            } else if (result.status == 200 || result.status == 201) {
                close_modal()
                update_page()
                successAlert(result.messages.success)
            }
        } catch (error) {
            console.error("Error:", error)
            errorAlert(error)
        }
    }

    const show_tambah = () => {
        close_modal()
        modal_form.style.display = ''
        head_form.innerHTML = 'form tambah data'
        form_input.onsubmit = () => tambah(event)
    }

    const tambah = event => {
        event.preventDefault()
        const formData = new FormData()
        const item_data_nkk = data_nkk.value.split('|')
        formData.append('nik', nik.value)
        formData.append('nama_lengkap', nama_lengkap.value)
        formData.append('id_data_nkks', item_data_nkk[0])
        formData.append('id_agamas', agama.value)
        formData.append('tempat_lahir', tempat_lahir.value)
        formData.append('tanggal_lahir', tanggal_lahir.value)
        formData.append('id_golongan_darahs', golongan_darah.value)
        formData.append('id_pendidikans', pendidikan.value)
        formData.append('id_status_hub_dlm_kels', status_hub_dlm_kel.value)
        formData.append('id_kewarganegaraans', kewarganegaraan.value)
        formData.append('id_jenis_kelamins', jenis_kelamin.value)
        formData.append('id_provinsis', item_data_nkk[1])
        formData.append('id_kabupatens', item_data_nkk[2])
        formData.append('id_kecamatans', item_data_nkk[3])
        formData.append('id_desas', item_data_nkk[4])
        formData.append('id_pekerjaans1', pekerjaan1.value)
        formData.append('id_pekerjaans2', pekerjaan2.value)
        formData.append('id_pekerjaans3', pekerjaan3.value)
        formData.append('foto', foto.files[0])
        formData.append('active', 1)
        formData.append('created_by', crrDesa)
        formData.append('updated_by', crrDesa)
        upload(`${api}`, formData)
    }

    const generate_img_preview = () => {
        const fr = new FileReader()
        fr.readAsDataURL(foto.files[0])
        fr.onload = () => img_preview.src = fr.result
    }

    const show_ubah = id => {
        warningAlert('the selected data will be overwritten', async () => {
            close_modal()
            modal_form.style.display = ''
            head_form.innerHTML = 'form ubah data'
            try {
                const response = await fetch(`${api}/${id}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result = await response.json()

                nik.value = result.nik
                nama_lengkap.value = result.nama_lengkap
                tempat_lahir.value = result.tempat_lahir
                tanggal_lahir.value = result.tanggal_lahir.split(" ")[0]
                const response_data_nkk = await fetch(`${api_data_nkk}/${result.id_data_nkks}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_data_nkk = await response_data_nkk.json()
                data_nkk.innerHTML = `<option value="${result_data_nkk.id}|${result_data_nkk.id_provinsis}|${result_data_nkk.id_kabupatens}|${result_data_nkk.id_kecamatans}|${result_data_nkk.id_desas}">${result_data_nkk.nkk}</option>`

                const response_agama = await fetch(`${api_agama}/${result.id_agamas}`)
                const result_agama = await response_agama.json()
                agama.innerHTML = `<option value="${result_agama.id}">${result_agama.agama}</option>`

                const response_golongan_darah = await fetch(`${api_golongan_darah}/${result.id_golongan_darahs}`)
                const result_golongan_darah = await response_golongan_darah.json()
                golongan_darah.innerHTML = `<option value="${result_golongan_darah.id}">${result_golongan_darah.golongan_darah}</option>`

                const response_pendidikan = await fetch(`${api_pendidikan}/${result.id_pendidikans}`)
                const result_pendidikan = await response_pendidikan.json()
                pendidikan.innerHTML = `<option value="${result_pendidikan.id}">${result_pendidikan.pendidikan}</option>`

                const response_status_hub_dlm_kel = await fetch(`${api_status_hub_dlm_kel}/${result.id_status_hub_dlm_kels}`)
                const result_status_hub_dlm_kel = await response_status_hub_dlm_kel.json()
                status_hub_dlm_kel.innerHTML = `<option value="${result_status_hub_dlm_kel.id}">${result_status_hub_dlm_kel.status_hub_dlm_kel}</option>`

                const response_kewarganegaraan = await fetch(`${api_kewarganegaraan}/${result.id_kewarganegaraans}`)
                const result_kewarganegaraan = await response_kewarganegaraan.json()
                kewarganegaraan.innerHTML = `<option value="${result_kewarganegaraan.id}">${result_kewarganegaraan.kewarganegaraan}</option>`

                const response_jenis_kelamin = await fetch(`${api_jenis_kelamin}/${result.id_jenis_kelamins}`)
                const result_jenis_kelamin = await response_jenis_kelamin.json()
                jenis_kelamin.innerHTML = `<option value="${result_jenis_kelamin.id}">${result_jenis_kelamin.jenis_kelamin}</option>`

                const response_pekerjaan1 = await fetch(`${api_pekerjaan}/${result.id_pekerjaans1}`)
                const result_pekerjaan1 = await response_pekerjaan1.json()
                pekerjaan1.innerHTML = `<option value="${result_pekerjaan1.id}">${result_pekerjaan1.pekerjaan}</option>`

                const response_pekerjaan2 = await fetch(`${api_pekerjaan}/${result.id_pekerjaans2}`)
                const result_pekerjaan2 = await response_pekerjaan2.json()
                pekerjaan2.innerHTML = `<option value="${result_pekerjaan2.id}">${result_pekerjaan2.pekerjaan}</option>`

                const response_pekerjaan3 = await fetch(`${api_pekerjaan}/${result.id_pekerjaans3}`)
                const result_pekerjaan3 = await response_pekerjaan3.json()
                pekerjaan3.innerHTML = `<option value="${result_pekerjaan3.id}">${result_pekerjaan3.pekerjaan}</option>`

                img_preview.src = `img/data_penduduk/${result.foto}`
                form_input.onsubmit = () => ubah(event, id)
            } catch (error) {
                console.error("Error:", error)
                errorAlert(error)
            }
        })
    }

    const ubah = (event, id) => {
        event.preventDefault()
        const formData = new FormData()
        const item_data_nkk = data_nkk.value.split('|')
        formData.append('nik', nik.value)
        formData.append('nama_lengkap', nama_lengkap.value)
        formData.append('id_data_nkks', item_data_nkk[0])
        formData.append('tempat_lahir', tempat_lahir.value)
        formData.append('tanggal_lahir', tanggal_lahir.value)
        formData.append('id_agamas', agama.value)
        formData.append('id_golongan_darahs', golongan_darah.value)
        formData.append('id_pendidikans', pendidikan.value)
        formData.append('id_status_hub_dlm_kels', status_hub_dlm_kel.value)
        formData.append('id_kewarganegaraans', kewarganegaraan.value)
        formData.append('id_jenis_kelamins', jenis_kelamin.value)
        formData.append('id_provinsis', item_data_nkk[1])
        formData.append('id_kabupatens', item_data_nkk[2])
        formData.append('id_kecamatans', item_data_nkk[3])
        formData.append('id_desas', item_data_nkk[4])
        formData.append('id_pekerjaans1', pekerjaan1.value)
        formData.append('id_pekerjaans2', pekerjaan2.value)
        formData.append('id_pekerjaans3', pekerjaan3.value)
        formData.append('active', 1)
        formData.append('foto', foto.files[0])
        formData.append('updated_by', crrDesa)
        formData.append('_method', 'PATCH')
        upload(`${api}/${id}`, formData)
    }

    const close_modal = () => {
        form_input.reset()
        data_nkk.innerHTML = ''
        agama.innerHTML = ''
        golongan_darah.innerHTML = ''
        pendidikan.innerHTML = ''
        status_hub_dlm_kel.innerHTML = ''
        kewarganegaraan.innerHTML = ''
        jenis_kelamin.innerHTML = ''
        pekerjaan1.innerHTML = ''
        pekerjaan2.innerHTML = ''
        pekerjaan3.innerHTML = ''
        img_preview.src = ''
        err_msg.innerHTML = ''
        err_msg.style.display = 'none'
        modal_form.style.display = 'none'
    }

    const hapus = (event, id) => {
        event.preventDefault()
        questionAlert('the selected data will be permanently deleted. are you sure?', async () => {
            try {
                const response = await fetch(`${api}/${id}`, {
                    method: "DELETE",
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result = await response.json()
                successAlert(result.messages.success)
            } catch (error) {
                console.error("Error:", error)
                errorAlert(error)
            }
            update_page()
        }, () => {
            infoAlert('deleting data canceled')
        })
    }

    (async () => {
        try {
            const response = await fetch(`${api_me}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()
            crrDesa = result.desa
        } catch (error) {
            console.error("Error:", error)
        }
    })()

    err_msg.style.display = 'none'
    modal_form.style.display = 'none'
    foto.style.display = 'none'
    generate_isi_page_list()
    generate_isi_tr_tbody()
</script>

<?= $this->endSection(); ?>