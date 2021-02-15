
<?php
    session_start();
    unset($_SESSION['utilisateur']);
    if(empty($_SESSION['utilisateur'])){
        header("Location:./index.php " );
    }
    
?>