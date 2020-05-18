<?php
    session_start();
    include 'back-end/config.php';
    
?>
<!DOCTYPE html>
<html lang="en">
    

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Smarty CMS | Reset Password</title>
    

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
                <h4>Request a New Passwoord</h4>
                </div>
                <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status" id="wait">
                      <span class="sr-only">Loading...</span>
                </div>
                </div>
                <div id="forgot-msg"></div>
             <form method="post" id="forgot-form">
                    <div class="form-group">
                        <input class="form-control" type="email" id="forgot-email" name="forgot-email" placeholder="Email Address">
                    </div>
                    <input type="submit" class="btn btn-info float-right" name="forgot" value="Request Password">
                    
                </form>
                
                <div class="text-center">
                    <a class="small" href="index.php">Login</a> - 
                    <a href="register.php" class="small">Register</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- /#wrapper -->
    
<!--    Forgot Password    -->


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
      
      
$("#forgot-form").submit(function(event){
    $("#wait").show();
    event.preventDefault();
    var postedData = $(this).serializeArray();
    $.ajax({
        type: "POST",
        url: "back-end/send-forgot.php",
        data: postedData,
        success: function(data){
                $("#wait").hide();
                $("#forgot-msg").html(data);
        },
        error: function() {
            $("#forgot-msg").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Try again later.</div>");
                $("#wait").hide();
        }
    });

});
      
  </script>

</body>
</html>