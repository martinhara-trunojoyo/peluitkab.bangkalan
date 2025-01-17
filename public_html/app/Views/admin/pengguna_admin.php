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
            <h1>Halaman Pengguna</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>/admin/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/admin/pengguna/admin">Data Master Pengguna</a>
                </div>
                <div class="breadcrumb-item">Admin</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col-lg-8 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Daftar Pengguna Admin</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table id="example" class="table table-striped table-bordered nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Identitas</th>
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
                            <h4>Form Tambah Pengguna Admin</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input id="nama" type="text" class="form-control">
                            </div>
                            <!-- <div class="form-group">
                                <label>Username</label>
                                <input id="username" type="text" class="form-control">
                            </div> -->
                            <div class="form-group">
                                <label>NIP</label>
                                <input id="nip" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Id Chat</label>
                                <input id="id_chat" type="number" class="form-control">
                            </div>
                            <!-- <div class="form-group">
                                <label>Foto</label>
                                <input id="foto" type="file" class="form-control"
                                    accept="image/png, image/gif, image/jpeg">
                            </div> -->
                            <!-- <div class="d-flex justify-content-end mb-4">
                                <button id="btn_tambah" onclick="tambah_user()" class="btn btn-primary">Tambah</button>
                                <button id="btn_tambah_loader" style="display: none;"
                                    class="btn disabled btn-primary btn-progress">Tambah</button>
                            </div> -->
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

<!-- Modal Ubah Id Chat -->
<div class="modal fade" tabindex="-1" role="dialog" id="idChatModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Ubah Id Chat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Id Chat</label>
                    <input id="id_chat_ubah" type="number" class="form-control">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <div id="ubah_tombol"></div>
                <!-- <button type="button" class="btn btn-primary">Simpan</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah Foto -->
<div class="modal fade" tabindex="-1" role="dialog" id="fotoModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Ubah Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Foto</label>
                    <input id="foto_ubah" type="file" class="form-control" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <div id="ubah_tombol_foto"></div>
                <!-- <button type="button" class="btn btn-primary">Simpan</button> -->
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");
    document.getElementById("<?= $subtitle ?>").classList.add("active");
    get_data();
});

function reset() {
    document.getElementById('nama').value = "";
    // document.getElementById('username').value = "";
    document.getElementById('id_chat').value = "";
    document.getElementById('nip').value = "";
    // document.getElementById('foto').value = "";


    remove_invalid();
}

