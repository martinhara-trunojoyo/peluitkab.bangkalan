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
                <div class="breadcrumb-item">Zoom Meeting</div>
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


                            <div class="card-body">
                                <div class="row mt-4">
                                    <div class="col-12 col-lg-12">
                                        <div class="wizard-steps">
                                            <div id="box_akun" class="wizard-step wizard-step-active">
                                                <div class="wizard-step-icon">
                                                    <i class="far fa-user"></i>
                                                </div>
                                                <div class="wizard-step-label">
                                                    Akun
                                                </div>
                                            </div>
                                            <div id="box_perlengkapan" class="wizard-step">
                                                <div class="wizard-step-icon">
                                                    <i class="fas fa-box-open"></i>
                                                </div>
                                                <div class="wizard-step-label">
                                                    Perlengkapan
                                                </div>
                                            </div>
                                            <div id="box_aula" class="wizard-step">
                                                <div class="wizard-step-icon">
                                                    <i class="fas fa-server"></i>
                                                </div>
                                                <div class="wizard-step-label">
                                                    Aula
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="form_akun">
                                    <div class="wizard-content mt-2">
                                        <div class="wizard-pane">
                                            <div class="form-group row">
                                                <label class="col-md-12 text-md-left text-left mt-2">Jenis
                                                    Pengguna</label>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="selectgroup w-100">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="jenis" value="0"
                                                                class="selectgroup-input" checked="checked">
                                                            <span class="selectgroup-button">Participant</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="jenis" value="1"
                                                                class="selectgroup-input">
                                                            <span class="selectgroup-button">Host</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-12 text-md-left text-left">Nama Acara</label>
                                                <div class="col-lg-12 col-md-12">
                                                    <input type="text" id="acara" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-12 text-md-left text-left">Meeting ID</label>
                                                <div class="col-lg-12 col-md-12">
                                                    <input type="text" id="meeting_id" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-12 text-md-left text-left">Passcode</label>
                                                <div class="col-lg-12 col-md-12">
                                                    <input type="text" id="passcode" class="form-control">
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
                                            <div class="form-group row">
                                                <label class="col-md-12 text-md-left text-left mt-2">Tempat</label>
                                                <div class="col-lg-12 col-md-12">
                                                    <textarea class="form-control" id="tempat"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12"></div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="operator">
                                                        <label class="form-check-label" for="operator">Termasuk
                                                            Operator</label>
                                                    </div>
                                                </div>
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
                                                    <input type="number" maxlength="12" class="form-control"
                                                        id="nomor_pic">
                                                </div>
                                            </div>
                                            <small class="text-secondary">Berkas</small>
                                            <hr>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-12 text-md-left text-left">Surat Pengantar</label>
                                                <div class="col-lg-12 col-md-12">
                                                    <input type="file" id="berkas" class="form-control"
                                                        accept="application/pdf">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-md-12"></div>
                                                <div class="col-lg-12 col-md-12 text-right">
                                                    <button onclick="open_perlengkapan()"
                                                        class="btn btn-icon icon-right btn-primary">Selanjutnya
                                                        <i class="fas fa-arrow-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="form_perlengkapan" style="display: none;">
                                    <div class="wizard-content mt-2">
                                        <div class="wizard-pane">
                                            <div class="form-group row">
                                                <div class="col-md-12"></div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-check">
                                                        <input onclick="cek_perlengkapan()" type="checkbox"
                                                            class="form-check-input" id="myAlat">
                                                        <label class="form-check-label" for="alat">Termasuk
                                                            Perlengkapan Zoom</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-12 text-md-left text-left">Daftar
                                                    Perlengkapan</label>
                                                <div class="col-lg-12 col-md-12">
                                                    <select class="w-100 select2 form-control" disabled="true"
                                                        style="width:100%" id="myPerlengkapan" multiple="">

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="d-flex justify-content-between w-100">
                                                    <div class="col-6">
                                                        <button onclick="open_akun()"
                                                            class="btn btn-icon icon-left btn-primary"><i
                                                                class="fas fa-arrow-left"></i>Sebelumnya</button>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <button onclick="open_aula()"
                                                            class="btn btn-icon icon-right btn-primary">Selanjutnya
                                                            <i class="fas fa-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="form_aula" style="display: none;">
                                    <div class="wizard-content mt-2">
                                        <div class="wizard-pane">
                                            <div class="form-group row">
                                                <div class="col-md-12"></div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-check">
                                                        <input onclick="cek_aula()" type="checkbox"
                                                            class="form-check-input" id="myAula">
                                                        <label class="form-check-label" for="aula">Termasuk
                                                            Pinjam Aula</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-12 text-md-left text-left">Daftar
                                                    Aula</label>
                                                <div class="col-lg-12 col-md-12 w-100">
                                                    <select class="select2 form-control" disabled="true"
                                                        style="width:100%" id="aulaList">

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="d-flex justify-content-between w-100">
                                                    <div class="col-6">
                                                        <button onclick="back_perlengkapan()"
                                                            class="btn btn-icon icon-left btn-primary"><i
                                                                class="fas fa-arrow-left"></i>Sebelumnya</button>
                                                    </div>
                                                    <!-- <div class="col-6 text-right">
                                                        <button href="#" class="btn btn-warning">Buat Tiket</button>
                                                    </div> -->

                                                    <div class="d-flex justify-content-end mb-4">
                                                        <button id="btn_tambah" onclick="add_tiket()"
                                                            class="btn btn-warning">Buat
                                                            Tiket</button>
                                                        <button id="btn_tambah_loader" style="display: none;"
                                                            class="btn disabled btn-primary btn-progress">Buat
                                                            Tiket</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    get_aula();
    get_perlengkapan();
    set_datetime('tgl_mulai');
    set_datetime('tgl_akhir');
});
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
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/tiket/get_zoom",
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

            document.getElementById("aulaList").innerHTML = baris;
        },
    });
}

