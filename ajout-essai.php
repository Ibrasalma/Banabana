<?php
    global $nom, $target_dir ;
    $nom = 'Client';
    $target_dir = 'images/clients/';
    include('template-ajout.php');
    require('db.php');
    require_once('helper.php');
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
?>