<?= $this->extend('index_admin'); ?>
<?= $this->section('page'); ?>

<div>
    <div class="bg-cyan-200 rounded-md m-2 p-2 relative">
        <div class="absolute left-0">
            <button onclick="export_data_to_xls()" class="text-2xl ml-2 text-cyan-700" type="button">
                <i class="bi-download"></i>
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

                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan nama disabilitas" type="text" id="disabilitas" autocomplete="off">

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="data_penduduk"></select>
                        <input id="cari_penduduk" class="w-[50%] p-1 mb-2 outline-none border border-l-0 border-cyan-500 rounded-r-md text-sm" type="text" placeholder="cari_penduduk" onkeyup="generate_isi_option_select_data_penduduk()" autocomplete="off">
                    </div>

                    <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">submit</button>
                </form>
            </div>
        </div>

        <div class="flex flex-wrap justify-evenly">
            <div class="w-[42%] md:w-[23%] overflow-auto border-2 border-cyan-700 rounded-md m-2 text-cyan-700">
                <!-- tombol tambah data -->
                <button class="p-2 outline-none w-full" onclick="show_tambah()" type="button">+ tambah data</button>
            </div>

            <div class="w-[42%] md:w-[23%] overflow-auto border-2 border-cyan-700 rounded-md m-2 text-cyan-700">
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
                        <th>provinsi</th>
                        <th>kabupaten</th>
                        <th>kecamatan</th>
                        <th>desa</th>
                        <th>disabilitas</th>
                        <th>nik</th>
                        <th>nama lengkap</th>
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
    const api = '<?= base_url('/datadisabilitass') ?>'
    const api_provinsi = '<?= base_url('/provinsis') ?>'
    const api_kabupaten = '<?= base_url('/kabupatens') ?>'
    const api_kecamatan = '<?= base_url('/kecamatans') ?>'
    const api_desa = '<?= base_url('/desas') ?>'
    const provinsi = document.querySelector('#provinsi')
    const kabupaten = document.querySelector('#kabupaten')
    const kecamatan = document.querySelector('#kecamatan')
    const desa = document.querySelector('#desa')
    const api_data_penduduk = '<?= base_url('/datapenduduks') ?>'
    const disabilitas = document.querySelector('#disabilitas')
    const data_penduduk = document.querySelector('#data_penduduk')
    const modal_form = document.querySelector('#modal_form')
    const head_form = document.querySelector('#head_form')
    const err_msg = document.querySelector('#err_msg')
    const form_input = document.querySelector('#form_input')
    const key_pencarian = document.querySelector('#key_pencarian')
    const per_page = document.querySelector('#per_page')
    const page_list = document.querySelector('#page_list')
    const tbody = document.querySelector('#tbody')

    const cari_penduduk = document.querySelector('#cari_penduduk')
    let crrDesa = ''

    const export_data_to_xls = async () => {
        try {
            const response = await fetch(`${api}/find/${key_pencarian.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            const worksheet = XLSX.utils.json_to_sheet(result);
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "sheet1");
            XLSX.writeFile(workbook, "data_disabilitas.xlsx", {
                compression: true
            });
        } catch (error) {
            console.error("Error:", error)
        }
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

    const option_select_data_penduduk = item => {
        return `<option value="${item.id}">${item.nama_lengkap}</option>`
    }

    const generate_isi_option_select_data_penduduk = async () => {
        try {
            const response = await fetch(`${api_data_penduduk}/find/${cari_penduduk.value}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_data_penduduk = ``
            result.forEach(item => {
                all_option_select_data_penduduk += option_select_data_penduduk(item)
            });

            data_penduduk.innerHTML = all_option_select_data_penduduk
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
                    <td>${item.disabilitas}</td>
                    <td>${item.nik}</td>
                    <td>${item.nama_lengkap}</td>
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
        formData.append('disabilitas', disabilitas.value)
        formData.append('id_data_penduduks', data_penduduk.value)
        formData.append('created_by', crrDesa)
        formData.append('updated_by', crrDesa)
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

                disabilitas.value = result.disabilitas

                const response_data_penduduk = await fetch(`${api_data_penduduk}/${result.id_data_penduduks}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_data_penduduk = await response_data_penduduk.json()
                data_penduduk.innerHTML = `<option value="${result_data_penduduk.id}">${result_data_penduduk.nama_lengkap}</option>`

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
        formData.append('disabilitas', disabilitas.value)
        formData.append('id_data_penduduks', data_penduduk.value)
        formData.append('updated_by', crrDesa)
        formData.append('_method', 'PATCH')
        upload(`${api}/${id}`, formData)
    }

    const close_modal = () => {
        form_input.reset()
        provinsi.innerHTML = ''
        kabupaten.innerHTML = ''
        kecamatan.innerHTML = ''
        desa.innerHTML = ''
        data_penduduk.innerHTML = ''
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
    generate_isi_page_list()
    generate_isi_tr_tbody()
</script>

<?= $this->endSection(); ?>