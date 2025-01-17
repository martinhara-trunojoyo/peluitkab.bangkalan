<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Pelayanan Publik</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a
                        href="<?= base_url() ?>/<?= session()->get('role') ?>/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/<?= session()->get('role') ?>/tiket">Tiket</a>
                </div>
                <div class="breadcrumb-item">Pinjam Aula</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col-lg-6 d-flex w-100 ">
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
                <div class="col-lg-6 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Form Buat Tiket</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group row align-items-center">
                                <label class="col-md-12 text-md-left text-left">Nama Acara</label>
                                <div class="col-lg-12 col-md-12">
                                    <input type="text" id="acara" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Tanggal Mulai</label>
                                    <input type="datetime-local" class="form-control" id="tgl_mulai">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Tanggal Selesai</label>
                                    <input type="datetime-local" class="form-control" id="tgl_akhir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Daftar
                                    Aula</label>
                                <select class="w-100 select2 form-control" id="myAula">

                                </select>
                            </div>
                            <small class="text-secondary">Identitas PIC</small>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nama PIC</label>
                                    <input type="text" class="form-control" id="nama_pic">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nomor Whatsapp PIC</label>
                                    <input type="number" maxlength="12" class="form-control" id="nomor_pic">
                                </div>
                            </div>
                            <small class="text-secondary">Berkas</small>
                            <hr>
                            <div class="form-group row align-items-center">
                                <label class="col-md-12 text-md-left text-left">Surat Pengantar</label>
                                <div class="col-lg-12 col-md-12">
                                    <input type="file" id="berkas" class="form-control" accept="application/pdf">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mb-4">
                                <button id="btn_tambah" onclick="add_tiket()" class="btn btn-warning">Buat
                                    Tiket</button>
                                <button id="btn_tambah_loader" style="display: none;"
                                    class="btn disabled btn-primary btn-progress">Buat
                                    Tiket</button>
                            </div>




                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row mt-4 d-flex justify-content-center">

            </div> -->
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row align-items-center">
                    <label class="col-md-12 text-md-left text-left">Nama Acara</label>
                    <div class="col-lg-12 col-md-12">
                        <input type="text" id="modal_acara" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Tanggal Mulai</label>
                        <input type="datetime-local" class="form-control" id="modal_tgl_mulai" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Tanggal Selesai</label>
                        <input type="datetime-local" class="form-control" id="modal_tgl_akhir" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tempat</label>
                    <input type="text" id="modal_aula" class="form-control" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src='<?= base_url() ?>/public/assets/kode_tiket.js'></script>
<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");
    set_datetime('tgl_mulai');
    set_datetime('tgl_akhir');
    get_aula();
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
});

function change_calendar() {
    var formData = new FormData();
    formData.append('tgl', $("#tgl_now").val());

    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/tiket/get_aula",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: false,
                initialDate: document.getElementById("tgl_now").value,
                events: data,
                eventClick: function(info) {
                    // alert('Event: ' + info.event.title);
                    const now_start = new Date(info.event.start);
                    var dateStringWithTimeStart = moment(now_start).format(
                        'YYYY-MM-DD HH:mm:ss');

                    const now_end = new Date(info.event.end);
                    var dateStringWithTimeEnd = moment(now_end).format(
                        'YYYY-MM-DD HH:mm:ss');

                    document.getElementById("exampleModalLabel").innerHTML = info.event.title;
                    document.getElementById("modal_tgl_mulai").value = dateStringWithTimeStart;
                    document.getElementById("modal_tgl_akhir").value = dateStringWithTimeEnd;
                    $('#calendarModal').modal('show');
                },
                eventDidMount: function(info) {
                    document.getElementById("modal_acara").value = info.event.extendedProps[
                        "description"];
                    document.getElementById("modal_aula").value = "Aula " + info.event
                        .extendedProps[
                            "nama_aula"];

                    // console.log(info.event.extendedProps);
                },
            });
            calendar.render();
        },
    });
}

