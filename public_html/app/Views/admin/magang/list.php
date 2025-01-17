<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Tiket Magang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a
                        href="<?= base_url() ?>/<?= session()->get('role') ?>/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/<?= session()->get('role') ?>/magang">Magang</a>
                </div>
                <div class="breadcrumb-item">Daftar Tiket</div>
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
                                                <span class="badge badge-white" id="proses_count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="selesai_tab" onclick="refresh_table('selesai',1)"
                                                href="javascript:void(0)">Selesai <span class="badge badge-primary"
                                                    id="selesai_count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ditolak_tab" onclick="refresh_table('ditolak',0)"
                                                href="javascript:void(0)">Ditolak <span class="badge badge-primary"
                                                    id="ditolak_count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="batal_tab" onclick="refresh_table('batal',2)"
                                                href="javascript:void(0)">Dibatalkan <span class="badge badge-primary"
                                                    id="batal_count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="semua_tab" onclick="refresh_table('semua',1000)"
                                                href="javascript:void(0)">Semua <span class="badge badge-primary"
                                                    id="semua_count">0</span></a>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Tiket</h4>
                        </div>
                        <div class="card-body">

                            <!-- Start If -->
                            <?php if(session()->get('id_role') == 0 || session()->get('id_role') == 4){ ?>
                            <div class="d-flex justify-content-end mb-4">
                                <button onclick="open_modal()" class="btn btn-primary">Buat Tiket</button>
                            </div>
                            <!-- End If -->
                            <?php }?>

                            <div class="clearfix mb-3"></div>

                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Kode Tiket</th>
                                        <th>Pembuat</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- Modal Ubah Foto -->
<div class="modal fade bd-example-modal-lg" role="dialog" id="tiketModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Buat Tiket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label>Pilih Tujuan Instansi</label>
                    <select style="width:100%;" class="select2 form-control" id="myPelayanan">

                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Tanggal Mulai Magang</label>
                        <input type="date" class="form-control" id="tgl_awal">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Tanggal Akhir Magang</label>
                        <input type="date" class="form-control" id="tgl_akhir">
                    </div>
                </div>
                <small>Identitas Pembimbing Magang</small>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Nama Dosen / Guru</label>
                        <input id="nama" type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="wa">No Whatsapp</label>
                        <input id="wa" type="number" class="form-control" name="wa">
                    </div>
                </div>
                <small>Berkas</small>
                <hr>
                <div class="form-group">
                    <label for="berkas">Surat Pengantar</label>
                    <input id="berkas" type="file" class="form-control" name="berkas" accept="application/pdf">
                </div>
            </div>

            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <!-- <button onclick="open_form()" type="button" class="btn btn-primary">Buat</button> -->
                <div>
                    <button id="btn_tambah" onclick="tambah_tiket()" type="button" class="btn btn-primary">Buat</button>
                    <button id="btn_tambah_loader" style="display: none;"
                        class="btn disabled btn-primary btn-progress">Buat</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src='<?= base_url() ?>/public/assets/kode_tiket.js'></script>
<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");
    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
    });
    document.getElementById("datepicker").value = new Date().getFullYear();


    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if (month < 10)
        month = '0' + month.toString();
    if (day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#tgl_awal').attr('min', maxDate);
    $('#tgl_akhir').attr('min', maxDate);

    get_pelayanan();

});

var status = 4;

function open_modal() {
    reset();
    $('#tiketModal').modal('show');
}

function reset() {
    document.getElementById('tgl_awal').value = "";
    document.getElementById('tgl_akhir').value = "";
    document.getElementById('nama').value = "";
    document.getElementById('wa').value = "";
    document.getElementById('berkas').value = "";
}

function reset_class() {
    document.getElementById('tgl_awal').classList.remove("is-invalid");
    document.getElementById('tgl_akhir').classList.remove("is-invalid");
    document.getElementById('nama').classList.remove("is-invalid");
    document.getElementById('wa').classList.remove("is-invalid");
    document.getElementById('berkas').classList.remove("is-invalid");
}

function get_pelayanan() {
    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/magang/get_opd",
        type: "GET",
        dataType: "JSON",
        async: false,
        success: function(data) {
            // console.log(data);
            var baris = "";
            for ($x = 0; $x < data.length; $x++) {
                baris += '<option value="' + data[$x].id_opd + '">' + data[$x].nama_opd + '</option>';
            }
            document.getElementById("myPelayanan").innerHTML = baris;
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
            $('#myPelayanan').select2({
                dropdownParent: $('#tiketModal')
            });
        },
    });
}

