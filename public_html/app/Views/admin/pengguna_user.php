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
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/admin/pengguna/user">Data Master Pengguna</a>
                </div>
                <div class="breadcrumb-item">User</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between">
                                <div class="col-sm-6">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="proses_tab"
                                                onclick="refresh_table('proses',3)" href="javascript:void(0)">Proses
                                                Aktivasi
                                                <span class="badge badge-white" id="proses_count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="diterima_tab" onclick="refresh_table('diterima',1)"
                                                href="javascript:void(0)">Akun Aktif <span class="badge badge-primary"
                                                    id="diterima_count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ditolak_tab" onclick="refresh_table('ditolak',0)"
                                                href="javascript:void(0)">Akun Non-Aktif <span
                                                    class="badge badge-primary" id="ditolak_count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="semua_tab" onclick="refresh_table('semua',4)"
                                                href="javascript:void(0)">Semua Akun
                                                <span class="badge badge-primary" id="semua_count">0</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                    <div class="row d-flex justify-content-end">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" onchange="get_data()" class="form-control"
                                                    id="datepicker">
                                                <small>Kategori Tahun</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Daftar Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table id="example" class="table table-striped table-bordered nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Identitas</th>
                                            <th>Civitas</th>
                                            <th>Berkas</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
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

<script src="<?= base_url() ?>/public/stisla/dist/assets/modules/tooltip.js"></script>

<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");
    document.getElementById("<?= $subtitle ?>").classList.add("active");

    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
    });
    document.getElementById("datepicker").value = new Date().getFullYear();
});

var status = 3;

function refresh_table($id, $status) {
    document.getElementById('proses_tab').classList.remove("active");
    document.getElementById('diterima_tab').classList.remove("active");
    document.getElementById('ditolak_tab').classList.remove("active");
    document.getElementById('semua_tab').classList.remove("active");

    document.getElementById('proses_count').classList.remove("badge-white");
    document.getElementById('diterima_count').classList.remove("badge-white");
    document.getElementById('ditolak_count').classList.remove("badge-white");
    document.getElementById('semua_count').classList.remove("badge-white");

    document.getElementById('proses_count').classList.remove("badge-primary");
    document.getElementById('diterima_count').classList.remove("badge-primary");
    document.getElementById('ditolak_count').classList.remove("badge-primary");
    document.getElementById('semua_count').classList.remove("badge-primary");

    document.getElementById('proses_count').classList.add("badge-primary");
    document.getElementById('diterima_count').classList.add("badge-primary");
    document.getElementById('ditolak_count').classList.add("badge-primary");
    document.getElementById('semua_count').classList.add("badge-primary");

    document.getElementById($id + "_tab").classList.add("active");
    document.getElementById($id + "_count").classList.remove("badge-primary");
    document.getElementById($id + "_count").classList.add("badge-white");

    status = $status;
    get_data();

}

function open_modal_id_chat($id, $id_chat) {
    document.getElementById('id_chat_ubah').value = $id_chat;
    document.getElementById("ubah_tombol").innerHTML =
        '<button onclick="update_id_chat(' + $id + ')" type="button" class="btn btn-primary">Simpan</button>';
    $('#idChatModal').modal('show');
}

