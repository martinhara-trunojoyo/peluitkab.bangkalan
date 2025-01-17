<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<script src="https://unpkg.com/pdf-lib@1.4.0"></script>
<script src="https://unpkg.com/downloadjs@1.4.7"></script>
<script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Tiket</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a
                        href="<?= base_url() ?>/<?= session()->get('role') ?>/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/<?= session()->get('role') ?>/magang">Magang</a>
                </div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/<?= session()->get('role') ?>/magang">Daftar
                        Tiket</a></div>
                <div class="breadcrumb-item">Detail Tiket Magang</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col-lg-6 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Detail Tiket Magang</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4"
                                                role="tab" aria-controls="home" aria-selected="true">Tiket</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4"
                                                role="tab" aria-controls="profile" aria-selected="false">Detail
                                                Pengguna</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#pembimbing4"
                                                role="tab" aria-controls="profile" aria-selected="false">Detail
                                                Pembimbing</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="file-tab4" data-toggle="tab" href="#file4"
                                                role="tab" aria-controls="file" aria-selected="false">Berkas Upload</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="file-tab4" data-toggle="tab" href="#tugas4"
                                                role="tab" aria-controls="file" aria-selected="false">Penempatan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="file-tab4" data-toggle="tab" href="#nilai4"
                                                role="tab" aria-controls="file" aria-selected="false">Penilaian</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="file-tab4" data-toggle="tab" href="#sertifikat4"
                                                role="tab" aria-controls="file" aria-selected="false">Sertifikat</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4"
                                                role="tab" aria-controls="contact" aria-selected="false">Catatan</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-8">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                        <!-- Tiket -->
                                        <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                            aria-labelledby="home-tab4">
                                            <div class="form-group">
                                                <label>Kode Tiket</label>
                                                <input disabled="true" type="text" value="<?= $kode_tiket ?>"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Pengajuan</label>
                                                <input disabled="true" type="datetime-local" value="<?= $tgl_input ?>"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input id="status" disabled="true" type="text" class="form-control">
                                            </div>
                                            <div class="card-footer text-right" id="confirm_btn">

                                            </div>
                                        </div>
                                        <!-- Identitas -->
                                        <div class="tab-pane fade" id="profile4" role="tabpanel"
                                            aria-labelledby="profile-tab4">
                                            <div class="form-group">
                                                <label for="nik">Nama</label>
                                                <input type="text" class="form-control" disabled="true"
                                                    value="<?= $nama ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">Nomor Induk</label>
                                                <input type="text" class="form-control" disabled="true"
                                                    value="<?= $nomor_induk ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">Pekerjaan</label>
                                                <select id="inputState" class="form-control" disabled="true">
                                                    <option value=0 <?=$jenis == 0 ? ' selected="selected"' : '';?>>
                                                        Siswa</option>
                                                    <option value=1 <?=$jenis == 1 ? ' selected="selected"' : '';?>>
                                                        Mahasiswa</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">Gender</label>
                                                <select id="inputState" class="form-control" disabled="true">
                                                    <option value=0 <?=$gender == 0 ? ' selected="selected"' : '';?>>
                                                        Perempuan</option>
                                                    <option value=1 <?=$gender == 1 ? ' selected="selected"' : '';?>>
                                                        Laki - laki</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">No Whatsapp</label>
                                                <input type="text" class="form-control" disabled="true"
                                                    value="<?= $wa ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="nik">Nama Universitas / Sekolah</label>
                                                <input type="text" class="form-control" disabled="true"
                                                    value="<?= $civitas ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="nik">Jurusan</label>
                                                <input type="text" class="form-control" disabled="true"
                                                    value="<?= $jurusan ?>">
                                            </div>
                                        </div>
                                        <!-- Pembimbing -->
                                        <div class="tab-pane fade" id="pembimbing4" role="tabpanel"
                                            aria-labelledby="pembimbing-tab4">
                                            <div class="form-group">
                                                <label for="nik">Nama Dosen / Guru</label>
                                                <input type="text" class="form-control" disabled="true"
                                                    value="<?= $nama_pic ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">No Whatsapp</label>
                                                <input type="text" class="form-control" disabled="true"
                                                    value="<?= $no_pic ?>">
                                            </div>
                                        </div>
                                        <!-- Penempatan -->
                                        <div class="tab-pane fade" id="tugas4" role="tabpanel"
                                            aria-labelledby="tugas-tab4">
                                            <div id="lock_penempatan" class="mb-4">

                                            </div>
                                            <div class="form-group">
                                                <label for="nik">Tujuan Instansi</label>
                                                <select id="opd" class="form-control" disabled="true">

                                                </select>
                                            </div>
                                            <!-- <div id="hide_select">
                                                <div class="form-group">
                                                    <label for="nik">Sub Bagian</label>
                                                    <input type="text" class="form-control" disabled="true">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nik">Nama Pembimbing Lapangan</label>
                                                    <input type="text" class="form-control" disabled="true">
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label for="nik">Sub Bagian</label>
                                                <select onchange="get_pembimbing()" id="mySub" class="form-control">

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">Nama Pembimbing Lapangan</label>
                                                <select id="pembimbing_lapangan" class="form-control">

                                                </select>
                                            </div>


                                            <small>Penugasan</small>
                                            <hr>
                                            <div class="form-group">
                                                <label for="nik">Tugas Magang</label>
                                                <input id="nama_tugas" type="text" class="form-control"
                                                    value="<?= $nama_project ?>">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Tanggal Mulai Magang</label>
                                                    <input disabled="true" type="date" value="<?= $tgl_awal ?>"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Tanggal Akhir Magang</label>
                                                    <input disabled="true" type="date" value="<?= $tgl_akhir ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end" id="div_simpan_penempatan">

                                            </div>
                                        </div>
                                        <!-- Penilaian -->
                                        <div class="tab-pane fade" id="nilai4" role="tabpanel"
                                            aria-labelledby="nilai-tab4">
                                            <div id="lock_nilai" class="mb-4">

                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nilai_performance">Performance (Unjuk Kerja)</label>
                                                    <input id="nilai_performance" min="0"
                                                        oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                                                        type="number" class="form-control" name="nilai_performance"
                                                        value="<?= $nilai_performance ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nilai_sikap">Attitude / Sikap</label>
                                                    <input id="nilai_sikap" min="0"
                                                        oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                                                        type="number" class="form-control" name="nilai_sikap"
                                                        value="<?= $nilai_sikap ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nilai_kerjasama">Kerjasama dalam tim</label>
                                                    <input id="nilai_kerjasama" min="0"
                                                        oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                                                        type="number" class="form-control" name="nilai_kerjasama"
                                                        value="<?= $nilai_kerjasama ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nilai_disiplin">Kedisiplinan</label>
                                                    <input id="nilai_disiplin" min="0"
                                                        oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                                                        type="number" class="form-control" name="nilai_disiplin"
                                                        value="<?= $nilai_disiplin ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nilai_komunikasi">Kemampuan dalam komunikasi</label>
                                                    <input id="nilai_komunikasi" min="0"
                                                        oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                                                        type="number" class="form-control" name="nilai_komunikasi"
                                                        value="<?= $nilai_komunikasi ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nilai_tanggung_jawab">Tanggung Jawab</label>
                                                    <input id="nilai_tanggung_jawab" min="0"
                                                        oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                                                        type="number" class="form-control" name="nilai_tanggung_jawab"
                                                        value="<?= $nilai_tanggung_jawab ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nilai_teknis">Kemampuan Teknis</label>
                                                    <input id="nilai_teknis" min="0"
                                                        oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                                                        type="number" class="form-control" name="nilai_teknis"
                                                        value="<?= $nilai_teknis ?>">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label>Catatan</label>
                                                <textarea id="catatan_nilai" value="<?= $catatan_nilai ?>" rows="4"
                                                    class="form-control"></textarea>
                                            </div>

                                            <div class="d-flex justify-content-end" id="div_simpan_nilai">

                                            </div>
                                        </div>
                                        <!-- Berkas -->
                                        <div class="tab-pane fade show" id="file4" role="tabpanel"
                                            aria-labelledby="file-tab4">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <button type="button"
                                                        onclick="window.open('<?= base_url() ?>/public/assets/berkas/magang/surat-pengantar/<?= $berkas_pengantar ?>','_blank')"
                                                        class="btn btn-primary btn-icon icon-left mt-4 btn-block">
                                                        <i class="fas fa-file-download"></i> Unduh Surat Pengantar
                                                    </button>
                                                </div>
                                                <div class="col-sm">
                                                    <button type="button"
                                                        onclick="window.open('<?= base_url() ?>/public/assets/image/avatar/<?= $file_foto ?>','_blank')"
                                                        class="btn btn-primary btn-icon icon-left mt-4 btn-block">
                                                        <i class="fas fa-file-download"></i> Unduh Foto
                                                    </button>
                                                </div>
                                                <div class="col-sm">
                                                    <button type="button"
                                                        onclick="window.open('<?= base_url() ?>/public/assets/berkas/ktp/<?= $ktp ?>','_blank')"
                                                        class="btn btn-primary btn-icon icon-left mt-4 btn-block">
                                                        <i class="fas fa-file-download"></i> Unduh KTP/NISN
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Sertifikat -->
                                        <div class="tab-pane fade show" id="sertifikat4" role="tabpanel"
                                            aria-labelledby="sertifikat-tab4">
                                            <?php if($status != 1){?>
                                            <div id="ket_sertifikat" class="mb-4 mt-4">
                                                <div class="d-flex justify-content-center text-danger">
                                                    <p>Menu ini dapat diakses setelah status tiket selesai.</p>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <button onclick="modifyPdf()" type="button"
                                                        class="btn btn-primary btn-icon icon-left btn-block">
                                                        <i class="fas fa-file-download"></i> Unduh Sertifikat
                                                    </button>
                                                </div>
                                                <div class="col-sm">
                                                    <button
                                                        onclick="window.open('<?= base_url() ?>/homepage/detail-nilai/<?= $id_tiket ?>/<?= $kode_tiket ?>');"
                                                        type="button"
                                                        class="btn btn-primary btn-icon icon-left btn-block"
                                                        target="_blank">
                                                        <i class="fas fa-file-download"></i> Unduh Penilaian
                                                    </button>
                                                </div>
                                            </div>

                                            <?php } ?>

                                        </div>
                                        <!--  -->
                                        <div class="tab-pane fade" id="contact4" role="tabpanel"
                                            aria-labelledby="contact-tab4">
                                            <div class="form-group">
                                                <label>Catatan</label>
                                                <textarea id="catatan" rows="4" disabled="true"
                                                    class="form-control"><?= $catatan ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex w-100 ">
                    <div class="card flex-grow-1 ">
                        <div class="card-header">
                            <h4>Log Aktifitas</h4>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="activities" id="list_history">

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
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Berikan Alasan Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row align-items-center">
                    <label class="col-md-12 text-md-left text-left">Catatan</label>
                    <div class="col-lg-12 col-md-12">
                        <textarea id="catatan_update" rows="4" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end" id="div_catatan">


                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");
    get_history();
    get_opd();
    access_status("<?= $status ?>");
});
</script>
<script>
const {
    degrees,
    PDFDocument,
    rgb,
    StandardFonts
} = PDFLib
let pdfDoc;
async function modifyPdf() {
    // const pdfDoc = await PDFLib.PDFDocument.create();
    // const page = pdfDoc.addPage([350, 400]);
    // page.moveTo(110, 200);
    // page.drawText('Hello World!');

    const url = '<?= base_url() ?>/public/assets/sertifikat/bg_sertifikat.pdf'
    const existingPdfBytes = await fetch(url).then(res => res.arrayBuffer())

    const pdfDoc = await PDFDocument.load(existingPdfBytes)
    const helveticaFont = await pdfDoc.embedFont(StandardFonts.Helvetica)

    const pages = pdfDoc.getPages()
    const firstPage = pages[0]
    const {
        width,
        height
    } = firstPage.getSize()

    // TITTLE
    const pngUrl = "<?= base_url() ?>/public/assets/sertifikat/tittle.png";
    const pngImageBytes = await fetch(pngUrl).then((res) => res.arrayBuffer());
    const pngImage = await pdfDoc.embedPng(pngImageBytes);
    const pngDims = pngImage.scale(0.23);

    var margin = (width - pngDims.width) / 2;
    var vertical = (width - pngDims.width) / 2;
    firstPage.drawImage(pngImage, {
        x: margin,
        y: height - ((margin / 5) + pngDims.height + 80),
        width: pngDims.width,
        height: pngDims.height,
    });

    // NAMA
    var nama = 'Ainur Inas Annisa';
    firstPage.drawText(nama, {
        x: margin,
        y: height - ((margin / 5) + pngDims.height + 150),
        size: 40,

        font: helveticaFont,
        color: rgb(1, 1, 1),
    })

    var instansi = "Dinas Komunikasi dan Informatika";
    var tgl_awal = "23 Juli 2023";
    var tgl_akhir = "23 Agustus 2023";
    var text = "Yang telah menyelesaikan Internship di " + instansi;
    var text_2 = "Kabupaten Bangkalan terhitung sejak " +
        tgl_awal + " sampai " + tgl_akhir + ".";

    firstPage.drawText(text, {
        x: margin - text.length,
        y: height - ((margin / 5) + pngDims.height + 210),
        size: 15,
        width: 100,
        font: helveticaFont,
        color: rgb(0.729, 0.58, 0.322),
    });

    firstPage.drawText(text_2, {
        x: margin - text_2.length,
        y: height - ((margin / 5) + pngDims.height + 230),
        size: 15,
        width: 100,
        font: helveticaFont,
        color: rgb(0.729, 0.58, 0.322),
    });

    // QRCODE
    const qrcodeUrl = "<?= base_url() ?>/public/assets/qrcode/" + <?= $id_tiket ?> + ".png";
    const qrcodeImageBytes = await fetch(qrcodeUrl).then((res) => res.arrayBuffer());
    const qrcodeImage = await pdfDoc.embedPng(qrcodeImageBytes);
    const qrcodeDims = qrcodeImage.scale(0.35);
    var margin = (width - qrcodeDims.width) / 2;
    var vertical = (width - qrcodeDims.width) / 2;
    firstPage.drawImage(qrcodeImage, {
        x: margin,
        y: height - ((margin / 5) + qrcodeDims.height + 350),
        width: qrcodeDims.width,
        height: qrcodeDims.height,
    });

    const pdfDataUri = await pdfDoc.saveAsBase64({
        dataUri: true
    });

    // var a = document.createElement("a");
    // a.href = pdfDataUri;
    // a.download = "Certificate.pdf";
    // a.click();

    // Serialize the PDFDocument to bytes (a Uint8Array)
    const pdfBytes = await pdfDoc.save();

    // Trigger the browser to download the PDF document
    download(pdfBytes, "Certificate.pdf", "application/pdf");
}

