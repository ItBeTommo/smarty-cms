<?php
    include 'config.php';
    session_start();
    
    $userid =  $_POST['userid'];
    $fname = mysqli_real_escape_string($connect, $_POST['fname']);
    $lname = mysqli_real_escape_string($connect, $_POST['lname']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $perms = $_POST['perms'];
    $sql = "UPDATE users SET firstname='$fname', lastname='$lname', email='$email', permissions='$perms' WHERE id = $userid";
    if(mysqli_query($connect, $sql)){
            echo '<div class="alert alert-success">User Updated successfully.</div>';
    } else{
            echo '<div class="alert alert-danger">There was an error connecting to the database. Try again later </div>';
    }

?>