<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - BanaBana</title>
    <meta name="description" content="Aider les grossistes guinéens à faire leurs achats dans la plus simple des façons">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>BanaBana</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <?php $url = dirname($_SERVER['SERVER_PROTOCOL']) . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
                    <ul class="nav navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item"><a class="nav-link <?php if(strpos($url,"admin-index.php")){ echo "active";} ?>" href="admin-index.php"><i class="fas fa-tachometer-alt"></i><span>Tableau de Bord</span></a></li>
                        <li class="nav-item"><a class="nav-link <?php if(strpos($url, "profile.php")){ echo "active";} ?>" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                        <li class="nav-item"><a class="nav-link <?php if(strpos($url, "client-content.php")){ echo "active";} ?>" href="client-content.php"><i class="fas fa-table"></i><span>Client</span></a></li>
                        <li class="nav-item"><a class="nav-link <?php if(strpos($url, "vendeur-content.php")){ echo "active";} ?>" href="vendeur-content.php"><i class="far fa-user-circle"></i><span>Vendeur</span></a></li>
                        <li class="nav-item"><a class="nav-link <?php if(strpos($url, "somme-content.php")){ echo "active";} ?>" href="somme-content.php"><i class="fas fa-user-circle"></i><span>Depot</span></a></li>
                        <li class="nav-item"><a class="nav-link <?php if(strpos($url, "produit-content.php")){ echo "active";} ?>" href="produit-content.php"><i class="fas fa-exclamation-circle"></i><span>Produit</span></a></li>
                        <li class="nav-item"><a class="nav-link <?php if(strpos($url, "commande-content.php")){ echo "active";} ?>" href="commande-content.php"><i class="fas fa-exclamation-circle"></i><span>Commande</span></a></li>
                        <li class="nav-item"><a class="nav-link <?php if(strpos($url, "facturation-content.php")){ echo "active";} ?>" href="facturation-content.php"><i class="fas fa-exclamation-circle"></i><span>Facture</span></a></li>
                        <li class="nav-item"><a class="nav-link <?php if(strpos($url, "facture-content.php")){ echo "active";} ?>" href="facture-content.php"><i class="fas fa-exclamation-circle"></i><span>Payement</span></a></li>
                        <li class="nav-item"><a class="nav-link <?php if(strpos($url, "depense-content.php")){ echo "active";} ?>" href="depense-content.php"><i class="fas fa-exclamation-circle"></i><span>Depense</span></a></li>
                        <li class="nav-item"><a class="nav-link <?php if(strpos($url, "livraison-content.php")){ echo "active";} ?>" href="livraison-content.php"><i class="fas fa-exclamation-circle"></i><span>Livraison</span></a></li>
                    </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php session_start(); include('header-admin.php') ?>
                <div class="container-fluid">