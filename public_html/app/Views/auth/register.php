<?= $this->extend('layout/login') ?>
<?= $this->section('content') ?>
</style>
<!-- PIN -->
<style>
.pin-code {
    padding: 0;
    margin: 0 auto;
    display: flex;
    justify-content: center;

}

.pin-code input {
    border: none;
    text-align: center;
    width: 48px;
    height: 48px;
    font-size: 36px;
    background-color: #F3F3F3;
    margin-right: 5px;
}



.pin-code input:focus {
    border: 1px solid #573D8B;
    outline: none;
}


.pin-code input::-webkit-outer-spin-button,
.pin-code input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
<div class="col-12 ">
    <!-- col-sm-10 offset-sm-1 col-md-10 offset-md-2 col-lg-10 offset-lg-2 col-xl-10 offset-xl-2 -->
    <div class="login-brand">
        <a href="<?= base_url() ?>">
            <img src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo-1.png" alt="logo" width="100"
                class="shadow-light rounded-circle">
        </a>
    </div>

    <div class="card card-dark">
        <div class="card-header">
            <h4>Register Akun Magang</h4>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="wizard-steps">
                        <div id="box_user" class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <div class="wizard-step-label">
                                Identitas Diri
                            </div>
                        </div>
                        <div id="box_pembimbing" class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-landmark"></i>
                            </div>
                            <div class="wizard-step-label">
                                Identitas Akademik
                            </div>
                        </div>
                        <div id="box_berkas" class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="far fa-file-pdf"></i>
                            </div>
                            <div class="wizard-step-label">
                                Berkas
                            </div>
                        </div>
                        <div id="box_otp" class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-key"></i>
                            </div>
                            <div class="wizard-step-label">
                                Kode OTP
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="form_user">
                <div class="wizard-content mt-2">
                    <div class="wizard-pane">
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="nama">Nama</label>
                                <input id="nama" type="text" class="form-control" name="nama" autofocus>
                            </div>
                            <div class="form-group col-sm">
                                <label for="nik">NIK</label>
                                <input id="nik" type="number" onkeyup="cek_number('nik', 16)" class="form-control"
                                    name="nik">
                            </div>
                            <div class="form-group col-sm">
                                <label for="jk">Jenis Kelamin</label>
                                <select id="jk" class="form-control">
                                    <option value='0'>Perempuan</option>
                                    <option value='1'>Laki - Laki</option>
                                </select>
                            </div>
                            <div class="form-group col-sm">
                                <label for="wa">No Whatsapp</label>
                                <input id="wa" type="number" onkeyup="cek_number('wa', 12)" class="form-control"
                                    name="wa">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12"></div>
                            <div class="col-lg-12 col-md-12 text-right">
                                <button onclick="open_pembimbing()"
                                    class="btn btn-icon icon-right btn-primary">Selanjutnya
                                    <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <div id="form_pembimbing" style="display: none;">
                <div class="wizard-content mt-2">
                    <div class="wizard-pane">

                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="pekerjaan">Pekerjaan</label>
                                <select id="pekerjaan" class="form-control">
                                    <option value='0'>Siswa</option>
                                    <option value='1'>Mahasiswa</option>
                                </select>
                            </div>
                            <div class="form-group col-sm">
                                <label for="nim">NISN / NIM</label>
                                <input id="nim" type="number" onkeyup="cek_number('nim', 14)" class="form-control"
                                    name="nim">
                                <small class="text-danger">*Digunakan sebagai username saat login</small>
                            </div>
                            <div class="form-group col-sm">
                                <label for="jurusan">Jurusan</label>
                                <input id="jurusan" onkeyup="cek_alphanumeric('jurusan')" type="text"
                                    class="form-control" name="jurusan">
                            </div>
                            <div class="form-group col-sm">
                                <label for="univ">Nama Universitas / Sekolah</label>
                                <input id="univ" onkeyup="cek_alphanumeric('univ')" type="text" class="form-control"
                                    name="univ">
                                <small class="text-danger">*Universitas Trunojoyo Madura, SMKN 02 Bangkalan, dll</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="d-flex justify-content-between w-100">
                                <div class="col-6">
                                    <button onclick="back_pembimbing()" class="btn btn-icon icon-left btn-primary"><i
                                            class="fas fa-arrow-left"></i>Sebelumnya</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button onclick="open_berkas()"
                                        class="btn btn-icon icon-right btn-primary">Selanjutnya
                                        <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="form_berkas" style="display: none;">
                <div class="wizard-content mt-2">
                    <div class="wizard-pane">

                        <div class="row">
                            <div class="form-group col-sm">
                                <label>Pas Foto</label>
                                <input id="foto" type="file" class="form-control" accept="image/jpg, image/jpeg">
                            </div>
                            <div class="form-group col-sm">
                                <label>KTP / NISN</label>
                                <input id="ktp" type="file" class="form-control" accept="image/jpg, image/jpeg">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="d-flex justify-content-between w-100">
                                <div class="col-6">
                                    <button onclick="back_berkas()" class="btn btn-icon icon-left btn-primary"><i
                                            class="fas fa-arrow-left"></i>Sebelumnya</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button onclick="open_otp()" class="btn btn-icon icon-right btn-primary">Selanjutnya
                                        <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="form_otp" style="display: none;">
                <div class="wizard-content mt-2">
                    <div class="wizard-pane">
                        <div class="d-flex justify-content-center">
                            <div id="div_nik" class="col-6">
                                <form>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label>Id Chat Telegram</label>
                                            <div class="float-right">
                                                <a href="#" class="text-small">
                                                    Apa itu Id Chat ?
                                                </a>
                                            </div>
                                        </div>
                                        <input id="id_chat" type="number" class="form-control" name="username"
                                            tabindex="1" required autofocus>
                                    </div>
                                    <div class="d-flex justify-content-center mb-3 mt-4">
                                        <button type="button" onclick="send_otp()" class="btn rounded-pill btn-danger"
                                            id="btn_otp">Kirim Kode OTP</button>
                                        <button id="loader_otp" style="display: none;"
                                            class="btn disabled  rounded-pill btn-danger btn-progress">Loading</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="div_login" class="mb-3 mt-4" style="display: none;">
                            <form>
                                <center>
                                    <label for="otp" class="form-label">Masukkan Kode OTP</label>
                                </center>
                                <div class="pin-code">
                                    <input type="text" id="pin_1" maxlength="1" autofocus>
                                    <input type="text" id="pin_2" maxlength="1">
                                    <input type="text" id="pin_3" maxlength="1">
                                    <input type="text" id="pin_4" maxlength="1">
                                    <input type="text" id="pin_5" maxlength="1">
                                    <input type="text" id="pin_6" maxlength="1">
                                </div>

                                <center>
                                    <div id="timer" class="mb-3 mt-4">
                                        <div id="countdown"></div>
                                    </div>
                                </center>

                                <div class="d-flex justify-content-center mb-3 mt-4">
                                    <button id="btn_login" class="btn btn-primary d-grid" type="button"
                                        onclick="ssregister()">Daftar</button>
                                    <button id="btn_login_loader" style="display: none;"
                                        class="btn disabled btn-primary btn-progress">Tambah</button>
                                </div>
                            </form>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="d-flex justify-content-between w-100">
                                <div class="col-6" id="daftar_disable">
                                    <button onclick="back_otp()" class="btn btn-icon icon-left btn-primary"><i
                                            class="fas fa-arrow-left"></i>Sebelumnya</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 mb-5 text-white text-center">
        Sudah punya akun ? <a class="text-secondary" href="<?= base_url() ?>/sslogin">Login</a>
    </div>
