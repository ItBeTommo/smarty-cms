<?php
    $host = "";
    $db = "";
    $username = "";
    $password = "";

// Site Settings
    //URL 
    $siteUrl = "http://localhost/";

    $connect = @mysqli_connect($host, $username, $password, $db) or die("Error: Unable to connect to database: $db - " . mysqli_connect_error());
//        echo "Succesfully Connected to DB";



?>