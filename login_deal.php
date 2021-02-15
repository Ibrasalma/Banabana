<?php
    session_start();
    require('db.php');
    $_SESSION['erreur'] = '';
    if(isset($_POST['username']) && isset($_POST['password'])){
        $user = htmlspecialchars($_POST['username']);
        $pass = htmlspecialchars($_POST['password']);
    }else{
        $_SESSION['erreur'] = 'Vous devez taper les deux et valider';
        header('location:login.php');
    }
    
    $table_name = 'login';
    $query = "SELECT * FROM $table_name  WHERE username = '$user' and motdepasse = '$pass'";
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    
    if(mysqli_num_rows($result)==1){
        $_SESSION['utilisateur'] = $user;
        header('location:admin-index.php');
    }else{
        $_SESSION['erreur'] = 'Vous avez entrer un mauvais nom utilisateur ou mot de passe';
        header('location:login.php');
    }
    mysqli_close($conn);
?>