function refresh_table($id, $status) {
    document.getElementById('proses_tab').classList.remove("active");
    document.getElementById('selesai_tab').classList.remove("active");
    document.getElementById('ditolak_tab').classList.remove("active");
    document.getElementById('batal_tab').classList.remove("active");
    document.getElementById('semua_tab').classList.remove("active");

    document.getElementById('proses_count').classList.remove("badge-white");
    document.getElementById('selesai_count').classList.remove("badge-white");
    document.getElementById('ditolak_count').classList.remove("badge-white");
    document.getElementById('batal_count').classList.remove("badge-white");
    document.getElementById('semua_count').classList.remove("badge-white");

    document.getElementById('proses_count').classList.remove("badge-primary");
    document.getElementById('selesai_count').classList.remove("badge-primary");
    document.getElementById('ditolak_count').classList.remove("badge-primary");
    document.getElementById('batal_count').classList.remove("badge-primary");
    document.getElementById('semua_count').classList.remove("badge-primary");

    document.getElementById('proses_count').classList.add("badge-primary");
    document.getElementById('selesai_count').classList.add("badge-primary");
    document.getElementById('ditolak_count').classList.add("badge-primary");
    document.getElementById('batal_count').classList.add("badge-primary");
    document.getElementById('semua_count').classList.add("badge-primary");

    document.getElementById($id + "_tab").classList.add("active");
    document.getElementById($id + "_count").classList.remove("badge-primary");
    document.getElementById($id + "_count").classList.add("badge-white");

    status = $status;
    get_data();
}

function tambah_tiket() {
    reset_class();
    if (document.getElementById('tgl_awal').value == "") {
        document.getElementById('tgl_awal').classList.add("is-invalid");
        document.getElementById("tgl_awal").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Tanggal Mulai Kosong !'
        });
    } else if (document.getElementById('tgl_akhir').value == "") {
        document.getElementById('tgl_akhir').classList.add("is-invalid");
        document.getElementById("tgl_akhir").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Tanggal Selesai Kosong !'
        });
    } else if (document.getElementById('tgl_akhir').value <= document.getElementById('tgl_awal').value) {
        document.getElementById('tgl_akhir').classList.add("is-invalid");
        document.getElementById("tgl_akhir").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Tanggal Selesai harus lebih dari Tanggal Awal !'
        });
    } else if (document.getElementById('nama').value == "" || isEmptyOrSpaces(document.getElementById('nama').value)) {
        document.getElementById('nama').classList.add("is-invalid");
        document.getElementById("nama").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nama Dosen / Guru Kosong !'
        });
    } else if (/[^a-zA-Z0-9\ .,]/.test(document.getElementById("nama").value)) {
        document.getElementById('nama').classList.add("is-invalid");
        document.getElementById("nama").focus();
        Swal.fire(
            'Gagal',
            "Isian Nama Dosen / Guru tidak sesuai format.",
            'error'
        );
    } else if (document.getElementById('wa').value == "" || isEmptyOrSpaces(document.getElementById('wa')
            .value)) {
        document.getElementById('wa').classList.add("is-invalid");
        document.getElementById("wa").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form No Whatsapp Dosen / Guru Kosong !'
        });
    } else if (/^[0-9]+$/.test(document.getElementById("wa").value) == false) {
        document.getElementById('wa').classList.add("is-invalid");
        document.getElementById("wa").focus();
        Swal.fire(
            'Gagal',
            "Isian No Whatsapp Dosen / Guru tidak sesuai format.",
            'error'
        );
    } else if (document.getElementById("wa").value.length < 10) {
        document.getElementById('wa').classList.add("is-invalid");
        document.getElementById("wa").focus();
        Swal.fire(
            'Gagal',
            "Isian No Whatsapp Dosen / Guru kurang dari 10 digit.",
            'error'
        );
    } else if (document.getElementById("wa").value.length > 12) {
        document.getElementById('wa').classList.add("is-invalid");
        document.getElementById("wa").focus();
        Swal.fire(
            'Gagal',
            "Isian No Whatsapp Dosen / Guru lebih dari 12 digit.",
            'error'
        );
    } else if (document.getElementById("berkas").files.length == 0) {
        document.getElementById('berkas').classList.add("is-invalid");
        document.getElementById("berkas").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Berkas Surat Pengantar Kosong !'
        });
    } else if (validasi_berkas() == false) {
        document.getElementById('berkas').classList.add("is-invalid");
        document.getElementById("berkas").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Surat Pengantar harus PDF dan kurang dari 2 MB !'
        });
    } else {
        document.getElementById("btn_tambah").style.display = "none";
        document.getElementById("btn_tambah_loader").style.display = "block";

        var formData = new FormData();
        formData.append('tgl_awal', document.getElementById("tgl_awal").value);
        formData.append('tgl_akhir', document.getElementById("tgl_akhir").value);
        formData.append('nama', document.getElementById("nama").value);
        formData.append('wa', document.getElementById("wa").value);
        formData.append('berkas', document.getElementById("berkas").files[0]);
        formData.append('id_opd', $("#myPelayanan").val());
        formData.append('kode', randomString());

        $.ajax({
            url: "<?= base_url() ?>/<?= session()->get('role') ?>/magang/set_magang",
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
                    get_data();
                    $('#tiketModal').modal('hide');

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

        // Loader
        // document.getElementById("btn_tambah").style.display = "block";
        // document.getElementById("btn_tambah_loader").style.display = "none";
    }
}


function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
}

