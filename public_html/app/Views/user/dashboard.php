<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 d-flex w-100 ">
                <div class="card card-statistic-2 flex-grow-1">
                    <div class="card-stats">
                        <div class="card-stats-title">Identitas User</div>
                        <div class="card-stats-items d-flex justify-content-center">
                            <!-- <div class="card-stats-item ">
                                <div class="card-stats-item-count" id="gender"></div>
                                <div class="card-stats-item-label">Gender</div>
                            </div> -->
                            <div class="card-stats-item ">
                                <div class="card-stats-item-count" id="jurusan"></div>
                                <!-- <div class="card-stats-item-label">Jenjang Pendidikan</div> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-graduation-cap"></i>
                    </div> -->
                    <div class="card-wrap">
                        <center>
                            <div class="card-header">
                                <h4>Civitas User</h4>
                            </div>
                            <div class="card-body">
                                <h4 id="jumlah_total">Civitas User</h4>
                            </div>
                        </center>
                    </div>
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
            document.getElementById("orders-proses").innerHTML = data["count_proses"];
            document.getElementById("orders-selesai").innerHTML = data["count_selesai"];
            document.getElementById("orders-tolak").innerHTML = data["count_tolak"];
            document.getElementById("orders-semua").innerHTML = data["count_semua"];

            // console.log(data["count_proses"]);
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
            document.getElementById("jurusan").innerHTML = data["jurusan"];
            // document.getElementById("gender").innerHTML = data["gender"];
            document.getElementById("jumlah_total").innerHTML = data["civitas"];

        },
    });
}
</script>
<?= $this->endSection() ?>