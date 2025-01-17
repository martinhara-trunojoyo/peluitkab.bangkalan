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
            <h1>Halaman Pelayanan Publik</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>/admin/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/admin/pelayanan">Data Master Pelayanan</a>
                </div>
                <div class="breadcrumb-item">Pelayanan Publik</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col-lg-8 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Daftar Pelayanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table id="example" class="table table-striped table-bordered nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelayanan</th>
                                            <th>Route</th>
                                            <th>Id Navbar</th>
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
                            <h4>Form Tambah Pelayanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Pelayanan</label>
                                <input id="nama" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea id="deskripsi" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Route</label>
                                <input id="username" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Id Navbar</label>
                                <input id="nav" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>OPD</label>
                                <select class="w-100 select2 form-control" id="myOpd">

                                </select>
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
    get_opd();
});

function reset() {
    document.getElementById('nama').value = "";
    document.getElementById('username').value = "";
    document.getElementById('nav').value = "";
    document.getElementById('deskripsi').value = "";

    remove_invalid();
}

function remove_invalid() {
    //INVALID
    document.getElementById('nama').classList.remove("is-invalid");
    document.getElementById('username').classList.remove("is-invalid");
    document.getElementById('nav').classList.remove("is-invalid");
    document.getElementById('deskripsi').classList.remove("is-invalid");
}

function toogle_btn($status) {
    if ($status == 0) {
        reset();
        document.getElementById("div_ubah").style.display = "none";
        document.getElementById("div_tambah").style.display = "block";
    } else {
        document.getElementById("div_ubah").style.display = "block";
        document.getElementById("div_tambah").style.display = "none";
    }

}

function ubah($id_pelayanan, $nama_pelayanan, $deskripsi, $route, $url, $id_opd, $status) {
    remove_invalid();

    document.getElementById('nama').value = $nama_pelayanan;
    document.getElementById('username').value = $route;
    document.getElementById('nav').value = $url;
    document.getElementById('deskripsi').value = $deskripsi;
    $("#myOpd").val($id_opd).trigger('change');
    // console.log($id_opd);
    var baris = "";
    baris += '<div class="d-flex justify-content-between mb-4">';
    baris += '<button onclick="toogle_btn(0)" class="btn btn-danger">Batal</button>';
    baris += '<button id="btn_ubah" onclick="ubah_user(' + $id_pelayanan + ')" class="btn btn-warning">Ubah</button>';
    baris +=
        '<button id="btn_ubah_loader" style="display: none;" class="btn disabled btn-warning btn-progress">Ubah</button>';
    baris += '</div>';
    document.getElementById("div_ubah").innerHTML = baris;
    toogle_btn($status);

}

