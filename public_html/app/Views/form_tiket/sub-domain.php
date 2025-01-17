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
                <div class="breadcrumb-item">Sub Domain</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4 d-flex justify-content-center">
                <div class="col-lg-6 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Form Buat Tiket</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row align-items-center">
                                <label class="col-md-12 text-md-left text-left">Nama Subdomain</label>
                                <div class="col-lg-12 col-md-12">
                                    <input type="text" id="subdomain" class="form-control">
                                    <small class="text-info">Contoh : tnde.bangkalankab.go.id</small>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-12 text-md-left text-left">IP Publik / Redirect URL</label>
                                <div class="col-lg-12 col-md-12">
                                    <input type="text" id="ip" class="form-control">
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
                                    <input type="number" maxlength="12" class="form-control" id="no_pic">
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
        </div>
    </section>
</div>
<script src='<?= base_url() ?>/public/assets/kode_tiket.js'></script>
<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {

});

function remove_invalid() {
    document.getElementById("subdomain").classList.remove("is-invalid");
    document.getElementById("ip").classList.remove("is-invalid");
    document.getElementById("nama_pic").classList.remove("is-invalid");
    document.getElementById("no_pic").classList.remove("is-invalid");
    document.getElementById("berkas").classList.remove("is-invalid");
}

function reset() {
    document.getElementById("subdomain").value = "";
    document.getElementById("ip").value = "";
    document.getElementById("nama_pic").value = "";
    document.getElementById("no_pic").value = "";
    document.getElementById("berkas").value = "";
}

function add_tiket() {
    remove_invalid();
    if (document.getElementById('subdomain').value == "") {
        document.getElementById('subdomain').classList.add("is-invalid");
        document.getElementById("subdomain").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nama Subdomain Kosong !'
        });
    } else if (document.getElementById('ip').value == "") {
        document.getElementById('ip').classList.add("is-invalid");
        document.getElementById("ip").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form IP Publik / Redirect URL  Kosong !'
        });
    } else if (document.getElementById('nama_pic').value == "") {
        document.getElementById('nama_pic').classList.add("is-invalid");
        document.getElementById("nama_pic").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nama PIC Kosong !'
        });
    } else if (document.getElementById('no_pic').value == "") {
        document.getElementById('no_pic').classList.add("is-invalid");
        document.getElementById("no_pic").focus();
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

        var formData = new FormData();
        formData.append('subdomain', document.getElementById("subdomain").value);
        formData.append('ip', document.getElementById("ip").value);
        formData.append('nama_pic', document.getElementById("nama_pic").value);
        formData.append('nomor_pic', document.getElementById("no_pic").value);
        formData.append('berkas', document.getElementById("berkas").files[0]);
        formData.append('kode', randomString());

        $.ajax({
            url: "<?= base_url() ?>/<?= session()->get('role') ?>/tiket/set_subdomain",
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
</script>
<?= $this->endSection() ?>