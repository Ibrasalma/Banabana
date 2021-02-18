<?php
    global $nom_content, $titre_content, $lien, $start, $end;
    $nom_content = "Factures";
    $titre_content = "Payer une facture";
    $lien = "payer-facture.php";
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
    $table_name = 'payement';
    $nombre_ligne = $_SESSION['limite'];
    $la_limite = '';
    if (!empty($nombre_ligne)) {
        $la_limite = "LIMIT ".$nombre_ligne;
    }
    $query_s = "SELECT * FROM $table_name";
    $query = "SELECT * FROM $table_name LIMIT $start, $display_par_page";
    $fields = mysqli_query ($conn, "SHOW COLUMNS FROM $table_name");
    $colums = mysqli_num_rows($fields);
    $result_s = mysqli_query($conn, $query_s) or die(mysqli_error($conn));
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    global $row_number;
    $row_number = mysqli_num_rows($result_s);
?>

    <thead>
        <tr>
        <?php while($row_col = mysqli_fetch_assoc($fields)) {?>
            <th><?php print_r($row_col['Field']) ;?></th>
        <?php } ?>
        </tr>
    </thead>
    <tbody>
        <tr class="warning no-result">
            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
        </tr>
    <?php
    if($row_number > 0){   
        while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["id_receipt"]; ?></td>
            <td><?php echo $row["versement"]; ?></td>
            <td><?php echo $row["total_paye"]; ?></td>
            <td><?php echo $row["reste"]; ?></td>
            <td><?php echo $row["date_paye"]; ?></td>
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
        <?php while($row_col = mysqli_fetch_assoc($fields)) {?>
            <th><?php print_r($row_col['Field']) ;?></th>
        <?php } ?>
        </tr>
    </tfoot>
    <?php
        include('template-content2.php') 
    ?>