<?= $this->extend('layout/login') ?>
<?= $this->section('content') ?>
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

<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <div class="login-brand">
        <a href="<?= base_url() ?>">
            <img src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo-1.png" alt="logo" width="100"
                class="shadow-light rounded-circle">
        </a>
    </div>

    <div class="card card-dark">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <div id="div_nik">
                <form>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required
                            autofocus>
                        <div class="invalid-feedback">
                            Username Kosong !
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <button onclick="open_otp()" class="btn btn-danger btn-lg btn-block" tabindex="4">
                            Kirim Kode OTP
                        </button>
                    </div> -->
                    <div class="d-flex justify-content-center mb-3 mt-4">
                        <button type="button" onclick="open_otp()" class="btn rounded-pill btn-danger"
                            id="btn_otp">Kirim Kode OTP</button>
                        <button id="loader_otp" style="display: none;"
                            class="btn disabled  rounded-pill btn-danger btn-progress">Loading</button>
                    </div>
                    <div class="mt-5 mb-3 text-center">
                        <a data-target="#exampleModalLong" data-toggle="modal" class="text-secondary text-info "
                            href="#exampleModalLong">Apa itu
                            Id Chat ?</a>
                    </div>
                </form>
            </div>
            <div id="div_login" style="display:none;" class="mb-3 mt-4">
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
                            onclick="sslogin()">Login</button>
                        <button id="btn_login_loader" style="display: none;"
                            class="btn disabled btn-primary btn-progress">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="mt-5 mb-5 text-white text-center">
        Belum punya akun ? <a class="text-secondary" href="<?= base_url() ?>/ssregister">Register</a>
    </div> -->
</div>

<script>
$(document).ready(function() {
    // $('#exampleModalLong').modal("show");
});


function open_otp() {
    if (document.getElementById("username").value == "") {
        Swal.fire(
            'Gagal',
            "Username tidak boleh kosong.",
            'error'
        );
    } else if (isEmptyOrSpaces(document.getElementById("username").value)) {
        Swal.fire(
            'Gagal',
            "Username Kosong !",
            'error'
        );
    } else if (/[^a-zA-Z0-9\.@_]/.test(document.getElementById("username").value)) {
        Swal.fire(
            'Gagal',
            "Username tidak sesuai format.",
            'error'
        );
    } else {

        var otp = randomString();

        var formData = new FormData();
        formData.append('username', document.getElementById("username").value);
        formData.append('otp', otp);

        $.ajax({
            url: "<?= base_url() ?>/sslogin/get_username",
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
                        data.message,
                        'error'
                    );
                    // Loader
                    document.getElementById("btn_otp").style.display = "block";
                    document.getElementById("btn_otp").disabled = false;
                    document.getElementById("loader_otp").style.display = "none";
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire(
                    'Gagal',
                    errorThrown,
                    'error'
                );
                // Loader
                document.getElementById("btn_otp").style.display = "block";
                document.getElementById("btn_otp").disabled = false;
                document.getElementById("loader_otp").style.display = "none";
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

function sslogin() {
    if (document.getElementById("pin_1").value == "" || document.getElementById("pin_2").value == "" || document
        .getElementById("pin_3").value == "" || document.getElementById("pin_4").value == "" || document.getElementById(
            "pin_5").value == "" || document.getElementById("pin_6").value == "") {
        Swal.fire(
            'Gagal',
            "OTP tidak boleh kosong.",
            'error'
        );
    } else {
        var pin = document.getElementById("pin_1").value + document.getElementById("pin_2").value + document
            .getElementById(
                "pin_3").value + document.getElementById("pin_4").value + document.getElementById("pin_5").value +
            document
            .getElementById("pin_6").value;

        var formData = new FormData();
        formData.append('username', document.getElementById("username").value);
        formData.append('pin', pin);

        // console.log(pin);
        $.ajax({
            url: "<?= base_url() ?>/sslogin/get_login",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function() {
                // Loader
                document.getElementById("btn_login").style.display = "none";
                document.getElementById("btn_login").disabled = true;
                document.getElementById("btn_login_loader").style.display = "block";

            },
            success: function(data) {
                // console.log(data);
                if (data.status == 200) {
                    window.open("<?= base_url() ?>/admin/dashboard", "_self");
                } else {
                    Swal.fire(
                        "Gagal",
                        data.message,
                        'error'
                    );
                    // Loader
                    document.getElementById("btn_login").style.display = "block";
                    document.getElementById("btn_login").disabled = false;
                    document.getElementById("btn_login_loader").style.display = "none";
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire(
                    'Gagal',
                    errorThrown,
                    'error'
                );
                // Loader
                document.getElementById("btn_login").style.display = "block";
                document.getElementById("btn_login").disabled = false;
                document.getElementById("btn_login_loader").style.display = "none";
            },
            complete: function() {

                // // Loader
                // document.getElementById("btn_login").style.display = "block";
                // document.getElementById("btn_login").disabled = false;
                // document.getElementById("btn_login_loader").style.display = "none";
            },
        });
    }

}

function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
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
        var link = '<a onclick="open_otp()"><span>Kirim Ulang OTP</span></a>';
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