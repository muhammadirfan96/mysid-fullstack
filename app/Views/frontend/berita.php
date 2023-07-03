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
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="kategori_berita"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_kategori_berita()">show kategori_berita</button>
                    </div>

                    <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan judul berita" type="text" id="judul" autocomplete="off">

                    <div class="flex">
                        <button class="w-[50%] p-1 mb-2 outline-none bg-green-300 rounded-l-md" type="button" onclick="add_paragraf()">+ paragraf</button>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-red-300 rounded-r-md" type="button" onclick="remove_paragraf()">- paragraf</button>
                    </div>

                    <div id="paragraf"></div>

                    <div class="flex">
                        <select class="w-[50%] p-1 mb-2 outline-none border border-cyan-500 rounded-l-md" id="active"></select>
                        <button class="w-[50%] p-1 mb-2 outline-none bg-cyan-100 rounded-r-md" type="button" onclick="generate_isi_option_select_active()">show active</button>
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
                        <th>judul</th>
                        <th>kategori_berita</th>
                        <th>active</th>
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
    const api = '<?= base_url('/beritas') ?>'
    const api_kategori_berita = '<?= base_url('/kategoriberitas') ?>'

    const judul = document.querySelector('#judul')
    const paragraf = document.querySelector('#paragraf')
    const kategori_berita = document.querySelector('#kategori_berita')
    const active = document.querySelector('#active')
    const foto = document.querySelector('#foto')

    const img_preview = document.querySelector('#img_preview')

    const modal_form = document.querySelector('#modal_form')
    const head_form = document.querySelector('#head_form')
    const err_msg = document.querySelector('#err_msg')
    const form_input = document.querySelector('#form_input')

    const key_pencarian = document.querySelector('#key_pencarian')
    const per_page = document.querySelector('#per_page')
    const page_list = document.querySelector('#page_list')
    const tbody = document.querySelector('#tbody')

    const remove_paragraf = () => {
        paragraf.removeChild(paragraf.lastElementChild)
    }

    const add_paragraf = () => {
        const textarea_paragraf = document.createElement("textarea")

        textarea_paragraf.classList.add("paragraf", "w-[100%]", "p-1", "mb-2", "outline-none", "border", "border", "border-cyan-500", "rounded-md")
        textarea_paragraf.placeholder = "paragraf baru isi berita"
        textarea_paragraf.autocomplete = "off"

        paragraf.appendChild(textarea_paragraf)
    }

    const option_select_active = item => {
        return `<option value="${item}">${item}</option>`
    }

    const generate_isi_option_select_active = () => {
        result = [0, 1]
        let all_option_select_active = ``
        result.forEach(item => {
            all_option_select_active += option_select_active(item)
        });

        active.innerHTML = all_option_select_active
    }

    const option_select_kategori_berita = item => {
        return `<option value="${item.id}">${item.kategori_berita}</option>`
    }

    const generate_isi_option_select_kategori_berita = async () => {
        try {
            const response = await fetch(`${api_kategori_berita}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_option_select_kategori_berita = ``
            result.forEach(item => {
                all_option_select_kategori_berita += option_select_kategori_berita(item)
            });

            kategori_berita.innerHTML = all_option_select_kategori_berita
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
                            <img class="w-16 h-16 rounded-full mx-auto" src="img/berita/${item.foto}" alt="${item.foto}">
                        </div>
                    </td>
                    <td>${item.judul}</td>
                    <td>${item.kategori_berita}</td>
                    <td>${item.active}</td>
                    <td>${item.created_at}</td>
                    <td>${item.created_by}</td>
                    <td>${item.updated_at}</td>
                    <td>${item.updated_by}</td>
                </tr>`
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

    const generate_isi_tr_tbody = async (offset = 0) => {
        try {
            const response = await fetch(`${api}/find/${key_pencarian.value}/${per_page.value}/${offset}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_tr_table = ``
            result.forEach(item => {
                all_tr_table += tr_tbody(item)
            });

            tbody.innerHTML = all_tr_table
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
        formData.append('judul', judul.value)

        let paragraf_value_arr = []
        paragraf.querySelectorAll('.paragraf')
            .forEach(node => paragraf_value_arr.push(node.value))
        paragraf_value = paragraf_value_arr.join(' | ')
        formData.append('paragraf', paragraf_value)

        formData.append('id_kategori_beritas', kategori_berita.value)
        formData.append('active', active.value)
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
                const response = await fetch(`${api}/${id}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result = await response.json()

                judul.value = result.judul

                const isi_paragraf = result.paragraf.split(" | ")

                isi_paragraf.forEach(isi => {
                    add_paragraf()
                    paragraf.lastElementChild.value = isi
                });

                const response_kategori_berita = await fetch(`${api_kategori_berita}/${result.id_kategori_beritas}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result_kategori_berita = await response_kategori_berita.json()
                kategori_berita.innerHTML = `<option value="${result_kategori_berita.id}">${result_kategori_berita.kategori_berita}</option>`

                active.innerHTML = `<option value="${result.active}">${result.active}</option>`

                img_preview.src = `img/berita/${result.foto}`
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
        formData.append('judul', judul.value)

        const paragraf_value = ''
        paragraf.querySelectorAll('.paragraf')
            .forEach(node => paragraf_value + ' | ' + node.value)
        formData.append('paragraf', paragraf_value.value)

        formData.append('id_kategori_beritas', kategori_berita.value)
        formData.append('active', active.value)
        formData.append('foto', foto.files[0])
        formData.append('created_by', 'admin')
        formData.append('updated_by', 'admin')
        formData.append('_method', 'PATCH')
        upload(`${api}/${id}`, formData)
    }

    const close_modal = () => {
        form_input.reset()
        paragraf.innerHTML = ''
        kategori_berita.innerHTML = ''
        active.innerHTML = ''
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

    err_msg.style.display = 'none'
    modal_form.style.display = 'none'
    foto.style.display = 'none'
    generate_isi_page_list()
    generate_isi_tr_tbody()
</script>

<!-- <script src="/js/auth/getCookie.js"></script> -->

<?= $this->endSection(); ?>