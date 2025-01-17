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

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet"
        href="<?= base_url() ?>/public/stisla/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="<?= base_url() ?>/public/stisla/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"
        integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- YEAR PICKER -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
        rel="stylesheet" />

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Datatable -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="<?= base_url() ?>/public/stisla/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url() ?>/public/stisla/dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css" />

    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/datatables/datatables.min.js"></script>
    <script
        src="<?= base_url() ?>/public/stisla/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
    </script>
    <script
        src="<?= base_url() ?>/public/stisla/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js">
    </script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/js/page/modules-datatables.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap.min.js"></script>

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/stisla/dist/assets/modules/select2/dist/css/select2.min.css">
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

    <!-- Calendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

    <!-- Apexchart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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


    <!-- Hide Arrow Input -->
    <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* round */
    .rounded-circle {
        border-radius: 50% !important;
        aspect-ratio: 1 / 1;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" style="object-fit: cover!important;object-position: center;"
                                src="<?= base_url() ?>/public/assets/image/avatar/<?= session()->get('foto') ?>"
                                id="foto_profile" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><?= session()->get('nama') ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php if(session()->get('id_role')==0){ ?>
                            <div class="dropdown-title">Hi, Super Admin</div>
                            <?php }else if(session()->get('id_role')==1){  ?>
                            <div class="dropdown-title">Hi, Operator</div>
                            <?php }else if(session()->get('id_role')==2){  ?>
                            <div class="dropdown-title">Hi, Verifikator</div>
                            <?php }else if(session()->get('id_role')==3){  ?>
                            <div class="dropdown-title">Hi, Pembimbing</div>
                            <?php }else{ ?>
                            <div class="dropdown-title">Hi, User</div>
                            <?php } ?>
                            <a href="<?= base_url() ?>/<?= session()->get('role') ?>/profile"
                                class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0)" onclick="logout()" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= base_url() ?>/<?= session()->get('role') ?>/dashboard">PELUIT</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= base_url() ?>/<?= session()->get('role') ?>/dashboard">PLT</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li id="dashboard"><a class="nav-link" href="<?= base_url() ?>/admin/dashboard"><i
                                    class="fas fa-chart-pie"></i>
                                <span>Dashboard</span></a></li>

                        <!-- Header -->
                        <li class="menu-header">Pelayanan Publik</li>

                        <!-- Start If -->
                        <?php if(session()->get('id_role') == 0 || session()->get('id_role') == 1){ ?>

                        <li id="tiket"><a class="nav-link"
                                href="<?= base_url() ?>/<?= session()->get('role') ?>/tiket"><i
                                    class="fas fa-ticket-alt"></i>
                                <span>Tiket</span></a></li>
                        <!-- End If -->
                        <?php }?>


                        <!-- Start If -->
                        <?php if(session()->get('id_role') == 2){ ?>
                        <li id="tiket"><a class="nav-link"
                                href="<?= base_url() ?>/<?= session()->get('role') ?>/landing-page"><i
                                    class="fas fa-ticket-alt"></i>
                                <span>Tiket
                                </span></a></li>
                        <!-- End If -->
                        <?php }?>


                        <!-- Start If -->
                        <?php if(session()->get('id_role') != 2){ ?>
                        <!-- <li id="magang"><a class="nav-link"
                                href="<?= base_url() ?>/<?= session()->get('role') ?>/magang"><i
                                    class="fas fa-user-graduate"></i>
                                <span>Magang</span></a></li> -->
                        <!-- End If -->
                        <?php }?>

                        <!-- <li id="help-desk"><a class="nav-link" href="<?= base_url() ?>/admin/magang"><i
                                    class="fas fa-headset"></i>
                                <span>Help Desk</span></a></li> -->

                        <!-- Header -->
                        <!-- <li class="menu-header">Laporan</li>
                        <li id="report" class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-excel"></i><span>Unduh
                                    Laporan</span></a>
                            <ul class="dropdown-menu">
                                <li id="report_pelayanan"><a class="nav-link"
                                        href="<?= base_url() ?>/admin/pengguna/admin">Pelayanan</a></li>
                                <li id="report_magang"><a class="nav-link"
                                        href="<?= base_url() ?>/admin/pengguna/operator">Magang</a></li>
                                <li id="report_log"><a class="nav-link"
                                        href="<?= base_url() ?>/admin/pengguna/operator">Log Login</a></li>
                            </ul>
                        </li> -->

                        <!-- Start If -->
                        <?php if(session()->get('id_role') == 0){ ?>
                        <!-- Header -->
                        <li class="menu-header">Data Master</li>
                        <li id="pengguna" class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i
                                    class="fas fa-user-cog"></i><span>Pengguna</span></a>
                            <ul class="dropdown-menu">
                                <!-- Start If -->
                                <?php if(session()->get('id_role') == 0){ ?>
                                <li id="admin"><a class="nav-link"
                                        href="<?= base_url() ?>/admin/pengguna/admin">Admin</a></li>
                                <li id="operator"><a class="nav-link"
                                        href="<?= base_url() ?>/admin/pengguna/operator">Operator</a></li>
                                <li id="verifikator"><a class="nav-link"
                                        href="<?= base_url() ?>/admin/pengguna/verifikator">Verifikator</a></li>
                                <!-- End If -->
                                <?php }?>

                                <!-- <li id="pembimbing"><a class="nav-link"
                                        href="<?= base_url() ?>/<?= session()->get('role') ?>/pengguna/pembimbing">Pembimbing
                                        Magang</a></li> -->

                                <!-- Start If -->
                                <?php if(session()->get('id_role') == 0){ ?>
                                <!-- <li id="user"><a class="nav-link" href="<?= base_url() ?>/admin/pengguna/user">User</a>
                                </li> -->
                                <!-- End If -->
                                <?php }?>

                            </ul>
                        </li>
                        <!-- End If -->
                        <?php }?>


                        <!-- Start If -->
                        <?php if(session()->get('id_role') == 0){ ?>

                        <li id="pelayanan"><a class="nav-link" href="<?= base_url() ?>/admin/pelayanan"><i
                                    class="fas fa-users"></i>
                                <span>Pelayanan</span></a></li>
                        <li id="barang"><a class="nav-link" href="<?= base_url() ?>/admin/peralatan"><i
                                    class="fas fa-box-open"></i>
                                <span>Peralatan Zoom</span></a></li>
                        <li id="aula"><a class="nav-link" href="<?= base_url() ?>/admin/aula"><i
                                    class="fas fa-map-pin"></i>
                                <span>Ruang Aula</span></a></li>
                        <li id="instansi"><a class="nav-link" href="<?= base_url() ?>/admin/opd"><i
                                    class="fas fa-landmark"></i>
                                <span>Instansi</span></a></li>


                        <!-- End If -->
                        <?php }?>

                        <!-- Start If -->
                        <?php if(session()->get('id_role') == 0){ ?>
                        <li id="sub-bagian"><a class="nav-link"
                                href="<?= base_url() ?>/<?= session()->get('role') ?>/sub-bagian"><i
                                    class="fas fa-network-wired"></i>
                                <span>Sub Bagian</span></a></li>
                        <!-- End If -->
                        <?php }?>


                        <!-- Start If -->
                        <?php if(session()->get('id_role') == 0){ ?>
                        <li id="faq"><a class="nav-link" href="<?= base_url() ?>/admin/faq"><i
                                    class="far fa-question-circle"></i>
                                <span>FAQ</span></a></li>
                        <!-- End If -->
                        <?php }?>

                        <!-- Start If -->
                        <?php if(session()->get('id_role') == 0){ ?>

                        <!-- End If -->
                        <?php }?>
                    </ul>
                </aside>
            </div>

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
    <script>
    function logout() {
        Swal.fire({
            title: 'Logout ?',
            text: "Anda harus login kembali jika ingin mengkases menu pada halaman ini !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FF0000',
            cancelButtonColor: '#4B4B4B',
            confirmButtonText: 'Logout'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url() ?>/sslogout";
            }
        })
    }
    </script>

    <!-- General JS Scripts -->
    <!-- <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/jquery.min.js"></script> -->
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/popper.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/tooltip.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/moment.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/chart.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <!-- <script src="<?= base_url() ?>/public/stisla/dist/assets/js/page/index.js"></script> -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/public/stisla/dist/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/public/stisla/dist/assets/js/custom.js"></script>
</body>

</html>