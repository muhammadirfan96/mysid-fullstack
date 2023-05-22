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

                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan tempat_lahir" type="text" id="tempat_lahir" autocomplete="off">

                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan tanggal_lahir" type="datetime-local" id="tanggal_lahir" autocomplete="off">

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
    const tempat_lahir = document.querySelector('#tempat_lahir')
    const tanggal_lahir = document.querySelector('#tanggal_lahir')
    const agama = document.querySelector('#agama')
    const golongan_darah = document.querySelector('#golongan_darah')
    const pendidikan = document.querySelector('#pendidikan')
    const status_hub_dlm_kel = document.querySelector('#status_hub_dlm_kel')
    const kewarganegaraan = document.querySelector('#kewarganegaraan')
    const jenis_kelamin = document.querySelector('#jenis_kelamin')
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
    let crrDesa = ''

    const option_select_jenis_kelamin = item => {
        return `<option value="${item.id}">${item.jenis_kelamin}</option>`
    }

    const generate_isi_option_select_jenis_kelamin = async () => {
        try {
            const response = await fetch(`${api_jenis_kelamin}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
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
            const response = await fetch(`${api_kewarganegaraan}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
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
            const response = await fetch(`${api_status_hub_dlm_kel}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
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
            const response = await fetch(`${api_pendidikan}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
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
            const response = await fetch(`${api_golongan_darah}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
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
            const response = await fetch(`${api_agama}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
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
            const response = await fetch(`${api_data_nkk}/find/*`, {
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
                    <td>${item.pekerjaan}</td>
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
        formData.append('pekerjaan', pekerjaan.value)
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
                tanggal_lahir.value = result.tanggal_lahir
                const response_data_nkk = await fetch(`${api_data_nkk}/${result.id_data_nkks}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_data_nkk = await response_data_nkk.json()
                data_nkk.innerHTML = `<option value="${result_data_nkk.id}|${result_data_nkk.id_provinsis}|${result_data_nkk.id_kabupatens}|${result_data_nkk.id_kecamatans}|${result_data_nkk.id_desas}">${result_data_nkk.nkk}</option>`
                const response_agama = await fetch(`${api_agama}/${result.id_agamas}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_agama = await response_agama.json()
                agama.innerHTML = `<option value="${result_agama.id}">${result_agama.agama}</option>`
                const response_golongan_darah = await fetch(`${api_golongan_darah}/${result.id_golongan_darahs}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_golongan_darah = await response_golongan_darah.json()
                golongan_darah.innerHTML = `<option value="${result_golongan_darah.id}">${result_golongan_darah.golongan_darah}</option>`
                const response_pendidikan = await fetch(`${api_pendidikan}/${result.id_pendidikans}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_pendidikan = await response_pendidikan.json()
                pendidikan.innerHTML = `<option value="${result_pendidikan.id}">${result_pendidikan.pendidikan}</option>`
                const response_status_hub_dlm_kel = await fetch(`${api_status_hub_dlm_kel}/${result.id_status_hub_dlm_kels}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_status_hub_dlm_kel = await response_status_hub_dlm_kel.json()
                status_hub_dlm_kel.innerHTML = `<option value="${result_status_hub_dlm_kel.id}">${result_status_hub_dlm_kel.status_hub_dlm_kel}</option>`
                const response_kewarganegaraan = await fetch(`${api_kewarganegaraan}/${result.id_kewarganegaraans}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_kewarganegaraan = await response_kewarganegaraan.json()
                kewarganegaraan.innerHTML = `<option value="${result_kewarganegaraan.id}">${result_kewarganegaraan.kewarganegaraan}</option>`
                const response_jenis_kelamin = await fetch(`${api_jenis_kelamin}/${result.id_jenis_kelamins}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_jenis_kelamin = await response_jenis_kelamin.json()
                jenis_kelamin.innerHTML = `<option value="${result_jenis_kelamin.id}">${result_jenis_kelamin.jenis_kelamin}</option>`

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
        formData.append('pekerjaan', pekerjaan.value)
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