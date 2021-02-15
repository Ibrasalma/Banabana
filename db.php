<?php
    $host_name = 'localhost';
    $user_name = 'root';
    $password = '';
    $database_name = 'banabana';
    $conn = mysqli_connect($host_name, $user_name, $password,$database_name);
    if (!$conn) {
        die('connection impossible '.mysqli_connect_error());
    }
?>