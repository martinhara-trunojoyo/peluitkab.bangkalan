<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Sistem Informasi Pelayanan Publik Satu Pintu Dinas Kominfo Kabupaten Bangkalan">
    <meta name="author" content="Dinas Kominfo Kabupaten Bangkalan">

    <title>Peluit - Homepage</title>

    <!-- Favicons -->
    <link href="<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png" rel="icon">
    <link href="<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png" rel="apple-touch-icon">

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>/public/PodTalk/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/PodTalk/css/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/PodTalk/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/PodTalk/css/owl.theme.default.min.css">
    <link href="<?= base_url() ?>/public/PodTalk/css/templatemo-pod-talk.css" rel="stylesheet">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"
        integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
    #loader_page {
        min-height: 100vh;
        font-family: Roboto, Arial;
        color: #ADAFB6;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(249, 251, 255, 0.6);
    }

    .boxes {
        height: 32px;
        width: 32px;
        position: relative;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        margin-top: 32px;
        -webkit-transform: rotateX(60deg) rotateZ(45deg) rotateY(0deg) translateZ(0px);
        transform: rotateX(60deg) rotateZ(45deg) rotateY(0deg) translateZ(0px);
    }

    .boxes .box {
        width: 32px;
        height: 32px;
        top: 0px;
        left: 0;
        position: absolute;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }



    .boxes .box:nth-child(1) {
        -webkit-transform: translate(100%, 0);
        transform: translate(100%, 0);
        -webkit-animation: box1 1s linear infinite;
        animation: box1 1s linear infinite;
    }

    .boxes .box:nth-child(2) {
        -webkit-transform: translate(0, 100%);
        transform: translate(0, 100%);
        -webkit-animation: box2 1s linear infinite;
        animation: box2 1s linear infinite;
    }

    .boxes .box:nth-child(3) {
        -webkit-transform: translate(100%, 100%);
        transform: translate(100%, 100%);
        -webkit-animation: box3 1s linear infinite;
        animation: box3 1s linear infinite;
    }

    .boxes .box:nth-child(4) {
        -webkit-transform: translate(200%, 0);
        transform: translate(200%, 0);
        -webkit-animation: box4 1s linear infinite;
        animation: box4 1s linear infinite;
    }



    .boxes .box>div {
        background: #5C8DF6;
        --translateZ: 15.5px;
        --rotateY: 0deg;
        --rotateX: 0deg;
        position: absolute;
        width: 100%;
        height: 100%;
        background: #5C8DF6;
        top: auto;
        right: auto;
        bottom: auto;
        left: auto;
        -webkit-transform: rotateY(var(--rotateY)) rotateX(var(--rotateX)) translateZ(var(--translateZ));
        transform: rotateY(var(--rotateY)) rotateX(var(--rotateX)) translateZ(var(--translateZ));
    }

    .boxes .box>div:nth-child(1) {
        top: 0;
        left: 0;
        background: #5C8DF6;
    }

    .boxes .box>div:nth-child(2) {
        background: #145af2;
        right: 0;
        --rotateY: 90deg;
    }

    .boxes .box>div:nth-child(3) {
        background: #447cf5;
        --rotateX: -90deg;
    }

    .boxes .box>div:nth-child(4) {
        background: #DBE3F4;
        top: 0;
        left: 0;
        --translateZ: -90px;
    }

    @keyframes box1 {

        0%,
        50% {
            transform: translate(100%, 0);
        }

        100% {
            transform: translate(200%, 0);
        }
    }

    @keyframes box2 {
        0% {
            transform: translate(0, 100%);
        }

        50% {
            transform: translate(0, 0);
        }

        100% {
            transform: translate(100%, 0);
        }
    }

    @keyframes box3 {

        0%,
        50% {
            transform: translate(100%, 100%);
        }

        100% {
            transform: translate(0, 100%);
        }
    }

    @keyframes box4 {
        0% {
            transform: translate(200%, 0);
        }

        50% {
            transform: translate(200%, 100%);
        }

        100% {
            transform: translate(100%, 100%);
        }
    }
    </style>
</head>

<body>

    <div id="loader_page">
        <div class="boxes">
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT FILES -->
    <!-- <script src="<?= base_url() ?>/public/PodTalk/js/jquery.min.js"></script> -->
    <script src="<?= base_url() ?>/public/PodTalk/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/public/PodTalk/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/public/PodTalk/js/custom.js"></script>


    <script>
    setTimeout(() => {
        window.open("<?= base_url() ?>/homepage");
    }, 2000);
    </script>
</body>

</html>