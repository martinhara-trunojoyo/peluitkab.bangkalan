<!DOCTYPE html>
<html lang="en">

<head>
    <title id="title_page">Peluit</title>

    <!-- Favicons -->
    <link href="<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png" rel="icon">
    <link href="<?= base_url() ?>/public/assets/image/favicon/logo_bangkalan.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/ticket.css">
    <!-- <script type="text/javascript" src="http://static.runoob.com/assets/qrcode/qrcode.min.js"></script> -->
    <script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>

    <style>
    @media print {
        @page {
            size: 8.5in 11in;
            size: landscape;
        }

        #myButton {
            display: none !important;
        }
    }
    </style>
</head>

<body>
    <div class="ticket">
        <div class="ticket--start">
            <!-- <img src="https://i.ibb.co/W3cK42J/image-1.png" /> -->
            <div id="canvas" style="padding: 25px 25px 25px 25px;"></div>
        </div>
        <div class="ticket--center">
            <div class="ticket--center--row">
                <div class="ticket--center--col">
                    <span>Kode Tiket</span>
                    <strong><?= $kode_tiket?></strong>
                </div>
            </div>
            <div class="ticket--center--row">
                <div class="ticket--center--col">
                    <span class="ticket--info--title">Tanggal Pengajuan</span>
                    <span class="ticket--info--subtitle"><?= $tgl_input ?></span>
                    <span class="ticket--info--content"><?= $time ?></span>
                </div>
                <div class="ticket--center--col">
                    <span class="ticket--info--title">Identitas Pelanggan</span>
                    <span class="ticket--info--subtitle"><?= $nama?></span>
                    <span class="ticket--info--content"><?= $opd?></span>
                </div>
            </div>
            <div class="ticket--center--row">
                <div class="ticket--center--col">
                    <span class="ticket--info--title">Jenis Pelayanan</span>
                    <span class="ticket--info--content"><?= $jenis_pelayanan?></span>
                </div>
                <div class="ticket--center--col">
                    <span class="ticket--info--title">Status Tiket</span>
                    <span class="ticket--info--content"><?= $status_tiket?></span>
                </div>
            </div>
        </div>

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
    <!-- <div id="qrcode" style="height:450px;width:450px;" v-loading="PanoramaInfo.bgenerateing"></div> -->
</body>

<!-- <script>
function downloadURI(uri, name) {
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    delete link;
};

window.onload = function() {
    console.log('onload');
    let qrcode = new QRCode(document.getElementById("qrcode"), {
        text: "http://www.runoob.com",
        width: 450,
        height: 450,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });
    // setTimeout(
    //     function() {
    //         let dataUrl = document.querySelector('#qrcode').querySelector('img').src;
    //         downloadURI(dataUrl, 'qrcode.png');
    //     }, 1000);

};
</script> -->

<script type="text/javascript">
// public/assets/image/logo_qrcode/logo.png
const qrCode = new QRCodeStyling({
    width: 300,
    height: 300,
    type: "png",
    data: "<?= base_url() ?>/homepage/detail-tiket/<?= $id_tiket ?>/<?= $kode_tiket ?>",
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