function remove_invalid() {
    document.getElementById("acara").classList.remove("is-invalid");
    document.getElementById("tgl_mulai").classList.remove("is-invalid");
    document.getElementById("tgl_akhir").classList.remove("is-invalid");
    document.getElementById("nama_pic").classList.remove("is-invalid");
    document.getElementById("nomor_pic").classList.remove("is-invalid");
    document.getElementById("berkas").classList.remove("is-invalid");
}

function reset() {
    document.getElementById("acara").value = "";
    document.getElementById("tgl_mulai").value = "";
    document.getElementById("tgl_akhir").value = "";
    document.getElementById("nama_pic").value = "";
    document.getElementById("nomor_pic").value = "";
    document.getElementById("berkas").value = "";
}

function add_tiket() {
    remove_invalid();
    if (document.getElementById('acara').value == "" || isEmptyOrSpaces(document.getElementById('acara').value)) {
        document.getElementById('acara').classList.add("is-invalid");
        document.getElementById("acara").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nama Acara Kosong !'
        });
    } else if (document.getElementById('tgl_mulai').value == "") {
        document.getElementById('tgl_mulai').classList.add("is-invalid");
        document.getElementById("tgl_mulai").focus();
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
    } else if (document.getElementById('tgl_akhir').value <= document.getElementById('tgl_mulai').value) {
        document.getElementById('tgl_akhir').classList.add("is-invalid");
        document.getElementById("tgl_akhir").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Tanggal Selesai harus lebih dari Tanggal Awal !'
        });
    } else if (document.getElementById('nama_pic').value == "" || isEmptyOrSpaces(document.getElementById('nama_pic')
            .value)) {
        document.getElementById('nama_pic').classList.add("is-invalid");
        document.getElementById("nama_pic").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nama PIC Kosong !'
        });
    } else if (document.getElementById('nomor_pic').value == "") {
        document.getElementById('nomor_pic').classList.add("is-invalid");
        document.getElementById("nomor_pic").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nomor PIC Kosong !'
        });
    } else if (document.getElementById("nomor_pic").value.length < 10) {
        document.getElementById('nomor_pic').classList.add("is-invalid");
        document.getElementById("nomor_pic").focus();
        Swal.fire(
            'Gagal',
            "Form Nomor PIC kurang dari 10 digit.",
            'error'
        );
    } else if (document.getElementById("nomor_pic").value.length > 12) {
        document.getElementById('nomor_pic').classList.add("is-invalid");
        document.getElementById("nomor_pic").focus();
        Swal.fire(
            'Gagal',
            "Form Nomor PIC lebih dari 12 digit.",
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
        var formData = new FormData();
        formData.append('acara', document.getElementById("acara").value);
        formData.append('tgl_mulai', document.getElementById("tgl_mulai").value);
        formData.append('tgl_akhir', document.getElementById("tgl_akhir").value);
        formData.append('nama_pic', document.getElementById("nama_pic").value);
        formData.append('nomor_pic', document.getElementById("nomor_pic").value);
        formData.append('berkas', document.getElementById("berkas").files[0]);
        formData.append('myAula', document.getElementById("myAula").value);
        formData.append('kode', randomString());

        $.ajax({
            url: "<?= base_url() ?>/<?= session()->get('role') ?>/tiket/set_aula",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            async: true,
            enctype: 'multipart/form-data',
            dataType: "JSON",
            beforeSend: function() {
                // Loader
                document.getElementById("btn_tambah").style.display = "none";
                document.getElementById("btn_tambah_loader").style.display = "block";

            },
            success: function(data) {
                console.log(data);
                if (data.status == 200) {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Berhasil !',
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    reset();
                    change_calendar();
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

function get_aula() {
    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/aula/get_aula",
        type: "GET",
        dataType: "JSON",
        async: false,
        success: function(data) {
            var baris = "";
            for ($x = 0; $x < data.length; $x++) {
                if (data[$x].active == 1) {
                    baris += '<option value="' + data[$x].id_aula + '">' + data[$x].nama_aula + '</option>';
                }
            }
            document.getElementById("myAula").innerHTML = baris;
        },
    });
}

function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
}
</script>
<?= $this->endSection() ?>