</div>
<script>
function open_pembimbing() {
    if (isEmptyOrSpaces(document.getElementById("nama").value)) {
        document.getElementById("nama").focus();
        Swal.fire(
            'Gagal',
            "Form Nama Kosong !",
            'error'
        );
    } else if (/[^a-zA-Z0-9\ .,]/.test(document.getElementById("nama").value)) {
        document.getElementById("nama").focus();
        Swal.fire(
            'Gagal',
            "Form Nama tidak sesuai format.",
            'error'
        );
    } else if (document.getElementById("nik").value.length == 0) {
        document.getElementById("nik").focus();
        Swal.fire(
            'Gagal',
            "Form NIK Kosong !",
            'error'
        );
    } else if (/^[0-9]+$/.test(document.getElementById("nik").value) == false) {
        document.getElementById("nik").focus();
        Swal.fire(
            'Gagal',
            "Form NIK tidak sesuai format.",
            'error'
        );
    } else if (document.getElementById("nik").value.length < 16) {
        document.getElementById("nik").focus();
        Swal.fire(
            'Gagal',
            "Panjang NIK kurang dari 16 Digit !",
            'error'
        );
    } else if (document.getElementById("nik").value.length > 16) {
        document.getElementById("nik").focus();
        Swal.fire(
            'Gagal',
            "Panjang NIK lebih dari 16 Digit !",
            'error'
        );
    } else if (document.getElementById("wa").value.length == 0) {
        document.getElementById("wa").focus();
        Swal.fire(
            'Gagal',
            "Form Nomor Whatsapp Kosong !",
            'error'
        );
    } else if (/^[0-9]+$/.test(document.getElementById("wa").value) == false) {
        Swal.fire(
            'Gagal',
            "Form Nomor Whatsapp tidak sesuai format.",
            'error'
        );
    } else if (document.getElementById("wa").value.length < 10) {
        document.getElementById("wa").focus();
        Swal.fire(
            'Gagal',
            "Panjang Nomor Whatsapp Salah !",
            'error'
        );
    } else if (document.getElementById("wa").value.length > 13) {
        document.getElementById("wa").focus();
        Swal.fire(
            'Gagal',
            "Panjang Nomor Whatsapp Salah !",
            'error'
        );
    } else {
        document.getElementById("form_user").style.display = "none";
        document.getElementById("form_pembimbing").style.display = "block";

        document.getElementById('box_user').classList.remove("wizard-step-active");
        document.getElementById('box_pembimbing').classList.add("wizard-step-active");
    }

}

