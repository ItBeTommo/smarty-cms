<?php
    session_start();
    include 'back-end/config.php';

    if(!isset($_SESSION['id'])) {
        header("location: index.php");
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
                <li class="breadcrumb-item active" aria-current="page">Pages</li>
          </ol>
        </nav>
         <div class="d-flex">
            <div>
                <h1 class="h3 mb-1 text-gray-800">Blog Manager</h1>
                <p class="mb-4">From this page you can Create New blogs or modify existing ones.</p>
            </div>
            <div class="ml-auto">
                <a href="createblog.php" class="btn btn-success">New blog <span class="oi oi-plus" title="New Page" aria-hidden="true"></span></a> 
            </div> 
         </div>

            <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Title</th>
                      <th scope="col">Created On</th>
                      <th scope="col">Created By</th>
                      <th scope="col">Content Snippet.</th>
                      <th scope="col">Commenting</th>
                      <th scope="col">Blog Category</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                       <?php
                        $sql = "SELECT * FROM blogs LIMIT 50";

        
                        $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $blogid = $row['id'];
                                $title = $row['title'];
                                $content = $row['content'];
                                $author = $row['author'];
                                $date = $row['date'];
                                $commenting = $row['commenting'];
                                $type = $row['type'];
                                $shortContent = strip_tags(substr($content,0,50));
                                    echo '<tr> 
                                            <td>'.$title.'</td> 
                                            <td>'.$date.'</td> 
                                            <td>'.$author.'</td> 
                                            <td>'.$shortContent.'</td> 
                                            <td>'.$commenting.'</td> 
                                            <td>'.$type.'</td> 
                                            <td><a href="edit-blog.php?id='.$blogid.'"><span class="oi oi-pencil" title="edit" aria-hidden="true" style="color: #f4b623"></span></a> &nbsp; &nbsp; <a href="back-end/delete-blog.php?id='.$blogid.'" id="del-page"><span class="oi oi-x" title="Delete" aria-hidden="true" style="color: #b80303"></span></a></td>
                                          </tr>';
                                
                            } 
                        
                    ?>
                    
                  </tbody>
                </table>
            

        </div>
        <!-- /.container-fluid -->
        
        
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
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