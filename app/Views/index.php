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
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/fonts/andika/stylesheet.css">
    <link rel="stylesheet" href="/fonts/ff-din/black/stylesheet.css">
    <link rel="stylesheet" href="/bi/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/output.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script>
        const api_me = '<?= base_url('/me') ?>'

        const setCookie = (cName, cValue, expDays) => {
            let date = new Date()
            date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000))
            const expires = `expires=${date.toUTCString()}`
            document.cookie = `${cName}=${cValue}; path=/`
        }

        function getCookie(cookieName) {
            let cookie = {};
            document.cookie.split(';').forEach(function(el) {
                let [key, value] = el.split('=');
                cookie[key.trim()] = value;
            })
            return cookie[cookieName];
        }

        if (!getCookie('token')) window.location.href = '<?= base_url('/login') ?>'
    </script>
</head>

<body class="mx-2 md:mx-1 font-andika">
    <div class='border-b-2 border-cyan-900 z-10 p-4 bg-cyan-700 fixed top-0 right-0 left-0'>
        <button onclick="setSidebar()" class="absolute left-6 top-6 hidden md:inline">
            <div id="one" class="w-8 mb-[5px] border-2 rounded-sm border-black bg-black origin-left rotate-[35deg] transition delay-500"></div>
            <div id="two" class="w-8 mb-[5px] border-2 rounded-sm border-red-700 bg-red-700 opacity-0 transition delay-500"></div>
            <div id="three" class="w-8 mb-[5px] border-2 rounded-sm border-white bg-white origin-left -rotate-[35deg] transition delay-500"></div>
        </button>
        <div class="absolute right-6 top-3 md:hidden inline text-right text-white">
            <button onclick="logout()"><i class="bi-box-arrow-right"></i></button>
            <p id="loginAs" class="text-sm italic font-thin"></p>
        </div>
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

        <?php foreach ($menubar as $key => $value) : ?>
            <a href="<?= base_url($value['link']); ?>" class='flex hover:bg-cyan-50 rounded-md mb-1 h-8 p-2'>
                <p class='text-lg inline self-center ml-2'>
                    <i class="<?= $value['icon'] ?> mr-2 text-xl"></i><?= $key ?>
                </p>
            </a>
        <?php endforeach ?>

        <div class="absolute left-6 bottom-3 hidden md:inline text-right text-red-700 bg-white rounded-md py-1 px-2 m-1 text-sm  font-thin">
            <button onclick="logout()" class="border border-red-700 px-1 rounded-md italic">logout</button>
            <p id="md_loginAs" class="italic"></p>
        </div>

    </div>

    <!-- end navbar -->


    <!-- start nav mobile -->

    <div id='navMobile' class='bg-white fixed bottom-0 right-0 left-0 border-t-2 border-t-cyan-700 -mb-16 md:hidden'>
        <button onclick="setNavMobile()" class='absolute right-0 -top-[28px] bg-cyan-700 pt-1 px-3 rounded-tl-lg'>
            <span id='first' class='border-2 rounded-sm border-white bg-white font-extrabold inline-block rotate-45 transition delay-500 h-4'></span>
            <span id='second' class='border-2 rounded-sm border-black bg-black font-extrabold inline-block -rotate-45 transition delay-500 h-4'></span>
        </button>
        <div class='grid grid-cols-4 gap-2 p-2 transition-all text-center'>

            <?php foreach ($menubar as $key => $value) : ?>
                <a href="<?= base_url($value['link']); ?>" class='bg-cyan-50 rounded-md p-1'>
                    <i class="<?= $value['icon'] ?>"></i>
                    <p class='text-xs'><?= $key ?></p>
                </a>
            <?php endforeach ?>

        </div>
    </div>

    <!-- end nav mobile -->

    <script>
        const login_as = document.querySelector('#loginAs')
        const md_login_as = document.querySelector('#md_loginAs')

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

        (async () => {
            try {
                const response = await fetch(`${api_me}`, {
                    headers: {
                        Authorization: `Bearer ${getCookie('token')}`
                    }
                })
                const result = await response.json()
                login_as.innerHTML = result.desa
                md_login_as.innerHTML = `logged in as: ${result.desa}`
            } catch (error) {
                console.error("Error:", error)
            }
        })()

        const logout = () => {
            setCookie('token', '', 0)
            window.location.href = '<?= base_url('/login') ?>'
        }
    </script>

    <!-- sweet alert -->
    <script src="/js/sweetalert/script.js"></script>
    <script src="/js/sweetalert/alert.js"></script>
</body>

</html>