<?= $this->extend('index'); ?>
<?= $this->section('page'); ?>
<div>
    <div class="bg-cyan-200 rounded-md m-2 p-2">
        <p class="text-center text-lg font-semibold uppercase"><span class="tanggal">dd</span>-<span class="bulan">mm</span>-<span class="tahun">yy</span> <span class="jam">H</span>:<span class="menit">i</span>:<span class="detik">s</span></p>
    </div>

    <div class="m-3 flex flex-wrap gap-3 justify-center">
        <button onclick="generate_berita('kategori_berita@berita', 6)" id="berita" class="p-2 text-sm text-white bg-cyan-700 rounded w-[47%] md:w-[30%] lg:w-[15%]" type="button">berita</button>
        <button onclick="generate_berita('kategori_berita@olahraga', 6)" id="olahraga" class="p-2 text-sm text-white bg-cyan-700 rounded w-[47%] md:w-[30%] lg:w-[15%]" type="button">olahraga</button>
        <button onclick="generate_berita('kategori_berita@acara', 6)" id="acara" class="p-2 text-sm text-white bg-cyan-700 rounded w-[47%] md:w-[30%] lg:w-[15%]" type="button">acara</button>
        <button onclick="generate_berita('kategori_berita@undangan', 6)" id="undangan" class="p-2 text-sm text-white bg-cyan-700 rounded w-[47%] md:w-[30%] lg:w-[15%]" type="button">undangan</button>
        <button onclick="generate_berita('kategori_berita@pengumuman', 6)" id="pengumuman" class="p-2 text-sm text-white bg-cyan-700 rounded w-[47%] md:w-[30%] lg:w-[15%]" type="button">pengumuman</button>
        <button onclick="generate_berita('kategori_berita@progres_kegiatan', 6)" id="progres_kegiatan" class="p-2 text-sm text-white bg-cyan-700 rounded w-[47%] md:w-[30%] lg:w-[15%]" type="button">progres_kegiatan</button>
    </div>

    <div class="m-3 flex flex-wrap gap-1 justify-center">
        <p id="heade" class="uppercase border-2 border-cyan-700 rounded text-cyan-700 w-[72%] text-center p-2 font-semibold"></p>
        <div class="w-[22%] overflow-auto border-2 border-cyan-700 rounded text-cyan-700">
            <input class="p-2 outline-none w-full" onkeyup="update_konten_berita()" type="text" id="key_pencarian" placeholder="cari" autocomplete="off">
        </div>
    </div>

    <div id="konten_berita" class="m-3 flex flex-wrap justify-center gap-3">
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

    const konten_berita = document.querySelector('#konten_berita')
    const heade = document.querySelector('#heade')
    const key_pencarian = document.querySelector('#key_pencarian')

    const judul = document.querySelector('#judul')
    const foto = document.querySelector('#foto')
    const paragraf = document.querySelector('#paragraf')

    const modal_berita = document.querySelector('#modal_berita')

    const jam = document.querySelector('.jam')
    const menit = document.querySelector('.menit')
    const detik = document.querySelector('.detik')
    const tanggal = document.querySelector('.tanggal')
    const bulan = document.querySelector('.bulan')
    const tahun = document.querySelector('.tahun')

    const div_berita = (item) => {
        return `<div class="border border-cyan-700 rounded-md m-2 w-full md:w-[45%] lg:w-[30%]" onclick="open_modal_berita(${item.id})">
                    <img class="w-full h-80 mb-2 rounded-t" src="img/berita/${item.foto}" alt="img/berita/${item.foto}">
                    <div class="w-full mb-3 p-2 overflow-hidden">
                        <p class="text-base font-semibold mb-2">${item.judul}</p>
                        <p class="text-xs font-medium mb-1">${item.kategori_berita}</p>
                        <p class="text-xs font-light">${item.created_at}</p>
                    </div>
                </div>`
    }

    const generate_berita = async (key, limit) => {
        try {
            const response = await fetch(`${api}/find/${key}/${limit}`)
            const result = await response.json()

            let all_berita = ``
            result.forEach(item => {
                all_berita += div_berita(item)
            });

            // bikin head
            let head = key.split("@")[1]

            heade.innerHTML = head
            konten_berita.innerHTML = all_berita
        } catch (error) {
            console.error("Error:", error)
        }
    }

    const update_konten_berita = async () => {
        try {
            const response = await fetch(`${api}/find/judul@${key_pencarian.value}/6`)
            const result = await response.json()

            let all_berita = ``
            result.forEach(item => {
                all_berita += div_berita(item)
            });

            heade.innerHTML = key_pencarian.value
            konten_berita.innerHTML = all_berita
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
            const response = await fetch(`${api}/${id}`)
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

    setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        jam.innerHTML = waktu.getHours();
        menit.innerHTML = waktu.getMinutes();
        detik.innerHTML = waktu.getSeconds();
        tanggal.innerHTML = waktu.getDate();
        bulan.innerHTML = waktu.getMonth();
        tahun.innerHTML = waktu.getFullYear();
    }

    generate_berita('kategori_berita@progres_kegiatan', 6)
</script>

<?= $this->endSection(); ?>