function validasi_berkas() {
    var fi = document.getElementById('berkas');
    var hasil = true;
    if (fi.files.length > 0) {
        var count = 0;
        var total = fi.files.length;
        while (count < fi.files.length) {
            // console.log(fi.files.item(count));
            var ekstensi = fi.files.item(count).type;
            var fsize = fi.files.item(count).size;
            // console.log(fi.files.item(count));
            var size = (fsize / 1024 / 1024).toFixed(2);
            if (ekstensi.includes('pdf') && size < 2) {
                hasil = true;
            } else {
                hasil = false;
                break;
            }
            count += 1;
        }
        return hasil;
    } else {
        return false;
    }
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
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/magang/get_magang/count",
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
            document.getElementById("selesai_count").innerHTML = data["selesai"];
            document.getElementById("ditolak_count").innerHTML = data["tolak"];
            document.getElementById("batal_count").innerHTML = data["batal"];
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
            "url": "<?= base_url() ?>/<?= session()->get('role') ?>/magang/get_magang/tiket",
            "dataSrc": "",
            "data": function(data) {
                data.tahun = tahun;
                data.status = status;
            },
        },
        'columnDefs': [{
            "targets": [2], // your case first column
            "className": "text-center",
            "width": "4%"
        }],
        "columns": [{
                "data": "akronim_opd",
                "render": function(data, type, row) {
                    var button = row.kode_tiket;
                    button += '<div>';
                    button += '<a class="text-muted"><small>' + data + '</small></a>';

                    if (row.status >= 3) {
                        button += '<div class="bullet text-primary"></div>';
                        button += '<a class="text-primary"><small>Proses</small></a>';
                    } else if (row.status == 1) {
                        button += '<div class="bullet text-success"></div>';
                        button += '<a class="text-success"><small>Selesai</small></a>';
                    } else if (row.status == 2) {
                        button += '<div class="bullet text-dark"></div>';
                        button += '<a class="text-dark"><small>Dibatalkan</small></a>';
                    } else {
                        button += '<div class="bullet text-danger"></div>';
                        button += '<a class="text-danger"><small>Ditolak</small></a>';
                    }
                    button += '</div>';

                    return button;
                }
            },
            {
                "data": "id_tiket",
                "render": function(data, type, row) {
                    var bulan_huruf = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                        'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];

                    var date = new Date(row.tgl_input);
                    var tahun = date.getFullYear();
                    var bulan = date.getMonth();
                    var tanggal = date.getDate();
                    var hari = date.getDay();
                    var jam = date.getHours();
                    var menit = date.getMinutes();
                    var detik = date.getSeconds();

                    var tampilTanggal = tanggal + " " + bulan_huruf[bulan] + " " + tahun;
                    var tampilWaktu = jam + ":" + menit + ":" + detik;
                    var ampm = jam >= 12 ? ' PM' : ' AM';
                    var button = row.nama;
                    button += '<div>';
                    button += '<a class="text-info"><small>' + tampilTanggal +
                        '<div class="bullet text-info"></div>' + tampilWaktu + ampm + '</small></a>';
                    button += '<div class="bullet text-info"></div>';
                    button += '<a class="text-muted"><small>' + row.civitas + '</small></a>';
                    button += '</div>';

                    return button;
                }
            }, {
                "data": "id_tiket",
                "render": function(data, type, row) {
                    var button = "";
                    button +=
                        '<a href="<?= base_url() ?>/detail/magang/' + row.id_tiket + '/' +
                        row.kode_tiket +
                        '" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Detail"><i class="fas fa-list-ul"></i></a>';

                    return button;
                }
            },
        ]
    });
    new $.fn.dataTable.FixedHeader(table);
}
</script>
<?= $this->endSection() ?>