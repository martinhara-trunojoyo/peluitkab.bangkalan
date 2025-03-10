<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Tiket</h1>
            <div class="breadcrumb-item active"><a
                    href="<?= base_url() ?>/<?= session()->get('role') ?>/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= base_url() ?>/<?= session()->get('role') ?>/tiket">Tiket</a>
            </div>
            <div class="breadcrumb-item">Daftar Tiket</div>
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
                                                onclick="refresh_table('proses',0)" href="javascript:void(0)">Proses
                                                <span class="badge badge-white" id="proses_count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="selesai_tab" onclick="refresh_table('selesai',1)"
                                                href="javascript:void(0)">Selesai <span class="badge badge-primary"
                                                    id="selesai_count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ditolak_tab" onclick="refresh_table('ditolak',2)"
                                                href="javascript:void(0)">Ditolak <span class="badge badge-primary"
                                                    id="ditolak_count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="batal_tab" onclick="refresh_table('batal',3)"
                                                href="javascript:void(0)">Dibatalkan <span class="badge badge-primary"
                                                    id="batal_count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="semua_tab" onclick="refresh_table('semua',4)"
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
                            <div class="d-flex justify-content-end mb-4">
                                <button onclick="open_modal()" class="btn btn-primary">Buat Tiket</button>
                            </div>

                            <div class="clearfix mb-3"></div>

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
    </section>
</div>


<!-- Modal Ubah Foto -->
<div class="modal fade" role="dialog" id="tiketModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Buat Tiket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Pilih Pelayanan</label>
                    <select style="width:100%;" class="select2 form-control" id="myPelayanan" onchange="loadGeneratedFormFields()">

                    </select>
                </div>
                <div id="generatedFormFields"></div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button onclick="open_form()" type="button" class="btn btn-primary">Buat</button>
            </div>
        </div>
    </div>
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

    get_pelayanan();
    // get_data();
});

var status = 0;

function open_modal() {
    $('#tiketModal').modal('show');
}

function open_form() {
    const pelayananId = $("#myPelayanan").val();
    window.open("<?= base_url() ?>/form/" + pelayananId, "_self");
}

function get_pelayanan() {
    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/pelayanan/get_pelayanan_with_form",
        type: "GET",
        dataType: "JSON",
        async: false,
        success: function(data) {
            var baris = "";
            for ($x = 0; $x < data.length; $x++) {
                baris += '<option value="' + data[$x].id_pelayanan + '">' + data[$x].nama_pelayanan + '</option>';
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

function get_data() {
    if ($("#datepicker").val() == "") {
        var tahun = new Date().getFullYear();
    } else {
        var tahun = $("#datepicker").val()
    }

    var formData = new FormData();
    formData.append('tahun', tahun);

    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/tiket/get_tiket/count",
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
            "url": "<?= base_url() ?>/<?= session()->get('role') ?>/tiket/get_tiket",
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
                        button += '<div class="bullet text-dark"></div>';
                        button += '<a class="text-dark"><small>Dibatalkan</small></a>';
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
                    button += '<a class="text-muted"><small>' + row.akronim_opd + '</small></a>';
                    button += '</div>';

                    return button;
                }
            }, {
                "data": "id_tiket",
                "render": function(data, type, row) {
                    var button = "";
                    button +=
                        '<a href="<?= base_url() ?>/detail/' + row.route + "/" + row.id_tiket + '/' +
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

function loadGeneratedFormFields() {
    const pelayananId = $("#myPelayanan").val();
    $.get('<?= base_url() ?>/admin/formbuilder/get_form_fields/' + pelayananId, function(response) {
        if (response.status === 'success') {
            let formFieldsHtml = '<form id="generatedForm">';
            response.formFields.forEach(function(field) {
                formFieldsHtml += `
                    <div class="form-group">
                        <label>${field.label}</label>
                        ${getFieldHtml(field)}
                    </div>
                `;
            });
            formFieldsHtml += '</form>';
            $('#generatedFormFields').html(formFieldsHtml);
        } else {
            $('#generatedFormFields').html('<div class="alert alert-danger">Failed to load form fields.</div>');
        }
    });
}

function getFieldHtml(field) {
    switch (field.field_type) {
        case 'text':
        case 'email':
        case 'number':
        case 'date':
            return `<input type="${field.field_type}" class="form-control" name="field_${field.id}" ${field.required == 1 ? 'required' : ''}>`;
        case 'textarea':
            return `<textarea class="form-control" name="field_${field.id}" ${field.required == 1 ? 'required' : ''}></textarea>`;
        case 'select':
            return `<select class="form-control" name="field_${field.id}" ${field.required == 1 ? 'required' : ''}></select>`;
        case 'file':
            return `<input type="file" class="form-control" name="field_${field.id}" ${field.required == 1 ? 'required' : ''}>`;
        default:
            return `<input type="text" class="form-control" name="field_${field.id}" ${field.required == 1 ? 'required' : ''}>`;
    }
}
</script>
<?= $this->endSection() ?>