<?php
    include 'back-end/config.php';
        if (isset($_GET["title"])) {
            $title = $_GET["title"];
        } else {
            $title = "";
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Smarty Creative <?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Place your stylesheet here-->
    <link href="/css/stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <?php include 'navbar.php'; ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

    <main role="main" class="container" style="margin-top: 80px;">
        <?php 
            if (isset($_GET["id"])) {
        $pageid = $_GET["id"];
        $sql = "SELECT * FROM `pages` WHERE id = $pageid";
        $result = mysqli_query($connect, $sql);
        if(!$result){
                echo '<div class="alert alert-danger">Could not retrieve page from the database!</div>';
        } else {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $title = $row['title'];
            $content = $row['content'];
            $author = $row['author'];
            $commenting = $row['commenting'];
            $date = $row['date'];
        }
    
    } else {
                echo '<div class="alert alert-danger">Could not retrieve page from the database!</div>';
    }

    $datetime = strtotime($date);
    $newdate = date("d/m/Y", $datetime);
        ?>
            <?php echo $content; ?>
         <div class="d-flex">
            <div>
                <p class="mb-4">Created by <?php echo $author; ?></p>
            </div>
            <div class="ml-auto">
                 Published on: <?php echo $newdate; ?>
            </div> 
         </div>

    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>