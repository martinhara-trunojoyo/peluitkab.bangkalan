<?= $this->extend('layout/home_page') ?>
<?= $this->section('content') ?>
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

#pie_hart {
    max-width: 500px;
    margin: 35px auto;
}

/* round */
.rounded-circle {
    border-radius: 50% !important;
    aspect-ratio: 1 / 1;
    object-fit: cover;
}
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Magang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>">Daftar Pelayanan Publik</a></div>
                <div class="breadcrumb-item">Magang</div>
            </div>
        </div>

        <div class="section-body">


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
                            <div class="card-stats-title" id="orders-jenis-tittle">Jumlah Peserta Magang</div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count" id="orders-jenis-siswa">0</div>
                                    <div class="card-stats-item-label">Siswa</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count"></div>
                                    <div class="card-stats-item-label"></div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count" id="orders-jenis-mahasiswa">0</div>
                                    <div class="card-stats-item-label">Mahasiswa</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Peserta Magang</h4>
                            </div>
                            <div class="card-body" id="orders-jenis-semua">
                                0
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Statistik Pembuatan Akun Peserta</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-md-12">
                                <label for="inputState">Pilih Bulan</label>
                                <input type="month" onchange="change_calendar()" class="form-control" id="tgl_now">
                            </div>

                            <div id="pie_hart"></div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Peserta Magang</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="search">Pencarian</label>
                                <div class="input-group mb-3">
                                    <input type="number" id="nim" class="form-control" placeholder="Masukkan NIM / NISN"
                                        aria-label="">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" onclick="cek_nim()" type="button">Cari</button>
                                    </div>
                                </div>
                            </div>

                            <div id="div_empty" style="display: none;">
                                <center>
                                    <p class="lead">
                                        Data tidak ditemukan.
                                    </p>
                                </center>
                            </div>

                            <div id="div_not_empty" style="display: none;">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="card author-box card-primary">
                                            <div class="card-body">
                                                <div class="author-box-left">
                                                    <img alt="image" id="foto"
                                                        style="object-fit: cover!important;object-position: center;"
                                                        src="<?= base_url() ?>/public/stisla/dist/assets/img/avatar/avatar-1.png"
                                                        class="rounded-circle author-box-picture">
                                                    <div class="clearfix"></div>
                                                    <a id="status" href="javascript:void(0)"
                                                        class="btn btn-success mt-3">Akun Aktif</a>
                                                </div>
                                                <div class="author-box-details">
                                                    <div class="author-box-name">
                                                        <a id="nama" href="javascript:void(0)"></a>
                                                    </div>
                                                    <div id="civitas" class="author-box-job"></div>
                                                    <div class="author-box-description">
                                                        <table>
                                                            <tr>
                                                                <td><small>Tanggal Pengajuan</small></td>
                                                                <td>:</td>
                                                                <td><small id="tgl"></small></td>
                                                            </tr>
                                                            <tr>
                                                                <td><small>Aktifitas Magang</small></td>
                                                                <td>:</td>
                                                                <td><small id="nama_project"></small>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><small>Pembina Magang</small></td>
                                                                <td>:</td>
                                                                <td><small id="nama_pembimbing"></small></td>
                                                            </tr>
                                                            <tr>
                                                                <td><small>Instansi Magang</small></td>
                                                                <td>:</td>
                                                                <td><small id="opd"></small></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <!-- <div class="mb-2 mt-3">
                                                        <div id="nim_detail" class="text-small font-weight-bold">
                                                            NIM/NISN
                                                            150236987516385411
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Statistik Pelayanan</h4>
                </div>
                <div class="card-body">

                    <div id="chart"></div>

                </div>
            </div>


        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");
    change_tiket_count();
    jenis_tiket_count();
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("tgl_now").value = yyyy + "-" + mm;
    change_calendar();
});

function change_tiket_count() {
    $.ajax({
        url: "<?= base_url() ?>/statistik/tiket-magang",
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
            document.getElementById("orders-tittle").innerHTML = "Jumlah Tiket Tahun " + data["tahun"];

            // console.log(data);
        },
    });
}

function jenis_tiket_count() {
    $.ajax({
        url: "<?= base_url() ?>/statistik/jenis-magang",
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
            document.getElementById("orders-jenis-tittle").innerHTML = "Jumlah Peserta Magang Tahun " +
                data["tahun"];

            // console.log(data);
        },
    });
}

