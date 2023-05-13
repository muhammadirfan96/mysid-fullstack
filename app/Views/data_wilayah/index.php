<?= $this->extend('index'); ?>
<?= $this->section('page'); ?>

<div>
    <div class="bg-cyan-200 rounded-md m-2 p-2">
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

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="provinsi"></select>
                        <button id="btn_show_provinsi" class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_provinsi()">show provinsi</button>
                    </div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="kabupaten"></select>
                        <button id="btn_show_kabupaten" class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_kabupaten()">show kabupaten</button>
                    </div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="kecamatan"></select>
                        <button id="btn_show_kecamatan" class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_kecamatan()">show kecamatan</button>
                    </div>
                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="desa"></select>
                        <button id="btn_show_desa" class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_desa()">show desa</button>
                    </div>

                    <div class="flex">
                        <button class="w-[50%] p-1 mb-2 outline-none bg-green-300 rounded-l-md" type="button" onclick="add_list_aset_prasarana_ekonomi()">+</button>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-red-300 rounded-r-md" type="button" onclick="remove_list_aset_prasarana_ekonomi()">-</button>
                    </div>

                    <div id="aset_prasarana_ekonomi">
                        <div class="flex">
                            <input class="nama_aset_prasarana_ekonomi w-[80%] p-1 mb-2 outline-none border border-r-0 border-cyan-500 rounded-l-md" placeholder="masukkan nama aset prasarana ekonomi" type="text" autocomplete="off">
                            <input class="jumlah_aset_prasarana_ekonomi w-[20%] p-1 mb-2 outline-none border border-cyan-500 rounded-r-md" placeholder="jumlah" type="number" min="1" autocomplete="off">
                        </div>
                    </div>

                    <div class="flex">
                        <button class="w-[50%] p-1 mb-2 outline-none bg-green-300 rounded-l-md" type="button" onclick="add_list_aset_prasarana_ibadah()">+</button>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-red-300 rounded-r-md" type="button" onclick="remove_list_aset_prasarana_ibadah()">-</button>
                    </div>

                    <div id="aset_prasarana_ibadah">
                        <div class="flex">
                            <input class="nama_aset_prasarana_ibadah w-[80%] p-1 mb-2 outline-none border border-r-0 border-cyan-500 rounded-l-md" placeholder="masukkan nama aset prasarana ibadah" type="text" autocomplete="off">
                            <input class="jumlah_aset_prasarana_ibadah w-[20%] p-1 mb-2 outline-none border border-cyan-500 rounded-r-md" placeholder="jumlah" type="number" min="1" autocomplete="off">
                        </div>
                    </div>

                    <div class="flex">
                        <button class="w-[50%] p-1 mb-2 outline-none bg-green-300 rounded-l-md" type="button" onclick="add_list_aset_prasarana_kesehatan()">+</button>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-red-300 rounded-r-md" type="button" onclick="remove_list_aset_prasarana_kesehatan()">-</button>
                    </div>

                    <div id="aset_prasarana_kesehatan">
                        <div class="flex">
                            <input class="nama_aset_prasarana_kesehatan w-[80%] p-1 mb-2 outline-none border border-r-0 border-cyan-500 rounded-l-md" placeholder="masukkan nama aset prasarana kesehatan" type="text" autocomplete="off">
                            <input class="jumlah_aset_prasarana_kesehatan w-[20%] p-1 mb-2 outline-none border border-cyan-500 rounded-r-md" placeholder="jumlah" type="number" min="1" autocomplete="off">
                        </div>
                    </div>

                    <div class="flex">
                        <button class="w-[50%] p-1 mb-2 outline-none bg-green-300 rounded-l-md" type="button" onclick="add_list_aset_prasarana_pemerintahan_desa()">+</button>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-red-300 rounded-r-md" type="button" onclick="remove_list_aset_prasarana_pemerintahan_desa()">-</button>
                    </div>

                    <div id="aset_prasarana_pemerintahan_desa">
                        <div class="flex">
                            <input class="nama_aset_prasarana_pemerintahan_desa w-[80%] p-1 mb-2 outline-none border border-r-0 border-cyan-500 rounded-l-md" placeholder="masukkan nama aset prasarana pemerintahan_desa" type="text" autocomplete="off">
                            <input class="jumlah_aset_prasarana_pemerintahan_desa w-[20%] p-1 mb-2 outline-none border border-cyan-500 rounded-r-md" placeholder="jumlah" type="number" min="1" autocomplete="off">
                        </div>
                    </div>

                    <div class="flex">
                        <button class="w-[50%] p-1 mb-2 outline-none bg-green-300 rounded-l-md" type="button" onclick="add_list_aset_prasarana_pendidikan()">+</button>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-red-300 rounded-r-md" type="button" onclick="remove_list_aset_prasarana_pendidikan()">-</button>
                    </div>

                    <div id="aset_prasarana_pendidikan">
                        <div class="flex">
                            <input class="nama_aset_prasarana_pendidikan w-[80%] p-1 mb-2 outline-none border border-r-0 border-cyan-500 rounded-l-md" placeholder="masukkan nama aset prasarana pendidikan" type="text" autocomplete="off">
                            <input class="jumlah_aset_prasarana_pendidikan w-[20%] p-1 mb-2 outline-none border border-cyan-500 rounded-r-md" placeholder="jumlah" type="number" min="1" autocomplete="off">
                        </div>
                    </div>

                    <div class="flex">
                        <button class="w-[50%] p-1 mb-2 outline-none bg-green-300 rounded-l-md" type="button" onclick="add_list_aset_prasarana_umum()">+</button>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-red-300 rounded-r-md" type="button" onclick="remove_list_aset_prasarana_umum()">-</button>
                    </div>

                    <div id="aset_prasarana_umum">
                        <div class="flex">
                            <input class="nama_aset_prasarana_umum w-[80%] p-1 mb-2 outline-none border border-r-0 border-cyan-500 rounded-l-md" placeholder="masukkan nama aset prasarana umum" type="text" autocomplete="off">
                            <input class="jumlah_aset_prasarana_umum w-[20%] p-1 mb-2 outline-none border border-cyan-500 rounded-r-md" placeholder="jumlah" type="number" min="1" autocomplete="off">
                        </div>
                    </div>

                    <div class="flex">
                        <button class="w-[50%] p-1 mb-2 outline-none bg-green-300 rounded-l-md" type="button" onclick="add_list_lembaga_pelayanan()">+</button>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-red-300 rounded-r-md" type="button" onclick="remove_list_lembaga_pelayanan()">-</button>
                    </div>

                    <div id="lembaga_pelayanan">
                        <div class="flex">
                            <input class="nama_lembaga_pelayanan w-[80%] p-1 mb-2 outline-none border border-r-0 border-cyan-500 rounded-l-md" placeholder="masukkan nama lembaga pelayanan" type="text" autocomplete="off">
                            <input class="jumlah_lembaga_pelayanan w-[20%] p-1 mb-2 outline-none border border-cyan-500 rounded-r-md" placeholder="jumlah" type="number" min="1" autocomplete="off">
                        </div>
                    </div>

                    <div class="flex">
                        <button class="w-[50%] p-1 mb-2 outline-none bg-green-300 rounded-l-md" type="button" onclick="add_list_kebiasaan()">+</button>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-red-300 rounded-r-md" type="button" onclick="remove_list_kebiasaan()">-</button>
                    </div>

                    <div id="kebiasaan">
                        <div class="flex">
                            <input class="nama_kebiasaan w-[80%] p-1 mb-2 outline-none border border-r-0 border-cyan-500 rounded-l-md" placeholder="masukkan nama kebiasaan" type="text" autocomplete="off">
                            <input class="ket_kebiasaan w-[20%] p-1 mb-2 outline-none border border-cyan-500 rounded-r-md" placeholder="ket" type="text" autocomplete="off">
                        </div>
                    </div>

                    <div class="flex">
                        <button class="w-[50%] p-1 mb-2 outline-none bg-green-300 rounded-l-md" type="button" onclick="add_list_sumber_daya_milik_warga()">+</button>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-red-300 rounded-r-md" type="button" onclick="remove_list_sumber_daya_milik_warga()">-</button>
                    </div>

                    <div id="sumber_daya_milik_warga">
                        <div class="flex">
                            <input class="nama_sumber_daya_milik_warga w-[80%] p-1 mb-2 outline-none border border-r-0 border-cyan-500 rounded-l-md" placeholder="masukkan nama sumber daya milik warga" type="text" autocomplete="off">
                            <input class="jumlah_sumber_daya_milik_warga w-[20%] p-1 mb-2 outline-none border border-cyan-500 rounded-r-md" placeholder="jumlah" type="number" min="1" autocomplete="off">
                        </div>
                    </div>

                    <div class="flex">
                        <button class="w-[50%] p-1 mb-2 outline-none bg-green-300 rounded-l-md" type="button" onclick="add_list_sumber_daya_alam()">+</button>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-red-300 rounded-r-md" type="button" onclick="remove_list_sumber_daya_alam()">-</button>
                    </div>

                    <div id="sumber_daya_alam">
                        <div class="flex">
                            <input class="nama_sumber_daya_alam w-[80%] p-1 mb-2 outline-none border border-r-0 border-cyan-500 rounded-l-md" placeholder="masukkan nama sumber daya alam" type="text" autocomplete="off">
                            <input class="ket_sumber_daya_alam w-[20%] p-1 mb-2 outline-none border border-cyan-500 rounded-r-md" placeholder="ket" type="text" autocomplete="off">
                        </div>
                    </div>

                    <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">submit</button>
                </form>
            </div>
        </div>

        <div class="flex flex-wrap justify-evenly">
            <div class="w-[23%] overflow-auto border-2 border-cyan-700 rounded-md m-2 text-cyan-700">
                <!-- tombol tambah data -->
                <button class="p-2 outline-none w-full" onclick="show_tambah()" type="button">+ tambah data</button>
            </div>

            <div class="w-[23%] overflow-auto border-2 border-cyan-700 rounded-md m-2 p-2 text-cyan-700 text-center">
                <!-- pagination -->
                <select class="outline-none" onchange="update_page()" id="per_page">
                    <option value="5">5</option>
                    <option selected value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
                per page
            </div>

            <div class="w-[23%] overflow-auto border-2 border-cyan-700 rounded-md m-2 p-2 text-cyan-700 text-center" id="page_list">
                <!-- isi page list -->
            </div>

            <div class="w-[23%] overflow-auto border-2 border-cyan-700 rounded-md m-2 text-cyan-700">
                <!-- >>>> cari data -->
                <input class="p-2 outline-none w-full" onkeyup="update_page()" key type="text" id="key_pencarian" value="*" placeholder="key_pencarian" autocomplete="off" autofocus>
            </div>
        </div>

        <!-- tabel data -->
        <div class="overflow-auto">
            <table cellpadding="5" class="w-full">
                <thead class="bg-cyan-100 p-1 border-b-2">
                    <tr>
                        <th width="1%">action</th>
                        <th>provinsi</th>
                        <th>kabupaten</th>
                        <th>kecamatan</th>
                        <th>desa</th>
                        <th>aset prasarana ekonomi</th>
                        <th>aset prasarana ibadah</th>
                        <th>aset prasarana kesehatan</th>
                        <th>aset prasarana pemerintahan desa</th>
                        <th>aset prasarana pendidikan</th>
                        <th>aset prasarana umum</th>
                        <th>lembaga pelayanan</th>
                        <th>kebiasaan</th>
                        <th>sumber daya milik warga</th>
                        <th>sumber daya alam</th>
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
    const api = '<?= base_url('/datawilayahs') ?>'
    const api_provinsi = '<?= base_url('/provinsis') ?>'
    const api_kabupaten = '<?= base_url('/kabupatens') ?>'
    const api_kecamatan = '<?= base_url('/kecamatans') ?>'
    const api_desa = '<?= base_url('/desas') ?>'
    const provinsi = document.querySelector('#provinsi')
    const kabupaten = document.querySelector('#kabupaten')
    const kecamatan = document.querySelector('#kecamatan')
    const desa = document.querySelector('#desa')
    const aset_prasarana_ekonomi = document.querySelector('#aset_prasarana_ekonomi')
    const aset_prasarana_ibadah = document.querySelector('#aset_prasarana_ibadah')
    const aset_prasarana_kesehatan = document.querySelector('#aset_prasarana_kesehatan')
    const aset_prasarana_pemerintahan_desa = document.querySelector('#aset_prasarana_pemerintahan_desa')
    const aset_prasarana_pendidikan = document.querySelector('#aset_prasarana_pendidikan')
    const aset_prasarana_umum = document.querySelector('#aset_prasarana_umum')
    const lembaga_pelayanan = document.querySelector('#lembaga_pelayanan')
    const kebiasaan = document.querySelector('#kebiasaan')
    const sumber_daya_milik_warga = document.querySelector('#sumber_daya_milik_warga')
    const sumber_daya_alam = document.querySelector('#sumber_daya_alam')

    const modal_form = document.querySelector('#modal_form')
    const head_form = document.querySelector('#head_form')
    const err_msg = document.querySelector('#err_msg')
    const form_input = document.querySelector('#form_input')
    const key_pencarian = document.querySelector('#key_pencarian')
    const per_page = document.querySelector('#per_page')
    const page_list = document.querySelector('#page_list')
    const tbody = document.querySelector('#tbody')

    const btn_show_provinsi = document.querySelector('#btn_show_provinsi')
    const btn_show_kabupaten = document.querySelector('#btn_show_kabupaten')
    const btn_show_kecamatan = document.querySelector('#btn_show_kecamatan')
    const btn_show_desa = document.querySelector('#btn_show_desa')

    const add_list_sumber_daya_alam = () => {
        const div_sumber_daya_alam = document.createElement("div")
        const input_nama_sumber_daya_alam = document.createElement("input")
        const input_ket_sumber_daya_alam = document.createElement("input")

        input_nama_sumber_daya_alam.classList.add("nama_sumber_daya_alam", "w-[100%]", "p-1", "mb-2", "outline-none", "border", "border-cyan-500", "rounded-md")
        input_nama_sumber_daya_alam.placeholder = "masukkan nama sumber daya alam"
        input_nama_sumber_daya_alam.type = "textarea"
        input_nama_sumber_daya_alam.autocomplete = "off"

        input_ket_sumber_daya_alam.classList.add("ket_sumber_daya_alam", "w-[100%]", "p-1", "mb-2", "outline-none", "border", "border-cyan-500", "rounded-md")
        input_ket_sumber_daya_alam.placeholder = "ket"
        input_ket_sumber_daya_alam.type = "text"
        input_ket_sumber_daya_alam.autocomplete = "off"

        div_sumber_daya_alam.appendChild(input_nama_sumber_daya_alam)
        div_sumber_daya_alam.appendChild(input_ket_sumber_daya_alam)

        sumber_daya_alam.appendChild(div_sumber_daya_alam)
    }

    const remove_list_sumber_daya_alam = () => {
        sumber_daya_alam.removeChild(sumber_daya_alam.lastElementChild)
    }

    const add_list_sumber_daya_milik_warga = () => {
        const div_sumber_daya_milik_warga = document.createElement("div")
        const input_nama_sumber_daya_milik_warga = document.createElement("input")
        const input_jumlah_sumber_daya_milik_warga = document.createElement("input")

        div_sumber_daya_milik_warga.classList.add("flex")

        input_nama_sumber_daya_milik_warga.classList.add("nama_sumber_daya_milik_warga", "w-[80%]", "p-1", "mb-2", "outline-none", "border", "border-r-0", "border-cyan-500", "rounded-l-md")
        input_nama_sumber_daya_milik_warga.placeholder = "masukkan nama sumber daya milik warga"
        input_nama_sumber_daya_milik_warga.type = "text"
        input_nama_sumber_daya_milik_warga.autocomplete = "off"

        input_jumlah_sumber_daya_milik_warga.classList.add("jumlah_sumber_daya_milik_warga", "w-[20%]", "p-1", "mb-2", "outline-none", "border", "border-cyan-500", "rounded-r-md")
        input_jumlah_sumber_daya_milik_warga.placeholder = "jumlah"
        input_jumlah_sumber_daya_milik_warga.type = "number"
        input_jumlah_sumber_daya_milik_warga.min = "0"
        input_jumlah_sumber_daya_milik_warga.autocomplete = "off"

        div_sumber_daya_milik_warga.appendChild(input_nama_sumber_daya_milik_warga)
        div_sumber_daya_milik_warga.appendChild(input_jumlah_sumber_daya_milik_warga)

        sumber_daya_milik_warga.appendChild(div_sumber_daya_milik_warga)
    }

    const remove_list_sumber_daya_milik_warga = () => {
        sumber_daya_milik_warga.removeChild(sumber_daya_milik_warga.lastElementChild)
    }

    const add_list_kebiasaan = () => {
        const div_kebiasaan = document.createElement("div")
        const input_nama_kebiasaan = document.createElement("input")
        const input_ket_kebiasaan = document.createElement("input")

        input_nama_kebiasaan.classList.add("nama_kebiasaan", "w-[100%]", "p-1", "mb-2", "outline-none", "border", "border-cyan-500", "rounded-md")
        input_nama_kebiasaan.placeholder = "masukkan nama kebiasaan"
        input_nama_kebiasaan.type = "textarea"
        input_nama_kebiasaan.autocomplete = "off"

        input_ket_kebiasaan.classList.add("ket_kebiasaan", "w-[100%]", "p-1", "mb-2", "outline-none", "border", "border-cyan-500", "rounded-md")
        input_ket_kebiasaan.placeholder = "ket"
        input_ket_kebiasaan.type = "text"
        input_ket_kebiasaan.autocomplete = "off"

        div_kebiasaan.appendChild(input_nama_kebiasaan)
        div_kebiasaan.appendChild(input_ket_kebiasaan)

        kebiasaan.appendChild(div_kebiasaan)
    }

    const remove_list_kebiasaan = () => {
        kebiasaan.removeChild(kebiasaan.lastElementChild)
    }

    const add_list_lembaga_pelayanan = () => {
        const div_lembaga_pelayanan = document.createElement("div")
        const input_nama_lembaga_pelayanan = document.createElement("input")
        const input_jumlah_lembaga_pelayanan = document.createElement("input")

        div_lembaga_pelayanan.classList.add("flex")

        input_nama_lembaga_pelayanan.classList.add("nama_lembaga_pelayanan", "w-[80%]", "p-1", "mb-2", "outline-none", "border", "border-r-0", "border-cyan-500", "rounded-l-md")
        input_nama_lembaga_pelayanan.placeholder = "masukkan nama lembaga pelayanan"
        input_nama_lembaga_pelayanan.type = "text"
        input_nama_lembaga_pelayanan.autocomplete = "off"

        input_jumlah_lembaga_pelayanan.classList.add("jumlah_lembaga_pelayanan", "w-[20%]", "p-1", "mb-2", "outline-none", "border", "border-cyan-500", "rounded-r-md")
        input_jumlah_lembaga_pelayanan.placeholder = "jumlah"
        input_jumlah_lembaga_pelayanan.type = "number"
        input_jumlah_lembaga_pelayanan.min = "0"
        input_jumlah_lembaga_pelayanan.autocomplete = "off"

        div_lembaga_pelayanan.appendChild(input_nama_lembaga_pelayanan)
        div_lembaga_pelayanan.appendChild(input_jumlah_lembaga_pelayanan)

        lembaga_pelayanan.appendChild(div_lembaga_pelayanan)
    }

    const remove_list_lembaga_pelayanan = () => {
        lembaga_pelayanan.removeChild(lembaga_pelayanan.lastElementChild)
    }

    const add_list_aset_prasarana_umum = () => {
        const div_aset_prasarana_umum = document.createElement("div")
        const input_nama_aset_prasarana_umum = document.createElement("input")
        const input_jumlah_aset_prasarana_umum = document.createElement("input")

        div_aset_prasarana_umum.classList.add("flex")

        input_nama_aset_prasarana_umum.classList.add("nama_aset_prasarana_umum", "w-[80%]", "p-1", "mb-2", "outline-none", "border", "border-r-0", "border-cyan-500", "rounded-l-md")
        input_nama_aset_prasarana_umum.placeholder = "masukkan nama aset prasarana umum"
        input_nama_aset_prasarana_umum.type = "text"
        input_nama_aset_prasarana_umum.autocomplete = "off"

        input_jumlah_aset_prasarana_umum.classList.add("jumlah_aset_prasarana_umum", "w-[20%]", "p-1", "mb-2", "outline-none", "border", "border-cyan-500", "rounded-r-md")
        input_jumlah_aset_prasarana_umum.placeholder = "jumlah"
        input_jumlah_aset_prasarana_umum.type = "number"
        input_jumlah_aset_prasarana_umum.min = "0"
        input_jumlah_aset_prasarana_umum.autocomplete = "off"

        div_aset_prasarana_umum.appendChild(input_nama_aset_prasarana_umum)
        div_aset_prasarana_umum.appendChild(input_jumlah_aset_prasarana_umum)

        aset_prasarana_umum.appendChild(div_aset_prasarana_umum)
    }

    const remove_list_aset_prasarana_umum = () => {
        aset_prasarana_umum.removeChild(aset_prasarana_umum.lastElementChild)
    }

    const add_list_aset_prasarana_pendidikan = () => {
        const div_aset_prasarana_pendidikan = document.createElement("div")
        const input_nama_aset_prasarana_pendidikan = document.createElement("input")
        const input_jumlah_aset_prasarana_pendidikan = document.createElement("input")

        div_aset_prasarana_pendidikan.classList.add("flex")

        input_nama_aset_prasarana_pendidikan.classList.add("nama_aset_prasarana_pendidikan", "w-[80%]", "p-1", "mb-2", "outline-none", "border", "border-r-0", "border-cyan-500", "rounded-l-md")
        input_nama_aset_prasarana_pendidikan.placeholder = "masukkan nama aset prasarana pendidikan"
        input_nama_aset_prasarana_pendidikan.type = "text"
        input_nama_aset_prasarana_pendidikan.autocomplete = "off"

        input_jumlah_aset_prasarana_pendidikan.classList.add("jumlah_aset_prasarana_pendidikan", "w-[20%]", "p-1", "mb-2", "outline-none", "border", "border-cyan-500", "rounded-r-md")
        input_jumlah_aset_prasarana_pendidikan.placeholder = "jumlah"
        input_jumlah_aset_prasarana_pendidikan.type = "number"
        input_jumlah_aset_prasarana_pendidikan.min = "0"
        input_jumlah_aset_prasarana_pendidikan.autocomplete = "off"

        div_aset_prasarana_pendidikan.appendChild(input_nama_aset_prasarana_pendidikan)
        div_aset_prasarana_pendidikan.appendChild(input_jumlah_aset_prasarana_pendidikan)

        aset_prasarana_pendidikan.appendChild(div_aset_prasarana_pendidikan)
    }

    const remove_list_aset_prasarana_pendidikan = () => {
        aset_prasarana_pendidikan.removeChild(aset_prasarana_pendidikan.lastElementChild)
    }

    const add_list_aset_prasarana_pemerintahan_desa = () => {
        const div_aset_prasarana_pemerintahan_desa = document.createElement("div")
        const input_nama_aset_prasarana_pemerintahan_desa = document.createElement("input")
        const input_jumlah_aset_prasarana_pemerintahan_desa = document.createElement("input")

        div_aset_prasarana_pemerintahan_desa.classList.add("flex")

        input_nama_aset_prasarana_pemerintahan_desa.classList.add("nama_aset_prasarana_pemerintahan_desa", "w-[80%]", "p-1", "mb-2", "outline-none", "border", "border-r-0", "border-cyan-500", "rounded-l-md")
        input_nama_aset_prasarana_pemerintahan_desa.placeholder = "masukkan nama aset prasarana pemerintahan desa"
        input_nama_aset_prasarana_pemerintahan_desa.type = "text"
        input_nama_aset_prasarana_pemerintahan_desa.autocomplete = "off"

        input_jumlah_aset_prasarana_pemerintahan_desa.classList.add("jumlah_aset_prasarana_pemerintahan_desa", "w-[20%]", "p-1", "mb-2", "outline-none", "border", "border-cyan-500", "rounded-r-md")
        input_jumlah_aset_prasarana_pemerintahan_desa.placeholder = "jumlah"
        input_jumlah_aset_prasarana_pemerintahan_desa.type = "number"
        input_jumlah_aset_prasarana_pemerintahan_desa.min = "0"
        input_jumlah_aset_prasarana_pemerintahan_desa.autocomplete = "off"

        div_aset_prasarana_pemerintahan_desa.appendChild(input_nama_aset_prasarana_pemerintahan_desa)
        div_aset_prasarana_pemerintahan_desa.appendChild(input_jumlah_aset_prasarana_pemerintahan_desa)

        aset_prasarana_pemerintahan_desa.appendChild(div_aset_prasarana_pemerintahan_desa)
    }

    const remove_list_aset_prasarana_pemerintahan_desa = () => {
        aset_prasarana_pemerintahan_desa.removeChild(aset_prasarana_pemerintahan_desa.lastElementChild)
    }

    const add_list_aset_prasarana_kesehatan = () => {
        const div_aset_prasarana_kesehatan = document.createElement("div")
        const input_nama_aset_prasarana_kesehatan = document.createElement("input")
        const input_jumlah_aset_prasarana_kesehatan = document.createElement("input")

        div_aset_prasarana_kesehatan.classList.add("flex")

        input_nama_aset_prasarana_kesehatan.classList.add("nama_aset_prasarana_kesehatan", "w-[80%]", "p-1", "mb-2", "outline-none", "border", "border-r-0", "border-cyan-500", "rounded-l-md")
        input_nama_aset_prasarana_kesehatan.placeholder = "masukkan nama aset prasarana kesehatan"
        input_nama_aset_prasarana_kesehatan.type = "text"
        input_nama_aset_prasarana_kesehatan.autocomplete = "off"

        input_jumlah_aset_prasarana_kesehatan.classList.add("jumlah_aset_prasarana_kesehatan", "w-[20%]", "p-1", "mb-2", "outline-none", "border", "border-cyan-500", "rounded-r-md")
        input_jumlah_aset_prasarana_kesehatan.placeholder = "jumlah"
        input_jumlah_aset_prasarana_kesehatan.type = "number"
        input_jumlah_aset_prasarana_kesehatan.min = "0"
        input_jumlah_aset_prasarana_kesehatan.autocomplete = "off"

        div_aset_prasarana_kesehatan.appendChild(input_nama_aset_prasarana_kesehatan)
        div_aset_prasarana_kesehatan.appendChild(input_jumlah_aset_prasarana_kesehatan)

        aset_prasarana_kesehatan.appendChild(div_aset_prasarana_kesehatan)
    }

    const remove_list_aset_prasarana_kesehatan = () => {
        aset_prasarana_kesehatan.removeChild(aset_prasarana_kesehatan.lastElementChild)
    }

    const add_list_aset_prasarana_ibadah = () => {
        const div_aset_prasarana_ibadah = document.createElement("div")
        const input_nama_aset_prasarana_ibadah = document.createElement("input")
        const input_jumlah_aset_prasarana_ibadah = document.createElement("input")

        div_aset_prasarana_ibadah.classList.add("flex")

        input_nama_aset_prasarana_ibadah.classList.add("nama_aset_prasarana_ibadah", "w-[80%]", "p-1", "mb-2", "outline-none", "border", "border-r-0", "border-cyan-500", "rounded-l-md")
        input_nama_aset_prasarana_ibadah.placeholder = "masukkan nama aset prasarana ibadah"
        input_nama_aset_prasarana_ibadah.type = "text"
        input_nama_aset_prasarana_ibadah.autocomplete = "off"

        input_jumlah_aset_prasarana_ibadah.classList.add("jumlah_aset_prasarana_ibadah", "w-[20%]", "p-1", "mb-2", "outline-none", "border", "border-cyan-500", "rounded-r-md")
        input_jumlah_aset_prasarana_ibadah.placeholder = "jumlah"
        input_jumlah_aset_prasarana_ibadah.type = "number"
        input_jumlah_aset_prasarana_ibadah.min = "0"
        input_jumlah_aset_prasarana_ibadah.autocomplete = "off"

        div_aset_prasarana_ibadah.appendChild(input_nama_aset_prasarana_ibadah)
        div_aset_prasarana_ibadah.appendChild(input_jumlah_aset_prasarana_ibadah)

        aset_prasarana_ibadah.appendChild(div_aset_prasarana_ibadah)
    }

    const remove_list_aset_prasarana_ibadah = () => {
        aset_prasarana_ibadah.removeChild(aset_prasarana_ibadah.lastElementChild)
    }

    const add_list_aset_prasarana_ekonomi = () => {
        const div_aset_prasarana_ekonomi = document.createElement("div")
        const input_nama_aset_prasarana_ekonomi = document.createElement("input")
        const input_jumlah_aset_prasarana_ekonomi = document.createElement("input")

        div_aset_prasarana_ekonomi.classList.add("flex")

        input_nama_aset_prasarana_ekonomi.classList.add("nama_aset_prasarana_ekonomi", "w-[80%]", "p-1", "mb-2", "outline-none", "border", "border-r-0", "border-cyan-500", "rounded-l-md")
        input_nama_aset_prasarana_ekonomi.placeholder = "masukkan nama aset prasarana ekonomi"
        input_nama_aset_prasarana_ekonomi.type = "text"
        input_nama_aset_prasarana_ekonomi.autocomplete = "off"

        input_jumlah_aset_prasarana_ekonomi.classList.add("jumlah_aset_prasarana_ekonomi", "w-[20%]", "p-1", "mb-2", "outline-none", "border", "border-cyan-500", "rounded-r-md")
        input_jumlah_aset_prasarana_ekonomi.placeholder = "jumlah"
        input_jumlah_aset_prasarana_ekonomi.type = "number"
        input_jumlah_aset_prasarana_ekonomi.min = "0"
        input_jumlah_aset_prasarana_ekonomi.autocomplete = "off"

        div_aset_prasarana_ekonomi.appendChild(input_nama_aset_prasarana_ekonomi)
        div_aset_prasarana_ekonomi.appendChild(input_jumlah_aset_prasarana_ekonomi)

        aset_prasarana_ekonomi.appendChild(div_aset_prasarana_ekonomi)
    }

    const remove_list_aset_prasarana_ekonomi = () => {
        aset_prasarana_ekonomi.removeChild(aset_prasarana_ekonomi.lastElementChild)
    }


    const option_select_desa = item => {
        return `<option value="${item.id}">${item.desa}</option>`
    }

    const generate_isi_option_select_desa = async () => {
        try {
            const response = await fetch(`${api_desa}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_desa = ``
            result.forEach(item => {
                all_option_select_desa += option_select_desa(item)
            });

            desa.innerHTML = all_option_select_desa
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_kecamatan = item => {
        return `<option value="${item.id}">${item.kecamatan}</option>`
    }

    const generate_isi_option_select_kecamatan = async () => {
        try {
            const response = await fetch(`${api_kecamatan}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_kecamatan = ``
            result.forEach(item => {
                all_option_select_kecamatan += option_select_kecamatan(item)
            });

            kecamatan.innerHTML = all_option_select_kecamatan
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_kabupaten = item => {
        return `<option value="${item.id}">${item.kabupaten}</option>`
    }

    const generate_isi_option_select_kabupaten = async () => {
        try {
            const response = await fetch(`${api_kabupaten}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_kabupaten = ``
            result.forEach(item => {
                all_option_select_kabupaten += option_select_kabupaten(item)
            });

            kabupaten.innerHTML = all_option_select_kabupaten
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_provinsi = item => {
        return `<option value="${item.id}">${item.provinsi}</option>`
    }

    const generate_isi_option_select_provinsi = async () => {
        try {
            const response = await fetch(`${api_provinsi}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_provinsi = ``
            result.forEach(item => {
                all_option_select_provinsi += option_select_provinsi(item)
            });

            provinsi.innerHTML = all_option_select_provinsi
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
                    <td>${item.provinsi}</td>
                    <td>${item.kabupaten}</td>
                    <td>${item.kecamatan}</td>
                    <td>${item.desa}</td>
                    <td>${item.aset_prasarana_ekonomi}</td>
                    <td>${item.aset_prasarana_ibadah}</td>
                    <td>${item.aset_prasarana_kesehatan}</td>
                    <td>${item.aset_prasarana_pemerintahan_desa}</td>
                    <td>${item.aset_prasarana_pendidikan}</td>
                    <td>${item.aset_prasarana_umum}</td>
                    <td>${item.lembaga_pelayanan}</td>
                    <td>${item.kebiasaan}</td>
                    <td>${item.sumber_daya_milik_warga}</td>
                    <td>${item.sumber_daya_alam}</td>
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
        formData.append('id_provinsis', provinsi.value)
        formData.append('id_kabupatens', kabupaten.value)
        formData.append('id_kecamatans', kecamatan.value)
        formData.append('id_desas', desa.value)

        assets.forEach(asset => {
            asset[1].querySelectorAll(`.nama_${asset[0]}`)
                .forEach(node => {
                    formData.append(`nama_${asset[0]}[]`, node.value)
                });
            asset[1].querySelectorAll(`.jumlah_${asset[0]}`)
                .forEach(node => {
                    formData.append(`jumlah_${asset[0]}[]`, node.value)
                });
            asset[1].querySelectorAll(`.ket_${asset[0]}`)
                .forEach(node => {
                    formData.append(`ket_${asset[0]}[]`, node.value)
                });
        })

        formData.append('created_by', 'admin')
        formData.append('updated_by', 'admin')
        upload(`${api}`, formData)
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

                const response_provinsi = await fetch(`${api_provinsi}/${result.id_provinsis}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_provinsi = await response_provinsi.json()
                provinsi.innerHTML = `<option value="${result_provinsi.id}">${result_provinsi.provinsi}</option>`
                btn_show_provinsi.setAttribute('disabled', '')
                const response_kabupaten = await fetch(`${api_kabupaten}/${result.id_kabupatens}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_kabupaten = await response_kabupaten.json()
                kabupaten.innerHTML = `<option value="${result_kabupaten.id}">${result_kabupaten.kabupaten}</option>`
                btn_show_kabupaten.setAttribute('disabled', '')
                const response_kecamatan = await fetch(`${api_kecamatan}/${result.id_kecamatans}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_kecamatan = await response_kecamatan.json()
                kecamatan.innerHTML = `<option value="${result_kecamatan.id}">${result_kecamatan.kecamatan}</option>`
                btn_show_kecamatan.setAttribute('disabled', '')
                const response_desa = await fetch(`${api_desa}/${result.id_desas}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_desa = await response_desa.json()
                desa.innerHTML = `<option value="${result_desa.id}">${result_desa.desa}</option>`
                btn_show_desa.setAttribute('disabled', '')

                const assetsResult = [
                    result.aset_prasarana_ekonomi,
                    result.aset_prasarana_ibadah,
                    result.aset_prasarana_kesehatan,
                    result.aset_prasarana_pemerintahan_desa,
                    result.aset_prasarana_pendidikan,
                    result.aset_prasarana_umum,
                    result.lembaga_pelayanan,
                    result.kebiasaan,
                    result.sumber_daya_milik_warga,
                    result.sumber_daya_alam,
                ]

                let h = 0
                assets.forEach(asset => {
                    asset[3]()
                    const all_result_aset = assetsResult[h].split("|")
                    for (let i = 0; i < all_result_aset.length - 1; i++) {
                        asset[2]()
                    }

                    let j = 0
                    asset[1].querySelectorAll(`.nama_${asset[0]}`)
                        .forEach(node => {
                            node.value = all_result_aset[j].split("[")[0]
                            j++
                        });

                    let k = 0
                    asset[1].querySelectorAll(`.jumlah_${asset[0]}`)
                        .forEach(node => {
                            node.value = all_result_aset[k].split("[")[1].replace(" unit]", "")
                            k++
                        });

                    let l = 0
                    asset[1].querySelectorAll(`.ket_${asset[0]}`)
                        .forEach(node => {
                            node.value = all_result_aset[k].split("[")[1].replace("]", "")
                            l++
                        });
                    h++
                });

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

        assets.forEach(asset => {
            asset[1].querySelectorAll(`.nama_${asset[0]}`)
                .forEach(node => {
                    formData.append(`nama_${asset[0]}[]`, node.value)
                });
            asset[1].querySelectorAll(`.jumlah_${asset[0]}`)
                .forEach(node => {
                    formData.append(`jumlah_${asset[0]}[]`, node.value)
                });
            asset[1].querySelectorAll(`.ket_${asset[0]}`)
                .forEach(node => {
                    formData.append(`ket_${asset[0]}[]`, node.value)
                });
        })

        formData.append('created_by', 'admin')
        formData.append('updated_by', 'admin')
        formData.append('_method', 'PATCH')
        upload(`${api}/${id}`, formData)
    }

    const assets = [
        [
            "aset_prasarana_ekonomi",
            aset_prasarana_ekonomi,
            add_list_aset_prasarana_ekonomi,
            remove_list_aset_prasarana_ekonomi
        ],
        [
            "aset_prasarana_ibadah",
            aset_prasarana_ibadah,
            add_list_aset_prasarana_ibadah,
            remove_list_aset_prasarana_ibadah
        ],
        [
            "aset_prasarana_kesehatan",
            aset_prasarana_kesehatan,
            add_list_aset_prasarana_kesehatan,
            remove_list_aset_prasarana_kesehatan
        ],
        [
            "aset_prasarana_pemerintahan_desa",
            aset_prasarana_pemerintahan_desa,
            add_list_aset_prasarana_pemerintahan_desa,
            remove_list_aset_prasarana_pemerintahan_desa
        ],
        [
            "aset_prasarana_pendidikan",
            aset_prasarana_pendidikan,
            add_list_aset_prasarana_pendidikan,
            remove_list_aset_prasarana_pendidikan
        ],
        [
            "aset_prasarana_umum",
            aset_prasarana_umum,
            add_list_aset_prasarana_umum,
            remove_list_aset_prasarana_umum
        ],
        [
            "lembaga_pelayanan",
            lembaga_pelayanan,
            add_list_lembaga_pelayanan,
            remove_list_lembaga_pelayanan
        ],
        [
            "kebiasaan",
            kebiasaan,
            add_list_kebiasaan,
            remove_list_kebiasaan
        ],
        [
            "sumber_daya_milik_warga",
            sumber_daya_milik_warga,
            add_list_sumber_daya_milik_warga,
            remove_list_sumber_daya_milik_warga
        ],
        [
            "sumber_daya_alam",
            sumber_daya_alam,
            add_list_sumber_daya_alam,
            remove_list_sumber_daya_alam
        ],
    ]

    const close_modal = () => {
        form_input.reset()
        provinsi.innerHTML = ''
        kabupaten.innerHTML = ''
        kecamatan.innerHTML = ''
        desa.innerHTML = ''

        assets.forEach(asset => {
            while (asset[1].hasChildNodes()) {
                asset[1].removeChild(asset[1].firstChild);
            }
        })

        add_list_aset_prasarana_ekonomi()
        add_list_aset_prasarana_ibadah()
        add_list_aset_prasarana_kesehatan()
        add_list_aset_prasarana_pemerintahan_desa()
        add_list_aset_prasarana_pendidikan()
        add_list_aset_prasarana_umum()
        add_list_lembaga_pelayanan()
        add_list_kebiasaan()
        add_list_sumber_daya_milik_warga()
        add_list_sumber_daya_alam()
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

    function getCookie(cookieName) {
        let cookie = {};
        document.cookie.split(';').forEach(function(el) {
            let [key, value] = el.split('=');
            cookie[key.trim()] = value;
        })
        return cookie[cookieName];
    }

    err_msg.style.display = 'none'
    modal_form.style.display = 'none'
    generate_isi_page_list()
    generate_isi_tr_tbody()
</script>

<?= $this->endSection(); ?>