<?= $this->extend('index_admin'); ?>
<?= $this->section('page'); ?>

<div>
    <div class="bg-cyan-200 rounded-md m-2 p-2">
        <p class="text-center text-lg font-semibold uppercase"><?= $title; ?></p>
    </div>
    <div class="m-2">
        <div class="flex flex-wrap justify-center">
            <button onclick="open_modal_suket_kenal_lahir()" class="m-2 p-2 rounded-md bg-cyan-500 text-white w-full md:w-[45%] lg:w-[32%] mx-auto" type="button">suket kenal lahir</button>
            <button onclick="open_modal_suket_tidak_mampu()" class="m-2 p-2 rounded-md bg-cyan-500 text-white w-full md:w-[45%] lg:w-[32%] mx-auto" type="button">suket tidak mampu</button>
            <button onclick="open_modal_suket_usaha()" class="m-2 p-2 rounded-md bg-cyan-500 text-white w-full md:w-[45%] lg:w-[32%] mx-auto" type="button">suket usaha</button>
            <button onclick="open_modal_suket_domisili()" class="m-2 p-2 rounded-md bg-cyan-500 text-white w-full md:w-[45%] lg:w-[32%] mx-auto" type="button">suket domisili</button>
            <button onclick="open_modal_suket_belum_menikah()" class="m-2 p-2 rounded-md bg-cyan-500 text-white w-full md:w-[45%] lg:w-[32%] mx-auto" type="button">suket belum menikah</button>
            <button onclick="open_modal_suket_di_luar_daerah()" class="m-2 p-2 rounded-md bg-cyan-500 text-white w-full md:w-[45%] lg:w-[32%] mx-auto" type="button">suket di luar daerah</button>
            <button onclick="open_modal_suket_pengantar_kk()" class="m-2 p-2 rounded-md bg-cyan-500 text-white w-full md:w-[45%] lg:w-[32%] mx-auto" type="button">suket pengantar kk</button>
            <button onclick="open_modal_suket_pengantar_ktp()" class="m-2 p-2 rounded-md bg-cyan-500 text-white w-full md:w-[45%] lg:w-[32%] mx-auto" type="button">suket pengantar ktp</button>
        </div>

        <!-- >>>> modal render suket kenal lahir -->
        <div id="modal_suket_kenal_lahir" class="hidden fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10">
            <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[50%] my-4 max-h-[95%] mx-auto overflow-auto">
                <button class="absolute right-1 top-0" onclick="close_modal_suket_kenal_lahir()" type="button"><i class="bi-x-square-fill text-red-700 rounded-md text-xl"></i></button>
                <p class="text-center font-medium text-lg" id="head_form">data suket kenal lahir</p>

                <form action="/suket_kenal_lahir" method="post" class="mt-2" enctype="multipart/form-data" id="form_input">
                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">data orang tua</div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="data_nkk" name="nkk" required></select>
                        <input id="cari_nkk" class="w-[50%] p-1 mb-2 outline-none border border-l-0 border-cyan-500 rounded-r-md text-sm" type="text" placeholder="cari_nkk" onkeyup="generate_isi_option_select_data_nkk()" autocomplete="off">
                    </div>

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">data anak</div>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="nama" type="text" name="nama_anak" autocomplete="off" required>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="ttl" type="text" name="ttl_anak" autocomplete="off">
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="jenis_kelamin" type="text" name="jk_anak" autocomplete="off" required>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="anak_ke" type="text" name="anak_ke" autocomplete="off" required>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="alamat" type="text" name="alamat_anak" autocomplete="off" required>

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">persetujuan</div>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="nomor_surat" type="text" name="nomor_surat" autocomplete="off" required>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="tanggal" type="date" name="tanggal" autocomplete="off" required>
                    <select class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" name="oleh" required>
                        <option value="kades">kades</option>
                        <option value="sekretaris">sekretaris</option>
                    </select>

                    <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">render pdf</button>
                </form>
            </div>
        </div>

        <!-- >>>> modal render suket tidak mampu -->
        <div id="modal_suket_tidak_mampu" class="hidden fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10">
            <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[50%] my-4 max-h-[95%] mx-auto overflow-auto">
                <button class="absolute right-1 top-0" onclick="close_modal_suket_tidak_mampu()" type="button"><i class="bi-x-square-fill text-red-700 rounded-md text-xl"></i></button>
                <p class="text-center font-medium text-lg" id="head_form">data suket tidak mampu</p>

                <form action="/suket_tidak_mampu" method="post" class="mt-2" enctype="multipart/form-data" id="form_input">

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">data penduduk</div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="data_penduduk_suket_tidak_mampu" name="penduduk" required></select>
                        <input id="cari_penduduk_suket_tidak_mampu" class="w-[50%] p-1 mb-2 outline-none border border-l-0 border-cyan-500 rounded-r-md text-sm" type="text" placeholder="cari_penduduk" onkeyup="generate_isi_option_select_data_penduduk_suket_tidak_mampu()" autocomplete="off">
                    </div>

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">persetujuan</div>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="nomor_surat" type="text" name="nomor_surat" autocomplete="off" required>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="tanggal" type="date" name="tanggal" autocomplete="off" required>
                    <select class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" name="oleh" required>
                        <option value="kades">kades</option>
                        <option value="sekretaris">sekretaris</option>
                    </select>

                    <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">render pdf</button>
                </form>
            </div>
        </div>

        <!-- >>>> modal render suket usaha -->
        <div id="modal_suket_usaha" class="hidden fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10">
            <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[50%] my-4 max-h-[95%] mx-auto overflow-auto">
                <button class="absolute right-1 top-0" onclick="close_modal_suket_usaha()" type="button"><i class="bi-x-square-fill text-red-700 rounded-md text-xl"></i></button>
                <p class="text-center font-medium text-lg" id="head_form">data suket usaha</p>

                <form action="/suket_usaha" method="post" class="mt-2" enctype="multipart/form-data" id="form_input">

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">data penduduk</div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="data_penduduk_suket_usaha" name="penduduk" required></select>
                        <input id="cari_penduduk_suket_usaha" class="w-[50%] p-1 mb-2 outline-none border border-l-0 border-cyan-500 rounded-r-md text-sm" type="text" placeholder="cari_penduduk" onkeyup="generate_isi_option_select_data_penduduk_suket_usaha()" autocomplete="off">
                    </div>

                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="nama_usaha" type="text" name="nama_usaha" autocomplete="off" required>

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">persetujuan</div>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="nomor_surat" type="text" name="nomor_surat" autocomplete="off" required>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="tanggal" type="date" name="tanggal" autocomplete="off" required>
                    <select class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" name="oleh" required>
                        <option value="kades">kades</option>
                        <option value="sekretaris">sekretaris</option>
                    </select>

                    <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">render pdf</button>
                </form>
            </div>
        </div>

        <!-- >>>> modal render suket domisili -->
        <div id="modal_suket_domisili" class="hidden fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10">
            <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[50%] my-4 max-h-[95%] mx-auto overflow-auto">
                <button class="absolute right-1 top-0" onclick="close_modal_suket_domisili()" type="button"><i class="bi-x-square-fill text-red-700 rounded-md text-xl"></i></button>
                <p class="text-center font-medium text-lg" id="head_form">data suket domisili</p>

                <form action="/suket_domisili" method="post" class="mt-2" enctype="multipart/form-data" id="form_input">

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">data penduduk</div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="data_penduduk_suket_domisili" name="penduduk" required></select>
                        <input id="cari_penduduk_suket_domisili" class="w-[50%] p-1 mb-2 outline-none border border-l-0 border-cyan-500 rounded-r-md text-sm" type="text" placeholder="cari_penduduk" onkeyup="generate_isi_option_select_data_penduduk_suket_domisili()" autocomplete="off">
                    </div>

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">persetujuan</div>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="nomor_surat" type="text" name="nomor_surat" autocomplete="off" required>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="tanggal" type="date" name="tanggal" autocomplete="off" required>
                    <select class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" name="oleh" required>
                        <option value="kades">kades</option>
                        <option value="sekretaris">sekretaris</option>
                    </select>

                    <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">render pdf</button>
                </form>
            </div>
        </div>

        <!-- >>>> modal render suket belum menikah -->
        <div id="modal_suket_belum_menikah" class="hidden fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10">
            <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[50%] my-4 max-h-[95%] mx-auto overflow-auto">
                <button class="absolute right-1 top-0" onclick="close_modal_suket_belum_menikah()" type="button"><i class="bi-x-square-fill text-red-700 rounded-md text-xl"></i></button>
                <p class="text-center font-medium text-lg" id="head_form">data suket belum menikah</p>

                <form action="/suket_belum_menikah" method="post" class="mt-2" enctype="multipart/form-data" id="form_input">

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">data penduduk</div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="data_penduduk_suket_belum_menikah" name="penduduk" required></select>
                        <input id="cari_penduduk_suket_belum_menikah" class="w-[50%] p-1 mb-2 outline-none border border-l-0 border-cyan-500 rounded-r-md text-sm" type="text" placeholder="cari_penduduk" onkeyup="generate_isi_option_select_data_penduduk_suket_belum_menikah()" autocomplete="off">
                    </div>

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">persetujuan</div>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="nomor_surat" type="text" name="nomor_surat" autocomplete="off" required>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="tanggal" type="date" name="tanggal" autocomplete="off" required>
                    <select class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" name="oleh" required>
                        <option value="kades">kades</option>
                        <option value="sekretaris">sekretaris</option>
                    </select>

                    <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">render pdf</button>
                </form>
            </div>
        </div>

        <!-- >>>> modal render suket di luar daerah -->
        <div id="modal_suket_di_luar_daerah" class="hidden fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10">
            <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[50%] my-4 max-h-[95%] mx-auto overflow-auto">
                <button class="absolute right-1 top-0" onclick="close_modal_suket_di_luar_daerah()" type="button"><i class="bi-x-square-fill text-red-700 rounded-md text-xl"></i></button>
                <p class="text-center font-medium text-lg" id="head_form">data suket di luar daerah</p>

                <form action="/suket_di_luar_daerah" method="post" class="mt-2" enctype="multipart/form-data" id="form_input">

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">data penduduk</div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="data_penduduk_suket_di_luar_daerah" name="penduduk" required></select>
                        <input id="cari_penduduk_suket_di_luar_daerah" class="w-[50%] p-1 mb-2 outline-none border border-l-0 border-cyan-500 rounded-r-md text-sm" type="text" placeholder="cari_penduduk" onkeyup="generate_isi_option_select_data_penduduk_suket_di_luar_daerah()" autocomplete="off">
                    </div>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="keperluan" type="text" name="keperluan" autocomplete="off" required>

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">persetujuan</div>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="nomor_surat" type="text" name="nomor_surat" autocomplete="off" required>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="tanggal" type="date" name="tanggal" autocomplete="off" required>
                    <select class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" name="oleh" required>
                        <option value="kades">kades</option>
                        <option value="sekretaris">sekretaris</option>
                    </select>

                    <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">render pdf</button>
                </form>
            </div>
        </div>

        <!-- >>>> modal render suket pengantar kk -->
        <div id="modal_suket_pengantar_kk" class="hidden fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10">
            <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[50%] my-4 max-h-[95%] mx-auto overflow-auto">
                <button class="absolute right-1 top-0" onclick="close_modal_suket_pengantar_kk()" type="button"><i class="bi-x-square-fill text-red-700 rounded-md text-xl"></i></button>
                <p class="text-center font-medium text-lg" id="head_form">data suket pengantar kk</p>

                <form action="/suket_pengantar_kk" method="post" class="mt-2" enctype="multipart/form-data" id="form_input">

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">data suami</div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="data_penduduk_suket_pengantar_kk" name="penduduk" required></select>
                        <input id="cari_penduduk_suket_pengantar_kk" class="w-[50%] p-1 mb-2 outline-none border border-l-0 border-cyan-500 rounded-r-md text-sm" type="text" placeholder="cari_penduduk" onkeyup="generate_isi_option_select_data_penduduk_suket_pengantar_kk()" autocomplete="off">
                    </div>
                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">data istri</div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="data_penduduk_suket_pengantar_kk_istri" name="penduduk_istri" required></select>
                        <input id="cari_penduduk_suket_pengantar_kk_istri" class="w-[50%] p-1 mb-2 outline-none border border-l-0 border-cyan-500 rounded-r-md text-sm" type="text" placeholder="cari_penduduk" onkeyup="generate_isi_option_select_data_penduduk_suket_pengantar_kk_istri()" autocomplete="off">
                    </div>

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">persetujuan</div>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="nomor_surat" type="text" name="nomor_surat" autocomplete="off" required>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="tanggal" type="date" name="tanggal" autocomplete="off" required>
                    <select class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" name="oleh" required>
                        <option value="kades">kades</option>
                        <option value="sekretaris">sekretaris</option>
                    </select>

                    <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">render pdf</button>
                </form>
            </div>
        </div>

        <!-- >>>> modal render suket pengantar ktp -->
        <div id="modal_suket_pengantar_ktp" class="hidden fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10">
            <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[50%] my-4 max-h-[95%] mx-auto overflow-auto">
                <button class="absolute right-1 top-0" onclick="close_modal_suket_pengantar_ktp()" type="button"><i class="bi-x-square-fill text-red-700 rounded-md text-xl"></i></button>
                <p class="text-center font-medium text-lg" id="head_form">data suket pengantar ktp</p>

                <form action="/suket_pengantar_ktp" method="post" class="mt-2" enctype="multipart/form-data" id="form_input">

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">data penduduk</div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="data_penduduk_suket_pengantar_ktp" name="penduduk" required></select>
                        <input id="cari_penduduk_suket_pengantar_ktp" class="w-[50%] p-1 mb-2 outline-none border border-l-0 border-cyan-500 rounded-r-md text-sm" type="text" placeholder="cari_penduduk" onkeyup="generate_isi_option_select_data_penduduk_suket_pengantar_ktp()" autocomplete="off">
                    </div>

                    <div class="text-white bg-red-700 rounded-md px-2 mb-1 text-sm italic inline-block">persetujuan</div>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="nomor_surat" type="text" name="nomor_surat" autocomplete="off" required>
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="tanggal" type="date" name="tanggal" autocomplete="off" required>
                    <select class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" name="oleh" required>
                        <option value="kades">kades</option>
                        <option value="sekretaris">sekretaris</option>
                    </select>

                    <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">render pdf</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const api_data_nkk = '<?= base_url('/datankks') ?>'
    const api_data_penduduk = '<?= base_url('/datapenduduks') ?>'

    // suket kenal lahir
    const data_nkk = document.querySelector('#data_nkk')
    const cari_nkk = document.querySelector('#cari_nkk')
    const modal_suket_kenal_lahir = document.querySelector('#modal_suket_kenal_lahir')
    const open_modal_suket_kenal_lahir = () => modal_suket_kenal_lahir.classList.toggle('hidden');
    const close_modal_suket_kenal_lahir = () => modal_suket_kenal_lahir.classList.toggle('hidden');

    const option_select_data_nkk = item => {
        return `<option value="${item.id}">${item.nkk}</option>`
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

    // suket tidak mampu
    const cari_penduduk_suket_tidak_mampu = document.querySelector('#cari_penduduk_suket_tidak_mampu')
    const data_penduduk_suket_tidak_mampu = document.querySelector('#data_penduduk_suket_tidak_mampu')
    const modal_suket_tidak_mampu = document.querySelector('#modal_suket_tidak_mampu')
    const open_modal_suket_tidak_mampu = () => modal_suket_tidak_mampu.classList.toggle('hidden');
    const close_modal_suket_tidak_mampu = () => modal_suket_tidak_mampu.classList.toggle('hidden');

    const option_select_data_penduduk_suket_tidak_mampu = item => {
        return `<option value="${item.id}">${item.nama_lengkap}</option>`
    }

    const generate_isi_option_select_data_penduduk_suket_tidak_mampu = async () => {
        try {
            const response = await fetch(`${api_data_penduduk}/find/${cari_penduduk_suket_tidak_mampu.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_data_nkk = ``
            result.forEach(item => {
                all_option_select_data_nkk += option_select_data_penduduk_suket_tidak_mampu(item)
            });

            data_penduduk_suket_tidak_mampu.innerHTML = all_option_select_data_nkk
        } catch (error) {
            console.error("Error:", error)
        }
    }

    // suket usaha
    const cari_penduduk_suket_usaha = document.querySelector('#cari_penduduk_suket_usaha')
    const data_penduduk_suket_usaha = document.querySelector('#data_penduduk_suket_usaha')
    const modal_suket_usaha = document.querySelector('#modal_suket_usaha')
    const open_modal_suket_usaha = () => modal_suket_usaha.classList.toggle('hidden');
    const close_modal_suket_usaha = () => modal_suket_usaha.classList.toggle('hidden');

    const option_select_data_penduduk_suket_usaha = item => {
        return `<option value="${item.id}">${item.nama_lengkap}</option>`
    }

    const generate_isi_option_select_data_penduduk_suket_usaha = async () => {
        try {
            const response = await fetch(`${api_data_penduduk}/find/${cari_penduduk_suket_usaha.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_data_nkk = ``
            result.forEach(item => {
                all_option_select_data_nkk += option_select_data_penduduk_suket_usaha(item)
            });

            data_penduduk_suket_usaha.innerHTML = all_option_select_data_nkk
        } catch (error) {
            console.error("Error:", error)
        }
    }

    // suket domisili
    const cari_penduduk_suket_domisili = document.querySelector('#cari_penduduk_suket_domisili')
    const data_penduduk_suket_domisili = document.querySelector('#data_penduduk_suket_domisili')
    const modal_suket_domisili = document.querySelector('#modal_suket_domisili')
    const open_modal_suket_domisili = () => modal_suket_domisili.classList.toggle('hidden');
    const close_modal_suket_domisili = () => modal_suket_domisili.classList.toggle('hidden');

    const option_select_data_penduduk_suket_domisili = item => {
        return `<option value="${item.id}">${item.nama_lengkap}</option>`
    }

    const generate_isi_option_select_data_penduduk_suket_domisili = async () => {
        try {
            const response = await fetch(`${api_data_penduduk}/find/${cari_penduduk_suket_domisili.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_data_nkk = ``
            result.forEach(item => {
                all_option_select_data_nkk += option_select_data_penduduk_suket_domisili(item)
            });

            data_penduduk_suket_domisili.innerHTML = all_option_select_data_nkk
        } catch (error) {
            console.error("Error:", error)
        }
    }

    // suket belum menikah
    const cari_penduduk_suket_belum_menikah = document.querySelector('#cari_penduduk_suket_belum_menikah')
    const data_penduduk_suket_belum_menikah = document.querySelector('#data_penduduk_suket_belum_menikah')
    const modal_suket_belum_menikah = document.querySelector('#modal_suket_belum_menikah')
    const open_modal_suket_belum_menikah = () => modal_suket_belum_menikah.classList.toggle('hidden');
    const close_modal_suket_belum_menikah = () => modal_suket_belum_menikah.classList.toggle('hidden');

    const option_select_data_penduduk_suket_belum_menikah = item => {
        return `<option value="${item.id}">${item.nama_lengkap}</option>`
    }

    const generate_isi_option_select_data_penduduk_suket_belum_menikah = async () => {
        try {
            const response = await fetch(`${api_data_penduduk}/find/${cari_penduduk_suket_belum_menikah.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_data_nkk = ``
            result.forEach(item => {
                all_option_select_data_nkk += option_select_data_penduduk_suket_belum_menikah(item)
            });

            data_penduduk_suket_belum_menikah.innerHTML = all_option_select_data_nkk
        } catch (error) {
            console.error("Error:", error)
        }
    }

    // suket di luar daerah
    const cari_penduduk_suket_di_luar_daerah = document.querySelector('#cari_penduduk_suket_di_luar_daerah')
    const data_penduduk_suket_di_luar_daerah = document.querySelector('#data_penduduk_suket_di_luar_daerah')
    const modal_suket_di_luar_daerah = document.querySelector('#modal_suket_di_luar_daerah')
    const open_modal_suket_di_luar_daerah = () => modal_suket_di_luar_daerah.classList.toggle('hidden');
    const close_modal_suket_di_luar_daerah = () => modal_suket_di_luar_daerah.classList.toggle('hidden');

    const option_select_data_penduduk_suket_di_luar_daerah = item => {
        return `<option value="${item.id}">${item.nama_lengkap}</option>`
    }

    const generate_isi_option_select_data_penduduk_suket_di_luar_daerah = async () => {
        try {
            const response = await fetch(`${api_data_penduduk}/find/${cari_penduduk_suket_di_luar_daerah.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_data_nkk = ``
            result.forEach(item => {
                all_option_select_data_nkk += option_select_data_penduduk_suket_di_luar_daerah(item)
            });

            data_penduduk_suket_di_luar_daerah.innerHTML = all_option_select_data_nkk
        } catch (error) {
            console.error("Error:", error)
        }
    }

    // suket pengantar kk
    const cari_penduduk_suket_pengantar_kk = document.querySelector('#cari_penduduk_suket_pengantar_kk')
    const data_penduduk_suket_pengantar_kk = document.querySelector('#data_penduduk_suket_pengantar_kk')
    const cari_penduduk_suket_pengantar_kk_istri = document.querySelector('#cari_penduduk_suket_pengantar_kk_istri')
    const data_penduduk_suket_pengantar_kk_istri = document.querySelector('#data_penduduk_suket_pengantar_kk_istri')
    const modal_suket_pengantar_kk = document.querySelector('#modal_suket_pengantar_kk')
    const open_modal_suket_pengantar_kk = () => modal_suket_pengantar_kk.classList.toggle('hidden');
    const close_modal_suket_pengantar_kk = () => modal_suket_pengantar_kk.classList.toggle('hidden');

    const option_select_data_penduduk_suket_pengantar_kk = item => {
        return `<option value="${item.id}">${item.nama_lengkap}</option>`
    }

    const generate_isi_option_select_data_penduduk_suket_pengantar_kk = async () => {
        try {
            const response = await fetch(`${api_data_penduduk}/find/${cari_penduduk_suket_pengantar_kk.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_data_nkk = ``
            result.forEach(item => {
                all_option_select_data_nkk += option_select_data_penduduk_suket_pengantar_kk(item)
            });

            data_penduduk_suket_pengantar_kk.innerHTML = all_option_select_data_nkk
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_data_penduduk_suket_pengantar_kk_istri = item => {
        return `<option value="${item.id}">${item.nama_lengkap}</option>`
    }

    const generate_isi_option_select_data_penduduk_suket_pengantar_kk_istri = async () => {
        try {
            const response = await fetch(`${api_data_penduduk}/find/${cari_penduduk_suket_pengantar_kk_istri.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_data_nkk = ``
            result.forEach(item => {
                all_option_select_data_nkk += option_select_data_penduduk_suket_pengantar_kk_istri(item)
            });

            data_penduduk_suket_pengantar_kk_istri.innerHTML = all_option_select_data_nkk
        } catch (error) {
            console.error("Error:", error)
        }
    }

    // suket pengantar ktp
    const cari_penduduk_suket_pengantar_ktp = document.querySelector('#cari_penduduk_suket_pengantar_ktp')
    const data_penduduk_suket_pengantar_ktp = document.querySelector('#data_penduduk_suket_pengantar_ktp')
    const modal_suket_pengantar_ktp = document.querySelector('#modal_suket_pengantar_ktp')
    const open_modal_suket_pengantar_ktp = () => modal_suket_pengantar_ktp.classList.toggle('hidden');
    const close_modal_suket_pengantar_ktp = () => modal_suket_pengantar_ktp.classList.toggle('hidden');

    const option_select_data_penduduk_suket_pengantar_ktp = item => {
        return `<option value="${item.id}">${item.nama_lengkap}</option>`
    }

    const generate_isi_option_select_data_penduduk_suket_pengantar_ktp = async () => {
        try {
            const response = await fetch(`${api_data_penduduk}/find/${cari_penduduk_suket_pengantar_ktp.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_data_nkk = ``
            result.forEach(item => {
                all_option_select_data_nkk += option_select_data_penduduk_suket_pengantar_ktp(item)
            });

            data_penduduk_suket_pengantar_ktp.innerHTML = all_option_select_data_nkk
        } catch (error) {
            console.error("Error:", error)
        }
    }
</script>

<?= $this->endSection(); ?>