const toBase64 = file => new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => resolve(reader.result);
    reader.onerror = error => reject(error);
});
</script>
<script>
function access_button() {
    var button = "";

    if (<?= session()->get('id_role') ?> == 0 || <?= session()->get('id_role') ?> == 1) {
        button +=
            '<a href="javascript: void(0)" onclick="update_status(0)" class="btn btn-danger btn-action mr-1"><i class="fa fa-times"></i> Tolak</a>';
        button +=
            '<a href="javascript: void(0)" onclick="update_status(4)" class="btn btn-success btn-action mr-1"><i class="fa fa-check"></i> Proses</a>';

    }

    if (<?= session()->get('id_role') ?> == 0 || (<?= session()->get('id_role') ?> == 4 &&
            <?= session()->get('id_user') ?> == <?=  $id_user ?>)) {
        button +=
            '<a href="javascript: void(0)" onclick="update_status(2)" class="btn btn-dark btn-action mr-1"><i class="fa fa-times"></i> Batalkan</a>';
    }

    document.getElementById("confirm_btn").innerHTML = button;
}

function update_status($status) {
    if ($status == 4) {
        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Tiket yang sudah diproses tidak dapat dibatalkan !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proses',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                update_catatan($status);
            }
        })
    } else {
        var button = '';
        button += '<button onclick="update_catatan(' + $status +
            ')" id="btn_catatan" class="btn btn-primary">Simpan</button>';
        button +=
            '<button id="loader_catatan" style="display: none;" class="btn disabled rounded-pill btn-primary btn-progress">Simpan</button>';
        document.getElementById("div_catatan").innerHTML = button;

        $('#updateModal').modal('show');
    }
}

