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