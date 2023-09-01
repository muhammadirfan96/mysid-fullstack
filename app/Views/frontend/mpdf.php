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
                <p class="text-center font-medium text-lg" id="head_form">data suket tidak mampu</p>

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
</script>

<?= $this->endSection(); ?>