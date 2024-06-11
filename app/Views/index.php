<?php

$menubar = [
    'home' => [
        'link' => '/',
        'icon' => 'bi-speedometer',
    ],
    'info_desa' => [
        'link' => '/infodesa',
        'icon' => 'bi-info-circle',
    ],
    'statistik' => [
        'link' => '/statistik',
        'icon' => 'bi-graph-up-arrow',
    ],
    'admin_web' => [
        'link' => '/adminweb',
        'icon' => 'bi-laptop',
    ],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="SID | Sistem Informasi Desa Bhone Kainsetala" />
    <meta property="og:description" content="<?= $title; ?>" />
    <meta property="og:image" content="<?= base_url(); ?>img/frontend/favicon.ico" />
    <link rel="shortcut icon" href="<?= base_url(); ?>/img/frontend/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url(); ?>/fonts/andika/stylesheet.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/fonts/ff-din/black/stylesheet.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/bi/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/output.css">
</head>

<body class="mx-2 md:mx-1 font-andika">
    <div class='border-b-2 border-cyan-900 z-10 p-4 pt-3 bg-cyan-700 fixed top-0 right-0 left-0'>
        <button onclick="setSidebar()" class="absolute left-6 top-6 hidden md:inline">
            <div id="one" class="w-8 mb-[5px] border-2 rounded-sm border-black bg-black origin-left rotate-[35deg] transition delay-500"></div>
            <div id="two" class="w-8 mb-[5px] border-2 rounded-sm border-red-700 bg-red-700 opacity-0 transition delay-500"></div>
            <div id="three" class="w-8 mb-[5px] border-2 rounded-sm border-white bg-white origin-left -rotate-[35deg] transition delay-500"></div>
        </button>
        <p class='text-center text-3xl md:text-4xl font-bold text-white mb-1'>
            <a class="font-din" href="/">MySID</a>
        </p>
        <p class="text-xs md:text-sm text-white absolute right-0 left-0 bottom-0 text-center">desa bhone kainsetala kecamatan bone</p>
    </div>

    <div id="container" class="mx-auto md:ml-60 mt-[78px]">
        <!-- render content -->

        <?= $this->renderSection('page'); ?>

        <!-- end render content -->
    </div>

    <!-- navbar start -->

    <div id="sidebar" class="overflow-auto hidden md:block bg-cyan-200 border-cyan-900 border-r-2 fixed left-0 top-[72px] bottom-0 w-60 p-4 transition-all">

        <?php foreach ($menubar as $key => $value) : ?>
            <a href="<?= base_url($value['link']); ?>" class='flex bg-cyan-700 text-white rounded-md mb-1 h-8 p-2'>
                <p class='text-lg inline self-center ml-2'>
                    <i class="<?= $value['icon'] ?> mr-2 text-xl"></i><?= $key ?>
                </p>
            </a>
        <?php endforeach ?>

    </div>

    <!-- end navbar -->


    <!-- start nav mobile -->

    <div id='navMobile' class='bg-cyan-200 fixed bottom-0 right-0 left-0 border-t-2 border-t-cyan-900 -mb-16 md:hidden'>
        <button onclick="setNavMobile()" class='absolute right-0 -top-[28px] bg-cyan-900 pt-1 px-3 rounded-tl-lg'>
            <span id='first' class='border-2 rounded-sm border-white bg-white font-extrabold inline-block rotate-45 transition delay-500 h-4'></span>
            <span id='second' class='border-2 rounded-sm border-black bg-black font-extrabold inline-block -rotate-45 transition delay-500 h-4'></span>
        </button>
        <div class='grid grid-cols-4 gap-2 p-2 transition-all text-center'>

            <?php foreach ($menubar as $key => $value) : ?>
                <a href="<?= base_url($value['link']); ?>" class='bg-cyan-700 rounded-md p-1 text-white'>
                    <i class="<?= $value['icon'] ?>"></i>
                    <p class='text-xs'><?= $key ?></p>
                </a>
            <?php endforeach ?>

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
            navMobile.classList.toggle("-mb-16")
            first.classList.toggle('translate-x-2')
            second.classList.toggle('-translate-x-2')
        };
    </script>

    <!-- sweet alert -->
    <script src="<?= base_url(); ?>/js/sweetalert/script.js"></script>
    <script src="<?= base_url(); ?>/js/sweetalert/alert.js"></script>
</body>

</html>