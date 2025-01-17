<?= $this->extend('layout/home_page') ?>
<?= $this->section('content') ?>
<style>
table {
    /* position: absolute; */
    /* top: 50%;
    left: 50%; */
    width: 80%;

    transition: all 0.2s ease;

    /* transform: translateX(-50%) translateY(-50%); */

    background: #fff;

    /* padding: 20px; */
}

.name {
    font-size: 30px;
    border-bottom: 2px solid #888;
    margin-bottom: 20px;
}

.name:first-letter {
    font-size: 300%;
}

.label {
    width: 150px;
    font-weight: bold;
}

.label,
.phone,
.mobile,
.email {
    display: inline-block;
}

.details-td {
    border-right: 1px solid #eee;
    white-space: nowrap;

    padding: 20px;
    padding-right: 30px;

    width: 500px;

}

.description-td {
    /* position: relative; */
    /* width: 100%; */
    font-size: 30px;
    padding: 20px;
    padding-left: 30px;
    padding-right: 30px;
    text-align: right;
    /* text-align: justify; */
    margin-top: 15px;
}

.description {
    outline: 0px solid transparent;
    border: 0px solid transparent;
}

@media only screen and (max-width: 600px) {
    .name {
        font-size: 15px;
    }

    .name:first-letter {
        font-size: 200%;
    }

    table {
        width: 100%;
    }
}
</style>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tiket</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Detail Tiket</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Tiket</h4>
                </div>
                <div class="card-body">
                    <Center>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td colspan="3">
                                        <div class="name"><?= $jenis_pelayanan?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="details-td">
                                        <div class="label">Kode Tiket</div> : <div class="phone"><?= $kode_tiket?>
                                        </div>
                                        <br>
                                        <div class="label">Tanggal Pengajuan</div> : <div class="mobile">
                                            <?= $tgl_input?>
                                        </div>
                                        <br>
                                        <div class="label">Pengguna</div> : <div class="email"><?= $nama?></div>
                                        <br>
                                        <div class="label">Instansi Pengguna</div> : <div class="email">
                                            <?= $opd?>
                                        </div>
                                    </td>
                                    <td class="description-td">
                                        <div class="description" spellcheck="false"><?= $status_tiket?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </Center>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").style.display = "block";
    document.getElementById("<?= $title ?>").classList.add("active");
});
</script>
<?= $this->endSection() ?>