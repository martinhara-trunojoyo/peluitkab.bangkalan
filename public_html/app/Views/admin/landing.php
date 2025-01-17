<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1 id="myTittle">Landing Page</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a
                        href="<?= base_url() ?>/<?= session()->get('role') ?>/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">Daftar Pelayanan Publik</div>
            </div>
        </div>
        <div class="section-body">
            <div id="myBtn">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Pelayanan</h4>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3"></div>

                                <div class="d-flex justify-content-end">
                                    <div class="col-lg-5 col-sm-12">
                                        <div class="input-group">
                                            <input type="text" id="value" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="myList mt-4">
                                    <div class="row">
                                        <?php
                                    if(count($list_pelayanan)==0){
                                    ?>

                                        <div class="row mt-4">
                                            <div class="empty-state" data-height="400">
                                                <div class="empty-state-icon">
                                                    <i class="fas fa-question"></i>
                                                </div>
                                                <h2>Pelayanan Tidak Ditemukan</h2>
                                                <p class="lead">
                                                    Pastikan anda menjadi verifikator dari Pelayanan Publik yang
                                                    Tersedia
                                                </p>
                                            </div>

                                            <?php
                                    }else{
                                        for ($x = 0; $x < count($list_pelayanan); $x++) {
                                            if($list_pelayanan[$x]->active == 1){
                                    ?>

                                            <div class="col-sm mt-4">
                                                <div class="profile">
                                                    <span class="name">
                                                        <button
                                                            onclick="open_list(<?= $list_pelayanan[$x]->id_pelayanan?>, '<?= $list_pelayanan[$x]->nama_pelayanan?>', '<?= $list_pelayanan[$x]->route?>')"
                                                            type="button" class="btn btn-primary btn-block">
                                                            <?= $list_pelayanan[$x]->nama_pelayanan?>
                                                        </button>
                                                    </span>

                                                </div>
                                            </div>

                                            <?php
                                            };
                                        }
                                    ?>



                                        </div>


                                        <?php
                                    }
                                    ?>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="myList" style="display:none;">
                <div class=" row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-sm-6">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="proses_tab"
                                                    onclick="refresh_table('proses',0)" href="javascript:void(0)">Proses
                                                    <span class="badge badge-white" id="proses_count">1</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="selesai_tab"
                                                    onclick="refresh_table('selesai',1)"
                                                    href="javascript:void(0)">Selesai <span class="badge badge-primary"
                                                        id="selesai_count">1</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="ditolak_tab"
                                                    onclick="refresh_table('ditolak',2)"
                                                    href="javascript:void(0)">Ditolak <span class="badge badge-primary"
                                                        id="ditolak_count">0</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="batal_tab" onclick="refresh_table('batal',3)"
                                                    href="javascript:void(0)">Batal <span class="badge badge-primary"
                                                        id="batal_count">0</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="semua_tab" onclick="refresh_table('semua',4)"
                                                    href="javascript:void(0)">Semua <span class="badge badge-primary"
                                                        id="semua_count">5</span></a>
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
                                <div class="clearfix mb-3"></div>
                                <div class="d-flex justify-content-end mb-4">
                                    <button onclick="close_list()" class="btn btn-warning">Kembali</button>
                                </div>
                                <div class="">
                                    <table id="example" class="table table-striped table-bordered nowrap"
                                        style="width:100%">
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
            </div>




        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");

    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
    });
    document.getElementById("datepicker").value = new Date().getFullYear();
});

var status = 0;
var pelayanan = 0;
var route = '';

document.getElementById("value").addEventListener("keyup", filterSearch);

function filterSearch() {
    var value, name, profile, i;
    value = document.getElementById('value').value.toUpperCase();
    profile = document.getElementsByClassName('profile');
    for (i = 0; profile.length; i++) {
        name = profile[i].getElementsByClassName('name');
        if (name[0].innerHTML.toUpperCase().indexOf(value) > -1) {
            profile[i].style.display = "block";
        } else {
            profile[i].style.display = "none";
        }
    }
}

function close_list() {
    document.getElementById("myBtn").style.display = "block";
    document.getElementById("myList").style.display = "none";

    document.getElementById("myTittle").innerHTML = "Landing Page";
}

document.addEventListener('DOMContentLoaded', function() {

});

function open_list($id, $title, $route) {

    document.getElementById("myList").style.display = "block";
    document.getElementById("myBtn").style.display = "none";

    document.getElementById("myTittle").innerHTML = $title;
    pelayanan = $id;
    route = $route;

    // alert(pelayanan);
    get_data();
}

function get_data() {
    if ($("#datepicker").val() == "") {
        var tahun = new Date().getFullYear();
    } else {
        var tahun = $("#datepicker").val()
    }

    var formData = new FormData();
    formData.append('tahun', tahun);
    formData.append('id_pelayanan', pelayanan);

    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/tiket/get_tiket_pelayanan/count",
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
            "url": "<?= base_url() ?>/<?= session()->get('role') ?>/tiket/get_tiket_pelayanan",
            "dataSrc": "",
            "data": function(data) {
                data.tahun = tahun;
                data.status = status;
                data.id_pelayanan = pelayanan;
            },
        },
        'columnDefs': [{
            "targets": [2], // your case first column
            "className": "text-center",
            "width": "4%"
        }],
        "columns": [{
                "data": "nama_pelayanan",
                "render": function(data, type, row) {
                    var button = row.kode_tiket;
                    button += '<div>';
                    button += '<a class="text-muted"><small>' + data + '</small></a>';

                    if (row.status == 0) {
                        button += '<div class="bullet text-primary"></div>';
                        button += '<a class="text-primary"><small>Proses</small></a>';
                    } else if (row.status == 1) {
                        button += '<div class="bullet text-success"></div>';
                        button += '<a class="text-success"><small>Selesai</small></a>';
                    } else if (row.status == 2) {
                        button += '<div class="bullet text-danger"></div>';
                        button += '<a class="text-danger"><small>Ditolak</small></a>';
                    } else {
                        button += '<div class="bullet text-secondary"></div>';
                        button += '<a class="text-secondary"><small>Batal</small></a>';
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

                    var button = row.nama;
                    button += '<div>';
                    button += '<a class="text-info"><small>' + tampilTanggal +
                        '<div class="bullet text-info"></div>' + tampilWaktu +
                        ' WIB</small></a>';
                    button += '<div class="bullet text-info"></div>';
                    button += '<a class="text-muted"><small>' + row.akronim_opd + '</small></a>';
                    button += '</div>';

                    return button;
                }
            }, {
                "data": "id_tiket",
                "render": function(data, type, row) {
                    var button = "";
                    button +=
                        '<a href="<?= base_url() ?>/detail/' + route + "/" + row.id_tiket + '/' +
                        row.kode_tiket +
                        '" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Detail"><i class="fas fa-list-ul"></i></a>';
                    button +=
                        '<a href="<?= base_url() ?>/<?= session()->get('role') ?>/print_tiket/' + row
                        .id_tiket + '/' +
                        row.kode_tiket +
                        '" class="btn btn-info btn-action mr-1" data-toggle="tooltip" target="_blank" title="Cetak"><i class="far fa-file-pdf"></i></a>';

                    return button;
                }
            },
        ]
    });
    new $.fn.dataTable.FixedHeader(table);
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
</script>
<?= $this->endSection() ?>