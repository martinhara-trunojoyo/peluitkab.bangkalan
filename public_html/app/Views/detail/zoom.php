<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Tiket</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a
                        href="<?= base_url() ?>/<?= session()->get('role') ?>/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/<?= session()->get('role') ?>/tiket">Tiket</a>
                </div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/<?= session()->get('role') ?>/tiket">Detail</a>
                </div>
                <div class="breadcrumb-item">Zoom Meeting</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col-lg-6 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Detail Zoom Meeting</h4>
                            <div class="card-header-action">
                                <!-- <button class="btn btn-dark"
                                    data-confirm="Apakah anda yakin ingin membatalkan tiket ini ?"
                                    data-confirm-text-yes="Batalkan"> Batalkan Tiket
                                </button> -->
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4"
                                                role="tab" aria-controls="home" aria-selected="true">Tiket</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4"
                                                role="tab" aria-controls="profile" aria-selected="false">Detail Zoom</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pic-tab4" data-toggle="tab" href="#pic4" role="tab"
                                                aria-controls="pic" aria-selected="false">Detail PIC</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="file-tab4" data-toggle="tab" href="#file4"
                                                role="tab" aria-controls="file" aria-selected="false">Berkas Upload</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4"
                                                role="tab" aria-controls="contact" aria-selected="false">Catatan</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-8">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                        <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                            aria-labelledby="home-tab4">
                                            <div class="form-group">
                                                <label>Kode Tiket</label>
                                                <input disabled="true" type="text" value="<?= $kode_tiket ?>"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Pengajuan</label>
                                                <input disabled="true" type="datetime-local" value="<?= $tgl_input ?>"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input id="status" disabled="true" type="text" class="form-control">
                                            </div>
                                            <div class="card-footer text-right" id="confirm_btn">
                                                <!-- <button class="btn btn-success mr-1">Selesai</button>
                                                <button class="btn btn-danger mr-1">Tolak</button> -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile4" role="tabpanel"
                                            aria-labelledby="profile-tab4">
                                            <div class="form-group">
                                                <label>Nama Acara</label>
                                                <input type="text" class="form-control" disabled="true"
                                                    value="<?= $nama_acara ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">Jenis Peserta</label>
                                                <select id="inputState" class="form-control" disabled="true"
                                                    value="<?= $jenis_zoom ?>">
                                                    <option value="0">Participant</option>
                                                    <option value="1">Host</option>
                                                </select>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Meeting Id</label>
                                                    <input id="meeting_id" type="number" class="form-control"
                                                        disabled="true" value="<?= $meeting_id ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Passcode</label>
                                                    <input id="passcode" type="text" class="form-control"
                                                        disabled="true" value="<?= $passcode ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat</label>
                                                <textarea id="catatan" rows="4" disabled="true"
                                                    class="form-control"><?= $tempat ?></textarea>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Tanggal Mulai</label>
                                                    <input type="text" class="form-control" type="datetime-local"
                                                        disabled="true" value="<?= $tgl_awal ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tanggal Selesai</label>
                                                    <input type="text" class="form-control" type="datetime-local"
                                                        disabled="true" value="<?= $tgl_akhir ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">Operator</label>
                                                <select id="inputState" class="form-control" disabled="true"
                                                    value="<?= $operator ?>">
                                                    <option value="1">Menggunakan Operator</option>
                                                    <option value="0">Tanpa Operator</option>
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-end" id="div_meeting_id">


                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="pic4" role="tabpanel"
                                            aria-labelledby="pic-tab4">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Nama PIC</label>
                                                    <input type="text" class="form-control" disabled="true"
                                                        value="<?= $nama_pic ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>No Whatsapp PIC</label>
                                                    <input type="text" class="form-control" disabled="true"
                                                        value="<?= $no_pic ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="file4" role="tabpanel"
                                            aria-labelledby="file-tab4">
                                            <button type="button"
                                                onclick="window.open('<?= base_url() ?>/public/assets/berkas/surat-pengantar/<?= $berkas_pengantar ?>','_blank')"
                                                class="btn btn-primary btn-icon icon-left">
                                                <i class="fas fa-file-download"></i> Unduh Surat Pengantar
                                            </button>
                                        </div>
                                        <div class="tab-pane fade" id="contact4" role="tabpanel"
                                            aria-labelledby="contact-tab4">
                                            <div class="form-group">
                                                <label>Catatan</label>
                                                <textarea id="catatan" rows="4" disabled="true"
                                                    class="form-control"><?= $catatan ?></textarea>
                                            </div>
                                            <!-- <div class="card-footer text-right">
                                                <button class="btn btn-primary">Simpan</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Log Aktifitas</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="activities" id="list_history">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Berikan Alasan Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row align-items-center">
                    <label class="col-md-12 text-md-left text-left">Catatan</label>
                    <div class="col-lg-12 col-md-12">
                        <textarea id="catatan_update" rows="4" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end" id="div_catatan">


                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");
    get_history();
    access_status("<?= $status ?>");
});

