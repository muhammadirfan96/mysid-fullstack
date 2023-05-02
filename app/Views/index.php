<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/fonts/andika/stylesheet.css">
    <link rel="stylesheet" href="/fonts/ff-din/black/stylesheet.css">
    <link rel="stylesheet" href="/bi/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/output.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class="mx-2 md:mx-1 font-andika">
    <div class='border-b-2 border-cyan-900 z-10 p-4 bg-cyan-700 fixed top-0 right-0 left-0'>
        <button onclick="setSidebar()" class="absolute left-6 top-6 hidden md:inline">
            <div id="one" class="w-8 mb-[5px] border-2 rounded-sm border-black bg-black origin-left rotate-[35deg] transition delay-500"></div>
            <div id="two" class="w-8 mb-[5px] border-2 rounded-sm border-red-700 bg-red-700 opacity-0 transition delay-500"></div>
            <div id="three" class="w-8 mb-[5px] border-2 rounded-sm border-white bg-white origin-left -rotate-[35deg] transition delay-500"></div>
        </button>
        <p class='text-center text-3xl md:text-4xl font-bold text-white'>
            <a class="font-din" href="/">MySID</a>
        </p>
    </div>

    <div id="container" class="mx-auto md:ml-60 mt-[78px]">
        <!-- render content -->

        <?= $this->renderSection('page'); ?>

        <!-- end render content -->
    </div>

    <!-- navbar start -->

    <div id="sidebar" class="overflow-auto hidden md:block bg-red-50 border-red-700 border-r-2 fixed left-0 top-[72px] bottom-0 w-60 p-4 transition-all">
        <a href="<?= base_url('/info_desa'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-info-circle mr-2 text-xl"></i>info desa
            </p>
        </a>
        <a href="<?= base_url('/kependudukan'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-people mr-2 text-xl"></i>kependudukan
            </p>
        </a>
        <a href="<?= base_url('/statistik'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-graph-up-arrow mr-2 text-xl"></i>statistik
            </p>
        </a>
        <a href="<?= base_url('/layanan_surat'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-envelope mr-2 text-xl"></i>layanan surat
            </p>
        </a>
        <a href="<?= base_url('/sekretariat'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-building mr-2 text-xl"></i>sekretariat
            </p>
        </a>
        <a href="<?= base_url('/keuangan'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-coin mr-2 text-xl"></i>keuangan
            </p>
        </a>
        <a href="<?= base_url('/analisis'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-pie-chart mr-2 text-xl"></i>analisis
            </p>
        </a>
        <a href="<?= base_url('/bantuan'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-gift mr-2 text-xl"></i>bantaun
            </p>
        </a>
        <a href="<?= base_url('/pertanahan'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-map mr-2 text-xl"></i>pertanahan
            </p>
        </a>
        <a href="<?= base_url('/pembangunan'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-buildings mr-2 text-xl"></i>pembangunan
            </p>
        </a>
        <a href="<?= base_url('/lapak'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-cart mr-2 text-xl"></i>lapak
            </p>
        </a>
        <a href="<?= base_url('/pemetaan'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-globe-americas mr-2 text-xl"></i>pemetaan
            </p>
        </a>
        <a href="<?= base_url('/admin_web'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-laptop mr-2 text-xl"></i>admin web
            </p>
        </a>
        <a href="<?= base_url('/layanan_mandiri'); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
            <p class='text-lg inline self-center ml-2'>
                <i class="bi-person mr-2 text-xl"></i>layanan mandiri
            </p>
        </a>
    </div>

    <!-- end navbar -->


    <!-- start nav mobile -->

    <div id='navMobile' class='bg-white fixed bottom-0 right-0 left-0 border-t-2 border-t-cyan-700 -mb-56 md:hidden'>
        <button onclick="setNavMobile()" class='absolute right-0 -top-[28px] bg-cyan-700 pt-1 px-3 rounded-tl-lg'>
            <span id='first' class='border-2 rounded-sm border-white bg-white font-extrabold inline-block rotate-45 transition delay-500 h-4'></span>
            <span id='second' class='border-2 rounded-sm border-black bg-black font-extrabold inline-block -rotate-45 transition delay-500 h-4'></span>
        </button>
        <div class='overflow-auto grid grid-cols-4 gap-2 p-2 transition-all text-center'>
            <a href="/" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-speedometer"></i>
                <p class='text-xs'>home</p>
            </a>
            <a href="/info_desa" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-info"></i>
                <p class='text-xs'>info desa</p>
            </a>
            <a href="/kependudukan" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-people"></i>
                <p class='text-xs'>penduduk</p>
            </a>
            <a href="/statistik" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-graph-up-arrow"></i>
                <p class='text-xs'>statistik</p>
            </a>
            <a href="/layanan_surat" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-envelope"></i>
                <p class='text-xs'>surat</p>
            </a>
            <a href="/sekretariat" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-building"></i>
                <p class='text-xs'>sekretariat</p>
            </a>
            <a href="/keuangan" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-coin"></i>
                <p class='text-xs'>keuangan</p>
            </a>
            <a href="/analisis" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-pie-chart"></i>
                <p class='text-xs'>analisis</p>
            </a>
            <a href="/bantuan" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-gift"></i>
                <p class='text-xs'>bantuan</p>
            </a>
            <a href="/pertanahan" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-map"></i>
                <p class='text-xs'>pertanahan</p>
            </a>
            <a href="/pembangunan" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-buildings"></i>
                <p class='text-xs'>pembangunan</p>
            </a>
            <a href="/lapak" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-cart"></i>
                <p class='text-xs'>lapak</p>
            </a>
            <a href="/pemetaan" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-globe-americas"></i>
                <p class='text-xs'>pemetaan</p>
            </a>
            <a href="/admin_web" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-laptop"></i>
                <p class='text-xs'>admin</p>
            </a>
            <a href="/layanan_mandiri" class='bg-cyan-50 rounded-md p-1'>
                <i class="bi-person"></i>
                <p class='text-xs'>layanan</p>
            </a>
        </div>
    </div>

    <!-- end nav mobile -->

    <script>
        const setSidebar = () => {
            const one = document.querySelector('#one')
            const two = document.querySelector('#two')
            const three = document.querySelector('#three')
            const container = document.querySelector('#container')
            const sidebar = document.querySelector('#sidebar')
            one.classList.toggle('rotate-[35deg]')
            two.classList.toggle('opacity-0')
            three.classList.toggle('-rotate-[35deg]')
            container.classList.toggle('md:ml-60')
            sidebar.classList.toggle('-ml-60')
        };

        const setNavMobile = () => {
            const navMobile = document.querySelector('#navMobile')
            const first = document.querySelector('#first')
            const second = document.querySelector('#second')
            navMobile.classList.toggle("-mb-56")
            first.classList.toggle('translate-x-2')
            second.classList.toggle('-translate-x-2')
        };
    </script>

    <!-- sweet alert -->
    <script src="/js/sweetalert/script.js"></script>
    <script src="/js/sweetalert/alert.js"></script>
</body>

</html>