function get_perlengkapan() {
    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/peralatan/get_peralatan",
        type: "GET",
        dataType: "JSON",
        async: false,
        success: function(data) {
            var baris = "";
            for ($x = 0; $x < data.length; $x++) {
                if (data[$x].active == 1) {
                    baris += '<option value="' + data[$x].id_alat + '">' + data[$x].nama_alat + " - " +
                        data[$x].merk + " - " +
                        data[$x].nomor_seri + '</option>';
                }
            }
            document.getElementById("myPerlengkapan").innerHTML = baris;
        },
    });
}

function open_perlengkapan() {
    if (document.getElementById('acara').value == "") {
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
    } else if (document.getElementById('tempat').value == "") {
        document.getElementById('tempat').classList.add("is-invalid");
        document.getElementById("tempat").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Tempat Acara Kosong !'
        });
    } else if (document.getElementById('nama_pic').value == "") {
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
        remove_invalid();
        document.getElementById("form_akun").style.display = "none";
        document.getElementById("form_perlengkapan").style.display = "block";

        document.getElementById('box_akun').classList.remove("wizard-step-active");
        document.getElementById('box_perlengkapan').classList.add("wizard-step-active");
    }
}

function back_perlengkapan() {
    document.getElementById("form_aula").style.display = "none";
    document.getElementById("form_perlengkapan").style.display = "block";

    document.getElementById('box_aula').classList.remove("wizard-step-active");
    document.getElementById('box_perlengkapan').classList.add("wizard-step-active");
}

function open_akun() {
    document.getElementById("form_akun").style.display = "block";
    document.getElementById("form_perlengkapan").style.display = "none";

    document.getElementById('box_perlengkapan').classList.remove("wizard-step-active");
    document.getElementById('box_akun').classList.add("wizard-step-active");
}

function open_aula() {
    if (document.getElementById('myAlat').checked == true && $("#myPerlengkapan").val() == null) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Peralatan Kosong !'
        });
    } else {
        document.getElementById("form_perlengkapan").style.display = "none";
        document.getElementById("form_aula").style.display = "block";

        document.getElementById('box_perlengkapan').classList.remove("wizard-step-active");
        document.getElementById('box_aula').classList.add("wizard-step-active");
    }
}
</script>
<script>
function cek_perlengkapan() {
    if (document.getElementById('myAlat').checked) {
        document.getElementById("myPerlengkapan").disabled = false;
    } else {
        document.getElementById("myPerlengkapan").disabled = true;
        $("#myPerlengkapan").val("").trigger('change');
    }
}

