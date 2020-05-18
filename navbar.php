<?php
    include 'back-end/config.php';
    

        // $sql = "SELECT * FROM pages LIMIT 6 SORT BY linkorder ASC";
        $sql = "SELECT * FROM pages ORDER BY linkorder ASC LIMIT 5";

        
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_array($result)) {
            $pageid = $row['id'];
            $title = $row['title'];
                echo '<li class="nav-item"><a class="nav-link" href="viewpage.php?id='.$pageid.'&title='.$title.'">'.$title.'</a></li>';   
          } 
                        
    ?>
                    
               