function remove_invalid() {
    //INVALID
    document.getElementById('nama').classList.remove("is-invalid");
    document.getElementById('id_chat').classList.remove("is-invalid");
    document.getElementById('nip').classList.remove("is-invalid");
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

function open_modal_id_chat($id, $id_chat) {
    document.getElementById('id_chat_ubah').value = $id_chat;
    document.getElementById("ubah_tombol").innerHTML =
        '<button onclick="update_id_chat(' + $id + ')" type="button" class="btn btn-primary">Simpan</button>';
    $('#idChatModal').modal('show');
}

function open_modal_foto($id) {
    document.getElementById("ubah_tombol_foto").innerHTML =
        '<button onclick="update_foto(' + $id + ')" type="button" class="btn btn-primary">Simpan</button>';
    $('#fotoModal').modal('show');
}

function ubah($id_ssuser, $nama, $id_chat, $nip, $status = 1) {
    remove_invalid();

    document.getElementById('nama').value = $nama;
    // document.getElementById('username').value = $username;
    document.getElementById('id_chat').value = $id_chat;
    document.getElementById('nip').value = $nip;
    var baris = "";
    baris += '<div class="d-flex justify-content-between mb-4">';
    baris += '<button onclick="toogle_btn(0)" class="btn btn-danger">Batal</button>';
    baris += '<button id="btn_ubah" onclick="ubah_user(' + $id_ssuser + ')" class="btn btn-warning">Ubah</button>';
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
            text: 'Form Nama Kosong !'
        });
    } else if (/[^a-zA-Z0-9\ .,]/.test(document.getElementById("nama").value)) {
        document.getElementById('nama').classList.add("is-invalid");
        document.getElementById("nama").focus();
        Swal.fire(
            'Gagal',
            "Isian Nama tidak sesuai format.",
            'error'
        );
    }
    // else if (document.getElementById('username').value == "") {
    //     document.getElementById('nama').classList.remove("is-invalid");
    //     document.getElementById('username').classList.add("is-invalid");
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Gagal...',
    //         text: 'Form Username Kosong !'
    //     });
    // } 
    else if (document.getElementById('nip').value == "" || isEmptyOrSpaces(document.getElementById('nip').value)) {
        document.getElementById('nip').classList.add("is-invalid");
        document.getElementById("nip").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form NIP Kosong !'
        });
    } else if (/^[0-9]+$/.test(document.getElementById("nip").value) == false) {
        document.getElementById('nip').classList.add("is-invalid");
        document.getElementById("nip").focus();
        Swal.fire(
            'Gagal',
            "Isian NIP tidak sesuai format.",
            'error'
        );
    } else if (document.getElementById("nip").value.length < 18) {
        document.getElementById('nip').classList.add("is-invalid");
        document.getElementById("nip").focus();

        Swal.fire(
            'Gagal',
            "Isian NIP kurang dari 18 digit.",
            'error'
        );
    } else if (document.getElementById("nip").value.length > 18) {
        document.getElementById('nip').classList.add("is-invalid");
        document.getElementById("nip").focus();

        Swal.fire(
            'Gagal',
            "Isian NIP lebih dari 18 digit.",
            'error'
        );
    } else if (document.getElementById('id_chat').value == "" || isEmptyOrSpaces(document.getElementById('id_chat')
            .value)) {
        document.getElementById('id_chat').classList.add("is-invalid");
        document.getElementById("id_chat").focus();

        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Id Chat Kosong !'
        });
    }
    // else if (document.getElementById("foto").value == "") {
    //     document.getElementById("id_chat").classList.remove("is-invalid");
    //     document.getElementById("foto").classList.add("is-invalid");
    //     document.getElementById("foto").focus();
    // } 
    else {
        // document.getElementById("foto").classList.remove("is-invalid");

        var formData = new FormData();
        formData.append('nama', document.getElementById("nama").value);
        // formData.append('username', document.getElementById("username").value);
        formData.append('id_chat', document.getElementById("id_chat").value);
        formData.append('nip', document.getElementById("nip").value);
        // formData.append('foto', document.getElementById("foto").files[0]);

        $.ajax({
            url: "<?= base_url() ?>/admin/pengguna/set_admin",
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
                document.getElementById("btn_tambah").style.display = "none";
                document.getElementById("btn_tambah_loader").style.display = "block";

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
            },
            complete: function() {

                // Loader
                document.getElementById("btn_tambah").style.display = "block";
                document.getElementById("btn_tambah_loader").style.display = "none";
            },
        });

    }

}

