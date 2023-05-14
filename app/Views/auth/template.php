<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>auth</title>
    <link rel="stylesheet" href="/fonts/andika/stylesheet.css">
    <link rel="stylesheet" href="/bi/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/output.css">
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
    <script src="/js/sweetalert/script.js"></script>
    <script src="/js/sweetalert/alert.js"></script>
</body>

</html>