<?= $this->extend('layout/home_page') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>FAQ</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Frequently Asked Questions</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Filter Pertanyaan</h4>
                </div>
                <div class="card-body">


                    <div class="d-flex justify-content-end">
                        <div class="col-lg-6 col-sm-6">
                            <div class="input-group">
                                <input type="text" id="value" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div id="faq_list">
                <?php
                for ($x = 0; $x < count($list_faq); $x++) {
                    if($list_faq[$x]["active"] == 1){
                        // echo $list_faq[$x]["pertanyaan"];
                ?>

                <div class="card profile">
                    <span class="name">
                        <div class="card-header">
                            <h4><?= $list_faq[$x]["pertanyaan"] ?></h4>
                            <div class="card-header-action">
                                <a data-collapse="#<?= $list_faq[$x]["id_faq"] ?>-collapse"
                                    class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="collapse" id="<?= $list_faq[$x]["id_faq"] ?>-collapse">
                            <div class="card-body">
                                <?= $list_faq[$x]["jawaban"] ?>
                            </div>
                            <div class="card-footer text-secondary">
                                <?= date('d F Y', strtotime($list_faq[$x]["tgl_input"])) ?>
                            </div>
                        </div>
                    </span>
                </div>

                <?php
                };
                    }
                ?>

            </div>

        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");
    get_faq();
});

document.getElementById("value").addEventListener("keyup", filterSearch);

function filterSearch() {
    var value, name, profile, i;
    value = document.getElementById('value').value.toUpperCase();
    profile = document.getElementsByClassName('profile');
    for (i = 0; profile.length; i++) {
        name = profile[i].getElementsByClassName('name');
        if (name[0].innerHTML.toUpperCase().indexOf(value) > -1) {
            profile[i].style.display = "flex";
        } else {
            profile[i].style.display = "none";
        }
    }
}
</script>
<?= $this->endSection() ?>