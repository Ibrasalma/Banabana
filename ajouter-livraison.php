<?php 
    global $nom ;
    $nom = 'Livraison';
    include('template-ajout.php');
    require_once('db.php');
    require_once('helper.php');
    $facture = $status = $date_com = "";
    if(isset($_POST['facture']) && isset($_POST['status'])){
        if (!empty($_POST['facture'])) {
            $facture = test_entries($_POST['facture']);
        }
        if (!empty($_POST['status'])) {
            $status = test_entries($_POST['status']);
        }
        if (!empty($_POST['date_com'])) {
            $date_com = test_entries($_POST['date_com']);
        }else{
            $date_com = date('Y-m-d H:i:s');
        }
        $query = "INSERT INTO livraison(id_facture, statut, date_livre) VALUES('$facture', '$status', '$date_com')";
        $registrated = '';
        
        if(mysqli_query($conn,$query)){
            $registrated = 'Enrégistré avec succes';
        }else{
            $registrated = 'erreur :'.mysqli_error($conn);
        }
        echo $registrated;
    }
    $query = "SELECT * FROM facture ";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row_number = mysqli_num_rows($result);
    if($row_number > 0){
?>
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <select class="form-control" name="facture">
            <optgroup label="Liste des factures">
            <?php    
                while($row = mysqli_fetch_assoc($result)){ ?>
                <option value="<?php echo $row["id"] ?>" placeholder="Facture No" <?php if($row["id"] == $facture) {echo "selected" ;}?>><?php echo $row["numero_recu"]; ?></option>
                <?php 
                    }
                }else{
                    echo "<tr>la table ne contient aucune ligne</tr>";
                }
            ?>
            </optgroup>
        </select>
    </div>
    <div class="col-sm-6">
        <select class="form-control " name="status">
            <optgroup label="Liste des status">
                <option value="fabrication" selected="" placeholder="Status">En fabrication</option>
                <option value="livre">Livré</option>
                <option value="embarque">Embarqué</option>
                <option value="retourne">Retourné</option>
                <option value="annule">Annulé</option>
            </optgroup>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col">
        <input class="form-control" type="date" name="date_com" value="<?php if(!empty($date_com)) {echo $date_com ;}?>"> 
    </div>   
</div>
<?php include('template-ajout2.php') ?>                          