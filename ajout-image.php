<?php include('template.php'); ?>
<div class="container-fluid">
    <div class="card shadow-lg o-hidden border-0 my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col">
                    <div class="p-5">
                        <div class="text-center">
                            <h4 class="text-dark mb-4">Ajouter une image</h4>
                        </div>
                        <form class="user" action="image-gestion.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group files color">
                                <input class="form-control" type="file" multiple="" name="avatar">
                                <span style="color:red"><?php ?></span>
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
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('template2.php') ?>