<?php
    global $nom_content, $titre_content, $lien, $start, $end;
    $nom_content = "Suivi colis";
    $titre_content = "Enregistrer une nouvelle suivie de colis";
    $lien = "ajouter-livraison.php";
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
    $table_name = 'livraison';
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
        while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <?php for($i = 0; $i < count($column_array); $i++){?>
            <td>
                <?php
                    if($i == 1){
                        $arr = $column_array[1];
                        $id = $row[$arr];
                        $query_client = "SELECT * FROM facture WHERE id = '$id'";
                        $result_client = mysqli_query($conn, $query_client) or die(mysqli_error($conn));
                        while($row_client = mysqli_fetch_assoc($result_client)){echo $row_client['numero facture'];}
                    }
                    else{
                        echo $row[$column_array[$i]];
                    }}
                ?>
            </td>
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
        <?php while($row_col = mysqli_fetch_assoc($fields)) { $column_names[] = $row_col; }?>
        <?php $column_array = array_column($column_names, 'COLUMN_NAME') ?>
        <?php foreach($column_array as $la_column){?><th><?php echo column_gestion($la_column); }?></th>
        </tr>
    </tfoot>
    </table>
</div>
    <?php
        include('template-content2.php') 
    ?>