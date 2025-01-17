<?= $this->extend('layout/homepage') ?>

<?= $this->section('content') ?>
<section class="hero-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="text-center mb-5 pb-2">
                    <h1 class="text-white">Peluit</h1>

                    <p class="text-white">Pelayanan Publik Satu Pintu</p>

                    <a href="<?= base_url() ?>/sslogin" class="btn custom-btn smoothscroll mt-3">Login</a>
                </div>

                <div class="owl-carousel owl-theme" id="myCard_list">
                    <div class="owl-carousel-info-wrap item" onclick="open_card('guest/zoom-meeting')">
                        <img class="myimg" src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo.png"
                            class="owl-carousel-image img-fluid" alt="">
                        <img class="myimg_mobile" style="display :none;"
                            src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo_mobile.png"
                            class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="myopd mb-2">
                                Zoom Meeting
                                <img src="<?= base_url() ?>/public/PodTalk/images/verified.png"
                                    class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>

                    </div>

                    <div class="owl-carousel-info-wrap item" onclick="open_card('guest/aula')">
                        <img class="myimg" src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo.png"
                            class="owl-carousel-image img-fluid" alt="">
                        <img class="myimg_mobile" style="display :none;"
                            src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo_mobile.png"
                            class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="myopd mb-2">
                                Pinjam Aula
                                <img src="<?= base_url() ?>/public/PodTalk/images/verified.png"
                                    class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>

                    </div>

                    <div class="owl-carousel-info-wrap item" onclick="open_card('guest/alat-zoom')">
                        <img class="myimg" src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo.png"
                            class="owl-carousel-image img-fluid" alt="">
                        <img class="myimg_mobile" style="display :none;"
                            src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo_mobile.png"
                            class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="myopd mb-2">
                                Peralatan Zoom
                                <img src="<?= base_url() ?>/public/PodTalk/images/verified.png"
                                    class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>

                    </div>

                    <!-- <div class="owl-carousel-info-wrap item" onclick="open_card('guest/jaringan')">
                        <img class="myimg" src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo.png"
                            class="owl-carousel-image img-fluid" alt="">
                        <img class="myimg_mobile" style="display :none;"
                            src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo_mobile.png"
                            class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="myopd mb-2">
                                Pengaduan Gangguan Jaringan
                                <img src="<?= base_url() ?>/public/PodTalk/images/verified.png"
                                    class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>

                    </div> -->

                    <!-- <div class="owl-carousel-info-wrap item" onclick="open_card('guest/akses-point')">
                        <img class="myimg" src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo.png"
                            class="owl-carousel-image img-fluid" alt="">
                        <img class="myimg_mobile" style="display :none;"
                            src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo_mobile.png"
                            class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="myopd mb-2">
                                Penambahan AP
                                <img src="<?= base_url() ?>/public/PodTalk/images/verified.png"
                                    class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>

                    </div> -->
                    <div class="owl-carousel-info-wrap item" onclick="open_card('guest/sub-domain')">
                        <img class="myimg" src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo.png"
                            class="owl-carousel-image img-fluid" alt="">
                        <img class="myimg_mobile" style="display :none;"
                            src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo_mobile.png"
                            class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="myopd mb-2">
                                Sub Domain
                                <img src="<?= base_url() ?>/public/PodTalk/images/verified.png"
                                    class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>

                    </div>
                    <div class="owl-carousel-info-wrap item" onclick="open_card('guest/hosting')">
                        <img class="myimg" src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo.png"
                            class="owl-carousel-image img-fluid" alt="">
                        <img class="myimg_mobile" style="display :none;"
                            src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo_mobile.png"
                            class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="myopd mb-2">
                                Hosting
                                <img src="<?= base_url() ?>/public/PodTalk/images/verified.png"
                                    class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>

                    </div>
                    <!-- <div class="owl-carousel-info-wrap item" onclick="open_card('guest/sertifikat-tte')">
                        <img class="myimg" src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo.png"
                            class="owl-carousel-image img-fluid" alt="">
                        <img class="myimg_mobile" style="display :none;"
                            src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo_mobile.png"
                            class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="myopd mb-2">
                                Sertifikat TTE
                                <img src="<?= base_url() ?>/public/PodTalk/images/verified.png"
                                    class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>

                    </div> -->
                    <!-- <div class="owl-carousel-info-wrap item" onclick="open_card('guest/unggah-dokumen')">
                        <img class="myimg" src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo.png"
                            class="owl-carousel-image img-fluid" alt="">
                        <img class="myimg_mobile" style="display :none;"
                            src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo_mobile.png"
                            class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="myopd mb-2">
                                Unggah Dokumen
                                <img src="<?= base_url() ?>/public/PodTalk/images/verified.png"
                                    class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>

                    </div> -->
                    <!-- <div class="owl-carousel-info-wrap item" onclick="open_card('guest/aplikasi')">
                        <img class="myimg" src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo.png"
                            class="owl-carousel-image img-fluid" alt="">
                        <img class="myimg_mobile" style="display :none;"
                            src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo_mobile.png"
                            class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="myopd mb-2">
                                Pendampingan Aplikasi
                                <img src="<?= base_url() ?>/public/PodTalk/images/verified.png"
                                    class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>

                    </div> -->
                </div>
            </div>

        </div>
    </div>
</section>
<script>
$(document).ready(function() {
    // get_pelayanan();
    document.getElementById("title_page").innerHTML = "Peluit - Homepage";
    document.getElementById("home").classList.add("active");
});

function open_card($id) {
    window.open("<?= base_url() ?>/" + $id, "_self");
}

// function get_pelayanan() {
//     $.ajax({
//         url: "<?= base_url() ?>/pelayanan",
//         type: "GET",
//         dataType: "JSON",
//         success: function(data) {
//             // console.log(data);
//             // var text = "";
//             // for (let i = 0; i < data.length; i++) {

//             //     text += '<div class="owl-carousel-info-wrap item">';
//             //     text +=
//             //         '<img src="<?= base_url() ?>/public/assets/image/logo_opd/logokominfo.png" class="owl-carousel-image img-fluid" alt="">';
//             //     text += '<div class="owl-carousel-info">';
//             //     text += '<h4 class="myopd mb-2">';
//             //     text += 'PUPR';
//             //     text +=
//             //         '<img src="<?= base_url() ?>/public/PodTalk/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">';
//             //     text += '</h4>';
//             //     text += '</div>';
//             //     text += '</div>';

//             // }
//             // document.getElementById("myCard_list").innerHTML = text;

//             // console.log(text);
//         },
//     });
// }
</script>
<?= $this->endSection() ?>