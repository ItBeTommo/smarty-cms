<?php
    include 'config.php';
    session_start();
    $sitename = mysqli_real_escape_string($connect, $_POST['sitename']);
    $register = mysqli_real_escape_string($connect, $_POST['register']);
    
    $sql = "UPDATE settings SET sitename='$sitename', allowregister='$register'";
    if(mysqli_query($connect, $sql)){
            echo '<div class="alert alert-success">Site Settings Updated successfully.</div>';
    } else{
            echo '<div class="alert alert-danger">There was an error connecting to the database. Try again later </div>';
    }

?>