function ubah_user($id) {
    remove_invalid();
    if (document.getElementById('nama').value == "" || isEmptyOrSpaces(document.getElementById('nama').value)) {
        document.getElementById('nama').classList.add("is-invalid");
        document.getElementById("nama").focus();

        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nama Kosong !'
        });
    } else if (/[^a-zA-Z0-9\ .,]/.test(document.getElementById("nama").value)) {
        document.getElementById('nama').classList.add("is-invalid");
        document.getElementById("nama").focus();

        Swal.fire(
            'Gagal',
            "Isian Nama tidak sesuai format.",
            'error'
        );
    } else if (document.getElementById('nip').value == "" || isEmptyOrSpaces(document.getElementById('nip').value)) {
        document.getElementById('nip').classList.add("is-invalid");
        document.getElementById("nip").focus();

        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form NIP Kosong !'
        });
    } else if (/^[0-9]+$/.test(document.getElementById("nip").value) == false) {
        document.getElementById('nip').classList.add("is-invalid");
        document.getElementById("nip").focus();

        Swal.fire(
            'Gagal',
            "Isian NIP tidak sesuai format.",
            'error'
        );
    } else if (document.getElementById("nip").value.length < 18) {
        document.getElementById('nip').classList.add("is-invalid");
        document.getElementById("nip").focus();

        Swal.fire(
            'Gagal',
            "Isian NIP kurang dari 18 digit.",
            'error'
        );
    } else if (document.getElementById("nip").value.length > 18) {
        document.getElementById('nip').classList.add("is-invalid");
        document.getElementById("nip").focus();

        Swal.fire(
            'Gagal',
            "Isian NIP lebih dari 18 digit.",
            'error'
        );
    } else if (document.getElementById('id_chat').value == "" || isEmptyOrSpaces(document.getElementById('id_chat')
            .value)) {
        document.getElementById('id_chat').classList.add("is-invalid");
        document.getElementById("id_chat").focus();

        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Id Chat Kosong !'
        });
    } else {
        document.getElementById("btn_ubah").style.display = "none";
        document.getElementById("btn_ubah_loader").style.display = "block";

        var formData = new FormData();
        formData.append('nama', document.getElementById("nama").value);
        formData.append('id_chat', document.getElementById("id_chat").value);
        formData.append('nip', document.getElementById("nip").value);
        formData.append('id_user', $id);

        $.ajax({
            url: "<?= base_url() ?>/admin/pengguna/update_admin",
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
            "url": "<?= base_url() ?>/admin/pengguna/get_admin",
            "dataSrc": "",
            "data": function(data) {
                // data.opd_admin = $opd_admin;
            },
        },
        'columnDefs': [{
            "targets": [1], // your case first column
            "className": "text-center",
            "width": "4%"
        }, {
            "targets": [1],
            "className": "centerVLign"
        }],
        "columns": [{
            "data": "username",
            "render": function(data, type, row) {
                // var button =
                //     '<img class="mr-3 rounded-circle" width="50" src="<?= base_url() ?>/public/stisla/dist/assets/img/avatar/avatar-1.png" alt="avatar">';
                var button = '<div class="d-flex flex-row">';
                button +=
                    '<div class="p-2 align-self-center"><img class="mr-3 rounded-circle" style="object-fit: cover!important;object-position: center;" width="50" height="50" src="<?= base_url() ?>/public/assets/image/avatar/' +
                    row.file_foto + '" alt="avatar"></div>';

                button += '<div class="p-2">';
                button += '<div class="d-flex flex-column">';

                button +=
                    '<div class=""><h6 class="media-title">' + row.nama + '</h6></div>';
                button +=
                    '<div class="text-small text-muted">' + data +
                    ' <div class="bullet"></div> <span class="text-primary">' +
                    row.id_chat + '</span>';

                if (row.active == 1) {
                    button +=
                        ' <div class="bullet"></div> <span class="text-success">Enabled</span>';
                } else {
                    button +=
                        ' <div class="bullet"></div> <span class="text-danger">Disabled</span>';
                }
                button += '</div>';

                button += '</div>';
                button += '</div>';

                button += '</div>';

                return button;
            }
        }, {
            "data": "id_ssuser",
            "render": function(data, type, row) {
                var button = "";
                // var button =
                //     '<button onclick="open_modal_id_chat(' + data + ',' + row.id_chat +
                //     ')" class="btn btn-icon btn-primary mr-2"><i class="fas fa-key"></i></button>';
                // button +=
                //     '<button onclick="open_modal_foto(' + data +
                //     ')" class="btn btn-icon btn-info mr-2"><i class="far fa-image"></i></button>';

                if (row.active == 1) {
                    button +=
                        '<button onclick="update_active(0,' + data +
                        ')" class="btn btn-icon btn-success mr-2"><i class="fas fa-power-off"></i></button>';
                } else {
                    button +=
                        '<button onclick="update_active(1,' + data +
                        ')" class="btn btn-icon btn-danger mr-2"><i class="fas fa-power-off"></i></button>';
                }

                button +=
                    '<button onclick="ubah(' + data +
                    ",'" + row.nama + "'" + ",'" + row.id_chat + "'" + ",'" + row.nip +
                    "'" +
                    ')" class="btn btn-icon btn-warning mr-2"><i class="far fa-edit"></i></button>';

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
        text: "Aktifasi akun akan diubah.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Ubah"
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData();
            formData.append('id_ssuser', $id);
            formData.append('active', $status);

            $.ajax({
                url: "<?= base_url() ?>/admin/pengguna/update_status",
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

function update_id_chat($id) {
    var formData = new FormData();
    formData.append('id_ssuser', $id);
    formData.append('id_chat', document.getElementById("id_chat_ubah").value);

    $.ajax({
        url: "<?= base_url() ?>/admin/pengguna/update_id_chat",
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
                $('#idChatModal').modal('hide');
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

function update_foto($id) {
    var formData = new FormData();
    formData.append('id_ssuser', $id);
    // formData.append('foto', document.getElementById("foto_ubah").files[0]);

    $.ajax({
        url: "<?= base_url() ?>/admin/pengguna/update_foto",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        async: true,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            if (data.status == 200) {
                get_data();
                $('#fotoModal').modal('hide');
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Berhasil !',
                    showConfirmButton: false,
                    timer: 1500,
                });
                location.reload();
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

function del($id) {
    Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Data User akan dihapus dan tidak dapat dipulihkan kembali.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Hapus"
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData();
            formData.append('id_ssuser', $id);

            $.ajax({
                url: "<?= base_url() ?>/admin/pengguna/delete_pengguna",
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