<?php
    session_start();
    include 'back-end/config.php';
    include 'back-end/logout.php';
    
?>
<!DOCTYPE html>
<html lang="en">
    

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Smarty CMS | Login</title>
    

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
                <h4>Administration Panel</h4>
                </div>
                
                <div id="login-msg"></div>
              <form method="post" id="login-form">
                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                  <label for="inputEmail">Email address</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
                  
                <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status" id="wait">
                      <span class="sr-only">Loading...</span>
                </div>
                </div>
                <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot password?</a> - 
                    <a href="register.php" class="small">Register</a></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- /#wrapper -->
    
<!--    Forgot Password    -->
<form method="post">
    <div class="modal" tabindex="-1" role="dialog" id="forgot-password">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Request a new Password!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="forgot-msg"></div>
                    <div class="form-group">
                        <input class="form-control" type="email" id="forgot-email" name="forgot-email" placeholder="Email Address">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info" name="forgot" value="Request Password">
                </div>
            </div>
        </div>
    </div>
</form>

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