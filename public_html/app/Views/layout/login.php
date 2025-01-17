<!DOCTYPE html>
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

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="<?= base_url() ?>/public/stisla/dist/assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/css/components.css">

    <!-- CSS ASSETS -->
    <link href="<?= base_url() ?>/public/assets/login_background.css" rel="stylesheet">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"
        integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Select2.Js -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Sweeet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ReCaptcha -->
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body class="area">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <?= $this->renderSection('content') ?>
                </div>
                <div class="simple-footer text-white">
                    Copyright &copy; 2023 <a rel="nofollow" class="text-secondary"
                        href="http://kominfo.bangkalankab.go.id/" target="_blank">Dinas Komunikasi dan
                        Informatika
                        Kabupaten
                        Bangkalan.</a>

                </div>
        </section>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Infografis Id Chat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="img-fluid" src="<?= base_url() ?>/public/assets/image/id_chat.png" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/jquery.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/popper.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/tooltip.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/moment.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/public/stisla/dist/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/js/custom.js"></script>
</body>

</html>