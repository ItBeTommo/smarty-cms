<?php 
    session_start();
    include 'config.php';

$missingEmail = '<p><stong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><stong>Please enter a valid email address!</strong></p>';

    if(empty($_POST["forgot-email"])){
        $errors .= $missingEmail;   
    }else{
        $email = filter_var($_POST["forgot-email"], FILTER_SANITIZE_EMAIL);
    }

    if($errors) {
        $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
        echo $resultMessage;   
    } else {
        $email = mysqli_real_escape_string($connect, $email);
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connect, $sql);
        // print_r ($result);
        if(!$result){
            echo '<div class="alert alert-danger">could not find email address.</div>';
        } else {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // print_r ($row);
            //Query Vars
            $user_id = $row['id'];
            $resetKey = bin2hex(random_bytes(16));
            $time = time();
            $status = "pending";
            
            // $sql2 = "INSERT INTO `forgotpassword` (user_id, reset_key, time, status) VALUES ('$user_id','$resetKey','$time','$status')";
            $createkey = "INSERT INTO pwreset (userid, resetcode, time, status) VALUES ('$user_id', '$resetKey', '$time', '$status')";
            
            $result = mysqli_query($connect, $createkey);
            // print_r ($result);
                if(!$result){
                    echo '<div class="alert alert-danger">Fatal Error: Could not create reset attempt.</div>';
                    exit;
                }
            $message = "We've received a request for you to reset your password. \n\n";
            $message .= "If this was not you, you can disregard this email. Otherwise click the link below to reset your password. \n\n";
            $message .= $siteUrl . "/reset-password.php?userid=$user_id&key=$resetKey";
            if(mail($email, 'SmartyCMS - Reset your password', $message, 'From:'.'noreply@smarty-creative.com')) {
                echo '<div class="alert alert-success">Thankyou for your request, A reset email has been sent too ' . $email . '. Please click on the activation link to reset your account.</div>';
            } else {
                echo '<div class="alert alert-danger">There was an error sending your email validation. Please contact an Admin.</div>';
            }
            
        }
    }
?>