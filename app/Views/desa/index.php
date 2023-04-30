<?= $this->extend('index'); ?>
<?= $this->section('page'); ?>

<div>
    halaman desa

    <!-- menu tambah data -->
    <button onclick="show_tambah()" type="button">+ tambah data</button>

    <!-- >>>> modal tambah/update data -->
    <div id="modal_form">
        <button onclick="modal_form.style.display = 'none'">x</button>
        <p id="head_form"></p>
        <form enctype="multipart/form-data" id="form_input">
            <input type="text" id="desa">
            <label for="logo">logo</label>
            <input type="file" id="logo" onchange="generate_img_preview()">
            <img id="img_preview" width="50px" height="50px">
            <button type="submit">submit</button>
        </form>
    </div>

    <!-- pagination -->
    <select onchange="update_page()" id="per_page">
        <option value="5">5</option>
        <option selected value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
    </select>
    <div id="page_list"></div>

    <!-- >>>> cari data -->
    <input onkeyup="update_page()" key type="text" id="key_pencarian" value="*">

    <!-- tabel data -->
    <table>
        <thead>
            <tr>
                <th>action</th>
                <th>logo</th>
                <th>desa</th>
                <th>created_at</th>
                <th>created_by</th>
                <th>updated_at</th>
                <th>updated_by</th>
            </tr>
        </thead>
        <tbody id="tbody"></tbody>
    </table>

</div>

<script>
    const api = '<?= base_url('/desas') ?>'
    const desa = document.querySelector('#desa')
    const logo = document.querySelector('#logo')
    const modal_form = document.querySelector('#modal_form')
    const head_form = document.querySelector('#head_form')
    const form_input = document.querySelector('#form_input')
    const key_pencarian = document.querySelector('#key_pencarian')
    const per_page = document.querySelector('#per_page')
    const page_list = document.querySelector('#page_list')
    const tbody = document.querySelector('#tbody')
    const img_preview = document.querySelector('#img_preview')

    const tr_tbody = (item) => {
        return `<tr>
                    <td>
                        <button onclick="show_ubah(${item.id})" type="button">update</button>
                        <button onclick="hapus(event, ${item.id})" type="button">delete</button>
                    </td>
                    <td>
                        <img src="img/logo/desa/${item.logo}" alt="${item.logo}" width="50px" height="50px">
                    </td>
                    <td>${item.desa}</td>
                    <td>${item.created_at}</td>
                    <td>${item.created_by}</td>
                    <td>${item.updated_at}</td>
                    <td>${item.updated_by}</td>
                </tr>`
    }

    const isi_page_list = halaman => {
        const offset = (per_page.value * halaman) - per_page.value
        return `<button onclick="generate_isi_tabel(${offset})" type="button">${halaman}</button>`
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

    const update_page = () => {
        generate_isi_page_list()
        generate_isi_tabel()
    }

    async function upload(url, formData) {
        try {
            const response = await fetch(url, {
                method: "POST",
                body: formData,
            });
            const result = await response.json();
            if (result.status == 400) {
                for (message in result.messages) {
                    console.log(result.messages[message])
                }
            } else if (result.status == 200 || result.status == 201) {
                alert(result.messages.success)
                form_input.reset()
                img_preview.src = ''
                modal_form.style.display = 'none'
                update_page()
            }
        } catch (error) {
            console.error("Error:", error);
        }
    }

    const show_tambah = () => {
        form_input.reset()
        img_preview.src = ''
        modal_form.style.display = ''
        head_form.innerHTML = 'form tambah data'
        form_input.onsubmit = () => tambah(event)
    }

    const tambah = (event) => {
        event.preventDefault()
        const formData = new FormData()
        formData.append('desa', desa.value)
        formData.append('logo', logo.files[0])
        formData.append('created_by', 'admin')
        formData.append('updated_by', 'admin')
        upload(`${api}`, formData)
    }

    const generate_img_preview = () => {
        const fr = new FileReader()
        fr.readAsDataURL(logo.files[0])
        fr.onload = () => img_preview.src = fr.result
    }

    const show_ubah = async (id) => {
        form_input.reset()
        modal_form.style.display = ''
        head_form.innerHTML = 'form ubah data'
        try {
            const response = await fetch(`${api}/${id}`)
            const result = await response.json()

            desa.value = result.desa
            img_preview.src = `img/logo/desa/${result.logo}`
            form_input.onsubmit = () => ubah(event, id)
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const ubah = (event, id) => {
        event.preventDefault()
        const formData = new FormData()
        formData.append('desa', desa.value)
        formData.append('logo', logo.files[0])
        formData.append('created_by', 'admin')
        formData.append('updated_by', 'admin')
        formData.append('_method', 'PATCH')
        upload(`${api}/${id}`, formData)
    }

    const hapus = async (event, id) => {
        event.preventDefault()
        alert('data akan dihapus permanen. yakin ?')
        try {
            const response = await fetch(`${api}/${id}`, {
                method: "DELETE"
            })
            const result = await response.json()
            alert(result.messages.success)
            console.log("Success:", result);
        } catch (error) {
            console.error("Error:", error)
        }
        update_page()
    }

    const generate_isi_tabel = async (offset = 0) => {
        try {
            const response = await fetch(`${api}/find/${key_pencarian.value}/${per_page.value}/${offset}`)
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

    modal_form.style.display = 'none'
    logo.style.display = 'none'
    generate_isi_page_list()
    generate_isi_tabel()
</script>

<?= $this->endSection(); ?>