function update_catatan($status) {
    // alert($status);
    if ($status == 4) {
        var formData = new FormData();
        formData.append('id_tiket', <?= $id_tiket ?>);
        formData.append('status', $status);

        $.ajax({
            url: "<?= base_url() ?>/<?= session()->get('role') ?>/magang/update_catatan",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            async: true,
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
                    get_history();
                    document.getElementById("confirm_btn").innerHTML = "";
                    access_status($status);
                } else {
                    Swal.fire(
                        "Gagal",
                        data.message,
                        'error'
                    );
                }
            },
        });
    } else {
        if (isEmptyOrSpaces(document.getElementById('catatan_update').value)) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal...',
                text: 'Form Catatan Kosong !'
            });
        } else if (/[^a-zA-Z0-9\ .,-_]/.test(document.getElementById("catatan_update").value)) {
            Swal.fire(
                'Gagal',
                "Isian Catatan tidak sesuai format.",
                'error'
            );
        } else {
            var formData = new FormData();
            formData.append('id_tiket', <?= $id_tiket ?>);
            formData.append('catatan', document.getElementById('catatan_update').value);
            formData.append('status', $status);

            $.ajax({
                url: "<?= base_url() ?>/<?= session()->get('role') ?>/magang/update_catatan",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                async: true,
                enctype: 'multipart/form-data',
                dataType: "JSON",
                beforeSend: function() {
                    // Loader
                    document.getElementById("btn_catatan").style.display = "none";
                    document.getElementById("btn_catatan").disabled = true;
                    document.getElementById("loader_catatan").style.display = "block";

                },
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
                        get_history();
                        document.getElementById("confirm_btn").innerHTML = "";
                        access_status($status);
                        $('#updateModal').modal('hide');
                        document.getElementById("catatan").value = document.getElementById('catatan_update')
                            .value;
                    } else {
                        Swal.fire(
                            "Gagal",
                            data.message,
                            'error'
                        );
                    }
                },
                complete: function() {
                    // Loader
                    document.getElementById("btn_catatan").style.display = "block";
                    document.getElementById("btn_catatan").disabled = false;
                    document.getElementById("loader_catatan").style.display = "none";
                },
            });
        }
    }

}

