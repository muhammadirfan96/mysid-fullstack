<?= $this->extend('index'); ?>
<?= $this->section('page'); ?>
<div>
    <div class="bg-cyan-200 rounded-md m-2 p-2">
        <p class="text-center text-lg font-semibold uppercase"><?= $title; ?></p>
    </div>

    <div class="m-2 mb-4">
        <div class="flex flex-wrap gap-3 justify-evenly">
            <div class="border border-cyan-700 rounded-md w-full md:w-[47%]">
                <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">struktur organisasi pemerintahan</p>
                <div class="p-4 w-full">
                    <img src="img/frontend/tes.png">
                </div>
            </div>
            <div class="border border-cyan-700 rounded-md w-full md:w-[47%]">
                <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">struktur organisasi BPD</p>
                <div class="p-4 w-full">
                    <img src="img/frontend/tes.png">
                </div>
            </div>
        </div>
    </div>

    <div class="m-2 mb-4">
        <div class="mb-4 flex flex-wrap flex-col gap-2 w-full h-60 border-2 border-cyan-700 rounded p-2 overflow-x-scroll">
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/kades.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KEPALA DESA</p>
                    <p>Marwan, SE</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/sekdes.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>SEKRETARIS DESA</p>
                    <p>Alwis</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/xxxx.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KASI PEMERINTAHAN</p>
                    <p>nama nya</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/xxxx.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KASI KESEJAHTERAAN & PELAYANAN</p>
                    <p>nama nya</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/xxxx.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KAUR KEUANGAN</p>
                    <p>nama nya</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/xxxx.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KAUR UMUM & PERENCANAAN</p>
                    <p>nama nya</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/xxxx.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KEPALA DUSUN I</p>
                    <p>nama nya</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/xxxxjpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KEPALA DUSUN II</p>
                    <p>nama nya</p>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="m-2 mb-4">
        <div class="border border-cyan-700 rounded-md m-2 w-full">
            <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">jadwal piket</p>
            <div class="flex flex-wrap justify-evenly">
                <div class="border border-cyan-700 rounded-md m-2 p-1 w-full md:w-[32%]">
                    <p class="text-center bg-cyan-200">senin</p>
                    <div class="senin">
                        <p>namanya</p>
                        <p>namanya</p>
                        <p>namanya</p>
                    </div>
                </div>
                <div class="border border-cyan-700 rounded-md m-2 p-1 w-full md:w-[32%]">
                    <p class="text-center bg-cyan-200">selasa</p>
                    <div class="selasa">
                        <p>namanya</p>
                        <p>namanya</p>
                        <p>namanya</p>
                    </div>
                </div>
                <div class="border border-cyan-700 rounded-md m-2 p-1 w-full md:w-[32%]">
                    <p class="text-center bg-cyan-200">rabu</p>
                    <div class="rabu">
                        <p>namanya</p>
                        <p>namanya</p>
                        <p>namanya</p>
                    </div>
                </div>
                <div class="border border-cyan-700 rounded-md m-2 p-1 w-full md:w-[32%]">
                    <p class="text-center bg-cyan-200">kamis</p>
                    <div class="kamis">
                        <p>namanya</p>
                        <p>namanya</p>
                        <p>namanya</p>
                    </div>
                </div>
                <div class="border border-cyan-700 rounded-md m-2 p-1 w-full md:w-[32%]">
                    <p class="text-center bg-cyan-200">jumat</p>
                    <div class="jumat">
                        <p>namanya</p>
                        <p>namanya</p>
                        <p>namanya</p>
                    </div>
                </div>
                <div class="border border-cyan-700 rounded-md m-2 p-1 w-full md:w-[32%]">
                    <p class="text-center bg-cyan-200">sabtu</p>
                    <div class="sabtu">
                        <p>namanya</p>
                        <p>namanya</p>
                        <p>namanya</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="m-2 mb-4">
        <div class="flex flex-wrap gap-3 justify-evenly">
            <div class="border border-cyan-700 rounded-md w-full md:w-[47%]">
                <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">rumusan visi</p>
                <div class="p-4">
                    visi desa
                </div>
            </div>
            <div class="border border-cyan-700 rounded-md w-full md:w-[47%]">
                <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">MISI
                </p>
                <div class="p-4">
                    <table>
                        <tr>
                            <td>1. </td>
                            <td>xxxx xxxx xxxxx</td>
                        </tr>
                        <tr>
                            <td>2. </td>
                            <td>xxxx xxxx xxxxx</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="m-2 text-justify">
    <p class="font-semibold text-base mb-2 capitalize">Sejarah Desa</p>
    <div class="font-light text-base md:text-sm mb-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
    </div>
    <div class="font-light text-base md:text-sm mb-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
    </div>
    <p class="font-semibold text-base mb-2 capitalize">Asal usul atau Legenda Desa</p>
    <div class="font-light text-base md:text-sm mb-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
    </div>
    <div class="font-light text-base md:text-sm mb-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
    </div>

    <p class="font-semibold text-base mb-2 capitalize">sejarah pemerintahan desa</p>
    <div class="font-light text-base md:text-sm mb-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
    </div>
    <div class="font-light text-base md:text-sm mb-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
    </div>

    <p class="font-semibold text-base mb-2 capitalize">batas wilayah</p>
    <div class="font-light text-base md:text-sm mb-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
    </div>

    <p class="font-semibold text-base mb-2 capitalize">luas wilayah</p>
    <div class="font-light text-base md:text-sm mb-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
    </div>

    <p class="font-semibold text-base mb-2 capitalize">Keadaan topografi desa</p>
    <div class="font-light text-base md:text-sm mb-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
    </div>

    <p class="font-semibold text-base mb-2 capitalize">Keadaan iklim</p>
    <div class="font-light text-base md:text-sm mb-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium harum magni vitae. Officia nisi saepe dolore ab magni in tenetur. Minus praesentium rem tenetur suscipit magni veniam beatae cum?
    </div>
</div>
</div>

<script>
    const senin = document.querySelector("#senin")
    const selasa = document.querySelector("#selasa")
    const rabu = document.querySelector("#rabu")
    const kamis = document.querySelector("#kamis")
    const jumat = document.querySelector("#jumat")
    const sabtu = document.querySelector("#sabtu")

    // const kode_piket = {
    //     1: 'Muhammad Izar, S.T.',
    //     2: 'Karti Apriani G., S.Si.',
    //     3: 'Hernandus Dedi',
    //     4: 'Silfister Dona',
    //     5: 'Redi Alexander',
    //     6: 'Mei Maria, S.E.',
    //     7: 'Teodorus Umar',
    //     8: 'Faradiana Jima',
    // }

    let jadwal_piket = {
        senin: [8, 1, 2],
        selasa: [3, 4, 5],
        rabu: [6, 7, 1],
        kamis: [2, 3, 4],
        jumat: [5, 6, 7],
        sabtu: [1, 2, 3, 4, 5, 6, 7, 8],
    }

    // setiap satu bulan akan berganti
    // berarti setiap tanggal 1


    // HARUS PAKE DATABASE CUK
    // bikin tabel kode piket

    // cuma ada satu baris
    // field field nya adalah nama org

    // yg di view itu jadwal piket
    // jadi setiap bulan data nya di update
    // atas nama siapa kodenya nomor berapa
    // jadi mis. hari senin itu kodenya berganti2

    console.log(jadwal_piket.senin[0] + 1)
</script>

<?= $this->endSection(); ?>