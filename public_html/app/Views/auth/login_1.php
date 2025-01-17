<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Sistem Informasi Pelayanan Publik Satu Pintu Dinas Kominfo Kabupaten Bangkalan">
    <meta name="author" content="Dinas Kominfo Kabupaten Bangkalan">

    <title id="title_page">Peluit - Authentication</title>

    <!-- Favicons -->
    <link href="<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png" rel="icon">
    <link href="<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>/public/assets/login.css" rel="stylesheet">
    <link href="<?= base_url() ?>/public/assets/hide_arrow.css" rel="stylesheet">
    <style>
    </style>
</head>

<body>
    <div class="main">
        <div class="container a-container" id="a-container">
            <form class="form" id="b-form">
                <h2 class="form_title title">Sign In</h2>
                <input class="form__input" id="nik" type="number" placeholder="NIK">
                <button class="form__button button submit">SIGN IN</button>
            </form>
        </div>
        <div class="container b-container" id="b-container">
            <form class="form" id="a-form">
                <h2 class="form_title title">Form Register</h2>
                <input class="form__input" id="form_nik" type="number" placeholder="NIK">
                <input class="form__input" id="form_nama" type="text" placeholder="Nama">
                <input class="form__input" id="form_id_chat" type="number" placeholder="Id Chat Telegram">

                <button class="form__button button submit">SIGN UP</button>
            </form>
        </div>
        <div class="switch" id="switch-cnt">
            <div class="switch__circle"></div>
            <div class="switch__circle switch__circle--t"></div>
            <div class="switch__container" id="switch-c1">
                <h2 class="switch__title title">Hello Tretan !</h2>
                <p class="switch__description description">Belum punya akun ? Silahkan isi data register untuk membuat
                    akun.</p>
                <button class="switch__button button switch-btn">SIGN UP</button>
            </div>
            <div class="switch__container is-hidden" id="switch-c2">
                <h2 class="switch__title title">Sae Tretan ?</h2>
                <p class="switch__description description">Sudah punya akun ? Ayo login untuk dapat mengakses sistem.
                </p>
                <button class="switch__button button switch-btn">SIGN IN</button>
            </div>
        </div>
    </div>
    <!-- <script src="main.js"></script> -->
    <script>
    let switchCtn = document.querySelector("#switch-cnt");
    let switchC1 = document.querySelector("#switch-c1");
    let switchC2 = document.querySelector("#switch-c2");
    let switchCircle = document.querySelectorAll(".switch__circle");
    let switchBtn = document.querySelectorAll(".switch-btn");
    let aContainer = document.querySelector("#a-container");
    let bContainer = document.querySelector("#b-container");
    let allButtons = document.querySelectorAll(".submit");

    let getButtons = (e) => e.preventDefault()

    let changeForm = (e) => {

        switchCtn.classList.add("is-gx");
        setTimeout(function() {
            switchCtn.classList.remove("is-gx");
        }, 1500)

        switchCtn.classList.toggle("is-txr");
        switchCircle[0].classList.toggle("is-txr");
        switchCircle[1].classList.toggle("is-txr");

        switchC1.classList.toggle("is-hidden");
        switchC2.classList.toggle("is-hidden");
        aContainer.classList.toggle("is-txl");
        bContainer.classList.toggle("is-txl");
        bContainer.classList.toggle("is-z200");
    }

    let mainF = (e) => {
        for (var i = 0; i < allButtons.length; i++)
            allButtons[i].addEventListener("click", getButtons);
        for (var i = 0; i < switchBtn.length; i++)
            switchBtn[i].addEventListener("click", changeForm)
    }

    window.addEventListener("load", mainF);
    </script>

    <script>

    </script>

</body>

</html>