function cek_aula() {
    // console.log($('#aulaList').text());
    if (document.getElementById('myAula').checked) {
        document.getElementById("aulaList").disabled = false;
    } else {
        document.getElementById("aulaList").disabled = true;
    }
}

function remove_invalid() {
    document.getElementById("acara").classList.remove("is-invalid");
    document.getElementById("meeting_id").classList.remove("is-invalid");
    document.getElementById("passcode").classList.remove("is-invalid");
    document.getElementById("tgl_mulai").classList.remove("is-invalid");
    document.getElementById("tgl_akhir").classList.remove("is-invalid");
    document.getElementById("tempat").classList.remove("is-invalid");
    document.getElementById("berkas").classList.remove("is-invalid");
    document.getElementById("operator").classList.remove("is-invalid");
    document.getElementById("nama_pic").classList.remove("is-invalid");
    document.getElementById("nomor_pic").classList.remove("is-invalid");

    document.getElementById("myPerlengkapan").classList.remove("is-invalid");

    document.getElementById("aulaList").classList.remove("is-invalid");
}

function reset() {
    document.getElementById("acara").value = "";
    document.getElementById("meeting_id").value = "";
    document.getElementById("passcode").value = "";
    document.getElementById("tgl_mulai").value = "";
    document.getElementById("tgl_akhir").value = "";
    document.getElementById("tempat").value = "";
    document.getElementById("berkas").value = "";
    document.getElementById("operator").value = "";
    $("#myPerlengkapan").val("").trigger('change');
    document.getElementById("aulaList").value = "";
    document.getElementById("nama_pic").value = "";
    document.getElementById("nomor_pic").value = "";
}

function add_tiket() {
    remove_invalid();
    if (document.getElementById('myAula').checked == true && $("#aulaList").val() == null) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Aula Kosong !'
        });
    } else {
        var formData = new FormData();
        formData.append('jenis', $("input[type='radio'][name='jenis']:checked").val());
        formData.append('acara', document.getElementById("acara").value);
        formData.append('meeting_id', document.getElementById("meeting_id").value);
        formData.append('passcode', document.getElementById("passcode").value);
        formData.append('tgl_mulai', document.getElementById("tgl_mulai").value);
        formData.append('tgl_akhir', document.getElementById("tgl_akhir").value);
        formData.append('nama_pic', document.getElementById("nama_pic").value);
        formData.append('nomor_pic', document.getElementById("nomor_pic").value);
        formData.append('berkas', document.getElementById("berkas").files[0]);

        if (document.getElementById('operator').checked) {
            formData.append('is_operator', "1");

        } else {
            formData.append('is_operator', "0");
        }

        if (document.getElementById('myAula').checked) {
            formData.append('is_aula', "1");
            formData.append('myAula', document.getElementById("aulaList").value);
            formData.append('kode_aula', randomString());
            formData.append('tempat', $('#aulaList').text());
        } else {
            formData.append('is_aula', "0");
            formData.append('tempat', document.getElementById("tempat").value);
        }

        if (document.getElementById('myAlat').checked) {
            formData.append('is_alat', "1");
            formData.append('myAlat', $("#myPerlengkapan").val());
            formData.append('kode_alat', randomString());
        } else {
            formData.append('is_alat', "0");
        }

        formData.append('kode_zoom', randomString());

        $.ajax({
            url: "<?= base_url() ?>/<?= session()->get('role') ?>/tiket/set_zoom",
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
                if (data.status == 200) {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Berhasil !',
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    reset();
                    document.getElementById("form_aula").style.display = "none";
                    document.getElementById('box_aula').classList.remove("wizard-step-active");

                    document.getElementById("form_akun").style.display = "block";
                    document.getElementById('box_akun').classList.add("wizard-step-active");

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
</script>
<?= $this->endSection() ?>