function access_status($status) {
    disable_penempatan();
    disable_nilai();
    if ($status >= 3) {
        if ($status == 3) {
            document.getElementById("status").value = "Proses : Verifikasi Tiket";
        } else if ($status == 4) {
            document.getElementById("status").value = "Proses : Verifikasi Pembimbing Lapangan";
        } else {
            document.getElementById("status").value = "Proses : Verifikasi Penilaian";
        }
        document.getElementById("status").classList.add("border");
        document.getElementById("status").classList.add("border-primary");
        document.getElementById("status").classList.add("text-primary");
        document.getElementById("status").classList.add("bg-white");

        if ($status == 3) {
            access_button();
        } else if ($status == 4) {

            if (<?= session()->get('id_role') ?> == 0 || <?= session()->get('id_role') ?> == 1) {
                enable_penempatan();

                var lock = "";
                lock += '<div class="d-flex justify-content-end">';
                lock += '<button onclick="lock_penempatan()" type="button" class="btn btn-danger btn-icon icon-left">';
                lock += '<i class="fas fa-unlock-alt"></i> Kunci Penempatan';
                lock += '</button>';
                lock += '</div>';
                document.getElementById("lock_penempatan").innerHTML = lock;
            }

        } else if ($status == 5) {

            if (<?= session()->get('id_role') ?> == 0 || <?= session()->get('id_role') ?> == 3) {
                enable_nilai();

                var lock = "";
                lock += '<div class="d-flex justify-content-end">';
                lock += '<button onclick="lock_nilai()" type="button" class="btn btn-danger btn-icon icon-left">';
                lock += '<i class="fas fa-unlock-alt"></i> Kunci Penilaian';
                lock += '</button>';
                lock += '</div>';
                document.getElementById("lock_nilai").innerHTML = lock;
            }

        }

    } else if ($status == 1) {
        document.getElementById("status").value = "Selesai";
        document.getElementById("status").classList.add("border");
        document.getElementById("status").classList.add("border-success");
        document.getElementById("status").classList.add("text-success");
        document.getElementById("status").classList.add("bg-white");
    } else if ($status == 0) {
        document.getElementById("status").value = "Ditolak";
        document.getElementById("status").classList.add("border");
        document.getElementById("status").classList.add("border-danger");
        document.getElementById("status").classList.add("text-danger");
        document.getElementById("status").classList.add("bg-white");
    } else if ($status == 2) {
        document.getElementById("status").value = "Dibatalkan";
        document.getElementById("status").classList.add("border");
        document.getElementById("status").classList.add("border-dark");
        document.getElementById("status").classList.add("text-dark");
        document.getElementById("status").classList.add("bg-white");
    }

}

