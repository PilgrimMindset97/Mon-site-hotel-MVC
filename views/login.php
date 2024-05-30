<section class="breadcrumb_area">
   <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Connexion</h2>
                    <ol class="breadcrumb">
                        <li><a href="?page=home">Accueil</a></li>
                        <li class="active">connexion</li>
                    </ol>
        </div>
  </div>
  <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">connexion</h2>
                    <?php if($erreurs):?>
                    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">

                            <strong><?= $erreurs ?></strong>
                    </div>
                    <?php endif ;?>

                    <form action="" method="POST" class=" text-white col-md-12 d-flex flex-column align-items-center">
                    <div class="form-group">
                         <label for="">Email</label>
                         <input type="email" value="<?= avoirInput("email") ?>" name="email" required class="form-control">
                    </div>
                    <div class="form-group">
                         <label for="">mot de passe</label>
                         <input type="password" name="motdepasse" required class="form-control">
                    </div>
                    <div class="btn-group">
                           <button type="submit" name="connecter" class="btn btn-success">se connecter</button>
                           <a href="?page=register" class="btn btn-warning">Creer un compte</a>
                    </div>
                   
                </form>
                </div>
                
               
            </div>
</section>