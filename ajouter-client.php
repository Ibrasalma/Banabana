<?php
    global $nom, $target_dir ;
    $nom = 'Client';
    $target_dir = 'images/clients/';
    include('template-ajout.php');
    require('db.php');
    require_once('helper.php');
    $nom_f = $adresse = $email = $tel = $domaine = $file = "";
    $e_nom = $e_adresse = $e_email = $e_tel = $e_domaine = $e_file = "";
    if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['tel']) && isset($_POST['domaine']) && isset($_POST['email'])){
        if (empty($_POST['nom'])) {
            $e_nom = 'Le nom est réquis';
        } else {
            $nom_f = test_entries($_POST['nom']);
        }
        if (empty($_POST['adresse'])) {
            $e_adresse = "L'adresse est réquise";
        } else {
            $adresse = test_entries($_POST['adresse']);
        }
        if (empty($_POST['tel'])) {
            $e_tel = 'Le téléphone est réquis';
        } else {
            $tel = test_entries($_POST['tel']);
        }
        if (empty($_POST['domaine'])) {
            $e_domaine = 'Le domaine est réquis';
        } else {
            $domaine = test_entries($_POST['domaine']);
        }
        if (empty($_POST['email'])) {
            $e_email = "L'email est réquis";
        } else {
            if (!filter_var(test_entries($_POST['email']), FILTER_VALIDATE_EMAIL)) {
                $e_email = "Format email invalid";
            } else {
                $email = test_entries($_POST['email']);
            }
        }
        include('image-gestion.php');
        $image = '';
        $date_en = date("Y-m-d H:m:s");
        if(isset($target_file)){
            $image = $nom_f . ''. htmlspecialchars(basename($target_file));
        }else{
            $image = '';
        }
        $query = "INSERT INTO client(nom, adresse, email, tel, domaine, avatar, date_enregistre) VALUES('$nom_f', '$adresse', '$email', '$tel', '$domaine', '$image', '$date_en')";
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
        <input class="form-control form-control-user" type="text" id="nom" placeholder="Nom complet" name="nom" value="<?php if(!empty($nom_f)) {echo $nom_f ;}?>">
        <span style="color:red"><?php if(!empty($e_nom)) {echo '*'.$e_nom ;}?></span>
    </div>
    <div class="col-sm-6">
        <input class="form-control form-control-user" type="text" id="adresse" placeholder="Adresse" name="adresse" value="<?php if(!empty($adresse)) {echo $adresse ;}?>">
        <span style="color:red"><?php if(!empty($e_adresse)) {echo '*'.$e_adresse ;}?></span>
    </div>
</div>
<div class="form-group">
    <input class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp" placeholder="Adresse email" name="email" value="<?php if(!empty($email)) {echo $email ;}?>">
    <span style="color:red"><?php if(!empty($e_email)) {echo '*'.$e_email ;}?></span>
</div>
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input class="form-control form-control-user" type="text" id="telephone" placeholder="Téléphone" name="tel" value="<?php if(!empty($tel)) {echo $tel ;}?>">
        <span style="color:red"><?php if(!empty($e_tel)) {echo '*'.$e_tel ;}?></span>
    </div>
    <div class="col-sm-6">
        <input class="form-control form-control-user" type="text" id="domaine" placeholder="domaine" name="domaine" value="<?php if(!empty($domaine)) {echo $domaine ;}?>">
        <span style="color:red"><?php if(!empty($e_domaine)) {echo '*'.$e_domaine ;}?></span>
    </div>
</div>
<div class="form-group files color">
    <input class="form-control" type="file" multiple="" name="avatar" id="avatar">
    <span style="color:red"><?php if(!empty($e_file)) {echo '*'.$e_file ;} ?></span>
</div>
<?php 
    include('template-ajout2.php');
?>