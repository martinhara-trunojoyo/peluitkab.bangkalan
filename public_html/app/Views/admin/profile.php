<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<style>
.centerVLign {
    vertical-align: middle !important;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.15/css/jquery.Jcrop.min.css"
    integrity="sha512-bbAsdySYlqC/kxg7Id5vEUVWy3nOfYKzVHCKDFgiT+GsHG/3MD7ywtJnJNSgw++HBc+w4j71MLiaeVm1XY5KDQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a
                        href="<?= base_url() ?>/<?= session()->get('role') ?>/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" id="foto_detail"
                                src="<?= base_url() ?>/public/assets/image/avatar/<?= $url ?>"
                                class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Username</div>
                                    <div class="profile-widget-item-value"><?= $nama ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Id Chat</div>
                                    <div class="profile-widget-item-value" id="id_chat_detail"><?= $id_chat ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Role</div>
                                    <div class="profile-widget-item-value"><?= $role ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description pb-0">
                            <div class="section-title">Id Chat</div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input id="id_chat" type="number" class="form-control" value="<?= $id_chat ?>"
                                        placeholder="" aria-label="">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" onclick="ubah_telegram()"
                                            type="button">Ubah</button>
                                    </div>
                                </div>
                            </div>
                            <div class="section-title">Foto Profile</div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="file" id="foto" class="form-control"
                                        accept="image/png, image/jpeg, image/jpg">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" onclick="ubah_foto()"
                                            type="button">Ubah</button>
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
<div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crop Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url() ?>/public/assets/image/avatar/<?= $url ?>" id="cropbox"
                    class="object-fit-contain" alt="Responsive image"
                    style="width: 100% !important; max-width: 100% !important; object-fit: contain !important;">

                <div id="btn">
                    <input type='button' id="crop" class="mt-4" value='CROP'>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.15/js/jquery.Jcrop.js"
    integrity="sha512-8SpT7ueuEcyaOfE5XTafnVw9V3Bqz6uFzR3xYQIxWOed2ic4t6bfpL/k2JciMdML3n0k4QRZEe3EBFw+/eVLQA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.15/js/jquery.Jcrop.min.js"
    integrity="sha512-KKpgpD20ujD3yJ5gIJqfesYNuisuxguvTMcIrSnqGQP767QNHjEP+2s1WONIQ7j6zkdzGD4zgBHUwYmro5vMAw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$(document).ready(function() {
    // document.getElementById("<?= $title ?>").classList.add("active");
});

function ubah_telegram() {
    document.getElementById("id_chat").classList.remove("is-invalid");
    if (document.getElementById('id_chat').value == "" || isEmptyOrSpaces(document.getElementById('id_chat').value)) {
        document.getElementById('id_chat').classList.add("is-invalid");
        document.getElementById("id_chat").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Id Chat Kosong !'
        });
    } else {
        var formData = new FormData();
        formData.append('id_ssuser', <?= session()->get('id_user') ?>);
        formData.append('id_chat', document.getElementById("id_chat").value);

        $.ajax({
            url: "<?= base_url() ?>/<?= session()->get('role') ?>/pengguna/update_id_chat",
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
                    document.getElementById("id_chat_detail").innerHTML = document.getElementById('id_chat')
                        .value;

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
}

function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
}

$('#foto').change(function() {
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var _URL = window.URL || window.webkitURL;
        img = new Image();
        var objectUrl = _URL.createObjectURL(input.files[0]);
        img.onload = function() {
            // alert(this.width + " " + this.height);
            if (this.width != this.height) {
                document.getElementById("foto").value = "";
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal...',
                    text: 'Dimensi foto harus 1:1 !'
                });
                // var reader = new FileReader();
                // reader.onload = function(e) {
                //     $('#cropbox').attr('src', e.target.result);
                //     $('#cropModal').modal('show');
                // }
                // reader.readAsDataURL(input.files[0]);
            } else {
                // alert("yes");
                // $('#foto_detail').attr('src', e.target.result);
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#foto_detail').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);

            }
            _URL.revokeObjectURL(objectUrl);
        };
        img.src = objectUrl;
    } else {
        document.getElementById("foto").value = "";
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Format Foto Harus PNG atau JPEG atau JPG !'
        });
    }
});

function ubah_foto() {
    document.getElementById("foto").classList.remove("is-invalid");
    if (document.getElementById('foto').value == "") {
        document.getElementById('foto').classList.add("is-invalid");
        document.getElementById("foto").focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Foto Kosong !'
        });
    } else {
        var formData = new FormData();
        formData.append('id_ssuser', <?= session()->get('id_user') ?>);
        formData.append('foto', document.getElementById("foto").files[0]);

        $.ajax({
            url: "<?= base_url() ?>/<?= session()->get('role') ?>/pengguna/update_foto",
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
                    document.getElementById("foto").value = "";
                    $('#foto_profile').attr('src', $("#foto_detail").attr("src"));
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
}
</script>
<script>
$(document).ready(function() {
    var size;
    $('#cropbox').Jcrop({
        aspectRatio: 1,
        onSelect: function(c) {
            size = {
                x: c.x,
                y: c.y,
                w: c.w,
                h: c.h
            };
            // $("#crop").css("visibility", "visible");
        }
    });

    $("#crop").click(function() {
        var img = $("#cropbox").attr('src');
        $("#cropped_img").show();
        $("#cropped_img").attr('src', 'image-crop.php?x=' + size.x + '&y=' + size.y + '&w=' + size.w +
            '&h=' + size.h + '&img=' + img);
    });
});
</script>
<?= $this->endSection() ?>