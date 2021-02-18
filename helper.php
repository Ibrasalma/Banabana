<?php
    function test_entries($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function column_gestion($column){
        $column = strtr($column,"_"," ");
        return $column;
    }
?>