function access_button() {
    var button = "";
    var simpan = "";

    if (<?= session()->get('id_role') ?> == 0 || <?= session()->get('id_role') ?> == 2) {
        button +=
            '<a href="javascript: void(0)" onclick="update_status(2)" class="btn btn-danger btn-action mr-1"><i class="fa fa-times"></i> Tolak</a>';
        button +=
            '<a href="javascript: void(0)" onclick="update_status(1)" class="btn btn-success btn-action mr-1"><i class="fa fa-check"></i> Selesai</a>';

        simpan += '<button onclick="update_meeting()" id="btn_meeting" class="btn btn-primary">Simpan</button>';
        simpan +=
            '<button id="loader_meeting" style="display: none;" class="btn disabled rounded-pill btn-primary btn-progress">Simpan</button>';
    }

    if (<?= session()->get('id_role') ?> == 0 || (<?= session()->get('id_role') ?> == 1 &&
            <?= session()->get('id_user') ?> == <?=  $id_user ?>)) {
        button +=
            '<a href="javascript: void(0)" onclick="update_status(3)" class="btn btn-dark btn-action mr-1"><i class="fa fa-times"></i> Batalkan</a>';
    }

    document.getElementById("confirm_btn").innerHTML = button;
    document.getElementById("div_meeting_id").innerHTML = simpan;
}

function update_status($status) {
    if ($status == 1) {
        if (document.getElementById("meeting_id").value == "" || document.getElementById("passcode").value == "") {
            Swal.fire({
                icon: 'error',
                title: 'Gagal...',
                text: 'Meeting Id atau Passcode Kosong !'
            });
        } else if (document.getElementById("meeting_id").value.toString().length < 10 || document.getElementById(
                "meeting_id").value.toString().length > 11) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal...',
                text: 'Panjang Meeting Id Salah !'
            });
        } else if (isEmptyOrSpaces(document.getElementById('passcode').value)) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal...',
                text: 'Passcode Kosong !'
            });
        } else if (/[^a-zA-Z0-9\ .,-_]/.test(document.getElementById("passcode").value)) {
            Swal.fire(
                'Gagal',
                "Passcode tidak sesuai format.",
                'error'
            );
        } else {
            Swal.fire({
                title: 'Apakah anda yakin ?',
                text: "Tiket yang sudah diselesaikan tidak dapat diubah !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Selesai'
            }).then((result) => {
                if (result.isConfirmed) {
                    update_catatan($status);
                }
            })
        }

    } else {
        var button = '';
        button += '<button onclick="update_catatan(' + $status +
            ')" id="btn_catatan" class="btn btn-primary">Simpan</button>';
        button +=
            '<button id="loader_catatan" style="display: none;" class="btn disabled rounded-pill btn-primary btn-progress">Simpan</button>';
        document.getElementById("div_catatan").innerHTML = button;

        $('#updateModal').modal('show');
    }
}

function update_meeting() {
    if (document.getElementById("meeting_id").value == "" || document.getElementById("passcode").value == "") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Meeting Id atau Passcode Kosong !'
        });
    } else if (document.getElementById("meeting_id").value.toString().length < 10 || document.getElementById(
            "meeting_id").value.toString().length > 11) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Panjang Meeting Id Salah !'
        });
    } else if (isEmptyOrSpaces(document.getElementById('passcode').value)) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Passcode Kosong !'
        });
    } else if (/[^a-zA-Z0-9\ .,-_]/.test(document.getElementById("passcode").value)) {
        Swal.fire(
            'Gagal',
            "Passcode tidak sesuai format.",
            'error'
        );
    } else {
        var formData = new FormData();
        formData.append('id_tiket', <?= $id_tiket ?>);
        formData.append('meeting_id', document.getElementById("meeting_id").value.toString());
        formData.append('passcode', document.getElementById("passcode").value.toString());

        $.ajax({
            url: "<?= base_url() ?>/detail/update_meeting",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            async: true,
            enctype: 'multipart/form-data',
            dataType: "JSON",
            beforeSend: function() {
                // Loader
                document.getElementById("btn_meeting").style.display = "none";
                document.getElementById("btn_meeting").disabled = true;
                document.getElementById("loader_meeting").style.display = "block";

            },
            success: function(data) {
                // console.log(data);
                if (data.status == 200) {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Berhasil !',
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    get_history();
                } else {
                    Swal.fire(
                        "Gagal",
                        data.message,
                        'error'
                    );
                }
            },
            complete: function() {
                // Loader
                document.getElementById("btn_meeting").style.display = "block";
                document.getElementById("btn_meeting").disabled = false;
                document.getElementById("loader_meeting").style.display = "none";
            },
        });
    }
}

