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
    <title>Blogs</title>
    <style>
    /* Style tab links */
.tablink {
  background-color: #343A40;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 10px 10px;
  font-size: 17px;
  height: 60px;
  width: 25%;
  overflow: hidden;
}

.tablink:hover {
  background-color: #474F56;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: #343A40;
  display: none;
  padding: 100px 20px;
  height: 100%;
}
        
.spacer-5px {
    margin-bottom: 3px;
}
  
        
.blog-link{
    font-size: 18px;
}
.blog-link:hover{
    font-size: 18px;
    text-decoration: underline;
}

    </style>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Place your stylesheet here-->
    <link href="/css/stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>

<button class="tablink" onclick="openPage('Home', this, 'red')" id="defaultOpen">General</button>
<button class="tablink" onclick="openPage('Websites', this, 'green')">Websites</button>
<button class="tablink" onclick="openPage('Graphics', this, 'blue')">Graphics</button>
<button class="tablink" onclick="openPage('Updates', this, 'orange')">Updates</button>

<div id="Home" class="tabcontent">
    <div class="accordian" id="BlogAccordian">
<?php
$query2 = "SELECT * FROM `blogs` WHERE type = 'Blog'";
$result = mysqli_query($connect, $query2);
     while ($row = mysqli_fetch_array($result)) {
        $blogid = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $author = $row['author'];
        $date = $row['date'];
        $commenting = $row['commenting'];
        $type = $row['type'];
         echo '<div class="card border-dark">
                    <div class="card-header bg-dark" id="blog-'.$blogid.'">
                        <div class="d-flex">
                            <div>
                                <a href="#openblog'.$blogid.'"class="blog-link text-white" data-toggle="collapse" data-target="#openblog'.$blogid.'" aria-controls="openblog'.$blogid.'">
                                '.$title.'
                            </a>
                            </div>
                            <div class="ml-auto">
                                 <span class="text-white">Written By: '.$author.' - '.$date.'</span>
                            </div> 
                         </div>
                    </div>
                <div id="openblog'.$blogid.'" class="collapse" aria-labelledby="blog-'.$blogid.'" data-parent="#BlogAccordian">
                    <div class="card-body">
                        '.$content.'
                    </div>
                </div>
            </div><div class="spacer-5px"></div>';
     } 
                        
?>
    </div> 
</div>

<div id="Websites" class="tabcontent">
<?php
$query2 = "SELECT * FROM `blogs` WHERE type = 'Website Development'";
//$sql = 'SELECT * FROM `blogs` WHERE type="Blog"';
$result = mysqli_query($connect, $query2);
     while ($row = mysqli_fetch_array($result)) {
        $blogid = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $author = $row['author'];
        $date = $row['date'];
        $commenting = $row['commenting'];
        $type = $row['type'];
         echo '<div class="card border-dark">
                    <div class="card-header bg-dark" id="blog-'.$blogid.'">
                        <div class="d-flex">
                            <div>
                                <a href="#openblog'.$blogid.'"class="blog-link text-white" data-toggle="collapse" data-target="#openblog'.$blogid.'" aria-controls="openblog'.$blogid.'">
                                '.$title.'
                            </a>
                            </div>
                            <div class="ml-auto">
                                 <span class="text-white">Written By: '.$author.' - '.$date.'</span>
                            </div> 
                         </div>
                    </div>
                <div id="openblog'.$blogid.'" class="collapse" aria-labelledby="blog-'.$blogid.'" data-parent="#BlogAccordian">
                    <div class="card-body">
                        '.$content.'
                    </div>
                </div>
            </div><div class="spacer-5px"></div>';
     } 
                        
?>
</div>

<div id="Graphics" class="tabcontent">
<?php
$query2 = "SELECT * FROM `blogs` WHERE type = 'Graphic Design'";
//$sql = 'SELECT * FROM `blogs` WHERE type="Blog"';
$result = mysqli_query($connect, $query2);
     while ($row = mysqli_fetch_array($result)) {
        $blogid = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $author = $row['author'];
        $date = $row['date'];
        $commenting = $row['commenting'];
        $type = $row['type'];
         echo '<div class="card border-dark">
                    <div class="card-header bg-dark" id="blog-'.$blogid.'">
                        <div class="d-flex">
                            <div>
                                <a href="#openblog'.$blogid.'"class="blog-link text-white" data-toggle="collapse" data-target="#openblog'.$blogid.'" aria-controls="openblog'.$blogid.'">
                                '.$title.'
                            </a>
                            </div>
                            <div class="ml-auto">
                                 <span class="text-white">Written By: '.$author.' - '.$date.'</span>
                            </div> 
                         </div>
                    </div>
                <div id="openblog'.$blogid.'" class="collapse" aria-labelledby="blog-'.$blogid.'" data-parent="#BlogAccordian">
                    <div class="card-body">
                        '.$content.'
                    </div>
                </div>
            </div><div class="spacer-5px"></div>';
     } 
                        
?>
</div>

<div id="Updates" class="tabcontent">
<?php
$query2 = "SELECT * FROM `blogs` WHERE type = 'Site Updates'";
//$sql = 'SELECT * FROM `blogs` WHERE type="Blog"';
$result = mysqli_query($connect, $query2);
     while ($row = mysqli_fetch_array($result)) {
        $blogid = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $author = $row['author'];
        $date = $row['date'];
        $commenting = $row['commenting'];
        $type = $row['type'];
         echo '<div class="card border-dark">
                    <div class="card-header bg-dark" id="blog-'.$blogid.'">
                        <div class="d-flex">
                            <div>
                                <a href="#openblog'.$blogid.'"class="blog-link text-white" data-toggle="collapse" data-target="#openblog'.$blogid.'" aria-controls="openblog'.$blogid.'">
                                '.$title.'
                            </a>
                            </div>
                            <div class="ml-auto">
                                 <span class="text-white">Written By: '.$author.' - '.$date.'</span>
                            </div> 
                         </div>
                    </div>
                <div id="openblog'.$blogid.'" class="collapse" aria-labelledby="blog-'.$blogid.'" data-parent="#BlogAccordian">
                    <div class="card-body">
                        '.$content.'
                    </div>
                </div>
            </div><div class="spacer-5px"></div>';
     } 
                        
?>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    function openPage(pageName, elmnt, color) {
      // Hide all elements with class="tabcontent" by default */
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      // Remove the background color of all tablinks/buttons
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
      }

      // Show the specific tab content
      document.getElementById(pageName).style.display = "block";

      // Add the specific color to the button used to open the tab content
//      elmnt.style.backgroundColor = color;
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>

</body>
</html>