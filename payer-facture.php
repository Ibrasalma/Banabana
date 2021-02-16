<?php 
    global $nom ;
    $nom = 'Payement de facture';
    include('template-ajout.php');
    require_once('db.php');
    require_once('helper.php');
    $facture = $versement = $total_paye = $reste = $date_com = "";
    $e_versement = "";
     
    if(isset($_POST['versement'])){
        if (!empty($_POST['versement'])) {
            $versement = test_entries($_POST['versement']);
        }else {
            $e_versement = 'Le versement est réquise';
        }
        if (!empty($_POST['date_com'])) {
            $date_com = test_entries($_POST['date_com']);
        }else{
            $date_com = date('Y-m-d H:i:s');
        }
        if (!empty($_POST['facture'])) {
            $facture = test_entries($_POST['facture']);
            $ligne_payment = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM payement where id_receipt = '$facture' "));
            if ($ligne_payment == 0) {
                $query_p = "SELECT avance, montant_total FROM facture where id = '$facture' ";
                $ligne_total = mysqli_fetch_assoc(mysqli_query($conn, $query_p));
                $total_paye = $ligne_total['avance'] + $versement;
                $reste = $ligne_total['montant_total'] - $total_paye;
            } else {
                $query_p = "SELECT facture.avance as avance, facture.montant_total as montant_total, (sum(payement.versement) + facture.avance) as total FROM facture, payement where facture.id = '$facture' AND payement.id_receipt = '$facture' ";
                $result_p = mysqli_query($conn, $query_p) or die(mysqli_error($conn));
                $row_number_p = mysqli_num_rows($result_p);
                if ($row_number_p != 0) {
                    $ligne_facture = mysqli_fetch_assoc($result_p);
                    $total_paye = $ligne_facture['total'] + $versement;
                    $reste = $ligne_facture['montant_total'] - $total_paye;
                } else {
                    $e_versement = 'Vous avez plusieurs recu identique';
                }
            }
        }
        $query = "INSERT INTO payement(id_receipt, versement, total_paye, reste, date_paye) VALUES('$facture', '$versement', '$total_paye', '$reste', '$date_com')";
        $registrated = '';
        
        if(mysqli_query($conn,$query)){
            $registrated = 'Enrégistré avec succes';
        }else{
            $registrated = 'erreur :'.mysqli_error($conn);
        }
        echo $registrated;
    }
    $query_f = "SELECT * FROM facture ";
    $result = mysqli_query($conn, $query_f) or die(mysqli_error($conn));
    $row_number = mysqli_num_rows($result);
    
?>
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <select class="form-control " name="facture">
            <optgroup label="Liste des factures">
            <?php
            if($row_number > 0){    
                while($row = mysqli_fetch_assoc($result)){ ?>
                <option value="<?php echo $row["id"] ?>" placeholder="facture" <?php if($row["id"] == $facture) {echo "selected" ;}?>><?php echo $row["numero_recu"] ?></option>
            <?php 
                }
            }else{
                echo "<tr>la table ne contient aucune ligne</tr>";
            } 
            mysqli_close($conn);
            ?>
            </optgroup>
        </select>
    </div>
    <div class="col-sm-6">
        <input class="form-control" type="numerique" id="versement" placeholder="versement" name="versement" value="<?php if(!empty($versement)) {echo $versement;}?>">
        <span style="color:red"><?php if(!empty($e_versement)) {echo '*'.$e_versement;}?></span>
    </div>
</div>
<div class="form-group row ">
    <div class="col">
        <input class="form-control" type="date" name="date_com" value="<?php if(!empty($date_com)) {echo $date_com ;}?>">
    </div>
</div>
<?php include('template-ajout2.php') ?>                          