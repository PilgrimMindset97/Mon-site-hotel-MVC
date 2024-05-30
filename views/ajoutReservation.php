<?php if(isset($_SESSION["user"])): ?>     
 <div class="row hotel_booking_table">
                    <div class="col-md-3">
                        <h2>Reservez<br> votre Chambre</h2>
                    </div>
                    <div class="col-md-9">
                           <form action="" method="post">
                        <div class="boking_table">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <label for="">Date d'entree</label>
                                            <input type='date' name="date_debut" value="<?= avoirInput("date_debut") ?>" class="form-control" required  placeholder="Date d'entree"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Date de depart</label>
                                            <input type='date' name="date_fin" value="<?= avoirInput("date_fin") ?>" class="form-control" required placeholder="Date de depart"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="form-group mt-4">
                                            <select class="form-control" <?= isset($_GET['id']) ? "disabled" :"" ?> name="chambre_id" required>
                                                <label for="">Chambre</label>
                                                <option value="">Veuillez selectionner une chambre </option>
                                                <?php foreach($chambres as $c): ?>
                                                    <option value="<?= $c->id?>" <?= (isset($chambre) && $chambre->id == $c->id) || avoirInput("chambre_id") ?'selected':''?> > <?= $c->nom ?></option> 
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                    <button type="submit" name="reserver" class="book_now_btn button_hover mt-3">Reservez maintenant</button>
                    </div>
                                
                     </div>
                </div>
         </form>
</div>
</div>
<?php endif; ?> 