function get_history() {
    var formData = new FormData();
    formData.append('id_tiket', <?= $id_tiket ?>);

    $.ajax({
        url: "<?= base_url() ?>/detail/magang/get_history",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            // console.log(data);
            var baris = "";
            for ($x = 0; $x < data.length; $x++) {
                // console.log(data[$x].nama_opd);
                // baris += '<option value="' + data[$x].id_opd + '">' + data[$x].nama_opd + '</option>';
                baris += '<div class="activity">';

                baris +=
                    '<div class="activity-icon bg-' + data[$x].color + ' text-white shadow-' + data[$x]
                    .color + '"><i class="' + data[$x].icon + '"></i></div>';
                baris += '<div class="activity-detail">';
                baris += '<div class="mb-2">';

                const now_start = new Date(data[$x].tgl);
                var dateStringWithTimeStart = moment(now_start).format(
                    'DD-MM-YYYY HH:mm:ss A');



                baris += '<span class="text-job text-primary">' + dateStringWithTimeStart + '</span>';
                baris += '<span class="bullet text-secondary"></span>';
                baris += '<a class="text-job" href="javascript: void(0)"> ' + moment(now_start).fromNow() +
                    '</a>';
                baris += '</div>';
                baris += '<p>' + '<a class="text-job" href="javascript: void(0)">' + data[$x].nama +
                    '</a>' + '<span class="bullet text-primary"></span> ' + data[$x].aktifitas + '</p>';
                baris += '</div>';
                baris += '</div>';
            }
            document.getElementById("list_history").innerHTML = baris;
        },
    });
}

function get_opd() {
    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/pengguna/get_opd",
        type: "GET",
        dataType: "JSON",
        async: false,
        success: function(data) {
            var baris = "";
            for ($x = 0; $x < data.length; $x++) {
                baris += '<option value="' + data[$x].id_opd + '">' + data[$x].nama_opd + '</option>';
            }
            document.getElementById("opd").innerHTML = baris;
            $("#opd").val('<?= $id_opd ?>');
            get_sub();
        },
    });
}

function get_sub() {
    var formData = new FormData();
    formData.append('id_opd', $("#opd").val());

    $.ajax({
        url: "<?= base_url() ?>/<?= session()->get('role') ?>/sub-bagian/get_sub",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        enctype: 'multipart/form-data',
        dataType: "JSON",
        success: function(data) {
            var baris = '<option selected value="0">- Pilih Sub Bagian -</option>';
            for ($x = 0; $x < data.length; $x++) {
                baris += '<option value="' + data[$x].id_sub + '">' + data[$x].nama_sub + '</option>';
            }
            document.getElementById("mySub").innerHTML = baris;
            $("#mySub").val('<?= $id_sub ?>');
            get_pembimbing();
        },
    });
}

function get_pembimbing() {
    if ($("#mySub").val() == 0) {
        var baris = '<option selected="" value="0">- Pilih Pembimbing -</option>';
        document.getElementById("pembimbing_lapangan").innerHTML = baris;
    } else {
        var formData = new FormData();
        formData.append('id_opd', $("#opd").val());
        formData.append('id_sub', $("#mySub").val());

        $.ajax({
            url: "<?= base_url() ?>/<?= session()->get('role') ?>/pengguna/get_pembimbing",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            enctype: 'multipart/form-data',
            dataType: "JSON",
            success: function(data) {
                var baris = "<option selected value=''>- Pilih Pembimbing -</option>";

                for ($x = 0; $x < data.length; $x++) {
                    baris += '<option value="' + data[$x].id_ssuser + '">' + data[$x].nama + '</option>';
                }
                document.getElementById("pembimbing_lapangan").innerHTML = baris;
                // get_data();
                $("#pembimbing_lapangan").val('<?= $id_pembina_lapangan ?>');

            },
        });
    }

}

