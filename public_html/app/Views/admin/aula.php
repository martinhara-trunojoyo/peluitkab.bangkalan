<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<style>
.centerVLign {
    vertical-align: middle !important;
}
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Ruang Aula</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>/admin/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/admin/aula">Data Master</a>
                </div>
                <div class="breadcrumb-item">Aula</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col-lg-8 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Daftar Aula</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table id="example" class="table table-striped table-bordered nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama Aula</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Form Tambah Aula</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Aula</label>
                                <input id="nama" type="text" class="form-control">
                            </div>
                            <div id="div_tambah">
                                <div class="d-flex justify-content-end mb-4">
                                    <button id="btn_tambah" onclick="tambah_user()"
                                        class="btn btn-primary">Tambah</button>
                                    <button id="btn_tambah_loader" style="display: none;"
                                        class="btn disabled btn-primary btn-progress">Tambah</button>
                                </div>
                            </div>

                            <div style="display: none;" id="div_ubah">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");
    get_data();
});

function reset() {
    document.getElementById('nama').value = "";

    remove_invalid();
}

function remove_invalid() {
    //INVALID
    document.getElementById('nama').classList.remove("is-invalid");
}

function tambah_user() {
    remove_invalid();
    if (document.getElementById('nama').value == "" || isEmptyOrSpaces(document.getElementById('nama').value)) {
        document.getElementById('nama').classList.add("is-invalid");
        document.getElementById("nama").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nama Aula Kosong !'
        });
    } else {
        document.getElementById("btn_tambah").style.display = "none";
        document.getElementById("btn_tambah_loader").style.display = "block";

        var formData = new FormData();
        formData.append('nama_aula', document.getElementById("nama").value);

        $.ajax({
            url: "<?= base_url() ?>/admin/aula/set_aula",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            enctype: 'multipart/form-data',
            dataType: "JSON",
            success: function(data) {
                if (data.status == 200) {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Berhasil !',
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    get_data();
                    reset();
                } else {
                    Swal.fire(
                        "Gagal",
                        data.message,
                        'error'
                    );
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire(
                    'Gagal',
                    errorThrown,
                    'error'
                );
            }
        });

        // Loader
        document.getElementById("btn_tambah").style.display = "block";
        document.getElementById("btn_tambah_loader").style.display = "none";
    }
}

function get_data() {
    var table = $('#example').DataTable({
        destroy: true,
        responsive: true,
        pageLength: 10,
        "lengthChange": false,
        "ordering": false,
        pagingType: 'simple',
        "language": {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
        },
        "ajax": {
            "type": "GET",
            "url": "<?= base_url() ?>/admin/aula/get_aula",
            "dataSrc": "",
            "data": function(data) {
                // data.opd_admin = $opd_admin;
            },
        },
        'columnDefs': [{
            "targets": [1], // your case first column
            "className": "text-center",
            "width": "4%"
        }],
        "columns": [{
            "data": "nama_aula",
            "render": function(data, type, row) {
                var button = data;
                button += '<div>';

                button += '<a class="text-muted"><small>Status</small></a>';

                if (row.active == 1) {
                    button += '<div class="bullet text-success"></div>';
                    button += '<a class="text-success"><small>Enabled</small></a>';
                } else {
                    button += '<div class="bullet text-danger"></div>';
                    button += '<a class="text-danger"><small>Disabled</small></a>';
                }
                button += '</div>';

                return button;
            }
        }, {
            "data": "id_aula",
            "render": function(data, type, row) {
                var button = "";
                if (row.active == 1) {
                    button +=
                        '<button onclick="update_active(0,' + data +
                        ')" class="btn btn-icon btn-danger mr-2"><i class="fas fa-power-off"></i></button>';
                } else {
                    button +=
                        '<button onclick="update_active(1,' + data +
                        ')" class="btn btn-icon btn-success mr-2"><i class="fas fa-power-off"></i></button>';
                }

                button +=
                    '<button onclick="del(' + data +
                    ')" class="btn btn-icon btn-dark mr-2"><i class="fas fa-trash-alt"></i></button>';
                return button;
            }
        }, ]
    });
    new $.fn.dataTable.FixedHeader(table);
}

function update_active($status, $id) {
    Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Aktifasi Aula akan diubah.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Ubah"
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData();
            formData.append('id_aula', $id);
            formData.append('active', $status);

            $.ajax({
                url: "<?= base_url() ?>/admin/aula/update_status",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                enctype: 'multipart/form-data',
                dataType: "JSON",
                success: function(data) {
                    if (data.status == 200) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Berhasil !',
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        get_data();
                    } else {
                        Swal.fire(
                            "Gagal",
                            data.message,
                            'error'
                        );
                    }
                    // console.log(data.status);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire(
                        'Gagal',
                        errorThrown,
                        'error'
                    );
                }
            });
        }
    })
}

function del($id) {
    Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Data Aula akan dihapus dan tidak dapat dipulihkan kembali.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Hapus"
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData();
            formData.append('id_aula', $id);

            $.ajax({
                url: "<?= base_url() ?>/admin/aula/del_aula",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                enctype: 'multipart/form-data',
                dataType: "JSON",
                success: function(data) {
                    if (data.status == 200) {
                        Swal.fire(
                            'Berhasil',
                            data.message,
                            'success'
                        );
                        get_data();
                    } else {
                        Swal.fire(
                            "Gagal",
                            data.message,
                            'error'
                        );
                    }
                    // console.log(data.status);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire(
                        'Gagal',
                        errorThrown,
                        'error'
                    );
                }
            });
        }
    })
}

function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
}
</script>
<?= $this->endSection() ?>