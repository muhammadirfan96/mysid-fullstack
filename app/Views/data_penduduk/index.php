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
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan nik" type="text" id="nik" autocomplete="off">

                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan nama_lengkap" type="text" id="nama_lengkap" autocomplete="off">

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="data_nkk"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_data_nkk()">show nkk</button>
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
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="provinsi"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_provinsi()">show provinsi</button>
                    </div>

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="kabupaten"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_kabupaten()">show kabupaten</button>
                    </div>

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="kecamatan"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_kecamatan()">show kecamatan</button>
                    </div>

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="desa"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_desa()">show desa</button>
                    </div>

                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan alamat_lengkap" type="text" id="alamat_lengkap" autocomplete="off">

                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan pekerjaan" type="text" id="pekerjaan" autocomplete="off">

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
                        <th>foto</th>
                        <th>nik</th>
                        <th>nama lengkap</th>
                        <th>nkk</th>
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
                        <th>alamat lengkap</th>
                        <th>pekerjaan</th>
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
    const nik = document.querySelector('#nik')
    const nama_lengkap = document.querySelector('#nama_lengkap')
    const data_nkk = document.querySelector('#data_nkk')
    const agama = document.querySelector('#agama')
    const golongan_darah = document.querySelector('#golongan_darah')
    const pendidikan = document.querySelector('#pendidikan')
    const status_hub_dlm_kel = document.querySelector('#status_hub_dlm_kel')
    const kewarganegaraan = document.querySelector('#kewarganegaraan')
    const jenis_kelamin = document.querySelector('#jenis_kelamin')
    const provinsi = document.querySelector('#provinsi')
    const kabupaten = document.querySelector('#kabupaten')
    const kecamatan = document.querySelector('#kecamatan')
    const desa = document.querySelector('#desa')
    const alamat_lengkap = document.querySelector('#alamat_lengkap')
    const pekerjaan = document.querySelector('#pekerjaan')
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

    const option_select_desa = item => {
        return `<option value="${item.id}">${item.desa}</option>`
    }

    const generate_isi_option_select_desa = async () => {
        try {
            const response = await fetch(`${api_desa}/find/*`)
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
            const response = await fetch(`${api_kecamatan}/find/*`)
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
            const response = await fetch(`${api_kabupaten}/find/*`)
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
            const response = await fetch(`${api_provinsi}/find/*`)
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
        return `<option value="${item.id}">${item.nkk}</option>`
    }

    const generate_isi_option_select_data_nkk = async () => {
        try {
            const response = await fetch(`${api_data_nkk}/find/*`)
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
            const response = await fetch(`${api}/find/${key_pencarian.value}`)
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
                    <td>${item.alamat_lengkap}</td>
                    <td>${item.pekerjaan}</td>
                    <td>${item.created_at}</td>
                    <td>${item.created_by}</td>
                    <td>${item.updated_at}</td>
                    <td>${item.updated_by}</td>
                </tr>`
    }

    const generate_isi_tr_tbody = async (offset = 0) => {
        try {
            const response = await fetch(`${api}/find/${key_pencarian.value}/${per_page.value}/${offset}`)
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
        formData.append('nik', nik.value)
        formData.append('nama_lengkap', nama_lengkap.value)
        formData.append('id_data_nkks', data_nkk.value)
        formData.append('id_agamas', agama.value)
        formData.append('id_golongan_darahs', golongan_darah.value)
        formData.append('id_pendidikans', pendidikan.value)
        formData.append('id_status_hub_dlm_kels', status_hub_dlm_kel.value)
        formData.append('id_kewarganegaraans', kewarganegaraan.value)
        formData.append('id_jenis_kelamins', jenis_kelamin.value)
        formData.append('id_provinsis', provinsi.value)
        formData.append('id_kabupatens', kabupaten.value)
        formData.append('id_kecamatans', kecamatan.value)
        formData.append('id_desas', desa.value)
        formData.append('alamat_lengkap', alamat_lengkap.value)
        formData.append('pekerjaan', pekerjaan.value)
        formData.append('foto', foto.files[0])
        formData.append('created_by', 'admin')
        formData.append('updated_by', 'admin')
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
                const response = await fetch(`${api}/${id}`)
                const result = await response.json()

                nik.value = result.nik
                nama_lengkap.value = result.nama_lengkap

                const response_data_nkk = await fetch(`${api_data_nkk}/${result.id_data_nkks}`)
                const result_data_nkk = await response_data_nkk.json()
                data_nkk.innerHTML = `<option value="${result_data_nkk.id}">${result_data_nkk.nkk}</option>`

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

                const response_provinsi = await fetch(`${api_provinsi}/${result.id_provinsis}`)
                const result_provinsi = await response_provinsi.json()
                provinsi.innerHTML = `<option value="${result_provinsi.id}">${result_provinsi.provinsi}</option>`

                const response_kabupaten = await fetch(`${api_kabupaten}/${result.id_kabupatens}`)
                const result_kabupaten = await response_kabupaten.json()
                kabupaten.innerHTML = `<option value="${result_kabupaten.id}">${result_kabupaten.kabupaten}</option>`

                const response_kecamatan = await fetch(`${api_kecamatan}/${result.id_kecamatans}`)
                const result_kecamatan = await response_kecamatan.json()
                kecamatan.innerHTML = `<option value="${result_kecamatan.id}">${result_kecamatan.kecamatan}</option>`

                const response_desa = await fetch(`${api_desa}/${result.id_desas}`)
                const result_desa = await response_desa.json()
                desa.innerHTML = `<option value="${result_desa.id}">${result_desa.desa}</option>`

                alamat_lengkap.value = result.alamat_lengkap
                pekerjaan.value = result.pekerjaan
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
        formData.append('nik', nik.value)
        formData.append('nama_lengkap', nama_lengkap.value)
        formData.append('id_data_nkks', data_nkk.value)
        formData.append('id_agamas', agama.value)
        formData.append('id_golongan_darahs', golongan_darah.value)
        formData.append('id_pendidikans', pendidikan.value)
        formData.append('id_status_hub_dlm_kels', status_hub_dlm_kel.value)
        formData.append('id_kewarganegaraans', kewarganegaraan.value)
        formData.append('id_jenis_kelamins', jenis_kelamin.value)
        formData.append('id_provinsis', provinsi.value)
        formData.append('id_kabupatens', kabupaten.value)
        formData.append('id_kecamatans', kecamatan.value)
        formData.append('id_desas', desa.value)
        formData.append('alamat_lengkap', alamat_lengkap.value)
        formData.append('pekerjaan', pekerjaan.value)
        formData.append('foto', foto.files[0])
        formData.append('created_by', 'admin')
        formData.append('updated_by', 'admin')
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
        provinsi.innerHTML = ''
        kabupaten.innerHTML = ''
        kecamatan.innerHTML = ''
        desa.innerHTML = ''
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
                    method: "DELETE"
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

    err_msg.style.display = 'none'
    modal_form.style.display = 'none'
    foto.style.display = 'none'
    generate_isi_page_list()
    generate_isi_tr_tbody()
</script>

<?= $this->endSection(); ?>