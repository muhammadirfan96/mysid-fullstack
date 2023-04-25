<?= $this->extend('index'); ?>
<?= $this->section('page'); ?>

<div>
    halaman desa
    <form onsubmit="tes(event)" enctype="multipart/form-data">
        <input type="text" id="desa">
        <input type="file" id="logo">
        <button type="submit">submit</button>
    </form>

</div>

<script>
    async function upload(url, formData) {
        try {
            const response = await fetch(url, {
                method: "POST",
                body: formData,
            });
            const result = await response.json();
            console.log("Success:", result);
        } catch (error) {
            console.error("Error:", error);
        }
    }

    const tes = (event) => {
        event.preventDefault()
        const formData = new FormData()
        const desa = document.querySelector('#desa')
        const logo = document.querySelector('#logo')

        formData.append('desa', desa.value)
        formData.append('logo', logo.files[0])
        formData.append('created_by', 'admin')
        formData.append('updated_by', 'admin')
        formData.append('_method', 'PATCH')

        upload("http://localhost:8080/desas", formData)

    }
</script>

<?= $this->endSection(); ?>