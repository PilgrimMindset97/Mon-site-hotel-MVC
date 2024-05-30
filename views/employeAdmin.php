<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title row">
                    <h2 class="title_color col-md-8">Liste des Employes</h2>
                    <div class="col-md-4">
                           <a href="?page=employeAdmin&type=add" class="btn btn-success"><i class="fa fa-plus"></i>Ajouter</a>
                           <a href="#" class="btn btn-info" onclick="exporter('print')"><i class="fa fa-print"></i>Exporter</a>
                    </div>            
        </div>
         <?php require_once("includes/getMessage.php");?>
         <div id="print">
         <table  id="myTable" class="table table-bordered">
              <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Adresse </th>
                    <th>Telephone</th>
                    <th>Cni</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                 <?php foreach ($employes as $e): ?>
                    <tr>
                        <td><?= ucfirst($e->prenom)?></td>
                        <td><?= ucfirst($e->nom)?></td>
                        <td><?= $e->adresse?></td>
                        <td><?= $e->tel?></td>
                        <td><?= $e->cni?></td>
                        <td><?= $e->email?></td>
                        <td><?= $e->role?></td>
                        <td>
                              <a href="?page=employeAdmin&type=edit&id=<?= $e->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                              <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?= $e->id ?>"><i class="fa fa-trash"></i></a>
                        </td>
  <div class="modal fade" id="exampleModal<?= $e->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmez-vous la suppression?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Etes vous sur de vouloir supprimer?
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Non</button>
        <a href="?page=employeAdmin&idDeleting=<?= $e->id ?>" class="btn btn-danger">Oui</a>
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