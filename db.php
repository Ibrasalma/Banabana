<?php
    $host_name = 'localhost';
    $user_name = 'root';
    $password = '';
    $database_name = 'banabana';
    $table_name = 'login';
    $conn = mysqli_connect($host_name, $user_name, $password);
    if (!$conn) {
        die('connection impossible '.mysqli_error());
    }
    
?>