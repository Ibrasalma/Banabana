<?php
    global $nom_content, $titre_content, $lien, $start, $end;
    $nom_content = "Commandes";
    $titre_content = "Enregistrer une nouvelle commande";
    $lien = "ajouter-commande.php";
    if(isset($_POST["pagination"])){
        $page = $_POST["pagination"];
    }
    $start = 0;
    $display_par_page = 10;
    if(!empty($page)){
        $start = 10*($page-1);
    }
    $end = $start + $display_par_page;
    include('template-content.php');
    require_once('./db.php');
    $table_name = 'commander';
    $la_limite = '';
    if (!empty($_SESSION['limite'])) {
        $la_limite = "LIMIT ".$_SESSION['limite'];
    }
    $query_s = "SELECT * FROM $table_name $la_limite";
    $query = "SELECT * FROM $table_name LIMIT $start, $display_par_page";
    $fields = mysqli_query ($conn, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='banabana' AND TABLE_NAME = '$table_name'");
    $colums = mysqli_num_rows($fields);
    $result_s = mysqli_query($conn, $query_s) or die(mysqli_error($conn));
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    global $row_number;
    $row_number = mysqli_num_rows($result_s);
    
?>

    <thead>
        <tr>
            <th>Action</th>
            <?php while($row_col = mysqli_fetch_assoc($fields)) { $column_names[] = $row_col; }?>
            <?php $column_array = array_column($column_names, 'COLUMN_NAME') ?>
            <?php foreach($column_array as $la_column){?><th><?php echo column_gestion($la_column); }?></th>
        </tr>
    </thead>
    <tbody>
        <tr class="warning no-result">
            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
        </tr>
    <?php
    if($row_number > 0){   
        while($row = mysqli_fetch_assoc($result)){ $_SESSION['ide'] = $row['id'];?>
        <tr>
            <td>
                <button class="btn btn-success" style="margin-left: 5px;" type="submit" data-toggle="modal" data-target="#update_modal<?php echo $_SESSION['ide']; ?>">
                    <i class="fa fa-edit" style="font-size: 15px;"></i>
                </button>
                <button class="btn btn-danger" style="margin-left: 5px;" type="submit">
                    <i class="fa fa-trash" style="font-size: 15px;"></i>
                </button>
            </td>
            <?php foreach($column_array as $la_column){?>
            <td><?php 
                if($la_column == 'client'){
                    $id = $row['client'];
                    $query_client = "SELECT * FROM client WHERE id = '$id'";
                    $result_client = mysqli_query($conn, $query_client) or die(mysqli_error($conn));
                    while($row_client = mysqli_fetch_assoc($result_client)){echo $row_client['nom'];}
                }else if($la_column == 'vendeur'){
                    $id = $row['vendeur'];
                    $query_client = "SELECT * FROM vendeur WHERE id = '$id'";
                    $result_client = mysqli_query($conn, $query_client) or die(mysqli_error($conn));
                    while($row_client = mysqli_fetch_assoc($result_client)){echo $row_client['nom'];}
                }else if($la_column == 'produit'){
                    $id = $row['produit'];
                    $query_client = "SELECT * FROM produit WHERE id_produit = '$id'";
                    $result_client = mysqli_query($conn, $query_client) or die(mysqli_error($conn));
                    while($row_client = mysqli_fetch_assoc($result_client)){echo $row_client['slug'];}
                }
                else{
                    echo $row[$la_column];
                }
                }?>
            </td>
        </tr>
    <?php 
        }
    }else{
        echo "<tr>la table ne contient aucune ligne</tr>";
    } 
    ?>         
    </tbody>
    <tfoot>
        <tr>
        <?php while($row_col = mysqli_fetch_assoc($fields)) { $column_names[] = $row_col; }?>
        <?php $column_array = array_column($column_names, 'COLUMN_NAME') ?>
        <?php foreach($column_array as $la_column){?><th><?php echo column_gestion($la_column); }?></th>
        </tr>
    </tfoot>
</table>
</div>
    <div class="modal fade" role="dialog" tabindex="-1" id="update_modal<?php echo $_SESSION['ide']; ?>">
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
                    <form class="user" action="ajout-recu.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select class="form-control " name="produit">
                                    <optgroup label="Liste des produits">
                                    <?php
                                    if($row_number_produit > 0){    
                                        while($row_produit = mysqli_fetch_assoc($result_produit)){ ?>
                                        <option value="<?php echo $row_produit["id_produit"] ?>" placeholder="produit" <?php if($row_produit["id_produit"] == $produit) {echo "selected" ;}?>><?php echo $row_produit["nom"] ?></option>
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
                                <input class="form-control " type="number" id="quantity" placeholder="Quantité" name="quantity" value="<?php if(!empty($quantity)) {echo $quantity ;}?>">
                                <span style="color:red"><?php if(!empty($e_quantity)) {echo '*'.$e_quantity ;}?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input class="form-control " type="number" id="price" placeholder="Prix d'achat" name="price" value="<?php if(!empty($price)) {echo $price ;}?>">
                                <span style="color:red"><?php if(!empty($e_price)) {echo '*'.$e_price ;}?></span>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input class="form-control" type="date" name="date_com" value="<?php if(!empty($date_com)) {echo $date_com ;}?>">    
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input readonly class="form-control " type="number" id="price" placeholder="Prix d'achat" name="price" value="<?php if(!empty($row['id'])) {echo $row['id'] ;}?>">
                                <span style="color:red"><?php if(!empty($e_price)) {echo '*'.$e_price ;}?></span>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input class="form-control" type="date" name="date_com" value="<?php if(!empty($date_com)) {echo $date_com ;}?>">    
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="specification"><?php if(!empty($specification)) {echo $specification ;}?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <input class="btn btn-primary btn-block text-white btn-google btn-user" type="reset" name="cancel" value="Annuler l'ajout">
                                </div>
                                <div class="col">
                                    <input class="btn btn-primary btn-block text-white btn-user" type="submit" name="submit" value="Valider l'ajout">
                                </div>
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
    <?php
        include('template-content2.php') 
    ?>