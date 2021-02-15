<?php
    global $nom_content, $titre_content, $lien;
    $nom_content = "Clients";
    $titre_content = "Enregistrer un nouveau client";
    $lien = "ajouter-client.php";
    include('template-content.php');
    require_once('./db.php');
    $table_name = 'client';
    $query = "SELECT * FROM $table_name";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row_number = mysqli_num_rows($result);
    if($row_number > 0){
?>

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
    <?php include('template-content2.php') ?>