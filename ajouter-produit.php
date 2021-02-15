<?php
    global $nom, $target_dir ;
    $nom = 'Produit';
    $target_dir = 'images/produits/';
    include('template-ajout.php');
    require('db.php');
    require_once('helper.php');
    $slug = $titre = $prix = $detail = "";
    $e_slug = $e_titre = $e_prix = $e_file = "";
    if(isset($_POST['slug']) && isset($_POST['titre']) && isset($_POST['prix'])){
        if (empty($_POST['slug'])) {
            $e_slug = 'Le slug est réquis';
        } else {
            $slug = test_entries($_POST['slug']);
        }
        if (empty($_POST['titre'])) {
            $e_titre = "Le titre est réquise";
        } else {
            $titre = test_entries($_POST['titre']);
        }
        if (empty($_POST['prix'])) {
            $e_prix = 'Le prix est réquis';
        } else {
            $prix = test_entries($_POST['prix']);
        }
        if(!empty($_POST['detail'])){
            $detail = test_entries($_POST['detail']);
        }
        include('image-gestion.php');
        $image = '';
        $date_en = date("Y-m-d H:m:s");
        if(isset($target_file)){
            $image = $slug . ''. htmlspecialchars(basename($target_file));
        }else{
            $image = '';
        }
        $query = "INSERT INTO produit(slug, nom, prix_brut, photo, detail) VALUES('$slug', '$titre', '$prix', '$image', '$detail')";
        $registrated = '';
        if(mysqli_query($conn,$query)){
            $registrated = 'Enrégistré avec succes';
        }else{
            $registrated = 'erreur :'.mysqli_error($conn);
        }
        echo $registrated;
    }

    mysqli_close($conn);
?>
<script>
    function ouvrirpopup(){
        $('#myModal').modal({show:true});
    }   
</script>
<div class="modal fade" role="dialog" tabindex="-1" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Enregistré avec succès</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-5">
                    <p><?php echo $upload_success . ' et '. $upload_success; ?></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input class="form-control" type="text" id="slug" placeholder="Nom Unique pour ce produit, ex: adidas3band12" name="slug" value="<?php if(!empty($slug)) {echo $slug ;}?>">
        <span style="color:red"><?php if(!empty($e_slug)) {echo '*'.$e_slug ;}?></span>
    </div>
    <div class="col-sm-6">
        <input class="form-control" type="text" id="titre" placeholder="titre ex: Adidas 3 band 2018" name="titre" value="<?php if(!empty($titre)) {echo $titre ;}?>">
        <span style="color:red"><?php if(!empty($e_titre)) {echo '*'.$e_adresse ;}?></span>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input class="form-control" type="text" id="prix" placeholder="Le prix initial du produit" name="prix" value="<?php if(!empty($prix)) {echo $prix ;}?>">
        <span style="color:red"><?php if(!empty($e_prix)) {echo '*'.$e_prix ;}?></span>
    </div>
    <div class="col-sm-6 form-group files color">
        <input class="form-control" type="file" multiple="" name="avatar" id="avatar">
        <span style="color:red"><?php if(!empty($e_file)) {echo '*'.$e_file ;}?></span>
    </div>
</div>
<div class="form-group">
    <textarea class="form-control" name="detail"><?php if(!empty($detail)) {echo $detail ;}?></textarea>
</div>
<?php include('template-ajout2.php') ?>                          