<?php
    include 'config.php';
    session_start();
    
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $date = mysqli_real_escape_string($connect, $_POST['dateInput']);
    $author = mysqli_real_escape_string($connect, $_POST['author']);
    $content = $_POST['contentbox'];
    $type = $_POST['type'];
    if(empty($_POST["commenting"])){
        $commenting = "off";
    } else {
        $commenting = mysqli_real_escape_string($connect, $_POST['commenting']);
    }

    $sql = "INSERT INTO `blogs` (title, content, author, date, commenting, type) 
            VALUES ('$title', '$content', '$author', '$date', '$commenting', '$type')";
    if(mysqli_query($connect, $sql)){
            echo '<div class="alert alert-success">Blog added successfully.</div>';
    } else{
            echo '<div class="alert alert-danger">There was an error connecting to the database. Try again later </div>';
    }

?>