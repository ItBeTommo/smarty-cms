<?php
    session_start();
    include 'back-end/config.php';

    if(!isset($_SESSION['id'])) {
        header("location: index.php");
    } else {
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
                <a class="dropdown-item" href="index.php?logout=1">Logout</a>
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
            <li class="breadcrumb-item active" aria-current="page">Home</li>
          </ol>
        </nav>
          <h1 class="h3 mb-1 text-gray-800">Dashboard</h1>
          <p class="mb-4">Hello <?php echo $_SESSION['firstname']; ?>, from this interface you will be able to make any changes to your website.</p>
            
            <div class="card border-danger">
              <div class="card-header">
                <strong class="text-danger">Polite Note</strong>
              </div>
              <div class="card-body">
                <h5 class="card-title">Under Development.</h5>
                <p class="card-text">While the CMS is still under Development, Unexpected errors may occur. Please make a back up of any content before changing it and report errors to Thomas.</p>
                    <a href="mailto:Thomas@smarty-creative.com?Subject=Dashboard%20Error" class="btn btn-danger">Report Error</a>
              </div>
            </div>
            <br />
          <!-- Content Row -->
            <div class="row">
              <div class="col-sm-6">
                <div class="card border-primary" style="margin-top: 3px;">
                  <div class="card-body">
                    <h5 class="card-title">Site Information</h5>
                    <p class="card-text">
                    <?php
                        if ($result = mysqli_query($connect, "SELECT * FROM `pages`")) {
                            $row_cnt = mysqli_num_rows($result);
                            printf("You currently have <strong> %d </strong> Pages.\n", $row_cnt);
                        }
                        echo "<br />";
                        if ($result = mysqli_query($connect, "SELECT * FROM `blogs`")) {
                            $row_cnt = mysqli_num_rows($result);
                            printf("You currently have <strong> %d </strong> Blogs.\n", $row_cnt);
                        }
                        echo "<br />";
                        if ($result = mysqli_query($connect, "SELECT * FROM `users`")) {
                            $row_cnt = mysqli_num_rows($result);
                            printf("You currently have <strong> %d </strong> Users.\n", $row_cnt);
                        }
                        echo "<br />";
                        if ($result = mysqli_query($connect, "SELECT * FROM `settings`")) {
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                $sitename = $row['sitename'];
                                $register = $row['allowregister'];
                            echo "Registration is currently: <strong>".$register."</strong>.<br />";
                        }
                        
                        
                    ?>
                      </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card border-success" style="margin-top: 3px;">
                  <div class="card-body">
                    <h5 class="card-title">Useful Links</h5>
                    <p class="card-text">You can view your content from these pages. These are dynamically updated.</p>
                    <a href="viewpage.php" class="btn btn-success" target="_blank">View Pages</a>
                    <a href="view-blog.php" class="btn btn-success" target="_blank">View Blogs</a>
                  </div>
                </div>
              </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        
        
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>
</html>