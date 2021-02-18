<?php
    session_start();
    require('helper.php');
    $numrecu = $_SESSION['numrecu'];
    $client = $_SESSION['client'];
    $vendeur = $_SESSION['vendeur'];
    $target_dir = 'images/factures/';
    require_once('db.php');
    $query = "SELECT sum(quantite*prix_unitaire) as montant_total from commander where numero_facture = '$numrecu'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    $montant_total = $row['montant_total'];
    $deposit =  "";
    $e_deposit = $e_file = "";
    if(isset($_POST['deposit'])){
        if (empty($_POST['deposit'])) {
            $e_deposit = 'Le deposit est réquise';
        } else {
            $deposit = test_entries($_POST['deposit']);
        }
        include('image-gestion.php');
        $image = '';
        $date_en = date("Y-m-d H:m:s");
        if(isset($target_file)){
            $image = $numrecu . ''. htmlspecialchars(basename($target_file));
        }else{
            $image = '';
        }
        $query_add = "INSERT INTO facture(numero_facture, client, vendeur,montant_total, date_facturation, avance, photo) VALUES('$numrecu', '$client', '$vendeur', '$montant_total', '$date_en', '$deposit', '$image')";
        $registrated = '';
        if(mysqli_query($conn,$query_add)){
            $registrated = 'Enrégistré avec succes';
            unset($numrecu);
            unset($client);
            unset($vendeur);
            header("Location:facture-content.php");
        }else{
            echo 'erreur :'.mysqli_error($conn);
        }
    }
?>