<?php 
    global $nom ;
    $nom = 'Depense';
    include('template-ajout.php');
    require_once('db.php');
    require_once('helper.php');
    $client = $montant = $date_com = $note = "";
    $e_montant = "";
    if(isset($_POST['client']) && isset($_POST['montant']) && isset($_POST['note'])){
        if (!empty($_POST['client'])) {
            $client = test_entries($_POST['client']);
        }
        if (empty($_POST['montant'])) {
            $e_montant = 'Le montant est réquise';
        } else {
            $montant = test_entries($_POST['montant']);
        }
        if (!empty($_POST['date_com'])) {
            $date_com = test_entries($_POST['date_com']);
        }else{
            $date_com = date('Y-m-d H:i:s');
        }
        if (!empty($_POST['note'])) {
            $note = test_entries($_POST['note']);
        }
        $query = "INSERT INTO depense(client, motif, date_enregistrement, montant) VALUES('$client', '$note', '$date_com','$montant')";
        $registrated = '';
        
        if(mysqli_query($conn,$query)){
            $registrated = 'Enrégistré avec succes';
        }else{
            $registrated = 'erreur :'.mysqli_error($conn);
        }
        echo $registrated;
    }
    $query_client = "SELECT * FROM client ";
    $result_client = mysqli_query($conn, $query_client) or die(mysqli_error($conn));
    $row_number_client = mysqli_num_rows($result_client);
    if($row_number_client > 0){
?>
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <select class="form-control" name="client">
            <optgroup label="Liste des clients">
            <?php    
                while($row_client = mysqli_fetch_assoc($result_client)){ ?>
                <option value="<?php echo $row_client["id"] ?>" placeholder="Client" <?php if($row_client["id"] == $client) {echo "selected" ;}?>><?php echo $row_client["nom"]. ' '.$row_client["adresse"] ?></option>
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
        <input class="form-control " type="numerique" id="montant" placeholder="montant" name="montant" value="<?php if(!empty($montant)) {echo $montant ;}?>">
        <span style="color:red"><?php if(!empty($e_montant)) {echo $e_montant ;}?></span>
    </div>
</div>
<div class="form-group row">
    <div class="col">
        <input class="form-control" type="date" name="date_com" value="<?php if(!empty($date_com)) {echo $date_com ;}?>" >  
    </div>
</div>
<div class="form-group">
    <textarea class="form-control" name="note"><?php if(!empty($note)) {echo $note ;}?></textarea>
</div>
<?php include('template-ajout2.php') ?>                          