function cek_nim() {
    document.getElementById("div_empty").style.display = "none";
    document.getElementById("div_not_empty").style.display = "none";

    if (document.getElementById("nim").value == "") {
        document.getElementById("div_empty").style.display = "none";
        document.getElementById("div_not_empty").style.display = "none";
    } else if (!/^[0-9]+$/.test(document.getElementById("nim").value)) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Format NIM / NISN Salah !'
        });
    } else {
        // document.getElementById("div_not_empty").style.display = "block";
        var formData = new FormData();
        formData.append('id', document.getElementById("nim").value);

        $.ajax({
            url: "<?= base_url() ?>/statistik/get-id-magang",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            enctype: 'multipart/form-data',
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                if (data["status"] == 404) {
                    document.getElementById("div_empty").style.display = "block";
                } else {
                    // console.log(data["data"]);
                    document.getElementById("div_not_empty").style.display = "block";
                    $('#foto').attr('src', "<?= base_url() ?>/public/assets/image/avatar/" + data["data"][
                        "foto"
                    ]);
                    document.getElementById("nama").innerHTML = data["data"]["nama"];
                    document.getElementById("civitas").innerHTML = data["data"]["civitas"];
                    document.getElementById("opd").innerHTML = data["data"]["opd"];
                    document.getElementById("tgl").innerHTML = data["data"]["tgl"];
                    document.getElementById("nama_pembimbing").innerHTML = data["data"]["nama_pembimbing"];
                    document.getElementById("nama_project").innerHTML = data["data"]["nama_project"];
                    if (data["data"]["active"] == 0) {
                        document.getElementById("status").classList.remove("btn-success");
                        document.getElementById("status").classList.add("btn-danger");
                        document.getElementById("status").innerHTML = "Akun Non-Aktif";
                    }
                }
            },
        });
    }
}

function change_calendar() {
    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    const d = new Date(document.getElementById("tgl_now").value);
    document.getElementById("chart").innerHTML = "";

    var formData = new FormData();
    formData.append('tgl', document.getElementById("tgl_now").value);

    $.ajax({
        url: "<?= base_url() ?>/statistik/jenis-magang-bulan",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            // console.log(data);
            if (data["count_mahasiswa"] == 0 && data["count_siswa"] == 0) {
                document.getElementById("pie_hart").innerHTML = "<center>Data Bulan " + monthNames[d
                    .getMonth()] + " " + d.getFullYear() + " Tidak Ditemukan.</center>";
            } else {
                document.getElementById("pie_hart").innerHTML = "";
                get_pie_chart(data["count_mahasiswa"], data["count_siswa"]);
            }

            tiket_count_harian(monthNames[d.getMonth()]);

        },
    });
}

function tiket_count_harian(bulan) {
    var formData = new FormData();
    formData.append('tgl', document.getElementById("tgl_now").value);

    $.ajax({
        url: "<?= base_url() ?>/statistik/jenis-magang-hari",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            // console.log(data);
            var today = new Date(document.getElementById("tgl_now").value);

            var tgl = [];
            var bulan_ini = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2);
            bulan_ini = bulan_ini.toString().split("-");
            var tahun = bulan_ini[0];
            var bulan = bulan_ini[1];
            var date = new Date(tahun, bulan, 0).getDate();
            // console.log(date);
            // console.log(bulan_ini);

            var jumlah = [];
            for (var i = 1; i < date + 1; i++) {
                if (i < 10) {
                    var tanggal = "0" + i.toString();
                } else {
                    var tanggal = i.toString();
                }
                tgl.push(tanggal + "-" + bulan.toString() + "-" + tahun.toString());
                // console.log(tanggal);

                var data_baru = data.filter(datas => (datas.tgl_input === tahun.toString() +
                    "-" + bulan
                    .toString() + "-" + tanggal));

                var temp = 0;
                for (var j = 0; j < data.length; j++) {
                    var tgl_hari_ini = new Date(data[j].tgl_input);
                    if (tgl_hari_ini.getDate() == i) {
                        temp += 1;
                    }
                }
                jumlah.push(temp);
            }

            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];

            // console.log(jumlah);
            // console.log(tgl);
            // chart(jumlah, tgl);
            chart(monthNames[bulan - 1], tahun.toString(), jumlah, tgl);
        },
    });
}

function chart(bulan, year, jumlah, tgl) {
    var options = {
        chart: {
            type: 'line'
        },
        stroke: {
            curve: 'smooth',
        },
        title: {
            text: "Grafik Peserta Magang Bulan " + bulan + " Tahun " + year,
            align: 'center',
            margin: 50,
            offsetX: 0,
            offsetY: 15,
            floating: false,
            style: {
                fontSize: '15px',
                fontWeight: 'bold',
                fontFamily: undefined,
                color: '#263238'
            },
        },
        series: [{
            name: 'Jumlah Tiket',
            data: jumlah
        }],
        xaxis: {
            categories: tgl
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
}

function get_pie_chart(mahasiswa, siswa) {

    var options = {
        series: [siswa, mahasiswa],
        chart: {
            width: '100%',
            type: 'pie',
            toolbar: {
                show: true
            },
            zoom: {
                enabled: true
            }
        },
        title: {
            text: "Grafik Peserta Magang",
            align: 'center',
            margin: 50,
            offsetX: 0,
            offsetY: 15,
            floating: false,
            style: {
                fontSize: '15px',
                fontWeight: 'bold',
                fontFamily: undefined,
                color: '#263238'
            },
        },
        legend: {
            position: 'bottom',
        },
        labels: ['Siswa', 'Mahasiswa'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: '80%',
                },
                title: {
                    margin: 0,
                    offsetX: 0,
                    offsetY: 0,
                    floating: false,
                    style: {
                        fontSize: '5px',
                        fontWeight: 'bold',
                        fontFamily: undefined,
                        color: '#263238'
                    },
                },
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#pie_hart"), options);
    chart.render();


}
</script>
<?= $this->endSection() ?>