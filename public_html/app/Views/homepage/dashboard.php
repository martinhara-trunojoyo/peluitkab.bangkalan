<?= $this->extend('layout/home_page') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<style>
.swiper {
    /* width: 600px; */
    height: 500px;
}
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pelayanan Publik</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Daftar Pelayanan Publik</div>
            </div>
        </div>

        <div class="section-body">
            <!-- Hero -->
            <!-- <h2 class="section-title">This is Example Page</h2>
            <p class="section-lead">This page is just an example for you to create your own page.</p> -->
            <div class="hero text-white hero-bg-image hero-bg-parallax mb-4"
                style="background-image: url('<?= base_url() ?>/public/assets/image/login_hero.jpg');">
                <div class="hero-inner">
                    <h2>P E L U I T - Pelayanan Publik Satu Pintu</h2>
                    <p class="lead">Sistem Informasi Pelayanan Publik Dinas Komunikasi dan Informatika Kabupaten
                        Bangkalan.</p>
                    <div class="mt-4">
                        <a href="<?= base_url() ?>/sslogin" class="btn btn-outline-white btn-lg btn-icon icon-left"><i
                                class="far fa-user"></i>
                            Login</a>
                    </div>
                </div>
            </div>

            <!-- Card -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title" id="orders-tittle">Jumlah Tiket</div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count" id="orders-proses">0</div>
                                    <div class="card-stats-item-label">Proses</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count" id="orders-selesai">0</div>
                                    <div class="card-stats-item-label">Selesai</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count" id="orders-tolak">0</div>
                                    <div class="card-stats-item-label">Ditolak</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Tiket</h4>
                            </div>
                            <div class="card-body" id="orders-semua">
                                0
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title" id="orders-jenis-tittle">Data Master</div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count" id="orders-jenis-siswa">0</div>
                                    <div class="card-stats-item-label">OPD</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count"></div>
                                    <div class="card-stats-item-label"></div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count" id="orders-jenis-mahasiswa">0</div>
                                    <div class="card-stats-item-label">User</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pelayanan</h4>
                            </div>
                            <div class="card-body" id="orders-jenis-semua">
                                0
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDER -->
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Pelayanan Publik</h4>
                </div>
                <div class="card-body">

                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php
                            for ($x = 0; $x < count($list_pelayanan); $x++) {
                                if($list_pelayanan[$x]["active"] == 1){
                                ?>
                            <!-- // echo $list_pelayanan[$x]["nama_pelayanan"]; -->
                            <div class="swiper-slide">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12">
                                        <article class="article article-style-b">
                                            <div class="article-header">
                                                <div class="article-image"
                                                    data-background="<?= base_url() ?>/public/assets/image/logo_app/<?= $list_pelayanan[$x]["file_foto"]?>">
                                                </div>
                                            </div>
                                            <div class="article-details">
                                                <div class="article-title">
                                                    <h2><a href="#"><?= $list_pelayanan[$x]["nama_pelayanan"]?></a>
                                                    </h2>
                                                </div>
                                                <p><?= $list_pelayanan[$x]["deskripsi"]?></p>
                                                <div class="article-cta">
                                                    <!-- <a
                                                        href="<?= base_url() ?>/statistik/<?= $list_pelayanan[$x]["route"]?>">Lihat
                                                        Statistik <i class="fas fa-chevron-right"></i></a> -->
                                                    <!-- <a href="<?= base_url() ?>/statistik/zoom">Lihat
                                                        Statistik <i class="fas fa-chevron-right"></i></a> -->
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                            <?php
                            };
                                }
                            ?>

                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <!-- <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div> -->

                        <!-- If we need scrollbar -->
                        <!-- <div class="swiper-scrollbar"></div> -->
                    </div>


                </div>
                <!-- <div class="card-footer bg-whitesmoke">
                    Pelayanan Publik Satu Pintu ( PELUIT ) merupakan sistem informasi pelayanan publik yang berada di
                    Dinas Komunikasi dan Informatika Kabupaten Bangkalan
                </div> -->
            </div>

            <!-- KALENDER -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kalender Pelayanan Publik</h4>
                        </div>
                        <div class="card-body">
                            <input type="month" onchange="change_calendar()" class="form-control" id="tgl_now">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>


