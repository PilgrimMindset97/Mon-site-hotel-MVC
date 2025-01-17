<section class="accomodation_area section_gap">
<?php require_once("includes/getMessage.php"); ?>   
            <div class="container row accordion" id="profilAccordion">
            <p class="d-flex flex-column col-md-3">
  <a class="btn btn-primary" data-toggle="collapse" href="#info" role="button" aria-expanded="false" aria-controls="info">
    Mes informations
  </a>
  <a class="btn btn-primary mt-3" data-toggle="collapse" href="#commande" role="button" aria-expanded="false" aria-controls="commande">
    Mes Reservations
  </a>
  <a class="btn btn-primary mt-3" data-toggle="collapse" href="#password" role="button" aria-expanded="false" aria-controls="password">
    Mot de passe
  </a>
  <a class="btn btn-outline-danger mt-3"  href="?page=logout" >
    Deconnexion
  </a>
 
</p>
<div class="col-md-9">
         <div class="collapse show " id="info"  data-parent="profilAccordion">
           <div class="card card-body">
               <h3>Mes informations</h3>
               <form action="" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Prenom</label>
                        <input type="text" value="<?= $user->prenom ?>" name="prenom" required class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Nom</label>
                        <input type="text" value="<?= $user->nom ?>" name="nom" required class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Adresse</label>
                        <input type="text" value="<?= $user->adresse ?>" name="adresse" required class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Telephone</label>
                        <input type="text" value="<?= $user->tel ?>" name="tel" required class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Numero de carte d'identite</label>
                        <input type="text" value="<?= $user->cni ?>" name="cni" required class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="text" value="<?= $user->email ?>" name="email" required class="form-control">
                    </div>
                </div>
                 <button name="modifier" type="submit" class="btn btn-outline-warning">Modifier</button>  
               </form>
           </div>
        </div>
<div class="collapse" id="commande"  data-parent="profilAccordion">
  <div class="card card-body">
   <h3>Mes Reservations</h3>
           <table class="table">
              <thead>
                  <tr>
                      <th>Reference</th>
                      <th>Chambre</th>
                      <th>Date d'entrée</th>
                      <th>Date de sortie</th>
                      <th>Montant</th>
                      <th>Statut</th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach ($reservations as $r): ?>
                <tr>
                    <td><?= $r->reference ?></td>
                    <td><?= $r->nomchambre ?></td>
                    <td><?= date("d/m/Y", strtotime($r->date_debut)) ?></td>
                    <td><?= date("d/m/Y", strtotime($r->date_fin)) ?></td>
                    <td><?= $r->prix_total ?></td>
                    <td>
                         <?php if ($r->statut == 0): ?>
                              <span class="badge badge-primary">En attente</span>
                         <?php elseif ($r->statut==1): ?>
                              <span class="badge badge-success">Validee</span>
                         <?php else: ?>
                              <span class="badge badge-danger">rejettee </span>
                         <?php endif; ?>   
                    </td> 
                </tr>
                <?php endforeach; ?>
              </tbody>

        </table>
           </div>
        </div>
        <div class="collapse" id="password"  data-parent="profilAccordion">
           <div class="card card-body">
           
             <h3>Changer votre mot de passe</h3>
             <form action="" method="post">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Mot de passe actuel</label>
                        <input type="password"  name="motdepasse" required class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Nouveau mot de passe</label>
                        <input type="password"  name="nouveaumotdepasse" required class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Confirmer mot de passe</label>
                        <input type="password"  name="motdepasseconfirm" required class="form-control">
                    </div>
                 
                </div>
                 <button name="editpassword" type="submit" class="btn btn-outline-warning">Modifier</button>  
               </form>
           </div>
        </div>
</div>

</div>
</section>