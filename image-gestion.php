<?php
    if(!empty($_FILES['avatar']['tmp_name'])){
        $target_file = $target_dir . basename($_FILES['avatar']['name']);
        $uploaded = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(isset($_POST['submit'])){
            $check = getimagesize($_FILES['avatar']['tmp_name']);
            if($check !== false){
                $uploaded = 1; 
            }else{
                $e_file = "Le fichier n'est pas une image";
                $uploaded = 0;
            }
        }
        if(file_exists($target_file)){
            $e_file = "Désolé ce fichier avec le même nom existe";
            $uploaded = 0;
        }
        if($_FILES['avatar']['size'] > 500000){
            $e_file = "Désolé votre fichier est trop large";
            $uploaded = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
            $e_file = "Désolé seuls les formats jpeg, jpg, png et gif sont autorisés";
            $uploaded = 0;
        }
        if($uploaded == 0){
            $e_file = "Désolé votre fichier n'a pas été soumis";
        }else{
            if(move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)){
                $upload_success = "Le fichier " . htmlspecialchars(basename($target_file)) ." a été soumis";
            }else{
                $e_file = "Il ya eu erreur lors de la soumission";
            }
        }
    }
?>