function get_data() {
    if ($("#datepicker").val() == "") {
        var tahun = new Date().getFullYear();
    } else {
        var tahun = $("#datepicker").val()
    }

    var formData = new FormData();
    formData.append('tahun', tahun);

    $.ajax({
        url: "<?= base_url() ?>/admin/pengguna/get_user/count",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            // console.log(data);
            document.getElementById("proses_count").innerHTML = data["proses"];
            document.getElementById("diterima_count").innerHTML = data["selesai"];
            document.getElementById("ditolak_count").innerHTML = data["tolak"];
            document.getElementById("semua_count").innerHTML = data["semua"];
        },
    });
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
            "type": "POST",
            "url": "<?= base_url() ?>/admin/pengguna/get_user",
            "dataSrc": "",
            "data": function(data) {
                data.tahun = tahun;
                data.status = status;
            },
        },
        'columnDefs': [{
            "targets": [2, 3], // your case first column
            "className": "text-center",
            "width": "4%"
        }, {
            "targets": [2, 3],
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
                            ' <div class="bullet"></div> <span class="text-success">Aktif</span>';
                    } else if (row.active == 3) {
                        button +=
                            ' <div class="bullet"></div> <span class="text-dark">Proses Aktivasi</span>';
                    } else {
                        button +=
                            ' <div class="bullet"></div> <span class="text-danger">Non-Aktif</span>';
                    }
                    button += '</div>';

                    button += '</div>';
                    button += '</div>';

                    button += '</div>';

                    return button;
                }
            },
            {
                "data": "username",
                "render": function(data, type, row) {
                    // var button =
                    //     '<img class="mr-3 rounded-circle" width="50" src="<?= base_url() ?>/public/stisla/dist/assets/img/avatar/avatar-1.png" alt="avatar">';
                    var button = '<div class="d-flex flex-row">';

                    button += '<div class="p-2">';
                    button += '<div class="d-flex flex-column">';

                    button +=
                        '<div class=""><h6 class="media-title">' + row.civitas + '</h6></div>';
                    button +=
                        '<div class="text-small text-muted">' + row.jurusan;

                    if (row.jenis == 0) {
                        button +=
                            ' <div class="bullet"></div> <span class="text-info">Siswa</span>';
                    } else {
                        button +=
                            ' <div class="bullet"></div> <span class="text-primary">Mahasiswa</span>';
                    }

                    button += '</div>';

                    button += '</div>';
                    button += '</div>';

                    button += '</div>';

                    return button;
                }
            },
            {
                "data": "active",
                "render": function(data, type, row) {
                    var button =
                        '<button data-toggle="tooltip" data-placement="top" title="Lihat Berkas KTP / NISN" class="btn btn-icon btn-light mr-2" onclick="window.open(' +
                        "'<?= base_url() ?>/public/assets/berkas/ktp/" + row.ktp +
                        "','_blank')" +
                        '"><i class="far fa-address-card"></i></button>';
                    button +=
                        '<button data-toggle="tooltip" data-placement="top" title="Lihat Berkas Foto" class="btn btn-icon btn-light mr-2" onclick="window.open(' +
                        "'<?= base_url() ?>/public/assets/image/avatar/" + row.file_foto +
                        "','_blank')" +
                        '"><i class="far fa-images"></i></button>';
                    return button;
                }
            }, {
                "data": "id_ssuser",
                "render": function(data, type, row) {

                    if (row.active == 3) {
                        var button =
                            '<button data-toggle="tooltip" data-placement="top" title="Tolak Pembuatan akun" onclick="update_active(0,' +
                            data +
                            ')" class="btn btn-icon btn-danger mr-2"><i class="fas fa-user-times"></i></button>';

                        button +=
                            '<button data-toggle="tooltip" data-placement="top" title="Aktifkan akun" onclick="update_active(1,' +
                            data +
                            ')" class="btn btn-icon btn-success mr-2"><i class="fas fa-user-check"></i></button>';

                    } else {
                        var button =
                            '<button data-toggle="tooltip" data-placement="top" title="Ubah Id Chat Telegram" onclick="open_modal_id_chat(' +
                            data + ',' + row.id_chat +
                            ')" class="btn btn-icon btn-primary mr-2"><i class="fas fa-key"></i></button>';
                        if (row.active == 1) {
                            button +=
                                '<button data-toggle="tooltip" data-placement="top" title="Non-aktifkan akun" onclick="update_active(0,' +
                                data +
                                ')" class="btn btn-icon btn-success mr-2"><i class="fas fa-power-off"></i></button>';
                        } else {
                            button +=
                                '<button data-toggle="tooltip" data-placement="top" title="Aktifkan akun" onclick="update_active(1,' +
                                data +
                                ')" class="btn btn-icon btn-danger mr-2"><i class="fas fa-power-off"></i></button>';
                        }
                    }

                    return button;
                }
            },

        ]
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
</script>
<?= $this->endSection() ?>