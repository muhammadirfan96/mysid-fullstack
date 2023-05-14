<?= $this->extend('auth/template'); ?>
<?= $this->section('auth'); ?>

<div id="modal_form" class="fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10">
    <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[40%] xl:w-[30%] my-4 max-h-[95%] mx-auto overflow-auto">
        <p class="text-center font-medium text-lg" id="head_form"></p>
        <div class="bg-red-50 rounded-md p-1 my-1 text-xs italic text-red-700 border border-red-900" id="err_msg"></div>
        <form onsubmit="submitLogin(event)" class="mt-2" enctype="multipart/form-data" id="form_input">

            <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan nama desa" type="text" id="desa" autocomplete="off">

            <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan password" type="password" id="password" autocomplete="off">

            <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">submit</button>
        </form>
    </div>
</div>

<script>
    const api_login = '<?= base_url('/login') ?>'
    const err_msg = document.querySelector('#err_msg')
    const head_form = document.querySelector('#head_form')
    err_msg.style.display = 'none'
    head_form.innerHTML = 'Login Form'

    const desa = document.querySelector('#desa')
    const password = document.querySelector('#password')

    const submitLogin = event => {
        event.preventDefault()
        const formData = new FormData()
        formData.append('desa', desa.value)
        formData.append('password', password.value)
        login(`${api_login}`, formData)
    }

    async function login(url, formData) {
        try {
            const response = await fetch(url, {
                method: "POST",
                body: formData,
            });

            const result = await response.json();
            if (result.status == 400 || result.status == 404) {
                let all_err_msg = ``
                for (message in result.messages) {
                    all_err_msg += `<p>${result.messages[message]}</p>`
                }
                err_msg.innerHTML = all_err_msg
                err_msg.style.display = ''
            } else if (response.status == 200) {
                setCookie('token', result.token, 0.1)
                window.location.href = '<?= base_url('/') ?>'
            }

        } catch (error) {
            console.error("Error:", error)
        }
    }

    if (getCookie('token')) window.location.href = '<?= base_url('/') ?>'
</script>

<?= $this->endSection(); ?>