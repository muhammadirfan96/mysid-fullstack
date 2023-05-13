<?= $this->extend('auth/template'); ?>
<?= $this->section('auth'); ?>

<div id="modal_form" class="fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10">
    <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[40%] xl:w-[30%] my-4 max-h-[95%] mx-auto overflow-auto">
        <p class="text-center font-medium text-lg" id="head_form"></p>
        <div class="bg-red-50 rounded-md p-1 my-1 text-xs italic text-red-700 border border-red-900" id="err_msg"></div>
        <form onsubmit="submitRegister(event)" class="mt-2" enctype="multipart/form-data" id="form_input">

            <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan nama desa" type="text" id="desa" autocomplete="off">
            <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan email" type="email" id="email" autocomplete="off">

            <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="masukkan password" type="password" id="password" autocomplete="off">
            <input class="w-full p-1 mb-2 outline-none border border-cyan-500 rounded-md" placeholder="password confirmation" type="password" id="passconf" autocomplete="off">

            <button class="bg-cyan-500 text-lg text-white font-medium py-1 rounded-md w-full" type="submit">submit</button>
        </form>
    </div>
</div>

<script>
    const api = '<?= base_url('/register') ?>'
    const err_msg = document.querySelector('#err_msg')
    const head_form = document.querySelector('#head_form')
    err_msg.style.display = 'none'
    head_form.innerHTML = 'Registration Form'

    const desa = document.querySelector('#desa')
    const password = document.querySelector('#password')
    const passconf = document.querySelector('#passconf')
    const email = document.querySelector('#email')

    const submitRegister = event => {
        event.preventDefault()
        const formData = new FormData()
        formData.append('desa', desa.value)
        formData.append('email', email.value)
        formData.append('password', password.value)
        formData.append('passconf', passconf.value)
        formData.append('created_by', 'admin')
        formData.append('updated_by', 'admin')
        upload(`${api}`, formData)
    }

    async function upload(url, formData) {
        try {
            const response = await fetch(url, {
                method: "POST",
                body: formData,
                headers: {
                    Authentication: `Bearer ${getCookie()}`
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
            } else if (result.status == 200) {
                successAlert(result.messages.success)
                console.log('ok')
            }
        } catch (error) {
            console.error("Error:", error)
        }
    }

    function getCookie(cookieName) {
        let cookie = {};
        document.cookie.split(';').forEach(function(el) {
            let [key, value] = el.split('=');
            cookie[key.trim()] = value;
        })
        return cookie[cookieName];
    }
</script>

<?= $this->endSection(); ?>