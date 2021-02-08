<?php
    session_start();
    require('db.php');
    mysqli_select_db($conn,$database_name);
    if(isset($_POST['username']) && isset($_POST['password'])){
        $user = htmlspecialchars($_POST['username']);
        $pass = htmlspecialchars($_POST['password']);
    }
    $_SESSION['utilisateur'] = $user;

    $query = "SELECT * FROM $table_name  WHERE username = '$user' and motdepasse = '$pass'";
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    echo mysqli_num_rows($result);
    if(mysqli_num_rows($result)==1){
        header('location:admin.php');
    }else{
        echo "Erreur!";
    }
?>