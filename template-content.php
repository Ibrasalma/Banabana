<?php 
    include('template.php');
    if(isset($_POST['change']) && !empty($_POST['change'])){
        $limite = $_POST['change'];
        $_SESSION['limite'] = $limite;
    }
    require_once('db.php');
    $query_client = "SELECT * FROM client ";
    $result_client = mysqli_query($conn, $query_client) or die(mysqli_error($conn));
    $row_number_client = mysqli_num_rows($result_client);
    $query_vendeur = "SELECT * FROM vendeur ";
    $result_vendeur = mysqli_query($conn, $query_vendeur) or die(mysqli_error($conn));
    $row_number_vendeur = mysqli_num_rows($result_vendeur);
    if($row_number_client > 0){
?>
<div class="container-fluid">
    <h3 class="text-dark mb-4"><?php echo $nom_content ;?></h3>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal">
    
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une facture</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-5">
                        <form class="col" action="test.php" method="POST">
                            <div class="form-group row">
                                <input class="form-control" type="text" id="numrecu" placeholder="deposit" name="numrecu">
                                <span style="color:red"><?php if(!empty($erro)) {echo '*'.$erro ;}?></span>
                            </div>
                            <div class="form-group row">
                                <select class="form-control" name="client">
                                    <optgroup label="Liste des clients">
                                    <?php    
                                        while($row_client = mysqli_fetch_assoc($result_client)){ ?>
                                        <option value="<?php echo $row_client["id"] ?>" placeholder="Client"><?php echo $row_client["nom"]. ' '.$row_client["adresse"] ?></option>
                                        <?php 
                                            }
                                        }else{
                                            echo "<tr>la table ne contient aucune ligne</tr>";
                                        }
                                    ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group row">
                                <select class="form-control " name="vendeur">
                                    <optgroup label="Liste des vendeurs">
                                    <?php
                                    if($row_number_vendeur > 0){    
                                        while($row_vendeur = mysqli_fetch_assoc($result_vendeur)){ ?>
                                        <option value="<?php echo $row_vendeur["id"] ?>" placeholder="vendeur"><?php echo $row_vendeur["nom"]. ' '.$row_vendeur["adresse"] ?></option>
                                        <?php 
                                        }
                                    }else{
                                        echo "<tr>la table ne contient aucune ligne</tr>";
                                    }
                                    ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <input class="btn btn-primary btn-block text-white btn-user" type="submit" name="submit" value="Inserer les lignes de commandes">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header py-3">
            <div class="row">
                <div class="col" style="width: 400;text-align: left;">
                    <p class="text-primary m-0 font-weight-bold">Liste des <?php if(!empty($limite)) {echo $limite;} echo ' '. $nom_content ;?></p>
                </div>
                <div class="col"><a <?php if($nom_content == 'Commandes') {echo ' data-toggle="modal" data-target="#modal"' ; } else{ echo 'href="'.$lien.'"' ;}  ?> class="btn btn-primary" type="button" style="text-align: right;"><?php echo $titre_content ;?></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 text-nowrap">
                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="formlimite">
                        <label>Montrer&nbsp;
                            <select class="form-control form-control-sm custom-select custom-select-sm" name="change" onChange="document.getElementById('formlimite').submit();">
                                <option value="10" <?php if(!empty($limite) && $limite == "10"){ echo "selected";} ?>>10</option>
                                <option value="25" <?php if(!empty($limite) && $limite == "25"){ echo "selected";} ?>>25</option>
                                <option value="50" <?php if(!empty($limite) && $limite == "50"){ echo "selected";} ?>>50</option>
                                <option value="100" <?php if(!empty($limite) && $limite == "100"){ echo "selected";} ?>>100</option>
                            </select>&nbsp;
                        </label>
                        <noscript><input type="submit" value="Changer" /></noscript>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-md-right dataTables_filter" id="dataTable_filter">
                    <span class="counter pull-right"></span><label><input type="search" class="form-control form-control-sm search" aria-controls="dataTable" placeholder="Search"></label>
                </div>
            </div>
        </div>
        <div class="table-responsive table mt-2 results" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table my-0" id="dataTable">