function back_pembimbing() {
    document.getElementById("form_pembimbing").style.display = "none";
    document.getElementById("form_user").style.display = "block";

    document.getElementById('box_pembimbing').classList.remove("wizard-step-active");
    document.getElementById('box_user').classList.add("wizard-step-active");
}

function open_instansi() {
    document.getElementById("form_pembimbing").style.display = "none";
    document.getElementById("form_instansi").style.display = "block";

    document.getElementById('box_pembimbing').classList.remove("wizard-step-active");
    document.getElementById('box_instansi').classList.add("wizard-step-active");
}

function back_instansi() {
    document.getElementById("form_instansi").style.display = "none";
    document.getElementById("form_pembimbing").style.display = "block";

    document.getElementById('box_instansi').classList.remove("wizard-step-active");
    document.getElementById('box_pembimbing').classList.add("wizard-step-active");
}

function open_berkas() {
    if (document.getElementById("nim").value.length == 0) {
        document.getElementById("nim").focus();
        Swal.fire(
            'Gagal',
            "Form NIM Kosong !",
            'error'
        );
    } else if (/^[0-9]+$/.test(document.getElementById("nim").value) == false) {
        document.getElementById("nim").focus();
        Swal.fire(
            'Gagal',
            "Form NIM tidak sesuai format.",
            'error'
        );
    } else if (document.getElementById("nim").value.length < 10) {
        document.getElementById("nim").focus();
        Swal.fire(
            'Gagal',
            "Panjang NIM Salah !",
            'error'
        );
    } else if (isEmptyOrSpaces(document.getElementById("jurusan").value)) {
        document.getElementById("jurusan").focus();
        Swal.fire(
            'Gagal',
            "Form Nama Jurusan Kosong !",
            'error'
        );
    } else if (/[^a-zA-Z0-9\ ]/.test(document.getElementById("jurusan").value)) {
        document.getElementById("jurusan").focus();
        Swal.fire(
            'Gagal',
            "Form Nama Jurusan tidak sesuai format.",
            'error'
        );
    } else if (isEmptyOrSpaces(document.getElementById("univ").value)) {
        document.getElementById("univ").focus();
        Swal.fire(
            'Gagal',
            "Form Nama Universitas / Sekolah Kosong !",
            'error'
        );
    } else if (/[^a-zA-Z0-9\ ]/.test(document.getElementById("univ").value)) {
        document.getElementById("univ").focus();
        Swal.fire(
            'Gagal',
            "Form Nama Universitas / Sekolah tidak sesuai format.",
            'error'
        );
    } else {
        document.getElementById("form_pembimbing").style.display = "none";
        document.getElementById("form_berkas").style.display = "block";

        document.getElementById('box_pembimbing').classList.remove("wizard-step-active");
        document.getElementById('box_berkas').classList.add("wizard-step-active");

    }
}