function lock_penempatan() {
    if ($("#pembimbing_lapangan").val() == 0) {
        document.getElementById('pembimbing_lapangan').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Pembimbing Lapangan Kosong !'
        });
    } else if (isEmptyOrSpaces(document.getElementById('nama_tugas').value)) {
        document.getElementById('nama_tugas').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Tugas Magang Kosong !'
        });
    } else if (/[^a-zA-Z0-9\ .,-_]/.test(document.getElementById("nama_tugas").value)) {
        document.getElementById('nama_tugas').focus();
        Swal.fire(
            'Gagal',
            "Isian Tugas Magang tidak sesuai format.",
            'error'
        );
    } else {
        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Pengajuan magang akan dilanjutkan ke proses selanjutnya dan informasi data penempatan tidak akan dapat dirubah.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Lanjutkan",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {

                var formData = new FormData();
                formData.append('id_tiket', <?= $id_tiket ?>);
                formData.append('status', 5);

                $.ajax({
                    url: "<?= base_url() ?>/<?= session()->get('role') ?>/magang/update_catatan",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    async: true,
                    enctype: 'multipart/form-data',
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status == 200) {
                            disable_penempatan();

                            enable_nilai();
                            var lock = "";
                            lock += '<div class="d-flex justify-content-end">';
                            lock +=
                                '<button onclick="lock_nilai()" type="button" class="btn btn-danger btn-icon icon-left">';
                            lock += '<i class="fas fa-unlock-alt"></i> Kunci Penilaian';
                            lock += '</button>';
                            lock += '</div>';
                            document.getElementById("lock_nilai").innerHTML = lock;

                            Swal.fire({
                                position: 'top-center',
                                icon: 'success',
                                title: 'Berhasil !',
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            get_history();
                        } else {
                            Swal.fire(
                                "Gagal",
                                data.message,
                                'error'
                            );
                        }
                    },
                });
            }
        })
    }
}

function disable_penempatan() {
    document.getElementById("mySub").disabled = true;
    document.getElementById("pembimbing_lapangan").disabled = true;
    document.getElementById("nama_tugas").disabled = true;
    document.getElementById("lock_penempatan").innerHTML = "";
    document.getElementById("div_simpan_penempatan").innerHTML = "";
}

function enable_penempatan() {
    document.getElementById("mySub").disabled = false;
    document.getElementById("pembimbing_lapangan").disabled = false;
    document.getElementById("nama_tugas").disabled = false;

    var simpan = "";
    simpan +=
        '<button onclick="update_penempatan()" id="btn_penempatan" class="btn btn-primary">Simpan</button>';
    simpan +=
        '<button id="loader_penempatan" style="display: none;" class="btn disabled rounded-pill btn-primary btn-progress">Simpan</button>';
    document.getElementById("div_simpan_penempatan").innerHTML = simpan;
}

function update_penempatan() {
    if ($("#pembimbing_lapangan").val() == 0) {
        document.getElementById('pembimbing_lapangan').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Pembimbing Lapangan Kosong !'
        });
    } else if (isEmptyOrSpaces(document.getElementById('nama_tugas').value)) {
        document.getElementById('nama_tugas').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Tugas Magang Kosong !'
        });
    } else if (/[^a-zA-Z0-9\ .,-_]/.test(document.getElementById("nama_tugas").value)) {
        document.getElementById('nama_tugas').focus();
        Swal.fire(
            'Gagal',
            "Isian Tugas Magang tidak sesuai format.",
            'error'
        );
    } else {
        var formData = new FormData();
        formData.append('id_tiket', <?= $id_tiket ?>);
        formData.append('nama_project', document.getElementById('nama_tugas').value);
        formData.append('id_pembina_lapangan', $("#pembimbing_lapangan").val());

        $.ajax({
            url: "<?= base_url() ?>/<?= session()->get('role') ?>/magang/update_pembimbing",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            async: true,
            enctype: 'multipart/form-data',
            dataType: "JSON",
            beforeSend: function() {
                // Loader
                document.getElementById("btn_penempatan").style.display = "none";
                document.getElementById("btn_penempatan").disabled = true;
                document.getElementById("loader_penempatan").style.display = "block";

            },
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
                    get_history();
                } else {
                    Swal.fire(
                        "Gagal",
                        data.message,
                        'error'
                    );
                }
            },
            complete: function() {
                // Loader
                document.getElementById("btn_penempatan").style.display = "block";
                document.getElementById("btn_penempatan").disabled = false;
                document.getElementById("loader_penempatan").style.display = "none";
            },
        });
    }
}

