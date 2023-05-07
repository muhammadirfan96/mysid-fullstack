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
                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan nomor nkk" type="text" id="nkk" autocomplete="off">

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="tingkat_kesejahteraan"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_tingkat_kesejahteraan()">show tingkat kesejahteraan</button>
                    </div>

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="sumber_penghasilan_utama"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_sumber_penghasilan_utama()">show sumber penghasilan utama</button>
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
                        <th>nkk</th>
                        <th>tingkat kesejahteraan</th>
                        <th>sumber penghasilan utama</th>
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
    const api = '<?= base_url('/datankks') ?>'
    const api_tingkat_kesejahteraan = '<?= base_url('/tingkatkesejahteraans') ?>'
    const api_sumber_penghasilan_utama = '<?= base_url('/sumberpenghasilanutamas') ?>'
    const nkk = document.querySelector('#nkk')
    const tingkat_kesejahteraan = document.querySelector('#tingkat_kesejahteraan')
    const sumber_penghasilan_utama = document.querySelector('#sumber_penghasilan_utama')
    const modal_form = document.querySelector('#modal_form')
    const head_form = document.querySelector('#head_form')
    const err_msg = document.querySelector('#err_msg')
    const form_input = document.querySelector('#form_input')
    const key_pencarian = document.querySelector('#key_pencarian')
    const per_page = document.querySelector('#per_page')
    const page_list = document.querySelector('#page_list')
    const tbody = document.querySelector('#tbody')

    const option_select_sumber_penghasilan_utama = item => {
        return `<option value="${item.id}">${item.sumber_penghasilan_utama}</option>`
    }

    const generate_isi_option_select_sumber_penghasilan_utama = async () => {
        try {
            const response = await fetch(`${api_sumber_penghasilan_utama}/find/*`)
            const result = await response.json()

            let all_option_select_sumber_penghasilan_utama = ``
            result.forEach(item => {
                all_option_select_sumber_penghasilan_utama += option_select_sumber_penghasilan_utama(item)
            });

            sumber_penghasilan_utama.innerHTML = all_option_select_sumber_penghasilan_utama
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const option_select_tingkat_kesejahteraan = item => {
        return `<option value="${item.id}">${item.tingkat_kesejahteraan}</option>`
    }

    const generate_isi_option_select_tingkat_kesejahteraan = async () => {
        try {
            const response = await fetch(`${api_tingkat_kesejahteraan}/find/*`)
            const result = await response.json()

            let all_option_select_tingkat_kesejahteraan = ``
            result.forEach(item => {
                all_option_select_tingkat_kesejahteraan += option_select_tingkat_kesejahteraan(item)
            });

            tingkat_kesejahteraan.innerHTML = all_option_select_tingkat_kesejahteraan
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
                    <td>${item.nkk}</td>
                    <td>${item.tingkat_kesejahteraan}</td>
                    <td>${item.sumber_penghasilan_utama}</td>
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
        formData.append('nkk', nkk.value)
        formData.append('id_tingkat_kesejahteraans', tingkat_kesejahteraan.value)
        formData.append('id_sumber_penghasilan_utamas', sumber_penghasilan_utama.value)
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
                const response = await fetch(`${api}/${id}`)
                const result = await response.json()

                nkk.value = result.nkk

                const response_tingkat_kesejahteraan = await fetch(`${api_tingkat_kesejahteraan}/${result.id_tingkat_kesejahteraans}`)
                const result_tingkat_kesejahteraan = await response_tingkat_kesejahteraan.json()
                tingkat_kesejahteraan.innerHTML = `<option value="${result_tingkat_kesejahteraan.id}">${result_tingkat_kesejahteraan.tingkat_kesejahteraan}</option>`

                const response_sumber_penghasilan_utama = await fetch(`${api_sumber_penghasilan_utama}/${result.id_sumber_penghasilan_utamas}`)
                const result_sumber_penghasilan_utama = await response_sumber_penghasilan_utama.json()
                sumber_penghasilan_utama.innerHTML = `<option value="${result_sumber_penghasilan_utama.id}">${result_sumber_penghasilan_utama.sumber_penghasilan_utama}</option>`

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
        formData.append('nkk', nkk.value)
        formData.append('id_tingkat_kesejahteraans', tingkat_kesejahteraan.value)
        formData.append('id_sumber_penghasilan_utamas', sumber_penghasilan_utama.value)
        formData.append('created_by', 'admin')
        formData.append('updated_by', 'admin')
        formData.append('_method', 'PATCH')
        upload(`${api}/${id}`, formData)
    }

    const close_modal = () => {
        form_input.reset()
        tingkat_kesejahteraan.innerHTML = ''
        sumber_penghasilan_utama.innerHTML = ''
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
    generate_isi_page_list()
    generate_isi_tr_tbody()
</script>

<?= $this->endSection(); ?>