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
    <title>Smarty CMS | Reset password</title>
    

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
                    
                <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status" id="wait">
                      <span class="sr-only">Loading...</span>
                </div>
                </div>
                <div id="forgot-msg"></div>
            <?php 
            if(!isset($_GET["userid"]) || !isset($_GET["key"])) {
                echo '<h3 class="font-weight-light">User ID or Reset Key Missing.</h3>';
                echo '<p class="lead">Please try again</p>';
            } else {
                $userid = $_GET["userid"];
                $key = $_GET["key"];
                $time = time() - 86400;
                
                $userid = mysqli_real_escape_string($connect, $userid);
                $key = mysqli_real_escape_string($connect, $key);
                
                $sql = "SELECT userid FROM pwreset WHERE resetcode='$key' AND userid='$userid' AND time > '$time' AND status='pending'";
                $result = mysqli_query($connect, $sql);
                    // print_r($result);
                    if(!$result) {
                        echo '<h3 class="font-weight-light">Oops! An error occured.</h3>';
                        echo '<p class="lead">Unable to validate your reset information in the database.</p>';
                    } else {
                        echo '<h3 class="font-weight-light">Please enter a new password.</h3>';
                        echo '
                            <form method="post" id="pwreset">
                                <input type="hidden" name="userid" value="'.$userid.'">
                                <input type="hidden" name="key" value="'.$key.'">
                                <div class="form-group">
                                <input type="password" name="password1" placeholder="Enter New Password" id="password1" class="form-control" required>
                                </div>
                                <div class="form-group">
                                <input type="password" name="password2" placeholder="Confirm New Password" id="password2" class="form-control" required>
                                </div>
                                <input type="submit" class="btn btn-success" id="resetpw" name="resetpw" value="Reset Password">
                            </form>
                        ';
                    }
            }
        ?>
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
</div>
  <!-- /#wrapper -->
    
<!--    Forgot Password    -->
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $("#wait").hide();
        $("#pwreset").submit(function(event){
            $("#wait").show();
            event.preventDefault();
            var postedData = $(this).serializeArray();
            $.ajax({
                type: "POST",
                url: "back-end/send-resetpass.php",
                data: postedData,
                success: function(data){
                     if (data == '<div class="alert alert-success">Password Updated successfully.</div>'){
                            $("#wait").show();
                            $("#forgot-msg").html(data);
                            window.setTimeout(function() {
                                window.location.href = 'index.php';
                            }, 5000);
                        } else {
                            
                        $("#wait").hide();
                        $("#forgot-msg").html(data);
                        }
                        
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