function back_berkas() {
    document.getElementById("form_berkas").style.display = "none";
    document.getElementById("form_pembimbing").style.display = "block";

    document.getElementById('box_berkas').classList.remove("wizard-step-active");
    document.getElementById('box_pembimbing').classList.add("wizard-step-active");
}

function open_otp() {
    Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Data Registrasi tidak akan dapat dirubah, silahkan pastikan data sesuai sebelum mengakhiri proses register.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Data saya sesuai",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            if (document.getElementById("foto").value == "") {
                document.getElementById("foto").focus();
                Swal.fire(
                    'Gagal',
                    "Form Foto Kosong !",
                    'error'
                );
            } else if (validasi_berkas("foto") == false) {
                document.getElementById("foto").focus();
                Swal.fire(
                    'Gagal',
                    "Format Foto Salah ! Harus JPG dan JPEG !",
                    'error'
                );
            } else if (document.getElementById("ktp").value == "") {
                document.getElementById("ktp").focus();
                Swal.fire(
                    'Gagal',
                    "Form KTP Kosong !",
                    'error'
                );
            } else if (validasi_berkas("ktp") == false) {
                document.getElementById("ktp").focus();
                Swal.fire(
                    'Gagal',
                    "Format KTP Salah ! Harus JPG dan JPEG !",
                    'error'
                );
            } else {
                document.getElementById("form_berkas").style.display = "none";
                document.getElementById("form_otp").style.display = "block";

                document.getElementById('box_berkas').classList.remove("wizard-step-active");
                document.getElementById('box_otp').classList.add("wizard-step-active");
            }
        }
    })
}

function back_otp() {
    document.getElementById("form_otp").style.display = "none";
    document.getElementById("form_berkas").style.display = "block";

    document.getElementById('box_otp').classList.remove("wizard-step-active");
    document.getElementById('box_berkas').classList.add("wizard-step-active");
}

