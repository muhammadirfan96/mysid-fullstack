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
                                    <td colspan="2" class="text-cyan-900 uppercase text-base underline">klasifikasi berdasarkan kk</td>
                                </tr>
                                <tr>
                                    <td class="w-[60%]">jumlah kk</td>
                                    <td id="jumlah_kk" class="w-[40%] text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>jumlah kk laki laki</td>
                                    <td id="jumlah_kk_laki_laki" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>jumlah kk perempuan</td>
                                    <td id="jumlah_kk_perempuan" class="text-right">0 orang</td>
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
                                    <td>15 sampai 17 tahun</td>
                                    <td id="umur_15_sd_17" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>18 sampai 39 tahun</td>
                                    <td id="umur_18_sd_39" class="text-right">0 orang</td>
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
                <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">data penduduk</p>
                <div class="p-4">
                    <table class="w-full">
                        <tr>
                            <table class="w-full">
                                <tr>
                                    <td colspan="2" class="text-cyan-900 uppercase text-base underline">klasifikasi berdasarkan pekerjaan</td>
                                </tr>
                                <tr>
                                    <td class="w-[60%]">PNS</td>
                                    <td id="pns" class="w-[40%] text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>karyawan_honorer</td>
                                    <td id="karyawan_honorer" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>petani</td>
                                    <td id="petani" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>peternak</td>
                                    <td id="peternak" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>pedagang</td>
                                    <td id="pedagang" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>nelayan</td>
                                    <td id="nelayan" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>teknisi</td>
                                    <td id="teknisi" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>tukang</td>
                                    <td id="tukang" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>-</td>
                                    <td id="kosong" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>ibu_rumah_tangga</td>
                                    <td id="ibu_rumah_tangga" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>pelajar</td>
                                    <td id="pelajar" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>pekerja_lepas</td>
                                    <td id="pekerja_lepas" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>karyawan_swasta</td>
                                    <td id="karyawan_swasta" class="text-right">0 orang</td>
                                </tr>
                            </table>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="border border-cyan-700 rounded-md m-2 w-full md:w-[45%] lg:w-[30%]">
                <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">data penduduk</p>
                <div class="p-4">
                    <table class="w-full">
                        <tr>
                            <table class="w-full">
                                <tr>
                                    <td colspan="2" class="text-cyan-900 uppercase text-base underline">klasifikasi berdasarkan pendidikan</td>
                                </tr>
                                <tr>
                                    <td class="w-[60%]">sdtt</td>
                                    <td id="sdtt" class="w-[40%] text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>tk</td>
                                    <td id="tk" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>sd</td>
                                    <td id="sd" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>smp</td>
                                    <td id="smp" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>sma</td>
                                    <td id="sma" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>s1</td>
                                    <td id="s1" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>s2</td>
                                    <td id="s2" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>s3</td>
                                    <td id="s3" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>belum_sekolah</td>
                                    <td id="belum_sekolah" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>d1</td>
                                    <td id="d1" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>d2</td>
                                    <td id="d2" class="text-right">0 orang</td>
                                </tr>
                                <tr>
                                    <td>d3</td>
                                    <td id="d3" class="text-right">0 orang</td>
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
    const jumlah_kk = document.querySelector('#jumlah_kk')
    const jumlah_kk_laki_laki = document.querySelector('#jumlah_kk_laki_laki')
    const jumlah_kk_perempuan = document.querySelector('#jumlah_kk_perempuan')
    const umur_kurang_dari_1 = document.querySelector('#umur_kurang_dari_1')
    const umur_1_sd_4 = document.querySelector('#umur_1_sd_4')
    const umur_5_sd_14 = document.querySelector('#umur_5_sd_14')
    const umur_15_sd_17 = document.querySelector('#umur_15_sd_17')
    const umur_18_sd_39 = document.querySelector('#umur_18_sd_39')
    const umur_40_sd_65 = document.querySelector('#umur_40_sd_65')
    const umur_lebih_dari_65 = document.querySelector('#umur_lebih_dari_65')

    const pns = document.querySelector('#pns')
    const karyawan_honorer = document.querySelector('#karyawan_honorer')
    const petani = document.querySelector('#petani')
    const peternak = document.querySelector('#peternak')
    const pedagang = document.querySelector('#pedagang')
    const nelayan = document.querySelector('#nelayan')
    const teknisi = document.querySelector('#teknisi')
    const tukang = document.querySelector('#tukang')
    const kosong = document.querySelector('#kosong')
    const ibu_rumah_tangga = document.querySelector('#ibu_rumah_tangga')
    const pelajar = document.querySelector('#pelajar')
    const pekerja_lepas = document.querySelector('#pekerja_lepas')
    const karyawan_swasta = document.querySelector('#karyawan_swasta')
    const sdtt = document.querySelector('#sdtt')
    const tk = document.querySelector('#tk')
    const sd = document.querySelector('#sd')
    const smp = document.querySelector('#smp')
    const sma = document.querySelector('#sma')
    const s1 = document.querySelector('#s1')
    const s2 = document.querySelector('#s2')
    const s3 = document.querySelector('#s3')
    const belum_sekolah = document.querySelector('#belum_sekolah')
    const d1 = document.querySelector('#d1')
    const d2 = document.querySelector('#d2')
    const d3 = document.querySelector('#d3')

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

            jumlah_kk.innerHTML = result.jumlah_kk
            jumlah_kk_laki_laki.innerHTML = result.jumlah_kk_laki_laki
            jumlah_kk_perempuan.innerHTML = result.jumlah_kk_perempuan

            umur_kurang_dari_1.innerHTML = result.umur_kurang_dari_1
            umur_1_sd_4.innerHTML = result.umur_1_sd_4
            umur_5_sd_14.innerHTML = result.umur_5_sd_14
            umur_15_sd_17.innerHTML = result.umur_15_sd_17
            umur_18_sd_39.innerHTML = result.umur_18_sd_39
            umur_40_sd_65.innerHTML = result.umur_40_sd_65
            umur_lebih_dari_65.innerHTML = result.umur_lebih_dari_65

            pns.innerHTML = result.pns
            karyawan_honorer.innerHTML = result.karyawan_honorer
            petani.innerHTML = result.petani
            peternak.innerHTML = result.peternak
            pedagang.innerHTML = result.pedagang
            nelayan.innerHTML = result.nelayan
            teknisi.innerHTML = result.teknisi
            tukang.innerHTML = result.tukang
            kosong.innerHTML = result.kosong
            ibu_rumah_tangga.innerHTML = result.ibu_rumah_tangga
            pelajar.innerHTML = result.pelajar
            pekerja_lepas.innerHTML = result.pekerja_lepas
            karyawan_swasta.innerHTML = result.karyawan_swasta
            sdtt.innerHTML = result.sdtt
            tk.innerHTML = result.tk
            sd.innerHTML = result.sd
            smp.innerHTML = result.smp
            sma.innerHTML = result.sma
            s1.innerHTML = result.s1
            s2.innerHTML = result.s2
            s3.innerHTML = result.s3
            belum_sekolah.innerHTML = result.belum_sekolah
            d1.innerHTML = result.d1
            d2.innerHTML = result.d2
            d3.innerHTML = result.d3
        } catch (error) {
            console.error('Error:', error)
        }
    }
    resume_data_penduduks()
    data_aset()
</script>

<?= $this->endSection(); ?>