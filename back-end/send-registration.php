<?php
    include 'config.php';
    session_start();
    

//    Define Errors Messages 

$missingFN = '<p>Please enter a first name.</p>';
$missingLN = '<p>Please enter a last name.</p>';
$missingEmail = '<p>Please enter an Email Address.</p>';
$invalidEmail = '<p>Please enter a Valid Email Address.</p>';
$missingPassword = '<p>Please enter a password</p>';
$invalidPassword = '<p>Please enter a valid password. Passwords must Contain Atleast
                    <ul>
                        <li>1 Uppercase Character</li>
                        <li>1 Number</li>
                        <li>Atleast 6 Characters</li>
                    </ul></p>';

$unmatchedPassword = '<p>Your passwords do not match. Try Again.</p>';
$missingPassword2 = '<p>Please confirm your password.</p>';

//Getting user inputs

    if(empty($_POST["first-name"])) {
        $errors .= $missingFN;
    } else {
        $firstName = filter_var($_POST["first-name"], FILTER_SANITIZE_STRING);
    }

    if(empty($_POST["last-name"])) {
        $errors .= $missingLN;
    } else {
        $lastName = filter_var($_POST["last-name"], FILTER_SANITIZE_STRING);
    }

    if(empty($_POST["email"])) {
        $errors .= $missingEmail;
    } else {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors .= $invalidEmail;
            }
    }


    if(empty($_POST["password"])) {
        $errors .= $missingPassword;
    } elseif(!(strlen($_POST["password"])>5 and preg_match('/[A-Z]/', $_POST["password"]) and preg_match('/[0-9]/', $_POST["password"]))) {
        $errors .= $invalidPassword;
    } else {
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
            if(empty($_POST["password2"])) {
                $errors .= $missingPassword2;
            } else {
                $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
                    if ($password !== $password2) {
                        $errors .= $unmatchedPassword;
                    }
            }
        
    }

//Check for errors and print them.

if ($errors) {
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
}

$firstName = mysqli_real_escape_string($connect, $firstName);
$lastName = mysqli_real_escape_string($connect, $lastName);
$email = mysqli_real_escape_string($connect, $email);
$password = mysqli_real_escape_string($connect, $password);
//$password = md5($password);
$password = hash('sha256', $password);

//Check for existing account 

$checkForAccount = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($connect, $checkForAccount);
    if(!$result) {
        echo '<div class="alert alert-danger">Error running query. Try again later.<br /> ' . mysqli_error($connect) . '</div>';
    exit;
    }
    $results = mysqli_num_rows($result);
        if($results) {
            echo '<div class="alert alert-danger">Email already exists. Would you like to <a href="index.php">Log in</a></div>';
            exit;
        }

// Generate Activation Code
    //Byte: Unit of data = 8 bits
    //bit: 0 or 1
    //16 Bytes = 16*8 = 128bits
    $activationKey = bin2hex(openssl_random_pseudo_bytes(16));

    $createAccount = "INSERT INTO users (`firstname`, `lastname`, `email`, `password`, `activation`) VALUES ('$firstName', '$lastName', '$email', '$password', '$activationKey')";

    $created = mysqli_query($connect, $createAccount);
    if(!$created) {
        echo '<div class="alert alert-danger">Error running query. Try again later.<br /> ' . mysqli_error($connect) . '</div>';
        exit;
    }
    $message = "Thankyou for registering. Please click on this link to activate your account. \n\n";
    $message .= $siteUrl . "activate.php?email=" . urlencode($email) . "&key=$activationKey";
    if(mail($email, 'Confirm Your Registration', $message, 'From:'.'noreply@smarty-creative.com')) {
        echo '<div class="alert alert-success">Thankyou for your registration. A validation email has been sent to ' . $email . '. Please click on the activation link to activate your account.</div>';
    } else {
        echo '<div class="alert alert-danger">There was an error sending your email validation. Please contact an Admin.</div>';
    }

    
?>