function send_otp() {
    if (document.getElementById("id_chat").value == "") {
        document.getElementById("id_chat").focus();
        Swal.fire(
            'Gagal',
            "Form Id Chat Kosong !",
            'error'
        );
    } else if (document.getElementById("id_chat").value.match(/^[0-9]+$/) == null) {
        document.getElementById("id_chat").focus();
        Swal.fire(
            'Gagal',
            "Format Id Chat Salah !",
            'error'
        );
    } else {
        // document.getElementById("div_nik").style.display = "none";
        // document.getElementById("div_login").style.display = "block";
        otp = randomString();

        var formData = new FormData();
        formData.append('id_chat', document.getElementById("id_chat").value);
        formData.append('otp', otp);

        $.ajax({
            url: "<?= base_url() ?>/sslogin/send_otp",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            async: true,
            dataType: "JSON",
            beforeSend: function() {
                // Loader
                document.getElementById("btn_otp").style.display = "none";
                document.getElementById("btn_otp").disabled = true;
                document.getElementById("loader_otp").style.display = "block";

            },
            success: function(data) {
                // console.log(data);
                // console.log(otp);
                if (data.status == 200) {
                    document.getElementById("div_login").style.display = "block";
                    document.getElementById("div_nik").style.display = "none";

                    // 5 minutes in seconds
                    startTimer(3 * 60);
                } else {
                    Swal.fire(
                        "Gagal",
                        data.hasil,
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
                // document.getElementById("btn_otp").style.display = "block";
                // document.getElementById("btn_otp").disabled = false;
                // document.getElementById("loader_otp").style.display = "none";
            },
        });
    }

}

function ssregister() {
    var pin = document.getElementById("pin_1").value + document.getElementById("pin_2").value + document
        .getElementById(
            "pin_3").value + document.getElementById("pin_4").value + document.getElementById("pin_5").value +
        document
        .getElementById("pin_6").value;

    if (document.getElementById("pin_1").value == "" || document.getElementById("pin_2").value == "" || document
        .getElementById("pin_3").value == "" || document.getElementById("pin_4").value == "" || document.getElementById(
            "pin_5").value == "" || document.getElementById("pin_6").value == "") {
        Swal.fire(
            'Gagal',
            "OTP tidak boleh kosong.",
            'error'
        );
    } else if (pin != otp) {
        Swal.fire(
            'Gagal',
            "OTP Salah !",
            'error'
        );
    } else {
        var formData = new FormData();
        formData.append('nama', document.getElementById("nama").value);
        formData.append('nik', document.getElementById("nik").value);
        formData.append('jk', document.getElementById("jk").value);
        formData.append('wa', document.getElementById("wa").value);

        formData.append('pekerjaan', document.getElementById("pekerjaan").value);
        formData.append('nim', document.getElementById("nim").value);
        formData.append('jurusan', document.getElementById("jurusan").value);
        formData.append('univ', document.getElementById("univ").value);

        formData.append('id_chat', document.getElementById("id_chat").value);

        formData.append('foto', document.getElementById("foto").files[0]);
        formData.append('ktp', document.getElementById("ktp").files[0]);

        $.ajax({
            url: "<?= base_url() ?>/sslogin/register",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            async: true,
            dataType: "JSON",
            beforeSend: function() {
                // Loader
                document.getElementById("btn_login").style.display = "none";
                document.getElementById("btn_login").disabled = true;
                document.getElementById("btn_login_loader").style.display = "block";

                document.getElementById("daftar_disable").innerHTML = "";
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
                    window.open("<?= base_url() ?>/ssregister", "_self");
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
                document.getElementById("btn_login").style.display = "block";
                document.getElementById("btn_login").disabled = false;
                document.getElementById("btn_login_loader").style.display = "none";
            },
        });
    }

}

function cek_alphanumeric($id) {
    var text = document.getElementById($id).value;
    if (text.match(/^[a-zA-Z0-9 .,]+$/) !== null) {
        document.getElementById($id).value = text.toUpperCase();
    } else {
        var my_string = text.toUpperCase().split("");
        var new_text = '';
        for (let i = 0; i < my_string.length - 1; i++) {
            new_text += my_string[i];
        }
        document.getElementById($id).value = new_text;
    }
}

function cek_number($id, $length) {
    var text = document.getElementById($id).value;
    var my_string = text.toString().split("");
    if (my_string.length > $length) {
        var new_text = '';
        for (let i = 0; i < $length; i++) {
            new_text += my_string[i];
        }
        document.getElementById($id).value = new_text;
    }
}

function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
}

function validasi_berkas($id) {
    var fi = document.getElementById($id);
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
            if ((ekstensi.includes('jpg') || ekstensi.includes('jpeg')) && size < 2) {
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

function randomString() {
    var length = 6;
    // var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var result = '';
    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
    return result;
}
</script>

<!-- TIMER -->
<script>
let timeInSecs;
let ticker;
var otp = "";

function startTimer(secs) {
    timeInSecs = parseInt(secs);
    ticker = setInterval("tick()", 1000);
}

function tick() {
    let secs = timeInSecs;
    let habis = false;
    if (secs > 0) {
        timeInSecs--;
    } else {
        clearInterval(ticker);
        habis = true;
        // startTimer(5 * 60); // 5 minutes in seconds
    }

    let mins = Math.floor(secs / 60);
    secs %= 60;

    let result =
        (mins < 10 ? "0" : "") + mins + ":" + (secs < 10 ? "0" : "") + secs;

    document.getElementById("countdown").innerHTML = result;

    if (habis == true) {
        clearInterval(ticker);
        var link = '<a onclick="send_otp()"><span>Kirim Ulang OTP</span></a>';
        document.getElementById("countdown").innerHTML = link;
    }
}
</script>


<!-- PIN -->
<script>
var pinContainer = document.querySelector(".pin-code");

pinContainer.addEventListener('keyup', function(event) {
    var target = event.srcElement;

    var maxLength = parseInt(target.attributes["maxlength"].value, 10);
    var myLength = target.value.length;

    if (myLength >= maxLength) {
        var next = target;
        while (next = next.nextElementSibling) {
            if (next == null) break;
            if (next.tagName.toLowerCase() == "input") {
                next.focus();
                break;
            }
        }
    }

    if (myLength === 0) {
        var next = target;
        while (next = next.previousElementSibling) {
            if (next == null) break;
            if (next.tagName.toLowerCase() == "input") {
                next.focus();
                break;
            }
        }
    }
}, false);

pinContainer.addEventListener('keydown', function(event) {
    var target = event.srcElement;
    target.value = "";
}, false);
</script>

<?= $this->endSection() ?>