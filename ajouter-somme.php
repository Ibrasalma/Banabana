<?php 
    global $nom ;
    $nom = 'Depot';
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
        <input class="form-control " type="text" id="adresse" placeholder="Adresse" name="adresse">
        <span style="color:red"><?php if(!empty($_SESSION['e_adresse'])) {echo '*'.$_SESSION['e_adresse'] ;}?></span>
    </div>
</div>
<div class="form-group files color row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input class="form-control" type="file" multiple="" name="files">
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input class="form-control" type="date">    
    </div>
</div>
<div class="form-group">
    <textarea class="form-control"></textarea>
</div>
<?php include('template-ajout2.php') ?>