function lock_nilai() {
    if (document.getElementById('nilai_performance').value <= 0) {
        document.getElementById('nilai_performance').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Performance (Unjuk Kerja) Kosong !'
        });
    } else if (document.getElementById('nilai_performance').value > 100) {
        document.getElementById('nilai_performance').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Performance (Unjuk Kerja) melampaui nilai maksimal !'
        });
    } else if (document.getElementById('nilai_sikap').value <= 0) {
        document.getElementById('nilai_sikap').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Attitude / Sikap Kosong !'
        });
    } else if (document.getElementById('nilai_sikap').value > 100) {
        document.getElementById('nilai_sikap').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Attitude / Sikap melampaui nilai maksimal !'
        });
    } else if (document.getElementById('nilai_kerjasama').value <= 0) {
        document.getElementById('nilai_kerjasama').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kerjasama dalam tim Kosong !'
        });
    } else if (document.getElementById('nilai_kerjasama').value > 100) {
        document.getElementById('nilai_kerjasama').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kerjasama dalam tim melampaui nilai maksimal !'
        });
    } else if (document.getElementById('nilai_disiplin').value <= 0) {
        document.getElementById('nilai_disiplin').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kedisiplinan Kosong !'
        });
    } else if (document.getElementById('nilai_disiplin').value > 100) {
        document.getElementById('nilai_disiplin').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kedisiplinan melampaui nilai maksimal !'
        });
    } else if (document.getElementById('nilai_komunikasi').value <= 0) {
        document.getElementById('nilai_komunikasi').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kemampuan dalam komunikasi Kosong !'
        });
    } else if (document.getElementById('nilai_komunikasi').value > 100) {
        document.getElementById('nilai_komunikasi').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kemampuan dalam komunikasi melampaui nilai maksimal !'
        });
    } else if (document.getElementById('nilai_tanggung_jawab').value <= 0) {
        document.getElementById('nilai_tanggung_jawab').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Tanggung Jawab Kosong !'
        });
    } else if (document.getElementById('nilai_tanggung_jawab').value > 100) {
        document.getElementById('nilai_tanggung_jawab').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Tanggung Jawab melampaui nilai maksimal !'
        });
    } else if (document.getElementById('nilai_teknis').value <= 0) {
        document.getElementById('nilai_teknis').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kemampuan Teknis Kosong !'
        });
    } else if (document.getElementById('nilai_teknis').value > 100) {
        document.getElementById('nilai_teknis').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kemampuan Teknis melampaui nilai maksimal !'
        });
    } else if (document.getElementById('catatan_nilai').value != "") {
        if (/[^a-zA-Z0-9\ .,-_]/.test(document.getElementById("catatan_nilai").value) || isEmptyOrSpaces(document
                .getElementById('catatan_nilai').value)) {
            document.getElementById('catatan_nilai').focus();
            Swal.fire({
                icon: 'error',
                title: 'Gagal...',
                text: 'Format Catatan Salah !'
            });
        }
    } else {
        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Proses magang akan diakhiri, peserta akan dapat mengakses sertifikat dan nilai magang yang telah di inputkan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Selesai",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {

                var formData = new FormData();
                formData.append('id_tiket', <?= $id_tiket ?>);
                formData.append('status', 1);

                $.ajax({
                    url: "<?= base_url() ?>/<?= session()->get('role') ?>/magang/update_catatan",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    async: true,
                    enctype: 'multipart/form-data',
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status == 200) {
                            disable_nilai();
                            Swal.fire({
                                position: 'top-center',
                                icon: 'success',
                                title: 'Berhasil !',
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            get_history();

                            var simpan = "";
                            simpan += '<div class="row">';
                            simpan += '<div class="col-sm">';
                            simpan +=
                                '<button onclick="modifyPdf()" type="button" class="btn btn-primary btn-icon icon-left btn-block"><i class="fas fa-file-download"></i> Unduh Sertifikat </button>';
                            simpan += '</div>';
                            simpan += '<div class="col-sm">';
                            simpan += '<button onclick="window.open(' + "'" +
                                "<?= base_url() ?>/homepage/detail-nilai/<?= $id_tiket ?>/<?= $kode_tiket ?>" +
                                "'" +
                                ');" type="button" class="btn btn-primary btn-icon icon-left btn-block" target="_blank"><i class="fas fa-file-download"></i> Unduh Penilaian </button>';
                            simpan += '</div>';
                            document.getElementById("ket_sertifikat").innerHTML = simpan;

                            document.getElementById("lock_nilai").innerHTML = "";

                        } else {
                            Swal.fire(
                                "Gagal",
                                data.message,
                                'error'
                            );
                        }
                    },
                });
            }
        })
    }
}

function disable_nilai() {
    document.getElementById("nilai_performance").disabled = true;
    document.getElementById("nilai_sikap").disabled = true;
    document.getElementById("nilai_kerjasama").disabled = true;
    document.getElementById("nilai_disiplin").disabled = true;
    document.getElementById("nilai_komunikasi").disabled = true;
    document.getElementById("nilai_tanggung_jawab").disabled = true;
    document.getElementById("nilai_teknis").disabled = true;
    document.getElementById("catatan_nilai").disabled = true;

    document.getElementById("div_simpan_nilai").innerHTML = "";
}

function enable_nilai() {
    document.getElementById("nilai_performance").disabled = false;
    document.getElementById("nilai_sikap").disabled = false;
    document.getElementById("nilai_kerjasama").disabled = false;
    document.getElementById("nilai_disiplin").disabled = false;
    document.getElementById("nilai_komunikasi").disabled = false;
    document.getElementById("nilai_tanggung_jawab").disabled = false;
    document.getElementById("nilai_teknis").disabled = false;
    document.getElementById("catatan_nilai").disabled = false;

    var simpan = "";
    simpan +=
        '<button onclick="update_nilai()" id="btn_nilai" class="btn btn-primary">Simpan</button>';
    simpan +=
        '<button id="loader_nilai" style="display: none;" class="btn disabled rounded-pill btn-primary btn-progress">Simpan</button>';
    document.getElementById("div_simpan_nilai").innerHTML = simpan;
}

