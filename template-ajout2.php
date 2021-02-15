                            <div class="form-group">
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="btn btn-primary btn-block text-white btn-google btn-user" type="reset" name="cancel" value="Annuler l'ajout">
                                        </div>
                                        <div class="col">
                                            <input class="btn btn-primary btn-block text-white btn-user" onsubmit="ouvrirpopup()" type="submit" name="submit" value="Valider l'ajout">
                                        </div>
                                        <?php if($nom == 'Commande') {echo '<div class="col"><a data-toggle="modal" data-target="#modal" class="btn btn-success btn-block text-white btn-user" type="button">Facturer</a></div>';}?>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </form>
                        <div class="modal fade" role="dialog" tabindex="-1" id="modal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Ajouter une facture</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="p-5">
                                            <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input class="form-control" type="text" id="avance" placeholder="deposit" name="deposit">
                                                        <span style="color:red"><?php if(!empty($_SESSION['e_tel'])) {echo '*'.$_SESSION['e_tel'] ;}?></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group files color">
                                                        <input class="form-control" type="file" multiple="" name="files">
                                                        <span style="color:red"><?php if(!empty($_SESSION['e_domain'])) {echo '*'.$_SESSION['e_domain'] ;}?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <input class="btn btn-primary btn-block text-white btn-google btn-user" type="cancel" name="cancel" value="Annuler l'ajout">
                                                        </div>
                                                        <div class="col">
                                                            <input class="btn btn-primary btn-block text-white btn-user" type="submit" name="submit" value="Valider l'ajout">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-light" type="button" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('template2.php') ?>