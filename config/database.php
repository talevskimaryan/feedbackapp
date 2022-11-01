<?php
    // define('DB_HOST', 'localhost');
    // define('DB_USER', 'u481314463_talevski');
    // define('DB_PASS', 'Laptop123!');
    // define('DB_NAME', 'u481314463_wds');

    define('DB_HOST', 'localhost');
    define('DB_USER', 'Talevski');
    define('DB_PASS', 'Laptop123!');
    define('DB_NAME', 'wds_database');

    //Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //Check connection
    if($conn->connect_error) {
        die('Connection Failed '.$conn->connect_error);
    }
?>