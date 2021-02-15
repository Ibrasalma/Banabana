<?php
    require_once('./db.php');
    $table_name = 'client';
    $query = "SELECT * FROM $table_name";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row_number = mysqli_num_rows($result);
    if($row_number > 0){
?>
<?php include('template.php') ?>
<div class="container-fluid">
    <h3 class="text-dark mb-4">Clients</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col" style="width: 400;text-align: left;">
                        <p class="text-primary m-0 font-weight-bold">Liste des clients</p>
                    </div>
                <div class="col"><a href="payer-facture.php" class="btn btn-primary" type="button" style="text-align: right;">Payer une facture</a></div>
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
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Email</th>
                            <th>Tel</th>
                            <th>Domaine</th>
                            <th>Date</th>
                            <th>Avatar</th>
                        </tr>
                    </thead>
                <tbody>
                <?php    
                    while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["nom"]; ?></td>
                        <td><?php echo $row["adresse"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["tel"]; ?></td>
                        <td><?php echo $row["domaine"]; ?></td>
                        <td><?php echo $row["date_enregistre"]; ?></td>
                        <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                    </tr>
                <?php 
                    }
                }else{
                    echo "<tr>la table ne contient aucune ligne</tr>";
                } 
                mysqli_close($conn);
                ?>         
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Email</th>
                        <th>Tel</th>
                        <th>Domaine</th>
                        <th>Date</th>
                        <th>Avatar</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6 align-self-center">
                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
            </div>
            <div class="col-md-6">
                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php include('template2.php') ?> 