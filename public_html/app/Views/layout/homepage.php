<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Sistem Informasi Pelayanan Publik Satu Pintu Dinas Kominfo Kabupaten Bangkalan">
    <meta name="author" content="Dinas Kominfo Kabupaten Bangkalan">

    <title id="title_page">Peluit</title>

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

    <!-- CSS ASSETS -->
    <link href="<?= base_url() ?>/public/assets/loader.css" rel="stylesheet">
    <link href="<?= base_url() ?>/public/assets/card_list.css" rel="stylesheet">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"
        integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Kalender -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/css/evo-calendar.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/public/evo-calendar/css/evo-calendar.royal-navy.css">
    <script src="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/js/evo-calendar.min.js"></script>

    <!-- CHART -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- YEAR PICKER -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/public/year-picker/css/yearpicker.css">
    <script src="<?= base_url() ?>/public/year-picker/js/yearpicker.js"></script>


    <!-- CARD -->
    <style>
    .section-padding {
        padding-top: 50px !important;
    }

    .hero-section {
        padding-top: 100px !important;
    }

    .owl-carousel-info-wrap {
        cursor: pointer;
    }

    .myopd {
        font-size: 20px !important;
    }

    /* Calendar */

    .calendar-year p {
        color: white;
    }

    .calendar-months li {
        color: white;
    }

    .calendar-inner {
        padding-bottom: 80px !important;
    }

    @media only screen and (max-width: 768px) {
        .copyright-text {
            font-size: 12px !important;
        }

        .myopd {
            font-size: 12px !important;
        }

        .myimg {
            display: none !important;
        }

        .myimg_mobile {
            display: block !important;
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

    <div id="main_page" style="display :none;">
        <main>
            <nav class="navbar navbar-expand-lg">
                <div class="container">

                    <!-- <a class="navbar-brand me-lg-5 me-0" href="<?= base_url() ?>">
                    <img src="<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png"
                        class="logo-image img-fluid" alt="Logo Bangkalan">
                </a> -->

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-auto">
                            <li class="nav-item">
                                <a id="home" class="nav-link" href="<?= base_url() ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.lapor.go.id/" target="_blank">Lapor</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Magang</a>

                                <ul class="dropdown-menu dropdown-menu-light"
                                    aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Tata Cara</a></li>

                                    <li><a class="dropdown-item" href="#">Statistik</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?= $this->renderSection('content') ?>

            <section class="topics-section section-padding pb-0" id="section_3">
                <div class="container">
                    <!-- <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Topics</h4>
                        </div>
                    </div>

                </div> -->
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <center>
                                <p class="copyright-text mb-0">Copyright © 2023 <a rel="nofollow"
                                        href="http://kominfo.bangkalankab.go.id/" target="_blank">Dinas Komunikasi dan
                                        Informatika
                                        Kabupaten
                                        Bangkalan.</a>
                                    <br><br>
                                </p>
                            </center>
                        </div>

                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- JAVASCRIPT FILES -->
    <!-- <script src="<?= base_url() ?>/public/PodTalk/js/jquery.min.js"></script> -->
    <script src="<?= base_url() ?>/public/PodTalk/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/public/PodTalk/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/public/PodTalk/js/custom.js"></script>


    <script>
    $(document).ready(function() {
        setTimeout(() => {
            $('#loader_page').fadeOut(1000);
            $('#main_page').fadeIn(2000);
        }, 2000);
    });
    </script>
</body>

</html>