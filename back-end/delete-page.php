<?php
session_start();
include "config.php";
$rights = $_SESSION['rights'];

if (isset($_GET["id"]) && $rights == 2) {
    $id = $_GET["id"];
    $sql = "DELETE FROM pages WHERE id = $id";
    
    if(mysqli_query($connect, $sql)){
            echo '<div class="alert alert-success">Page deleted successfully.</div>';
            header("location: ../pages.php");
    } else{
            echo '<div class="alert alert-danger">There was an error connecting to the database. Try again later </div>';
    }
  
} else {
            header("location: ../pages.php");
}
?>