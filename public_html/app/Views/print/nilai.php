<!DOCTYPE html>
<html lang="en">

<head>
    <title id="title_page">Peluit</title>

    <!-- Favicons -->
    <link href="<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png" rel="icon">
    <link href="<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>

    <style>
    @media print {
        @page {
            size: 8.5in 11in;
            /* size: landscape; */
        }

        #myButton {
            display: none !important;
        }
    }
    </style>
</head>

<body>
    <div class="ticket">
        <center>
            <img style="width:100px" src="<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png"
                alt="Logo Bangkalan" class="rounded-circle">
        </center>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col" class="text-center">TRANSKIP NILAI MAGANG <br><small
                            class="text-secondary"><b>KABUPATEN BANGKALAN</b></small>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="table table-borderless table-sm mt-4">
            <tr>
                <td style="width:1%;white-space: nowrap;">NOMOR SERI</td>
                <td style="width:1%;white-space: nowrap;">:</td>
                <td><?= $kode_tiket ?></td>
            </tr>
            <tr>
                <td style="width:1%;white-space: nowrap;">NOMOR INDUK</td>
                <td style="width:1%;white-space: nowrap;">:</td>
                <td><?= $nomor_induk ?></td>
            </tr>
            <tr>
                <td style="width:1%;white-space: nowrap;">NAMA</td>
                <td style="width:1%;white-space: nowrap;">:</td>
                <td><?= $nama ?></td>
            </tr>
            <tr>
                <td style="width:1%;white-space: nowrap;">CIVITAS</td>
                <td style="width:1%;white-space: nowrap;">:</td>
                <td><?= $civitas ?></td>
            </tr>
            <tr>
                <td style="width:1%;white-space: nowrap;">JURUSAN</td>
                <td style="width:1%;white-space: nowrap;">:</td>
                <td><?= $jurusan ?></td>
            </tr>
            <tr>
                <td>
                    <!-- <h4> &nbsp;</h4> -->
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td style="width:1%;white-space: nowrap;">INSTANSI</td>
                <td style="width:1%;white-space: nowrap;">:</td>
                <td><?= $opd ?></td>
            </tr>
            <tr>
                <td style="width:1%;white-space: nowrap;">PEMBIMBING LAPANGAN</td>
                <td style="width:1%;white-space: nowrap;">:</td>
                <td><?= $pembimbing ?></td>
            </tr>
            <tr>
                <td style="width:1%;white-space: nowrap;">DURASI MAGANG</td>
                <td style="width:1%;white-space: nowrap;">:</td>
                <td><?= $tgl_awal ?> - <?= $tgl_akhir ?></td>
            </tr>
            <tr>
                <td style="width:1%;white-space: nowrap;">STATUS MAGANG</td>
                <td style="width:1%;white-space: nowrap;">:</td>
                <td><?= $status ?></td>
            </tr>
        </table>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" style="width:1%;white-space: nowrap;">NO</th>
                    <th class="text-center">KATEGORI</th>
                    <th class="text-center" style="width:150px;white-space: nowrap;">NILAI</th>
                    <th class="text-center" style="width:1%;white-space: nowrap;">NILAI HURUF</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center" scope="row">1</th>
                    <td>Performance Kerja</td>
                    <td class="text-center"><?= $nilai_performance ?></td>
                    <td class="text-center"><?= $nilai_performance_huruf ?></td>
                </tr>
                <tr>
                    <th class="text-center" scope="row">2</th>
                    <td>Attitude / Sikap</td>
                    <td class="text-center"><?= $nilai_sikap ?></td>
                    <td class="text-center"><?= $nilai_sikap_huruf ?></td>
                </tr>
                <tr>
                    <th class="text-center" scope="row">3</th>
                    <td>Kerjasama dalam Tim</td>
                    <td class="text-center"><?= $nilai_kerjasama ?></td>
                    <td class="text-center"><?= $nilai_kerjasama_huruf ?></td>
                </tr>
                <tr>
                    <th class="text-center" scope="row">4</th>
                    <td>Kedisiplinan</td>
                    <td class="text-center"><?= $nilai_disiplin ?></td>
                    <td class="text-center"><?= $nilai_disiplin_huruf ?></td>
                </tr>
                <tr>
                    <th class="text-center" scope="row">5</th>
                    <td>Kemampuan dalam Komunikasi</td>
                    <td class="text-center"><?= $nilai_komunikasi ?></td>
                    <td class="text-center"><?= $nilai_komunikasi_huruf ?></td>
                </tr>
                <tr>
                    <th class="text-center" scope="row">6</th>
                    <td>Tanggung Jawab</td>
                    <td class="text-center"><?= $nilai_tanggung_jawab ?></td>
                    <td class="text-center"><?= $nilai_tanggung_jawab_huruf ?></td>
                </tr>
                <tr>
                    <th class="text-center" scope="row">7</th>
                    <td>Kemampuan Teknis</td>
                    <td class="text-center"><?= $nilai_teknis ?></td>
                    <td class="text-center"><?= $nilai_teknis_huruf ?></td>
                </tr>
                <tr>
                    <td class="text-center" colspan=2><b>RATA - RATA</b></td>
                    <td class="text-center"><?= $rata_rata ?></td>
                    <td class="text-center"><?= $rata_rata_huruf ?></td>
                </tr>
            </tbody>
        </table>

        <table class="table table-borderless table-sm " style="width: 100%;">
            <tr>
                <td>Catatan :
                    <br><br><?= ($catatan != "" ? '- '.$catatan : $catatan) ?><br><?= ($catatan_nilai != "" ? '- '.$catatan_nilai : $catatan_nilai) ?>
                </td>
                <td>
                    <div class="row d-flex justify-content-end mr-4">
                        <div class="col-2 mr-4">
                            <div id="canvas"></div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <table class="table table-sm ">
            <thead>
                <tr>
                    <th scope="col" class="text-center">PELUIT<br><small class="text-secondary"><b>Pelayanan Publik Satu
                                Pintu</b></small>
                    </th>
                </tr>
            </thead>
        </table>
    </div>

    <div id="myButton">
        <center>
            <div class="cta">
                <!-- <button onclick='window.open("<?= base_url() ?>/admin/tiket","_self")' class="btn-show">
                    Kembali
                </button> -->

                <button onclick="window.print();" class="btn-hide">
                    Print
                </button>
            </div>
        </center>
    </div>
</body>

<script type="text/javascript">
const qrCode = new QRCodeStyling({
    width: 150,
    height: 150,
    type: "png",
    data: "<?= base_url() ?>/homepage/detail-nilai/<?= $id_tiket ?>/<?= $kode_tiket ?>",
    image: "<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png",
    dotsOptions: {
        color: "#4267b2",
        type: "rounded"
    },
    backgroundOptions: {
        color: "#FFFFFF",
    },
    imageOptions: {
        crossOrigin: "anonymous",
        margin: 2
    }
});

qrCode.append(document.getElementById("canvas"));
// qrCode.download({
//     name: "qr",
//     extension: "svg"
// });
</script>

</html>