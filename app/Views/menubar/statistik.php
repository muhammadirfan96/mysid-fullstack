<?= $this->extend('index'); ?>
<?= $this->section('page'); ?>
<div>
    <div class="bg-cyan-200 rounded-md m-2 p-2">
        <p class="text-center text-lg font-semibold uppercase"><?= $title; ?></p>
    </div>

    <div class="m-2">
        <div class="flex flex-wrap justify-evenly">
            <div class="border border-cyan-700 rounded-md m-2 w-full md:w-[45%] lg:w-[30%]">
                <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">data penduduk</p>
                <div class="p-4">
                    <table class="w-full">
                        <tr>
                            <table class="w-full">
                                <tr>
                                    <td colspan="2" class="text-cyan-900 uppercase text-base underline">total</td>
                                </tr>
                                <tr>
                                    <td class="w-[60%]">jumlah penduduk</td>
                                    <td id="jumlah_penduduk" class="w-[40%] text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>jumlah laki laki</td>
                                    <td id="jumlah_laki_laki" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>jumlah perempuan</td>
                                    <td id="jumlah_perempuan" class="text-right">0 orang</td>
                                </tr>
                            </table>
                        </tr>
                        <tr>
                            <table class="w-full">
                                <tr>
                                    <td colspan="2" class="text-cyan-900 uppercase text-base underline">klasifikasi berdasarkan usia</td>
                                </tr>
                                <tr>
                                    <td class="w-[60%]">dibawah 1 tahun</td>
                                    <td id="umur_kurang_dari_1" class="w-[40%] text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>1 sampai 4 tahun</td>
                                    <td id="umur_1_sd_4" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>5 sampai 14 tahun</td>
                                    <td id="umur_5_sd_14" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>15 sampai 39 tahun</td>
                                    <td id="umur_15_sd_39" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>40 sampai 64 tahun</td>
                                    <td id="umur_40_sd_65" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>diatas 65 tahun</td>
                                    <td id="umur_lebih_dari_65" class="text-right">0 orang</td>
                                </tr>
                            </table>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="border border-cyan-700 rounded-md m-2 w-full md:w-[45%] lg:w-[30%]">
                <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">data aset 1</p>
                <div class="p-4">
                    <table class="w-full">
                        <tr>
                            <table id="aset_prasarana_ekonomi" class="w-full">
                            </table>
                        </tr>
                        <tr>
                            <table id="aset_prasarana_ibadah" class="w-full">
                            </table>
                        </tr>
                        <tr>
                            <table id="aset_prasarana_kesehatan" class="w-full">
                            </table>
                        </tr>
                        <tr>
                            <table id="aset_prasarana_pemerintahan_desa" class="w-full">
                            </table>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="border border-cyan-700 rounded-md m-2 w-full md:w-[45%] lg:w-[30%]">
                <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">data aset 2</p>
                <div class="p-4">
                    <table class="w-full">
                        <tr>
                            <table id="aset_prasarana_pendidikan" class="w-full">
                            </table>
                        </tr>
                        <tr>
                            <table id="aset_prasarana_umum" class="w-full">
                            </table>
                        </tr>
                        <tr>
                            <table id="lembaga_pelayanan" class="w-full">
                            </table>
                        </tr>
                        <tr>
                            <table id="sumber_daya_milik_warga" class="w-full">
                            </table>
                        </tr>
                        <tr>
                            <table id="sumber_daya_alam" class="w-full">
                            </table>
                        </tr>
                        <tr>
                            <table id="kebiasaan" class="w-full">
                            </table>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const api_resume_data_penduduk = '<?= base_url('/resumedatapenduduks') ?>'
    const api_data_wilayah = '<?= base_url('/datawilayahs') ?>'

    const jumlah_penduduk = document.querySelector('#jumlah_penduduk')
    const jumlah_laki_laki = document.querySelector('#jumlah_laki_laki')
    const jumlah_perempuan = document.querySelector('#jumlah_perempuan')
    const umur_kurang_dari_1 = document.querySelector('#umur_kurang_dari_1')
    const umur_1_sd_4 = document.querySelector('#umur_1_sd_4')
    const umur_5_sd_14 = document.querySelector('#umur_5_sd_14')
    const umur_15_sd_39 = document.querySelector('#umur_15_sd_39')
    const umur_40_sd_65 = document.querySelector('#umur_40_sd_65')
    const umur_lebih_dari_65 = document.querySelector('#umur_lebih_dari_65')

    const aset_prasarana_ekonomi = document.querySelector('#aset_prasarana_ekonomi')
    const aset_prasarana_ibadah = document.querySelector('#aset_prasarana_ibadah')
    const aset_prasarana_kesehatan = document.querySelector('#aset_prasarana_kesehatan')
    const aset_prasarana_pemerintahan_desa = document.querySelector('#aset_prasarana_pemerintahan_desa')
    const aset_prasarana_pendidikan = document.querySelector('#aset_prasarana_pendidikan')
    const aset_prasarana_umum = document.querySelector('#aset_prasarana_umum')
    const lembaga_pelayanan = document.querySelector('#lembaga_pelayanan')
    const sumber_daya_milik_warga = document.querySelector('#sumber_daya_milik_warga')
    const sumber_daya_alam = document.querySelector('#sumber_daya_alam')
    const kebiasaan = document.querySelector('#kebiasaan')

    const head_each_data_aset = (innerHTML) => {
        return `<tr>
                    <td colspan="2" class="text-cyan-900 uppercase text-base underline">${innerHTML}</td>
                </tr>`
    }

    const isi_each_data_aset = (nama, jumlah) => {
        return `<tr>
                    <td class="w-[60%]">${nama}</td>
                    <td class="w-[40%] text-right">${jumlah}</td>
                </tr>`
    }

    const isi_each_data_aset_ket = (ket) => {
        return `<tr>
                    <td>${ket}</td>
                </tr>`
    }

    const data_aset = async () => {
        try {
            const response = await fetch(`${api_data_wilayah}/find/*/1`)
            const result = await response.json();

            const element_data_aset1 = [
                [aset_prasarana_ekonomi, "aset prasarana ekonomi", result[0].aset_prasarana_ekonomi],
                [aset_prasarana_ibadah, "aset prasarana ibadah", result[0].aset_prasarana_ibadah],
                [aset_prasarana_kesehatan, "aset prasarana kesehatan", result[0].aset_prasarana_kesehatan],
                [aset_prasarana_pemerintahan_desa, "aset prasarana pemerintahan desa", result[0].aset_prasarana_pemerintahan_desa],
            ]
            const element_data_aset2 = [
                [aset_prasarana_pendidikan, "aset prasarana pendidikan", result[0].aset_prasarana_pendidikan],
                [aset_prasarana_umum, "aset prasarana umum", result[0].aset_prasarana_umum],
                [lembaga_pelayanan, "lembaga pelayanan", result[0].lembaga_pelayanan],
                [kebiasaan, "kebiasaan", result[0].kebiasaan],
                [sumber_daya_milik_warga, "sumber daya milik warga", result[0].sumber_daya_milik_warga],
                [sumber_daya_alam, "sumber daya alam", result[0].sumber_daya_alam],
            ]

            element_data_aset1.forEach(el => {
                const arrs = el[2].split("|")
                arrs.pop()
                let all_aset = ``
                arrs.forEach(arr => {
                    all_aset += isi_each_data_aset(arr.split("[")[0], arr.split("[")[1].slice(0, -1))
                });
                el[0].innerHTML = head_each_data_aset(el[1]) + all_aset
            })
            element_data_aset2.forEach(el => {
                const arrs = el[2].split("|")
                arrs.pop()
                let all_aset = ``
                arrs.forEach(arr => {
                    all_aset += isi_each_data_aset(arr.split("[")[0], arr.split("[")[1].slice(0, -1))
                });
                el[0].innerHTML = head_each_data_aset(el[1]) + all_aset
            })

        } catch (error) {
            console.error('Error:', error)
        }
    }

    const resume_data_penduduks = async () => {
        try {
            const response = await fetch(`${api_resume_data_penduduk}/1`)
            const result = await response.json();

            jumlah_penduduk.innerHTML = result.jumlah_penduduk
            jumlah_laki_laki.innerHTML = result.jumlah_laki_laki
            jumlah_perempuan.innerHTML = result.jumlah_perempuan

            umur_kurang_dari_1.innerHTML = result.umur_kurang_dari_1
            umur_1_sd_4.innerHTML = result.umur_1_sd_4
            umur_5_sd_14.innerHTML = result.umur_5_sd_14
            umur_15_sd_39.innerHTML = result.umur_15_sd_39
            umur_40_sd_65.innerHTML = result.umur_40_sd_65
            umur_lebih_dari_65.innerHTML = result.umur_lebih_dari_65
        } catch (error) {
            console.error('Error:', error)
        }
    }
    resume_data_penduduks()
    data_aset()
</script>

<?= $this->endSection(); ?>