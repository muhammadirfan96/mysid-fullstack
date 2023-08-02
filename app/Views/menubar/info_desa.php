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
                    <img src="img/frontend/pemerintahan.png">
                </div>
            </div>
            <div class="border border-cyan-700 rounded-md w-full md:w-[47%]">
                <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">struktur organisasi BPD</p>
                <div class="p-4 w-full">
                    <img src="img/frontend/bpd.png">
                </div>
            </div>
        </div>
    </div>

    <div class="m-2">
        <div class="mb-4 flex flex-wrap flex-col gap-2 w-full h-60 border-2 border-cyan-700 rounded p-2 overflow-x-scroll">
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/liston.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KEPALA DESA</p>
                    <p>Liston, S.S., B.Th.</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/izar.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>SEKRETARIS DESA</p>
                    <p>Muhammad Izar, S.T.</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/redi.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KASI PEMERINTAHAN</p>
                    <p>Redi Alexander</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/help.png'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KASI KESEJAHTERAAN & PELAYANAN</p>
                    <p>Hernandus Dedi</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/help.png'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KAUR KEUANGAN</p>
                    <p>Mei Maria, S.M.</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/karti.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KAUR UMUM & PERENCANAAN</p>
                    <p>Karti Apriani G., S.Si.</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/umar.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KEPALA DUSUN I</p>
                    <p>Teodorus Umar</p>
                </div>
            </div>
            <div class="relative w-40 h-full border-2 border-cyan-900 rounded-md bg-cyan-50" style="background-image: url('img/frontend/dona.jpg'); background-size: cover;">
                <div class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-sm text-center">
                    <p>KEPALA DUSUN II</p>
                    <p>Silfister Dona</p>
                </div>
            </div>
        </div>
    </div>

    <div class="m-2 mb-4">
        <div class="flex flex-wrap gap-3 justify-evenly">
            <div class="border border-cyan-700 rounded-md w-full md:w-[47%]">
                <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">rumusan visi</p>
                <div class="p-4">
                    TERWUJUDNYA TATA PEMERINTAHAN YANG PROFESIONAL, PEMBANGUNAN YANG PARTISIPATIF MENUJU DESA LATOMPA YANG MAJU DAN MANDIRI
                </div>
            </div>
            <div class="border border-cyan-700 rounded-md w-full md:w-[47%]">
                <p class="bg-cyan-700 rounded-t-sm p-2 text-white text-base text-center uppercase font-semibold">MISI
                </p>
                <div class="p-4">
                    <table>
                        <tr>
                            <td>1. </td>
                            <td>Meningkatkan kapasitas dan integritas aparat desa</td>
                        </tr>
                        <tr>
                            <td>2. </td>
                            <td>Menyelenggarakan pemerintahan yang transparan dan akuntabel</td>
                        </tr>
                        <tr>
                            <td>3. </td>
                            <td>Membangun dan merehabilitasi sarana dan prasarana umum dalam desa</td>
                        </tr>
                        <tr>
                            <td>4. </td>
                            <td>Mengelola sumber daya alam sebagai sumber PADes</td>
                        </tr>
                        <tr>
                            <td>5. </td>
                            <td>Meningkatkan kapasitas kelompok masyarakat</td>
                        </tr>
                        <tr>
                            <td>6. </td>
                            <td>Menunjang sarana dan prasarana kegiatan ekonomi masyarakat</td>
                        </tr>
                        <tr>
                            <td>7. </td>
                            <td>Menyediakan sarana air bersih</td>
                        </tr>
                        <tr>
                            <td>8. </td>
                            <td>Meningkatkan hasil pertanian, peternakan dan budi daya</td>
                        </tr>
                        <tr>
                            <td>9. </td>
                            <td>Meningkatkan peran BUMDes</td>
                        </tr>
                        <tr>
                            <td>10. </td>
                            <td>Meningkatkan peran Karang Taruna</td>
                        </tr>
                        <tr>
                            <td>11. </td>
                            <td>Meningkatkan kesadaran tentang perilaku hidup sehat dan bersih</td>
                        </tr>
                        <tr>
                            <td>12. </td>
                            <td>Menciptakan suasana desa yang kondusif</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="m-2">
    <p class="font-semibold text-base mb-2 capitalize">Sejarah Desa</p>
    <div class="font-light text-base md:text-sm mb-3">
        Latompa adalah nama salah satu daerah yang terletak dipesisir pulau Buton yaitu disebelah timur daratan muna. Untuk menjangkaunya tentunya harus menggunakan sarana transportasi yang menempuh jarak ± 10 mil laut.
    </div>
    <div class="font-light text-base md:text-sm mb-3">
        Berdasarkan program Bupati muna tahun 1984 tentang pembukaan area hutan latompa untuk dijadikan perkebunan dan pemukiman masyarakat pemerintah daerah yang dalam hal ini Bupati muna yang pada saat itu dijabat oleh Drs H. Laode Saafi Amane menunjuk organisasi MKGR (KBU) sebagai mediator guna mencari dan menggalang kelompok-kelompok masyarakat yang berkeinginan membuka area hutan latompa menjadi area perkebunan atas biaya sendiri
    </div>
    <div class="font-light text-base md:text-sm mb-3">
        MKGR (KBU) yang saat itu diketuai oleh simbala dan tokoh masyarakat maligano dalam hal ini larati berhasil menggalang kelompok Sidodadi yang disebut kelompok Sidodadi dan kelompok masyarakat balibu yang disebut kelompok lolibu kedua kelompok tersebut berasal dari wilayah muna daratan
    </div>
    <div class="font-light text-base md:text-sm mb-3">
        Bulan Juli tahun 1984 kelompok Sidodadi yang dipimpin oleh F hudu masuk ke daerah la tompa kemudian di hutan yang sama pada bulan September kelompok menyusul.
    </div>
    <div class="font-light text-base md:text-sm mb-3">
        Anggota kelompok lolibu terdiri dari dua daerah asal 1 bagian dari masyarakat Lolibu yang dipimpin oleh Rovinus LanSaleh dan satu bagian lagi dari masyarakat larontohe yang dipimpin oleh Alosius Lakumba dan Lahaji David kedua kelompok tersebut membuka area hutan latompa secara terpisah dengan batas-batas yang disepakati bersama adapun suku dan agama dari kedua kelompok masyarakat pendatang ini adalah muna maronene Bugis Toraja dan Ambon sedangkan keyakinan yang dianut mayoritas beragama Katolik.
    </div>
    <div class="font-light text-base md:text-sm mb-3">
        Walaupun perubahan daerah ini berjalan lamban akan tetapi tahun 1984 itulah dikenang sebagai tonggak sejarah dibukanya daerah la tompa dari area hutan tak bertuan menjadi area perkebunan dan pemukiman masyarakat
    </div>

    <p class="font-semibold text-base mb-2 capitalize">Asal usul atau Legenda Desa</p>
    <div class="font-light text-base md:text-sm mb-3">
        Nama latompa sebagai suatu tempat atau daerah yang terletak di pesisir pulau Buton telah ada sebelum dibuka menjadi daerah pemukiman entah kapan dan siapa pencetus nama daerah ini dari berbagai sumber yang kami impun mengatakan bahwa kata la tompa yang diangkat menjadi nama daerah ini berawal dari nama sebuah kali jika diartikan katalah tempat bermakna kali tak berhulu yang terputus atau kalibuntu bagi masyarakat kalilah tompas sangat menunjang di bidang perekonomian jalur Kalila tomba yang menghubungkan laut hingga kini dijadikan arus transportasi laut
    </div>

    <p class="font-semibold text-base mb-2 capitalize">sejarah pemerintahan desa</p>
    <div class="font-light text-base md:text-sm mb-3">
        Ketika Latompa telah dirintis dan didiami oleh masyarakat roda pemerintahannya dipimpin oleh Desa Maligano kemudian ditetapkan menjadi satu RK dengan nama RK lebo 2 tahun kemudian yakni 1986 masuklah program transmigrasi lokal dari pemerintah program tersebut ditujukan pada Desa Maligano saat itu sehingga dinamakan unit pemukiman transmigrasi UPT Maligano namun ditempatkan di Latompa
    </div>
    <div class="font-light text-base md:text-sm mb-3">
        Dengan masuknya transmigrasi ke daerah Latompa tentunya seiring dengan pertambahan jumlah penduduk namun demikian pemerintah Desa Maligano tidak banyak mengintervensi karena masyarakat transmigrasi berada dalam binaan pihak transmigrasi
    </div>
    <div class="font-light text-base md:text-sm mb-3">
        Tahun 1986-1992 masyarakat lah tempat terbagi dalam dua sistem pemerintahan RK Lebo yang dalam hal ini kelompok Sidodadi yang tidak masuk transmigrasi berada dalam roda pemerintahan desa maligano sedangkan kelompok lolibu yang masuk transmigrasi berada dalam binaan transmigrasi itu sendiri
    </div>
    <div class="font-light text-base md:text-sm mb-3">
        Menjelang serah terima dari pihak transmigrasi kepada pemerintah daerah kepala unit pemukiman transmigrasi maligano mamunun menunjuk Ruvinus Lansale (alm) sebagai korades. Tahun 1989 terjadi serah terima dari pihak transmigrasi kepada pemerintah daerah pada saat itulah pemerintah daerah menetapkan bahwa la tompa sudah layak menjadi sebuah desa
    </div>

    <p class="font-semibold text-base mb-2 capitalize">batas wilayah</p>
    <div class="font-light text-base md:text-sm mb-3">
        Secara geografis desa atau tempat terletak di sebelah utara ibukota kecamatan maligano dengan batas wilayah sebagai berikut sebelah utara berbatasan dengan desa lakoni sebelah selatan berbatasan dengan desa raimuna sebelah barat berbatasan dengan selat Buton sebelah timur berbatasan dengan kabupaten Buton Utara
    </div>

    <p class="font-semibold text-base mb-2 capitalize">luas wilayah</p>
    <div class="font-light text-base md:text-sm mb-3">
        Wilayah Desa Latompa adalah 1185 Ha terdiri dari tanah perkebunan 700 Ha, tanah pertanian 400 Ha tanah pekarangan 15 Ha tanah permukiman 50 Ha lahan peternakan 20 Ha.
    </div>

    <p class="font-semibold text-base mb-2 capitalize">Keadaan topografi desa</p>
    <div class="font-light text-base md:text-sm mb-3">
        Secara umum keadaan topografi desa latumpa adalah merupakan daerah perbukitan dataran tinggi dan sebagian dataran rendah dan daerah pesisir pantai.
    </div>

    <p class="font-semibold text-base mb-2 capitalize">Keadaan iklim</p>
    <div class="font-light text-base md:text-sm mb-3">
        Iklim di salatumpa adalah sebagaimana iklim desa-desa lain di wilayah Indonesia memiliki iklim kemarau dan iklim penghujan iklim penghujan biasanya mulai pada bulan April sampai dengan bulan Juni tahun berikutnya sedangkan iklim kemarau dimulai dari bulan Juli sampai dengan bulan November iklim tersebut secara langsung mempengaruhi pola tanam serta mata pencaharian masyarakat
    </div>
</div>
</div>

<?= $this->endSection(); ?>