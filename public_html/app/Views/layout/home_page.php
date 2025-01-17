<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title id="title_page">Peluit</title>

    <!-- Favicons -->
    <link href="<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png" rel="icon">
    <link href="<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png" rel="apple-touch-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/modules/fontawesome/css/all.min.css">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"
        integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Calendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

    <!-- Apexchart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/modules/select2/dist/css/select2.min.css">
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

    <!-- CK EDITOR -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/super-build/ckeditor.js"></script>

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/css/components.css">
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

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="<?= base_url() ?>" class="navbar-brand sidebar-gone-hide">PELUIT</a>
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <div class="nav-collapse">
                    <!-- <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a> -->
                    <!-- <ul class="navbar-nav">
                        <li class="nav-item active"><a href="#" class="nav-link">Aplication</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Report Something</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Server Status</a></li>
                    </ul> -->

                </div>
                <form class="form-inline ml-auto">

                </form>

                <!-- <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>/public/stisla/dist/assets/img/avatar/avatar-1.png"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Pengunjung</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url() ?>/sslogin" class="dropdown-item has-icon text-primary">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </div>
                    </li>
                </ul> -->
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="<?= base_url() ?>" data-toggle="dropdown"
                            class="nav-link nav-link-lg nav-link-user">
                            <img alt="image" style="width:50px!important"
                                src="<?= base_url() ?>/public/assets/image/logo_opd/logo.jpg"
                                class="rounded-circle mr-1">
                            <img alt="image" style="width:50px!important"
                                src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo-1.png"
                                class="rounded-circle mr-1">
                        </a>
                    </li>
                </ul>
            </nav>


            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <li id="dashboard" class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link"><i
                                    class="fas fa-home"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.lapor.go.id/" target="_blank" class="nav-link"><i
                                    class="fas fa-search"></i><span>Span
                                    Lapor</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://sistawan.bangkalankab.go.id/" target="_blank" class="nav-link"><i
                                    class="fas fa-camera-retro"></i><span>Sistawan</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="http://wsadmin.bangkalankab.go.id/" target="_blank" class="nav-link"><i
                                    class="fas fa-database"></i><span>E-Sambhung</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://bangga.bangkalankab.go.id/" target="_blank" class="nav-link"><i
                                    class="fas fa-bold"></i><span>Bangga</span></a>
                        </li>
                        <!-- <li id="magang" class="nav-item">
                            <a href="<?= base_url() ?>/homepage/magang" class="nav-link"><i
                                    class="fas fa-user-graduate"></i><span>Magang</span></a>
                        </li> -->
                        <li id="faq" class="nav-item">
                            <a href="<?= base_url() ?>/homepage/faq" class="nav-link"><i
                                    class="far fa-question-circle"></i><span>FAQ</span></a>
                        </li>
                        <!-- <li id="help" class="nav-item">
                            <a href="<?= base_url() ?>/homepage/help-desk" class="nav-link"><i
                                    class="fas fa-headset"></i><span>Help Desk</span></a>
                        </li> -->
                        <li id="tiket" style="display:none;" class="nav-item">
                            <a href="javascript:void(0)" class="nav-link"><i
                                    class="fas fa-ticket-alt"></i><span>Tiket</span></a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                                    class="fas fa-fire"></i><span>Dashboard</span></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="index-0.html" class="nav-link">General
                                        Dashboard</a></li>
                                <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                                    class="far fa-clone"></i><span>Multiple Dropdown</span></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link
                                                2</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                                <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                                <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <?= $this->renderSection('content') ?>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div> Design By <a
                        href="https://kominfo.bangkalankab.go.id/">Dinas
                        Komunikasi dan Informatika Kabupaten Bangkalan</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <!-- <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/jquery.min.js"></script> -->
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