<!-- Modal -->
<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Tiket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row align-items-center">
                    <label class="col-md-12 text-md-left text-left">Nama Pelayanan</label>
                    <div class="col-lg-12 col-md-12">
                        <input type="text" id="modal_acara" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tanggal Pengajuan</label>
                    <input type="datetime-local" class="form-control" id="modal_tgl_akhir" disabled>
                </div>
                <div class="form-group">
                    <label>Instansi Pemohon</label>
                    <input type="text" id="modal_aula" class="form-control" disabled>
                </div>
                <!-- <div class="form-group">
                    <label>Status Tiket</label>
                    <input type="text" id="modal_status" class="form-control" disabled>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        calculateHeight: true,
        direction: 'horizontal',
        loop: true,
        autoplay: {
            delay: 5000,
        },
        cardsEffect: {
            effect: "cards",
        },
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        // speed: 400,
        // spaceBetween: 100,


        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 50,
                centeredSlides: true,
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 1,
                spaceBetween: 50,
                centeredSlides: true,
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 3,
                spaceBetween: 50,
                centeredSlides: true,
            }
        }

        // And if we need scrollbar
        // scrollbar: {
        //     el: '.swiper-scrollbar',
        // },
    });

    change_tiket_count();
    jenis_tiket_count();
});

function change_tiket_count() {
    $.ajax({
        url: "<?= base_url() ?>/statistik/tiket-pelayanan",
        type: "GET",
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            document.getElementById("orders-proses").innerHTML = data["count_proses"];
            document.getElementById("orders-selesai").innerHTML = data["count_selesai"];
            document.getElementById("orders-tolak").innerHTML = data["count_tolak"];
            document.getElementById("orders-semua").innerHTML = data["count_semua"];
            document.getElementById("orders-tittle").innerHTML = "Jumlah Tiket Pelayanan Tahun " + data[
                "tahun"];

            // console.log(data);
        },
    });
}

function jenis_tiket_count() {
    $.ajax({
        url: "<?= base_url() ?>/statistik/tiket-data-master",
        type: "GET",
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            document.getElementById("orders-jenis-siswa").innerHTML = data["count_siswa"];
            document.getElementById("orders-jenis-mahasiswa").innerHTML = data["count_mahasiswa"];
            document.getElementById("orders-jenis-semua").innerHTML = data["count_semua"];

            // console.log(data);
        },
    });
}

// KALENDER
document.addEventListener('DOMContentLoaded', function() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("tgl_now").value = yyyy + "-" + mm;
    change_calendar();
});

function change_calendar() {
    var formData = new FormData();
    formData.append('tgl', $("#tgl_now").val());

    $.ajax({
        url: "<?= base_url() ?>/statistik/tiket-data-calendar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            // console.log(data);
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: false,
                initialDate: document.getElementById("tgl_now").value,
                events: data,
                eventClick: function(info) {

                    // alert('Event: ' + info.event.title);
                    const now_start = new Date(info.event.start);
                    var dateStringWithTimeStart = moment(now_start).format(
                        'YYYY-MM-DD HH:mm:ss');

                    const now_end = new Date(info.event.end);
                    var dateStringWithTimeEnd = moment(now_end).format(
                        'YYYY-MM-DD HH:mm:ss');

                    document.getElementById("modal_aula").value = info.event.title;
                    // document.getElementById("modal_tgl_mulai").value = dateStringWithTimeStart;
                    document.getElementById("modal_tgl_akhir").value = dateStringWithTimeEnd;
                    $('#calendarModal').modal('show');
                },
                eventDidMount: function(info) {
                    document.getElementById("modal_acara").value = info.event.extendedProps[
                        "description"];

                    // var status = "";
                    // if (info.event.extendedProps["status"] == '0') {
                    //     status = "Proses";
                    // } else if (info.event.extendedProps["status"] == '1') {
                    //     status = "Selesai";
                    // } else if (info.event.extendedProps["status"] == '2') {
                    //     status = "Ditolak";
                    // } else if (info.event.extendedProps["status"] == '3') {
                    //     status = "Batal";
                    // }

                    // document.getElementById("modal_status").value = status;
                    // document.getElementById("modal_aula").value = "Aula " + info.event
                    //     .extendedProps[
                    //         "nama_aula"];

                    // console.log(info.event.extendedProps);
                },
            });
            calendar.render();
        },
    });
}
</script>
<?= $this->endSection() ?>