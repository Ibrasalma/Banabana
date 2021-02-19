<?php
    global $nom_content, $titre_content, $lien, $start, $end;
    $nom_content = "Clients";
    $titre_content = "Enregistrer un nouveau client";
    $lien = "ajouter-client.php";
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
    $table_name = 'client';
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
        while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><button class="btn btn-success" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
            <?php foreach($column_array as $la_column){?>
            <td><?php if($la_column == 'photo'){
                    $initial = strpos($row[$la_column],$row['nom']) + strlen($row['nom']);
                    $final = strlen($row[$la_column]) - $initial;
                    $img = 'images/clients/'. substr($row[$la_column],$initial, $final); 
                    echo '<img class="rounded-circle mr-2" width="40" height="40" src="'.$img.'" alt="">';
                } else { 
                    echo $row[$la_column]; 
                }}?>
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