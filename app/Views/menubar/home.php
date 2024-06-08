<?= $this->extend('index'); ?>
<?= $this->section('page'); ?>
<div>
    <div class="bg-cyan-200 rounded-md m-2 p-2">
        <p class="text-center text-lg font-semibold uppercase"><span class="tanggal">dd</span>-<span class="bulan">mm</span>-<span class="tahun">yy</span> <span class="jam">H</span>:<span class="menit">i</span>:<span class="detik">s</span></p>
    </div>

    <div class="mb-2 flex flex-wrap gap-1 justify-evenly">
        <div class="mb-2 flex gap-1 w-full md:w-[48%] justify-center">
            <select class="outline-none border-2 border-cyan-700 rounded text-cyan-700" id="key_pencarian">
                <option value="judul">judul</option>
                <option value="id_kategori_beritas">kategori</option>
                <option value="created_at">created</option>
            </select>
            <div class="w-full overflow-auto border-2 border-cyan-700 rounded text-cyan-700">
                <input class="p-1 outline-none w-full" type="text" id="val_pencarian" placeholder="keyword..." autocomplete="off" autofocus>
            </div>
            <div class="border-2 border-cyan-700 rounded text-cyan-700">
                <button class="w-full text-center p-1" id="btn_pencarian"><i class="bi-search"></i></button>
            </div>
        </div>

        <div class="mb-2 flex gap-1 w-full md:w-[48%] justify-center">
            <div class="w-full overflow-auto flex border-2 border-cyan-700 rounded-md text-cyan-700 text-center" id="page_list">
                <!-- isi page list -->
            </div>
            <select class="outline-none border-2 border-cyan-700 rounded text-cyan-700" id="limit">
                <option value="20">20</option>
                <option value="10">10</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>

    <div id="konten_berita" class="m-3 flex flex-wrap justify-center gap-4">
    </div>

</div>

<script>
    const api = '<?= base_url('/beritas') ?>'
    const api_kategori_berita = '<?= base_url('/kategoriberitas') ?>'

    const konten_berita = document.querySelector('#konten_berita')
    const page_list = document.querySelector('#page_list')

    const key_pencarian = document.querySelector('#key_pencarian')
    const val_pencarian = document.querySelector('#val_pencarian')
    const btn_pencarian = document.querySelector('#btn_pencarian')
    const limit = document.querySelector('#limit')
    const page = document.querySelector('#page')

    const jam = document.querySelector('.jam')
    const menit = document.querySelector('.menit')
    const detik = document.querySelector('.detik')
    const tanggal = document.querySelector('.tanggal')
    const bulan = document.querySelector('.bulan')
    const tahun = document.querySelector('.tahun')

    const getBerita = async (limit = 20, page = 1, key = '') => {
        try {
            const response = await fetch(`${api}?limit=${limit}&page=${page}&${key}`)
            const result = await response.json()
            return result
        } catch (error) {
            console.log(error)
        }
    }

    const getKategoriBerita = async (limit = 20, page = 1, key = '') => {
        try {
            const response = await fetch(`${api_kategori_berita}?limit=${limit}&page=${page}&${key}`)
            const result = await response.json()
            return result
        } catch (error) {
            console.log(error)
        }
    }

    btn_pencarian.addEventListener('click', async () => {
        await generate_berita(`${limit.value}`, 1, `${key_pencarian.value}=${val_pencarian.value}`)
    })

    // const isi_page_list = page => {
    //     return `<button class="px-1 m-1 border rounded-sm flex-none border-cyan-500 text-center focus:text-white focus:bg-cyan-500" onclick="generate_berita(${limit.value},${page},'${key_pencarian.value}=${val_pencarian.value}')" type="button">${page}</button>`
    // }

    const div_berita = (item) => {
        return `<div class="shadow-md shadow-cyan-700 bg-cyan-200 rounded-md w-full md:w-[45%] lg:w-[30%] p-2" onclick="open_modal_berita(${item.id})">
                    <img class="w-full h-40 mb-2 rounded-md" src="img/berita/${item.foto}" alt="img/berita/${item.foto}">
                    <div class="w-full h-16 px-2">
                        <div class="w-full h-6 overflow-hidden">
                            <p class="text-base font-semibold mb-2 block">${item.judul}</p>
                        </div>
                        <p class="text-xs font-medium mb-1">${item.kategori_berita}</p>
                        <p class="text-xs font-light">${item.created_at}</p>
                    </div>
                </div>`
    }

    const generate_berita = async (limit = 20, page = 1, key = '') => {
        try {
            const berita = await getBerita(limit, page, key)
            const kategori_berita = await getKategoriBerita()
            console.table(berita)

            let all_berita = ``
            berita.data.forEach(item => {
                kategori_berita.data.forEach(i => {
                    if (i.id == item.id_kategori_beritas) {
                        item.kategori_berita = i.kategori_berita
                        all_berita += div_berita(item)
                    }
                })
            });


            // let all_page = ``
            // for (let index = 1; index <= berita.all_page; index++) {
            //     all_page += isi_page_list(index)
            // }

            // konten_berita.innerHTML = all_berita
            page_list.innerHTML = all_page
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

    generate_berita(3, 1, '')
</script>

<?= $this->endSection(); ?>