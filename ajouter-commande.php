<?php 
    global $nom ;
    $nom = 'Commande';
    include('template-ajout.php');
    $numrecu = $_SESSION['numrecu'];
    $client = $_SESSION['client'];
    $vendeur = $_SESSION['vendeur'];
    require_once('db.php');
    require_once('helper.php');
    $produit = $quantity = $price = $date_com = $specification = "";
    $e_price = $e_quantity = "";
    if(isset($_POST['produit']) && isset($_POST['quantity']) && isset($_POST['price'])){
        if (!empty($_POST['produit'])) {
            $produit = test_entries($_POST['produit']);
        }
        if (empty($_POST['quantity'])) {
            $e_quantity = 'La quantité est réquise';
        } else {
            $quantity = test_entries($_POST['quantity']);
        }
        if (empty($_POST['price'])) {
            $e_price = 'Le prix est réquis';
        } else {
            $price = test_entries($_POST['price']);
        }
        if (!empty($_POST['date_com'])) {
            $date_com = test_entries($_POST['date_com']);
        }else{
            $date_com = date('Y-m-d');
        }
        if (!empty($_POST['specification'])) {
            $specification = test_entries($_POST['specification']);
        }
        $query = "INSERT INTO commander(numero_facture, client, vendeur, produit, quantite, prix_unitaire, date_commande, specification) VALUES('$numrecu', '$client', '$vendeur', '$produit', '$quantity', '$price', '$date_com','$specification')";
        $registrated = '';
        
        if(mysqli_query($conn,$query)){
            $registrated = 'Enrégistré avec succes';
            global $montant_total ;
            $montant_total = $montant_total + $quantity * $price;
        }else{
            $registrated = 'erreur :'.mysqli_error($conn);
        }
        echo $registrated;
    }
    
    $query_produit = "SELECT * FROM produit ";
    $result_produit = mysqli_query($conn, $query_produit) or die(mysqli_error($conn));
    $row_number_produit = mysqli_num_rows($result_produit);
?>
<div class="form-group row">
    <div class="col-sm-4">
        <input class="form-control " type="text" id="numrecu" placeholder="'$numrecu'" name="numrecu" readonly="readonly" value="<?php echo 'réçu No '.$numrecu; ?>">
    </div>
    <div class="col-sm-4">
        <input class="form-control " type="text" id="client" placeholder="'$numrecu'" name="client" readonly="readonly" value="<?php echo 'client No '. $client; ?>">
    </div>
    <div class="col-sm-4">
        <input class="form-control " type="text" id="vendeur" placeholder="'$vendeur'" name="vendeur" readonly="readonly" value="<?php echo 'vendeur No ' .$vendeur; ?>">
    </div>
</div>
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
<div class="form-group">
    <textarea class="form-control" name="specification"><?php if(!empty($specification)) {echo $specification ;}?></textarea>
</div>

<?php include('template-ajout2.php') ?>                          