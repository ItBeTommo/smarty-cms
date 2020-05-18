<?php
    include 'config.php';
    session_start();
    
    $pageid =  $_POST['pageid'];
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $date = mysqli_real_escape_string($connect, $_POST['dateInput']);
    $author = mysqli_real_escape_string($connect, $_POST['author']);
    $content = $_POST['contentbox'];
    $linkorder = $_POST['navorder'];
    if(empty($_POST["commenting"])){
        $commenting = "off";
    } else {
        $commenting = mysqli_real_escape_string($connect, $_POST['commenting']);
    }

//    $sql = "INSERT INTO pages (title, content, author, date, commenting, linkorder) 
//            VALUES ('$title', '$content', '$author', '$date', '$commenting', '$linkorder')";
    $sql = "UPDATE pages SET title='$title', content='$content', author='$author', date='$date', commenting='$commenting', linkorder='$linkorder' WHERE id = $pageid";
    if(mysqli_query($connect, $sql)){
            echo '<div class="alert alert-success">Page Updated successfully.</div>';
    } else{
            echo '<div class="alert alert-danger">There was an error connecting to the database. Try again later </div>';
    }

?>