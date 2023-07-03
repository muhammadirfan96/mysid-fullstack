<?= $this->extend('index'); ?>
<?= $this->section('page'); ?>
<div>
    <div class="bg-cyan-200 rounded-md m-2 p-2">
        <p class="text-center text-lg font-semibold uppercase"><?= $title; ?></p>
    </div>

    <div class="m-2">
        <div class="flex flex-wrap gap-2">
            <div class="w-full md:w-[48%] m-2 p-2">
                <p>TERKINI</p>
                <div id="terkini"></div>
            </div>
            <div id="all_kategori_berita" class="w-full md:w-[48%] border-l-2 border-cyan-700 m-2 p-2">
            </div>
        </div>
    </div>
</div>

<div id="modal_berita" class="fixed top-0 bottom-0 right-0 left-0 bg-slate-900 bg-opacity-50 z-10" style="display: none;">

    <div class="bg-white rounded-md p-4 relative w-[95%] md:w-[50%] my-4 max-h-[95%] mx-auto overflow-auto">

        <button class="absolute right-1 top-0" onclick="close_modal_berita()" type="button"><i class="bi-x-square-fill text-red-700 rounded-md text-xl"></i></button>

        <p id="judul" class="text-center font-medium text-lg"></p>

        <div class="w-full border-2 border-cyan-400 mb-2"></div>

        <img id="foto" class="w-[100%] h-80 md:w-[54%] md:h-80 mx-auto mb-2">

        <div id="paragraf" class="mb-3 text-base font-normal md:font-light md:text-sm"></div>
    </div>
</div>

<script>
    const api = '<?= base_url('/beritas') ?>'
    const api_kategori_berita = '<?= base_url('/kategoriberitas') ?>'

    const terkini = document.querySelector('#terkini')
    const all_kategori_berita = document.querySelector('#all_kategori_berita')

    const judul = document.querySelector('#judul')
    const foto = document.querySelector('#foto')
    const paragraf = document.querySelector('#paragraf')

    const modal_berita = document.querySelector('#modal_berita')

    const div_berita = (item) => {
        return `<div class="w-full border-2 border-cyan-400 mb-2"></div>
                <div class="">
                    <img id="terkini_foto" class="w-[100%] h-80 md:w-[24%] md:h-32 mb-2" src="img/berita/${item.foto}" alt="img/berita/${item.foto}">
                </div>
                <div class="w-full mb-3">
                    <p class="text-base font-semibold mb-2"><a onclick="open_modal_berita(${item.id})">${item.judul}</a></p>
                    <p class="text-xs font-medium mb-1">${item.kategori_berita}</p>
                    <p class="text-xs font-light">${item.created_at}</p>
                </div>`
    }

    const div_all_kategori_berita = (un) => {
        return `<p class="uppercase">${un}</p>
                <div id="${un}"></div>
                <div class="w-full border-2 border-cyan-700 mb-3"></div>`
    }

    const generate_berita = async (targetElement, key, limit) => {
        try {
            const response = await fetch(`${api}/find/${key}/${limit}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            let all_berita = ``
            result.forEach(item => {
                all_berita += div_berita(item)
            });

            targetElement.innerHTML = all_berita
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const generate_div_all_kategori_berita = async () => {
        try {
            const response = await fetch(`${api}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            const response_kategori_berita = await fetch(`${api_kategori_berita}/find/*`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result_kategori_berita = await response_kategori_berita.json()

            // unique
            function onlyUniqeu(value, index, array) {
                return array.indexOf(value) === index
            }
            let arr = []
            result.forEach(item => arr.push(item.kategori_berita))
            // end unique

            let unique = arr.filter(onlyUniqeu)
            let kategori_berita = ``
            unique.forEach(un => {
                kategori_berita += div_all_kategori_berita(un)
            })

            all_kategori_berita.innerHTML = kategori_berita

            result.forEach(item => {
                let el = all_kategori_berita.querySelector(`#${item.kategori_berita}`)
                generate_berita(el, `kategori_berita@${item.kategori_berita}`, 2)
            })
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const close_modal_berita = () => {
        modal_berita.style.display = 'none'
        paragraf.innerHTML = ''
    }
    const open_modal_berita = async (id) => {
        modal_berita.style.display = ''
        try {
            const response = await fetch(`${api}/${id}`, {
                headers: {
                    Authorization: `Bearer ${getCookie('token')}`
                }
            })
            const result = await response.json()

            judul.innerHTML = result.judul
            foto.src = `img/berita/${result.foto}`

            result.paragraf.split(' | ').forEach(one_text_paragraf => {
                let one_div_paragraf = document.createElement('div')
                one_div_paragraf.classList.add('mb-2', 'indent-8')
                one_div_paragraf.innerHTML = one_text_paragraf
                paragraf.appendChild(one_div_paragraf)
            })

        } catch (error) {
            console.error("Error:", error)
        }
    }

    generate_div_all_kategori_berita()
    generate_berita(terkini, '*', 2)
</script>

<?= $this->endSection(); ?>