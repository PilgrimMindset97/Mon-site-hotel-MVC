<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title row">
                    <h2 class="title_color col-md-9">Liste des Chambres</h2>
                    <div class="col-md-3">
                           <a href="?page=chambreAdmin&&type=add" class="btn btn-success"><i class="fa fa-plus"></i>Ajouter</a>
                           <a href="#" onclick="exporter('print')" class="btn btn-secondary"><i class="fa fa-print"></i>Imprimer</a>
                    </div>            
         </div>

         <?php require_once("includes/getMessage.php");?>
         <div id="print">
         <table  id="myTable" class="table table-bordered">
              <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Prix Journalier</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                    <?php foreach($chambre as $c):?>
                     <tr>
                        <td><img src="images/<?= $c->image ?>" width="100" heigth="50" alt=""></td>
                        <td><?= $c->nom ?></td>
                        <td><?= $c->prix ?> FCFA</td>
                        <td><?= nl2br( $c->description) ?></td>
                        <td class="text-center h5">
                            <?php if ($c->statut == 1): ?>
                               <span class="text-danger">Occupee</span>
                            <?php else: ?>
                              <span class="text-success">Libre</span>
                            <?php endif; ?>
                         </td>
                        <td>

                                <a href="?page=chambreAdmin&type=edit&id=<?= $c->id?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i></a>
                        </td>

 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppresion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
        Etes vous sur de vouloir supprimer?
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
        <a href="?page=chambreAdmin&idDeleting=<?= $c->id ?>" class="btn btn-danger">Oui</a>
      </div>
    </div>
  </div>
</div>
                     </tr>
                     <?php endforeach; ?>
              </tbody>
         </table>
         </div>
        
    </div>
 </section>