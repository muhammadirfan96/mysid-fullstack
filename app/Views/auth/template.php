<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="MySID | Sistem Informasi Desa  (Latompa)" />
    <meta property="og:description" content="auth" />
    <meta property="og:image" content="<?= base_url(); ?>img/frontend/favicon.ico" />
    <link rel="shortcut icon" href="<?= base_url(); ?>/img/frontend/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url(); ?>/fonts/andika/stylesheet.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/bi/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/output.css">
    <script>
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
    </script>
</head>

<body class="mx-2 md:mx-1 font-andika">
    <?= $this->renderSection('auth') ?>

    <!-- sweet alert -->
    <script src="<?= base_url(); ?>/js/sweetalert/script.js"></script>
    <script src="<?= base_url(); ?>/js/sweetalert/alert.js"></script>
</body>

</html>