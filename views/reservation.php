<section class="breadcrumb_area">
   <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Reservations</h2>
                    <ol class="breadcrumb">
                        <li><a href="?page=home">Accueil</a></li>
                        <li class="active">Reservations</li>
                    </ol>
        </div>
  </div>
</section>
<section class="hotel_booking_area mt-5 mb-5">
            <div class="container">
            <?php require_once("includes/getMessage.php"); ?>
            <?php require_once("views/ajoutReservation.php"); ?>       
            </div>
        </section>
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Liste des Chambres</h2>
                    <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
                </div>
                <div class="row mb_30 ">
                    <?php foreach($chambres as $c): ?>
                    <div class="col-lg-3 col-sm-6" id="<?= $c->id ?>">
                        <div class="accomodation_item text-center">
                            <div class="hotel_img">
                                <img src="images/<?= $c->image ?>" heigth="250" alt="">
                                <?php if($c->statut==0): ?>
                                <a href="?page=reservation&id=<?= $c->id ?>" class="btn theme_btn button_hover">Reserver</a>
                                <?php else:?>
                                <button disabled  class="btn theme_btn btn-danger button_hover">Occupee</button>
                                <?php endif;?>
                            </div>
                            <a href="?page=detailChambre&id=<?= $c->id ?>"><h4 class="sec_h4"><?= $c->nom?></h4></a>
                            <h5><?= $c->prix ?>FCFA<small>/Jour</small></h5>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                    
            
            </div>
        </section>