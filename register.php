<!DOCTYPE html>
<?php include 'back-end/config.php'; ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Smarty CMS | Register</title>
    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Place your stylesheet here-->
    <link href="css/index-stylesheet.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
                <div class="text-center">
              <h3 class="login-heading mb-4"><span class="logoTextSpan">&lt;/</span>Smarty<span class="logoTextSpan">&gt;</span> CMS </h3>
                <?php 
                    if ($result = mysqli_query($connect, "SELECT * FROM `settings`")) {
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                $sitename = $row['sitename'];
                                $register = $row['allowregister'];
                            echo "Registration is currently: <strong>".$register."</strong>.<br />";
                            if($register == "enabled") {
                                echo '<h4>Register</h4>
                </div>
                <div id="register-msg"></div>
              <form method="post" id="register-form">
                <div class="form-label-group">
                  <input type="text" id="inputFName" name="first-name" class="form-control" placeholder="First Name" required autofocus>
                  <label for="inputFName">First Name</label>
                </div>
                  
                <div class="form-label-group">
                  <input type="text" id="inputLName" name="last-name" class="form-control" placeholder="Last Name" required autofocus>
                  <label for="inputLName">Last Name</label>
                </div>
                  
                <div class="form-label-group">
                  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email Address" required autofocus>
                  <label for="inputEmail">Email Address</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword2" name="password2" class="form-control" placeholder="Confirm Password" required>
                  <label for="inputPassword2">Confirm Password</label>
                </div>
                  
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Register</button>
                <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status" id="wait">
                      <span class="sr-only">Loading...</span>
                </div>
                </div>
                <div class="text-center">
                    <a class="small" href="#forgot-password">Forgot password?</a> - 
                    <a href="index.php" class="small">Already Registered? Sign In!</a></div>
              </form>';
                            } else {
                                echo "<h3>Sorry! Please contact an administrator to create an account on your behalf.";
                            }
                    } else {
                        echo "Couldn't connect to database";
                    }
                    ?>
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
      <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
      
  </script>

</body>
</html>