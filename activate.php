<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Smarty CMS | Activate Account</title>
    <style>
    .masthead {
      height: 100vh;
      min-height: 500px;
      background-image: url('images/backgrounds/hotairballon.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      color: #fff;
    }</style>
    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Place your stylesheet here-->
    <link href="css/index-stylesheet.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>
    
<header class="masthead">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center">
          
        <?php 
            session_start();
            include 'back-end/config.php';

            if(!isset($_GET["email"]) || !isset($_GET["key"])) {
                echo '<h1 class="font-weight-light">Oops! An error occured.</h1>';
                echo '<p class="lead">Please try again</p>';
            } else {
                $email = $_GET["email"];
                $key = $_GET["key"];
                
                $email = mysqli_real_escape_string($connect, $email);
                $key = mysqli_real_escape_string($connect, $key);
                
                $activate = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
                $result = mysqli_query($connect, $activate);
                    if(mysqli_affected_rows($connect) == 1) {
                        echo '<h1 class="font-weight-light">Thankyou for Activating Your Account!</h1>';
                        echo '<p class="lead">You can now Login <br /><br /><a href="index.php" class="btn btn-success">Log in</a></p>';
                    } else {
                        echo '<h1 class="font-weight-light">Could not activate your account.</h1>';
                        echo '<p class="lead">Please try again</p>';
                    }
            }
        ?>
      </div>
    </div>
  </div>
</header>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>