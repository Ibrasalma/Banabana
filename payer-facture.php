<?php 
    global $nom ;
    $nom = 'Payement de facture';
    include('template-ajout.php') 
?>
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <select class="form-control ">
            <optgroup label="This is a group">
                <option value="12" selected="" placeholder="Client">This is item 1</option>
                <option value="13">This is item 2</option>
                <option value="14">This is item 3</option>
            </optgroup>
        </select>
    </div>
    <div class="col-sm-6">
        <input class="form-control" type="text" id="nom" placeholder="nom" name="nom">
        <span style="color:red"><?php if(!empty($_SESSION['e_adresse'])) {echo '*'.$_SESSION['e_adresse'] ;}?></span>
    </div>
</div>
<div class="form-group row ">
    <input class="form-control" type="date">
</div>
<?php include('template-ajout2.php') ?>                          