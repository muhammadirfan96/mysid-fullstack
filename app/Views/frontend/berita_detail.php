<?= $this->extend('index'); ?>
<?= $this->section('page'); ?>
<div>
    <div class="bg-cyan-200 rounded-md m-2 p-2">
        <p class="text-center text-lg font-semibold uppercase"><span class="tanggal">dd</span>-<span class="bulan">mm</span>-<span class="tahun">yy</span> <span class="jam">H</span>:<span class="menit">i</span>:<span class="detik">s</span></p>
    </div>

    <div class="flex flex-wrap justify-between">
        <!-- detail berita -->
        <div class="w-full lg:w-[70%] mb-6">
            <img id="foto" class="w-[100%] shadow-md shadow-cyan-700 bg-cyan-200 rounded-md h-80 md:w-[80%] md:h-96 mx-auto mb-4">
            <p id="created_at" class="text-xs font-light mb-2"></p>
            <p id="judul" class="font-semibold text-md mb-2"></p>
            <div id="paragraf" class="mb-20"></div>

            <div class="text-center text-3xl text-cyan-900">
                <p class="text-base text-black">share to:</p>
                <button class="mx-1" onclick="shareToWhatsApp()"><i class="bi-whatsapp"></i></button>
                <button class="mx-1" onclick="shareToFacebook()"><i class="bi-facebook"></i></button>
            </div>
        </div>

        <!-- list berita -->
        <div class="w-full lg:w-[28%] lg:border-l-2 lg:border-cyan-900 lg:pl-2">
            <div class="mb-2 flex flex-wrap gap-1 justify-evenly w-full">
                <div class="mb-2 flex gap-1 w-full justify-center">
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

                <div class="mb-2 flex gap-1 w-full justify-center">
                    <div class="w-full overflow-auto flex border-2 border-cyan-700 rounded-md text-cyan-700 text-center" id="page_list">
                        <!-- isi page list -->
                    </div>
                    <select onchange="generate_berita(`${limit.value}`,1,`${key_pencarian.value}=${val_pencarian.value}`)" class="outline-none border-2 border-cyan-700 rounded text-cyan-700" id="limit">
                        <option value="20">20</option>
                        <option value="10">10</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <div id="konten_berita" class="flex flex-wrap justify-center lg:h-screen overflow-auto">
            </div>
        </div>
    </div>

</div>

<script>
    const api = '<?= base_url('/beritas') ?>'
    const id_berita = '<?= $id ?>'
    const api_kategori_berita = '<?= base_url('/kategoriberitas') ?>'

    const judul = document.querySelector('#judul')
    const foto = document.querySelector('#foto')
    const created_at = document.querySelector('#created_at')
    const paragraf = document.querySelector('#paragraf')

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


    const showBerita = async (id = id_berita) => {
        try {
            const response = await fetch(`${api}/${id}`)
            const result = await response.json()
            // console.log(result)
            return result
        } catch (error) {
            console.log(error)
        }
    }

    const getBerita = async (limit, page, key) => {
        try {
            const response = await fetch(`${api}?limit=${limit}&page=${page}&${key}&active=1`)
            const result = await response.json()
            // console.log(result)
            return result
        } catch (error) {
            console.log(error)
        }
    }

    const getKategoriBerita = async () => {
        try {
            const response = await fetch(`${api_kategori_berita}`)
            const result = await response.json()
            // console.log(result)
            return result
        } catch (error) {
            console.log(error)
        }
    }

    btn_pencarian.addEventListener('click', async () => {
        await generate_berita(20, 1, `${key_pencarian.value}=${val_pencarian.value}`)
    })

    const generate_berita_detail = async () => {
        try {
            const result = await showBerita()
            // console.log(result)

            judul.innerHTML = result.judul
            created_at.innerHTML = result.created_at
            foto.src = `/img/berita/${result.foto}`

            result.paragraf.split(' | ').forEach(one_text_paragraf => {
                let one_div_paragraf = document.createElement('div')
                one_div_paragraf.classList.add('mb-4', 'text-justify')
                one_div_paragraf.innerHTML = one_text_paragraf
                paragraf.appendChild(one_div_paragraf)
            })

            console.log(result.judul)
            console.log(foto.src)

            updateMetaTags(result.judul, foto.src)

        } catch (error) {
            console.log(error)
        }
    }

    const isi_page_list = (page, crr_page) => {
        return `<button class="px-1 m-1 border rounded-sm flex-none border-cyan-500 text-center focus:text-white focus:bg-cyan-500 ${crr_page == page ? 'bg-cyan-500 text-white' : ''}" onclick="generate_berita(${limit.value},${page},'${key_pencarian.value}=${val_pencarian.value}')" type="button">${page}</button>`
    }

    const div_berita = (item) => {
        return `<div class="w-full mb-4 shadow-md shadow-cyan-700 bg-cyan-200 rounded-md p-1">
                    <a class="flex justify-between w-full" href="/berita/detail/${item.id}">
                        <img class="w-[38%] h-24 rounded-md" src="/img/berita/${item.foto}" alt="/img/berita/${item.foto}">
                        <div class="w-[60%] ms-1 text-xs">
                            <p class="mb-1 font-bold">${item.judul}</p>
                            <p>${item.kategori_berita}</p>
                            <p>${item.created_at}</p>
                        </div>
                    </a>
                </div>`
    }


    const generate_berita = async (limit = 20, page = 1, key = '') => {
        try {
            const berita = await getBerita(limit, page, key)
            const kategori_berita = await getKategoriBerita()
            // console.table(berita)

            let all_berita = ``
            berita.data.forEach(item => {
                kategori_berita.data.forEach(i => {
                    if (i.id == item.id_kategori_beritas) {
                        item.kategori_berita = i.kategori_berita
                        all_berita += div_berita(item)
                    }
                })
            });

            konten_berita.innerHTML = all_berita

            let all_page = ``
            for (let index = 1; index <= berita.all_page; index++) {
                all_page += isi_page_list(index, berita.crr_page)
            }

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

    function shareToWhatsApp() {
        var pageUrl = encodeURIComponent(window.location.href);
        var whatsappUrl = "https://wa.me/?text=" + pageUrl;
        window.open(whatsappUrl, '_blank');
    }

    function shareToFacebook() {
        var pageUrl = encodeURIComponent(window.location.href);
        var facebookUrl = "https://www.facebook.com/sharer/sharer.php?u=" + pageUrl;
        window.open(facebookUrl, '_blank');
    }

    function updateMetaTags(newDescription, newImageUrl) {
        // Update og:description
        var descriptionMetaTag = document.querySelector('meta[property="og:description"]');
        if (descriptionMetaTag) {
            descriptionMetaTag.setAttribute('content', newDescription);
        } else {
            console.error('Meta tag for og:description not found!');
        }

        // Update og:image
        var imageMetaTag = document.querySelector('meta[property="og:image"]');
        if (imageMetaTag) {
            imageMetaTag.setAttribute('content', newImageUrl);
        } else {
            console.error('Meta tag for og:image not found!');
        }
    }


    generate_berita()
    generate_berita_detail()
</script>

<?= $this->endSection(); ?>