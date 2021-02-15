<?php 
    include('template.php');
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
                    <p class="text-primary m-0 font-weight-bold">Liste des <?php echo $nom_content ;?></p>
                </div>
                <div class="col"><a <?php if($nom_content == 'Commandes') {echo ' data-toggle="modal" data-target="#modal"' ; } else{ echo 'href="'.$lien.'"' ;}  ?> class="btn btn-primary" type="button" style="text-align: right;"><?php echo $titre_content ;?></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 text-nowrap">
                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                    <label>Show&nbsp;
                        <select class="form-control form-control-sm custom-select custom-select-sm">
                            <option value="10" selected="">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>&nbsp;
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-md-right dataTables_filter" id="dataTable_filter">
                    <label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label>
                </div>
            </div>
        </div>
        <script>
  $(function(){
    $('form').submit(function(e) {
      e.preventDefault()
      var $form = $(this)
      $.post($form.attr('action'), $form.serialize())
      .done(function(data) {
        $('#html').html(data)
        $('#formulaire').modal('hide')
      })
      .fail(function() {
        alert('ça ne marche pas...')
      })
    })
    $('.modal').on('shown.bs.modal', function(){
      $('input:first').focus()
    })
  });
</script>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table my-0" id="dataTable">