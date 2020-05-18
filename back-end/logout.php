<?php
if(isset($_SESSION['id']) && $_GET['logout'] == 1) {
    session_destroy();
    setcookie("remember", "", "time()-3600");
}
?>