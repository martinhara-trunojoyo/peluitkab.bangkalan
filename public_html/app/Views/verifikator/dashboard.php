<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 d-flex w-100 ">
                <div class="card card-statistic-2 flex-grow-1">
                    <div class="card-stats">
                        <div class="card-stats-title">Instansi User</div>
                        <div class="card-stats-items d-flex justify-content-center">
                            <div class="card-stats-item ">
                                <div class="card-stats-item-count" id="jumlah_pembimbing"></div>
                                <!-- <div class="card-stats-item-label">Pembimbing</div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pelayanan User</h4>
                        </div>
                        <div class="card-body" id="jumlah_total">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12  d-flex w-100 ">
                <div class="card card-statistic-2 flex-grow-1">
                    <div class="card-stats">
                        <div class="card-stats-title">Identitas User</div>
                    </div>
                    <div class="card-stats-items">
                        <center><img class="mr-3 rounded-circle" width="50"
                                src="<?= base_url() ?>/public/assets/image/avatar/<?= $url ?>" alt="avatar">
                        </center>
                    </div>
                    <center>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?= $role ?></h4>
                            </div>
                            <div class="card-body">
                                <?= $nama ?>
                            </div>
                        </div>
                    </center>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12  d-flex w-100 ">
                <div class="card card-statistic-2 flex-grow-1">
                    <div class="card-stats">
                        <div class="card-stats-title">Jumlah Tiket -
                            <div class="dropdown d-inline">
                                <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#"
                                    id="orders-month">Hari Ini</a>
                                <ul class="dropdown-menu dropdown-menu-sm">
                                    <li class="dropdown-title">Pilih Kategori</li>
                                    <li><a href="javascript:void(0)" id="orders-month-0" onclick="change_tiket(0)"
                                            class="dropdown-item active">Hari Ini</a></li>
                                    <li><a href="javascript:void(0)" id="orders-month-1" onclick="change_tiket(1)"
                                            class="dropdown-item">Bulan Ini</a></li>
                                    <li><a href="javascript:void(0)" id="orders-month-2" onclick="change_tiket(2)"
                                            class="dropdown-item">Tahun Ini</a></li>
                                </ul>
                            </div>
                        </div>
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
        </div>
        <div class="row">
            <div class="col-lg-8 d-flex w-100 ">
                <div class="card flex-grow-1 ">
                    <div class="card-header">
                        <h4>Statistik Jumlah Tiket Harian</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex w-100 ">
                <div class="card flex-grow-1 ">
                    <div class="card-header">
                        <h4>Statistik Status Tiket Per Tahun</h4>
                        <!-- <div class="card-header-action dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <li class="dropdown-title">Select Period</li>
                                <li><a href="#" class="dropdown-item">Today</a></li>
                                <li><a href="#" class="dropdown-item">Week</a></li>
                                <li><a href="#" class="dropdown-item active">Month</a></li>
                                <li><a href="#" class="dropdown-item">This Year</a></li>
                            </ul>
                        </div> -->
                    </div>
                    <div class="card-body">
                        <div id="chart_stack"></div>
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
    change_tiket_count(0);
    tiket_count_user();
    tiket_count_harian();
    tiket_count_tahunan();
});

function change_tiket(id) {
    reset_tiket();
    if (id == 0) {
        document.getElementById("orders-month").innerHTML = "Hari Ini";
        document.getElementById("orders-month-0").classList.add("active");
    } else if (id == 1) {
        document.getElementById("orders-month").innerHTML = "Bulan Ini";
        document.getElementById("orders-month-1").classList.add("active");
    } else {
        document.getElementById("orders-month").innerHTML = "Tahun Ini";
        document.getElementById("orders-month-2").classList.add("active");
    }
    change_tiket_count(id);
}


function reset_tiket() {
    document.getElementById("orders-month-0").classList.remove("active");
    document.getElementById("orders-month-1").classList.remove("active");
    document.getElementById("orders-month-2").classList.remove("active");
}

function chart(jumlah, tgl) {
    var options = {
        chart: {
            type: 'line'
        },
        stroke: {
            curve: 'smooth',
        },
        title: {
            text: "Grafik Jumlah Pelayanan Harian ",
            align: 'center',
            margin: 50,
            offsetX: 0,
            offsetY: 0,
            floating: false,
            style: {
                fontSize: '20px',
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

function get_stack_bar(tahun, proses, selesai, tolak, batal) {
    var options = {
        series: [{
            name: 'Proses',
            data: proses,
            color: "#3C75F0",
        }, {
            name: 'Selesai',
            data: selesai,
            color: "#0F6B35",
        }, {
            name: 'Dibatalkan',
            data: batal,
            color: "#000000",
        }, {
            name: 'Ditolak',
            data: tolak,
            color: "#ff0000",
        }],
        title: {
            text: "Grafik Pelayanan Publik berdasarkan Status Tiket",
            align: 'center',
            margin: 50,
            offsetX: 0,
            offsetY: 20,
            floating: false,
            style: {
                fontSize: '12px',
                fontWeight: 'bold',
                fontFamily: undefined,
                color: '#263238'
            },
        },
        chart: {
            type: 'bar',
            height: 500,
            stacked: true,
            toolbar: {
                show: true
            },
            zoom: {
                enabled: true
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    position: 'bottom',
                    offsetX: -10,
                    offsetY: 0
                }
            }
        }],
        plotOptions: {
            bar: {
                horizontal: false,
                borderRadius: 0,
                dataLabels: {
                    total: {
                        enabled: true,
                        style: {
                            fontSize: '13px',
                            fontWeight: 900
                        }
                    }
                }
            },
        },
        xaxis: {
            type: 'tahun',
            categories: tahun,
        },
        legend: {
            position: 'bottom',
        },
        fill: {
            opacity: 1
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart_stack"), options);
    chart.render();
}


function change_tiket_count(id) {
    var formData = new FormData();
    formData.append('id', id);

    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/dashboard/get_orders",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            // console.log(data);

            document.getElementById("orders-proses").innerHTML = data["count_proses"];
            document.getElementById("orders-selesai").innerHTML = data["count_selesai"];
            document.getElementById("orders-tolak").innerHTML = data["count_tolak"];
            document.getElementById("orders-semua").innerHTML = data["count_semua"];

            // console.log(data["count_proses"]);
        },
    });
}

function tiket_count_harian() {
    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/dashboard/get_orders_harian",
        type: "GET",
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            // console.log(data);
            var today = new Date();

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

            // console.log(jumlah);
            // console.log(tgl);
            chart(jumlah, tgl);
        },
    });
}

function tiket_count_user() {
    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/dashboard/get_user",
        type: "GET",
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            // console.log(data);
            document.getElementById("jumlah_pembimbing").innerHTML = data["instansi"];
            document.getElementById("jumlah_total").innerHTML = data["count_pelayanan"];

        },
    });
}

function tiket_count_tahunan() {
    var today = new Date();
    var formData = new FormData();
    formData.append('tahun', today.getFullYear());

    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/dashboard/get_orders_tahunan",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            // console.log(data);
            get_stack_bar(data['tahun'], data['proses'], data['selesai'], data['tolak'], data['batal'])
        },
    });
}
</script>
<?= $this->endSection() ?>