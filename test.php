<?php
    session_start();
    require('helper.php');
    $_SESSION['numrecu'] = test_entries($_POST["numrecu"]);
    $_SESSION['client'] = test_entries($_POST["client"]);
    $_SESSION['vendeur'] = test_entries($_POST["vendeur"]);
    header("Location:ajouter-commande.php");
?>