<?php
    session_start();
    include 'config.php';

if(!isset($_POST["userid"]) || !isset($_POST["key"])) {
                echo '<p class="lead">Please try again</p>';
            } else {
                $userid = $_POST["userid"];
                $key = $_POST["key"];
                $time = time() - 86400;
                
                $userid = mysqli_real_escape_string($connect, $userid);
                $key = mysqli_real_escape_string($connect, $key);
                
                $sql = "SELECT userid FROM pwreset WHERE resetcode='$key' AND userid='$userid' AND time > '$time' AND status='pending'";
                $result = mysqli_query($connect, $sql);
                    if(!$result) {
                    echo '<div class="alert alert-danger">Sorry, Reset code invalid, Try again</div>';
                    }
    
                $count = mysqli_num_rows($result);
                if($count !== 1){
                    // echo '<div class="alert alert-danger">Sorry, Reset code invalid, Try again</div>';
                    exit;
                }
    
            $missingPassword = '<p>Please enter a password</p>';
            $invalidPassword = '<p>Please enter a valid password. Passwords must Contain Atleast
                                <ul>
                                    <li>1 Uppercase Character</li>
                                    <li>1 Number</li>
                                    <li>Atleast 6 Characters</li>
                                </ul></p>';

            $unmatchedPassword = '<p>Your passwords do not match. Try Again.</p>';
            $missingPassword2 = '<p>Please confirm your password.</p>';
    
        if(empty($_POST["password1"])) {
        $errors .= $missingPassword;
        } elseif(!(strlen($_POST["password1"])>5 and preg_match('/[A-Z]/', $_POST["password1"]) and preg_match('/[0-9]/', $_POST["password1"]))) {
            $errors .= $invalidPassword;
        } else {
            $password = filter_var($_POST["password1"], FILTER_SANITIZE_STRING);
                if(empty($_POST["password2"])) {
                    $errors .= $missingPassword2;
                } else {
                    $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
                        if ($password !== $password2) {
                            $errors .= $unmatchedPassword;
                        }
                }

        }
    
    
        if ($errors) {
            $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
            echo $resultMessage;
            
        } else {
    
        $password = mysqli_real_escape_string($connect, $password);
        $userid = mysqli_real_escape_string($connect, $userid);
        $password = hash('sha256', $password);
    
        // $check = "SELECT status FROM forgotpassword WHERE reset_key='$key' AND user_id='$userid'";
        //     $exists = mysqli_query($connect, $check);
        $sql = "UPDATE users SET password='$password' WHERE id = $userid";
        if(mysqli_query($connect, $sql)){
            echo '<div class="alert alert-success">Password Updated successfully.</div>';
                $deleterecord = "UPDATE pwreset SET status='used', resetcode='empty' WHERE resetcode='$key' AND userid='$userid'";
                mysqli_query($connect, $deleterecord);
        } else {
                echo '<div class="alert alert-danger">There was an error connecting to the database. Try again later </div>';
        }
        }
}
?>