function tambah_user() {
    remove_invalid();

    if (document.getElementById('nama').value == "" || isEmptyOrSpaces(document.getElementById('nama').value)) {
        document.getElementById('nama').classList.add("is-invalid");
        document.getElementById("nama").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nama Layanan Kosong !'
        });
    } else if (document.getElementById('deskripsi').value == "" || isEmptyOrSpaces(document.getElementById('deskripsi')
            .value)) {
        document.getElementById('deskripsi').classList.add("is-invalid");
        document.getElementById("deskripsi").focus();

        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Deskripsi Kosong !'
        });
    } else if (document.getElementById('username').value == "" || isEmptyOrSpaces(document.getElementById('username')
            .value)) {
        document.getElementById('username').classList.add("is-invalid");
        document.getElementById("username").focus();

        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Route Kosong !'
        });
    } else if (document.getElementById('nav').value == "" || isEmptyOrSpaces(document.getElementById('nav').value)) {
        document.getElementById('nav').classList.add("is-invalid");
        document.getElementById("nav").focus();

        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Id Navbar Kosong !'
        });
    } else {
        document.getElementById("btn_tambah").style.display = "none";
        document.getElementById("btn_tambah_loader").style.display = "block";

        var formData = new FormData();
        formData.append('nama_pelayanan', document.getElementById("nama").value);
        formData.append('route', document.getElementById("username").value);
        formData.append('url', document.getElementById("nav").value);
        formData.append('deskripsi', document.getElementById("deskripsi").value);
        formData.append('id_opd', $("#myOpd").val());

        $.ajax({
            url: "<?= base_url() ?>/admin/pelayanan/set_pelayanan",
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

function ubah_user($id) {
    remove_invalid();

    if (document.getElementById('nama').value == "" || isEmptyOrSpaces(document.getElementById('nav').value)) {
        document.getElementById('nama').classList.add("is-invalid");
        document.getElementById("nama").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nama Layanan Kosong !'
        });
    } else if (document.getElementById('deskripsi').value == "" || isEmptyOrSpaces(document.getElementById('deskripsi')
            .value)) {
        document.getElementById('deskripsi').classList.add("is-invalid");
        document.getElementById("deskripsi").focus();

        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Deskripsi Kosong !'
        });
    } else if (document.getElementById('username').value == "" || isEmptyOrSpaces(document.getElementById('username')
            .value)) {
        document.getElementById('username').classList.add("is-invalid");
        document.getElementById("username").focus();

        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Route Kosong !'
        });
    } else if (document.getElementById('nav').value == "" || isEmptyOrSpaces(document.getElementById('nav').value)) {
        document.getElementById('nav').classList.add("is-invalid");
        document.getElementById("nav").focus();

        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Id Navbar Kosong !'
        });
    } else {

        document.getElementById("btn_ubah").style.display = "none";
        document.getElementById("btn_ubah_loader").style.display = "block";

        var formData = new FormData();
        formData.append('nama_pelayanan', document.getElementById("nama").value);
        formData.append('route', document.getElementById("username").value);
        formData.append('url', document.getElementById("nav").value);
        formData.append('deskripsi', document.getElementById("deskripsi").value);
        formData.append('id_pelayanan', $id);
        formData.append('id_opd', $("#myOpd").val());

        $.ajax({
            url: "<?= base_url() ?>/admin/pelayanan/update_pelayanan",
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
        document.getElementById("btn_ubah").style.display = "block";
        document.getElementById("btn_ubah_loader").style.display = "none";
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
            "url": "<?= base_url() ?>/admin/pelayanan/get_pelayanan",
            "dataSrc": "",
            "data": function(data) {
                // data.opd_admin = $opd_admin;
            },
        },
        'columnDefs': [{
            "targets": [3], // your case first column
            "className": "text-center",
            "width": "4%"
        }],
        "columns": [{
                "data": "nama_pelayanan",
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
            },
            {
                "data": "route"
            },
            {
                "data": "url"
            },
            {
                "data": "id_pelayanan",
                "render": function(data, type, row) {
                    var button = "";
                    if (row.active == 1) {
                        button +=
                            '<button onclick="update_active(0,' + data +
                            ')" class="btn btn-icon btn-danger mr-2"><i class="fas fa-power-off"></i> Matikan Layanan</button>';
                    } else {
                        button +=
                            '<button onclick="update_active(1,' + data +
                            ')" class="btn btn-icon btn-success mr-2"><i class="fas fa-power-off"></i> Hidupkan Layanan</button>';
                    }

                    button +=
                        '<button onclick="ubah(' + data +
                        ",'" + row.nama_pelayanan + "'" + ",'" + row.deskripsi + "'" + ",'" + row
                        .route +
                        "'" + ",'" + row.url +
                        "'" +
                        ",'" + row.id_opd + "'" +
                        ')" class="btn btn-icon btn-warning mr-2"><i class="far fa-edit"></i> Edit Layanan</button>';
                    button +=
                        '<button onclick="del(' + data +
                        ')" class="btn btn-icon btn-dark mr-2"><i class="fas fa-trash-alt"></i> Hapus Layanan</button>';
                    button += '<button onclick="window.location.href=`<?= base_url() ?>/admin/pelayanan/detail/' + data +
                        '`" class="btn btn-icon btn-info mr-2"><i class="fas fa-plus"></i> Tambah Form</button>';
                    return button;
                    
                }
            },
        ]
    });
    new $.fn.dataTable.FixedHeader(table);
}

function get_opd() {
    $.ajax({
        url: "<?= base_url() ?>/admin/pengguna/get_opd",
        type: "GET",
        dataType: "JSON",
        async: false,
        success: function(data) {
            var baris = "";
            for ($x = 0; $x < data.length; $x++) {
                baris += '<option value="' + data[$x].id_opd + '">' + data[$x].nama_opd + '</option>';
            }
            document.getElementById("myOpd").innerHTML = baris;
        },
    });
}


function update_active($status, $id) {
    Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Aktifasi pelayanan akan diubah.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Ubah"
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData();
            formData.append('id_pelayanan', $id);
            formData.append('active', $status);

            $.ajax({
                url: "<?= base_url() ?>/admin/pelayanan/update_status",
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
        text: "Data Pelayanan akan dihapus dan tidak dapat dipulihkan kembali.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Hapus"
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData();
            formData.append('id_pelayanan', $id);

            $.ajax({
                url: "<?= base_url() ?>/admin/pelayanan/del_pelayanan",
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