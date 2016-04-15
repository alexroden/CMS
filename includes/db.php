<?php
    
    //secure connection, array to constaint
    $db_array['db_host'] = 'localhost';
    $db_array['db_user'] = 'root';
    $db_array['db_pass'] = '';
    $db_array['db_name'] = 'cms';

    foreach($db_array as $key => $value) {
        define(strtoupper($key), $value);
    }

    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!$db) {
        echo "ABRDB01 connection error";
    } else {
        
    }

    
?>