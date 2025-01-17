<?= $this->extend('layout/home_page') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Zoom Meeting</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>">Daftar Pelayanan Publik</a></div>
                <div class="breadcrumb-item">Zoom Meeting</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">Statistik Tiket</div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">24</div>
                                    <div class="card-stats-item-label">Dibatalkan</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">12</div>
                                    <div class="card-stats-item-label">Selesai</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">23</div>
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
                            <div class="card-body">
                                59
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">Statistik Pengguna</div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">24</div>
                                    <div class="card-stats-item-label">SEKDA</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">23</div>
                                    <div class="card-stats-item-label">BKPSDA</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">12</div>
                                    <div class="card-stats-item-label">PRKP</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total OPD</h4>
                            </div>
                            <div class="card-body">
                                59
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-lg-8 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Kalender Pelayanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-md-12">
                                <label for="inputState">Tanggal</label>
                                <input type="month" onchange="change_calendar()" class="form-control" id="tgl_now">
                            </div>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Statistik Pelayanan Per Tahun</h4>
                        </div>
                        <div class="card-body">

                            <div id="chart_stack"></div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Statistik Pelayanan Harian</h4>
                </div>
                <div class="card-body">


                    <div id="chart"></div>



                </div>
            </div>


        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");
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
    get_stack_bar();

});

function change_calendar() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: false,
        initialDate: document.getElementById("tgl_now").value,
    });
    calendar.render();

    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    const d = new Date(document.getElementById("tgl_now").value);
    document.getElementById("chart").innerHTML = "";
    chart(monthNames[d.getMonth()]);
}

function chart(bulan) {
    var options = {
        chart: {
            type: 'line'
        },
        stroke: {
            curve: 'smooth',
        },
        title: {
            text: "Grafik Pelayanan Zoom Meeting Bulan " + bulan,
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
            name: 'sales',
            data: [30, 40, 45, 50, 49, 60, 70, 91, 125]
        }],
        xaxis: {
            categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
}

function get_stack_bar() {
    var options = {
        series: [{
            name: 'Selesai',
            data: [44, 55, 41],
            color: "#0dff00",
        }, {
            name: 'Dibatalkan',
            data: [13, 23, 20],
            color: "#bfbdbd",
        }, {
            name: 'Ditolak',
            data: [11, 17, 15],
            color: "#ff0000",
        }],
        title: {
            text: "Grafik Pelayanan Zoom Meeting 3 Tahun Terakhir",
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
            type: 'year',
            categories: ['2021', '2022', '2023'],
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
</script>
<?= $this->endSection() ?>