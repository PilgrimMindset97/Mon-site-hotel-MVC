<section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Details de la chambre : <strong> <?= $c->nom ?></strong></h2>
                    <ol class="breadcrumb">
                        <li><a href="?page=home">Accueil</a></li>
                        <li><a href="?page=home">Chambre</a></li>
                        <li class="active"><?= $c->nom ?></li>
                        
                    </ol>
                </div>
            </div>
</section>

<section class="blog_area single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-12">
                                <div class="feature-img">
                                    <img class="img-fluid" src="images/<?= $c->image?>" style="width:100%; height: 350px" alt="">
                                </div>									
                            </div>
                            <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                    
                                    <ul class="blog_meta list_style">
                                        <li><a href="#">Prix journalier <i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#"><?= $c->prix ?>FCFA<i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#">
                                           <?php if($c->statut ==1): ?>
                                            <span class="badge badge-danger">Occupee</span>
                                            <?php else: ?>
                                            <span class="badge badge-success">Libre</span>
                                            <?php endif; ?>
                                        <i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <h2><?=$c->nom ?></h2>
                                <p class="excert">
                                    <?= nl2br($c->description) ?>
                                </p>
                            </div>
                            <div class="col-lg-12">
                                <div class="quotes">
                                    MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.										
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <img class="img-fluid" src="assets/image/blog/post-img1.jpg" alt="">
                                    </div>
                                    <div class="col-6">
                                        <img class="img-fluid" src="assets/image/blog/post-img2.jpg" alt="">
                                    </div>	
                                    <div class="col-lg-12 mt-25">
                                        <p>
                                            MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower.
                                        </p>
                                        <p>
                                            MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower.
                                        </p>											
                                    </div>									
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <?php if($c->statut==0): ?>
                            <aside class="single_sidebar_widget search_widget">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="?page=reservation&id=<?= $c->id ?>" class="btn btn-warning">Reserver</a>
                                    </span>
                                </div><!-- /input-group -->
                                <div class="br"></div>
                            </aside>
                            <?php endif; ?>
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Nouveautes</h3>
                                <?php foreach ($chambre as $key=> $chambre): ?>
                                    <?php if ($key<6 && $chambre->id != $c->id) :?>
                                <div class="media post_item">
                                   <img src="images/<?= $chambre->image?>" width="160" height="60" alt="">
                                   <div class="media-body">
                                    <a href="?page=detailChambre&&id=<?= $chambre->id ?>"><?= $chambre->nom?></a>
                                    <p> <?= $chambre->prix?> FCFA/jour</p>
                                   </div>
                                </div>
                                    <?php endif;?>
                                <?php endforeach; ?>
                               
                            </aside>

                        </div>
                    </div>
                </div>
            </div>
        </section>