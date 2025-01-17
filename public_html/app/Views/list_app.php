<?= $this->extend('layout/homepage') ?>

<?= $this->section('content') ?>
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">

                <h2 class="mb-0">DISKOMINFO</h2>
            </div>

        </div>
    </div>
</header>


<section class="about-section section-padding" id="section_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Daftar Pelayanan</h4>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="myCard">


                    <div class="cards">
                        <div class="card" active>
                            <img src="https://images.pexels.com/photos/1407305/pexels-photo-1407305.jpeg" alt=""
                                class="card__image">
                            <div class="card__infos">
                                <h3 class="card__name">Monstera</h3>
                                <a href="https://www.pexels.com/photo/close-up-photo-of-green-leafed-plant-1407305/"
                                    class="card__author">Aditya Aiyar</a>
                            </div>
                        </div>

                        <div class="card">
                            <img src="https://images.pexels.com/photos/6913569/pexels-photo-6913569.jpeg" alt=""
                                class="card__image">
                            <div class="card__infos">
                                <h3 class="card__name">Dracaena</h3>
                                <a href="https://www.pexels.com/photo/snake-plant-with-ornamental-leaves-in-house-6913569/"
                                    class="card__author">Teona Swift</a>
                            </div>
                        </div>

                        <div class="card">
                            <img src="https://images.pexels.com/photos/7388195/pexels-photo-7388195.jpeg" alt=""
                                class="card__image">
                            <div class="card__infos">
                                <h3 class="card__name">Alocacia</h3>
                                <a href="https://www.pexels.com/photo/green-leaves-of-a-plant-7388195/"
                                    class="card__author">Luiz de Oliveira</a>
                            </div>
                        </div>

                        <div class="card">
                            <img src="https://images.pexels.com/photos/6072161/pexels-photo-6072161.jpeg" alt=""
                                class="card__image">
                            <div class="card__infos">
                                <h3 class="card__name">Begonia</h3>
                                <a href="https://www.pexels.com/photo/green-leaves-with-dots-6072161/"
                                    class="card__author">Eva Bronzini</a>
                            </div>
                        </div>

                        <div class="card">
                            <img src="https://images.pexels.com/photos/4593961/pexels-photo-4593961.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                                alt="" class="card__image">
                            <div class="card__infos">
                                <h3 class="card__name">Calathea</h3>
                                <a href="https://www.pexels.com/photo/green-and-white-leaf-plant-4593961/"
                                    class="card__author">Karolina Grabowska</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
const cards = document.querySelectorAll('.card');

cards.forEach((card) => {
    card.addEventListener('click', () => {
        if (!card.hasAttribute('active')) {
            updateActiveCard(card);
        }
    });
});

function updateActiveCard(activeCard) {
    cards.forEach((card) => {
        if (card === activeCard) {
            card.setAttribute('active', '');
        } else {
            card.removeAttribute('active');
        }
    })
}

$(document).ready(function() {
    document.getElementById("title_page").innerHTML = "Peluit - Daftar Pelayanan";
});
</script>
<?= $this->endSection() ?>