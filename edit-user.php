<?php
    session_start();
    include 'back-end/config.php';
    $rights = $_SESSION['rights'];

    if(!isset($_SESSION['id'])) {
        header("location: index.php");
    }

    if (isset($_GET["id"]) && $rights == 2) {
        $userid = $_GET["id"];
        $sql = "SELECT * FROM `users` WHERE id = $userid";
//        $sql = "DELETE FROM users WHERE id = $id";
        $result = mysqli_query($connect, $sql);
        if(!$result){
                echo '<div class="alert alert-danger">Error running the query!</div>';
        } else {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $first = $row['firstname'];
            $last = $row['lastname'];
            $email = $row['email'];
            $permissions = $row['permissions'];
        }
    
    } else {
    echo "You don't have permissions to do that!";
    header("location: users.php");
}
    
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $user_id = $_SESSION['id'];
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Smarty CMS | Dashboard</title>
    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Place your stylesheet here-->
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css">
    <script src="https://cdn.tiny.cloud/1/wn3ehtx9e9c4kwymjl1uipp484v24ez4xgs5nvmn1qydivwg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><span class="logoTextSpan">&lt;/</span>Smarty<span class="logoTextSpan">&gt;</span> CMS</div>
      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item list-group-item-action bg-dark">Home</a>
        <a href="pages.php" class="list-group-item list-group-item-action bg-dark">Pages</a>
        <a href="blogs.php" class="list-group-item list-group-item-action bg-dark">Blog</a>
        <a href="users.php" class="list-group-item list-group-item-action bg-dark">Users</a>
        <a href="profile.php" class="list-group-item list-group-item-action bg-dark">Profile</a>
        <a href="settings.php" class="list-group-item list-group-item-action bg-dark">Settings</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link">You're logged in as <?php echo $firstname; ?> <?php echo $lastname; ?></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account Options
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Edit History</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Begin Page Content -->
        <div class="container-fluid" style="margin-top: 15px;">

          <!-- Page Heading -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit user</li>
          </ol>
        </nav>
         <div class="d-flex">
            <div>
                <h1 class="h3 mb-1 text-gray-800">Editing User</h1>
                <p class="mb-4">Making changes to user id: <?php echo $userid; ?> </p>
            </div>
            <div class="ml-auto">
                 <div class="spinner-border text-success" id="loading" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div> 
         </div>
            <div id="edit-msg"></div>
            <form method="post" id="edit-user">
              <div class="row">
                <div class="col">
                    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                    <label for="fName">First Name.</label>
                    <input type="text" class="form-control" name="fname" id="fName" value="<?php echo $first; ?>">
                </div>
                <div class="col">
                    <label for="fName">Last Name.</label>
                    <input type="text" class="form-control" name="lname" id="lName" value="<?php echo $last; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col">
                    <label for="fName">Email Address.</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                </div>
                <div class="col">
                   <label for="navorder">User Permissions</label>
                    <select class="form-control" id="perm" name="perms">
                      <option value="1">User</option>
                      <option value="2">Administrator</option>
                    </select>
                </div>
              </div>
                <br />
                    <div class="float-right">
                        <input id="submitButton" type="submit" class="btn btn-success" name="submit" value="Save Changes">
                    </div>
            </form>
            

        </div>
        <!-- /.container-fluid -->
        
        
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
      
                $("#loading").hide();
$("#edit-user").submit(function(event){
    //tinyMCE.triggerSave();
    event.preventDefault();
    var postedData = $(this).serializeArray();
    console.log(postedData);
    $.ajax({
        type: "POST",
        url: "back-end/send-edituser.php",
        data: postedData,
        success: function(data){
                $("#submitButton").hide();
                $("#edit-msg").html(data);
                $("#loading").show();
                window.setTimeout(function() {
                    window.location.href = 'users.php';
                }, 3000);
            },
        error: function() {
            $("#edit-msg").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Try again later.</div>");
        }
    });

});
  </script>

</body>
</html>