function access_status($status) {
    document.getElementById("meeting_id").disabled = true;
    document.getElementById("passcode").disabled = true;
    document.getElementById("div_meeting_id").innerHTML = "";
    if ($status == 0) {
        document.getElementById("status").value = "Proses";
        document.getElementById("status").classList.add("border");
        document.getElementById("status").classList.add("border-primary");
        document.getElementById("status").classList.add("text-primary");
        document.getElementById("status").classList.add("bg-white");

        access_button();

        document.getElementById("meeting_id").disabled = false;
        document.getElementById("passcode").disabled = false;
    } else if ($status == 1) {
        document.getElementById("status").value = "Selesai";
        document.getElementById("status").classList.add("border");
        document.getElementById("status").classList.add("border-success");
        document.getElementById("status").classList.add("text-success");
        document.getElementById("status").classList.add("bg-white");
    } else if ($status == 2) {
        document.getElementById("status").value = "Ditolak";
        document.getElementById("status").classList.add("border");
        document.getElementById("status").classList.add("border-danger");
        document.getElementById("status").classList.add("text-danger");
        document.getElementById("status").classList.add("bg-white");
    } else {
        document.getElementById("status").value = "Dibatalkan";
        document.getElementById("status").classList.add("border");
        document.getElementById("status").classList.add("border-dark");
        document.getElementById("status").classList.add("text-dark");
        document.getElementById("status").classList.add("bg-white");
    }

}

function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
}

function get_history() {
    var formData = new FormData();
    formData.append('id_tiket', <?= $id_tiket ?>);

    $.ajax({
        url: "<?= base_url() ?>/detail/get_history",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            // console.log(data);
            var baris = "";
            for ($x = 0; $x < data.length; $x++) {
                // console.log(data[$x].nama_opd);
                // baris += '<option value="' + data[$x].id_opd + '">' + data[$x].nama_opd + '</option>';
                baris += '<div class="activity">';

                baris +=
                    '<div class="activity-icon bg-' + data[$x].color + ' text-white shadow-' + data[$x]
                    .color + '"><i class="' + data[$x].icon + '"></i></div>';
                baris += '<div class="activity-detail">';
                baris += '<div class="mb-2">';

                const now_start = new Date(data[$x].tgl);
                var dateStringWithTimeStart = moment(now_start).format(
                    'DD-MM-YYYY HH:mm:ss A');



                baris += '<span class="text-job text-primary">' + dateStringWithTimeStart + '</span>';
                baris += '<span class="bullet text-secondary"></span>';
                baris += '<a class="text-job" href="javascript: void(0)"> ' + moment(now_start).fromNow() +
                    '</a>';
                baris += '</div>';
                baris += '<p>' + '<a class="text-job" href="javascript: void(0)">' + data[$x].nama +
                    '</a>' + '<span class="bullet text-primary"></span> ' + data[$x].aktifitas + '</p>';
                baris += '</div>';
                baris += '</div>';
            }
            document.getElementById("list_history").innerHTML = baris;
        },
    });
}

function update_catatan($status) {
    // alert($status);
    if ($status == 1) {
        var formData = new FormData();
        formData.append('id_tiket', <?= $id_tiket ?>);
        formData.append('status', $status);

        $.ajax({
            url: "<?= base_url() ?>/detail/update_catatan",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            async: true,
            enctype: 'multipart/form-data',
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                if (data.status == 200) {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Berhasil !',
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    get_history();
                    document.getElementById("confirm_btn").innerHTML = "";
                    access_status($status);
                    document.getElementById("catatan").value = document.getElementById('catatan_update')
                        .value;
                } else {
                    Swal.fire(
                        "Gagal",
                        data.message,
                        'error'
                    );
                }
            },
        });
    } else {
        if (isEmptyOrSpaces(document.getElementById('catatan_update').value)) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal...',
                text: 'Form Catatan Kosong !'
            });
        } else if (/[^a-zA-Z0-9\ .,-_]/.test(document.getElementById("catatan_update").value)) {
            Swal.fire(
                'Gagal',
                "Isian Catatan tidak sesuai format.",
                'error'
            );
        } else {
            var formData = new FormData();
            formData.append('id_tiket', <?= $id_tiket ?>);
            formData.append('catatan', document.getElementById('catatan_update').value);
            formData.append('status', $status);

            $.ajax({
                url: "<?= base_url() ?>/detail/update_catatan",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                async: true,
                enctype: 'multipart/form-data',
                dataType: "JSON",
                beforeSend: function() {
                    // Loader
                    document.getElementById("btn_catatan").style.display = "none";
                    document.getElementById("btn_catatan").disabled = true;
                    document.getElementById("loader_catatan").style.display = "block";

                },
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Berhasil !',
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        get_history();
                        document.getElementById("confirm_btn").innerHTML = "";
                        access_status($status);
                        $('#updateModal').modal('hide');
                    } else {
                        Swal.fire(
                            "Gagal",
                            data.message,
                            'error'
                        );
                    }
                },
                complete: function() {
                    // Loader
                    document.getElementById("btn_catatan").style.display = "block";
                    document.getElementById("btn_catatan").disabled = false;
                    document.getElementById("loader_catatan").style.display = "none";
                },
            });
        }
    }

}
</script>
<?= $this->endSection() ?>