function update_nilai() {
    if (document.getElementById('nilai_performance').value <= 0) {
        document.getElementById('nilai_performance').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Performance (Unjuk Kerja) Kosong !'
        });
    } else if (document.getElementById('nilai_performance').value > 100) {
        document.getElementById('nilai_performance').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Performance (Unjuk Kerja) melampaui nilai maksimal !'
        });
    } else if (document.getElementById('nilai_sikap').value <= 0) {
        document.getElementById('nilai_sikap').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Attitude / Sikap Kosong !'
        });
    } else if (document.getElementById('nilai_sikap').value > 100) {
        document.getElementById('nilai_sikap').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Attitude / Sikap melampaui nilai maksimal !'
        });
    } else if (document.getElementById('nilai_kerjasama').value <= 0) {
        document.getElementById('nilai_kerjasama').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kerjasama dalam tim Kosong !'
        });
    } else if (document.getElementById('nilai_kerjasama').value > 100) {
        document.getElementById('nilai_kerjasama').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kerjasama dalam tim melampaui nilai maksimal !'
        });
    } else if (document.getElementById('nilai_disiplin').value <= 0) {
        document.getElementById('nilai_disiplin').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kedisiplinan Kosong !'
        });
    } else if (document.getElementById('nilai_disiplin').value > 100) {
        document.getElementById('nilai_disiplin').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kedisiplinan melampaui nilai maksimal !'
        });
    } else if (document.getElementById('nilai_komunikasi').value <= 0) {
        document.getElementById('nilai_komunikasi').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kemampuan dalam komunikasi Kosong !'
        });
    } else if (document.getElementById('nilai_komunikasi').value > 100) {
        document.getElementById('nilai_komunikasi').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kemampuan dalam komunikasi melampaui nilai maksimal !'
        });
    } else if (document.getElementById('nilai_tanggung_jawab').value <= 0) {
        document.getElementById('nilai_tanggung_jawab').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Tanggung Jawab Kosong !'
        });
    } else if (document.getElementById('nilai_tanggung_jawab').value > 100) {
        document.getElementById('nilai_tanggung_jawab').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Tanggung Jawab melampaui nilai maksimal !'
        });
    } else if (document.getElementById('nilai_teknis').value <= 0) {
        document.getElementById('nilai_teknis').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kemampuan Teknis Kosong !'
        });
    } else if (document.getElementById('nilai_teknis').value > 100) {
        document.getElementById('nilai_teknis').focus();
        Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Form Nilai Kemampuan Teknis melampaui nilai maksimal !'
        });
    } else if (document.getElementById('catatan_nilai').value != "") {
        if (/[^a-zA-Z0-9\ .,-_]/.test(document.getElementById("catatan_nilai").value) || isEmptyOrSpaces(document
                .getElementById('catatan_nilai').value)) {
            document.getElementById('catatan_nilai').focus();
            Swal.fire({
                icon: 'error',
                title: 'Gagal...',
                text: 'Format Catatan Salah !'
            });
        }
    } else {
        var formData = new FormData();
        formData.append('id_tiket', <?= $id_tiket ?>);
        formData.append('kode_tiket', '<?= $kode_tiket ?>');
        formData.append('nilai_performance', document.getElementById('nilai_performance').value);
        formData.append('nilai_sikap', document.getElementById('nilai_sikap').value);
        formData.append('nilai_kerjasama', document.getElementById('nilai_kerjasama').value);
        formData.append('nilai_disiplin', document.getElementById('nilai_disiplin').value);
        formData.append('nilai_komunikasi', document.getElementById('nilai_komunikasi').value);
        formData.append('nilai_tanggung_jawab', document.getElementById('nilai_tanggung_jawab').value);
        formData.append('nilai_teknis', document.getElementById('nilai_teknis').value);
        formData.append('catatan_nilai', document.getElementById('catatan_nilai').value);

        $.ajax({
            url: "<?= base_url() ?>/<?= session()->get('role') ?>/magang/update_nilai",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            async: true,
            enctype: 'multipart/form-data',
            dataType: "JSON",
            beforeSend: function() {
                // Loader
                document.getElementById("btn_nilai").style.display = "none";
                document.getElementById("btn_nilai").disabled = true;
                document.getElementById("loader_nilai").style.display = "block";

            },
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
                    get_history();
                } else {
                    Swal.fire(
                        "Gagal",
                        data.message,
                        'error'
                    );
                }
            },
            complete: function() {
                // Loader
                document.getElementById("btn_nilai").style.display = "block";
                document.getElementById("btn_nilai").disabled = false;
                document.getElementById("loader_nilai").style.display = "none";
            },
        });
    }
}

function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
}
</script>
<?= $this->endSection() ?>