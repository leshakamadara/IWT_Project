<?php
session_start();
$pageTitle = 'Register'; // Set the page title for the header
include "./php/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'BUSeka'; ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--Gicons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="css/finalstyle.css">
    <link rel="stylesheet" href="css/styles.css">
    
    <script src="js/script.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        .header {
            font-family:"Poppins", sans-serif;
        }

        .label {
            font-family:"Poppins", sans-serif;
        }

        input {
            font-family:"Poppins", sans-serif;
            font-weight: 200;
        }
    </style>

</head>
<body>
    <header class="hdr-xkj">
        <a href="index.php" class="lgo-qwz"><img class="img-lgo-qwz" src="images/logo.png" alt="BUSeka.png" height="48px" width="80px"></a>
        <nav class="nav-prt">
            <ul class="lst-mno">
                <li><a href="#" class="lnk-abc">Services</a></li>
                <li><a href="#" class="lnk-abc">About</a></li>
                <li><a href="#" class="lnk-abc">FAQ</a></li>
                <li><a href="#" class="lnk-abc">Contact Us</a></li>
            </ul>
        </nav>
        <div class="btn-grp-fgh">
            <?php if(!isset($_SESSION['true'])): ?>
                <a href="login.php"><button class="btn-ijk" style="font-weight: 400;">Login</button></a>
                <!--<a href="register.php"><button class="btn-ijk">Sign Up</button></a>-->
            <?php else: ?>
                <a href="logout.php"><button class="btn-ijk">Logout</button></a>
            <?php endif; ?>
        </div>
    </header>
    
<div class="signup-container" style="display: flex;">

<div class="sideimage">
    <img src="images/admindash.png" style="width: 800px; height:800px">
</div>

<div class="container" style="margin-top: 60px; margin-left:70px">
        <div class="box form-box">

        <?php

        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

            //Email uinquesness
            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
        
            if(mysqli_num_rows($verify_query) !=0) {

                echo "<div class='message'>
                            <p>This email is used,Try another One!</p>
                        </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }
            else{
                mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error Occured");

                echo "<div class='message'>
                            <p>Registration Succesfully!</p>
                        </div> <br>";
                echo "<a href='index.php'><button class='btn'>Login Now</button>";
            }

        }else{
        ?>

            <header>Sign Up</header>
            <form id="regForm" action="" method="post">
                <div class="field input">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
                <span id="errorUsername" class="error"></span>
                </div>

                <div class="field input">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" autocomplete="off" required>
                </div>

                <div class="field input">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname">
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                    <span id="errorEmail" class="error"></span>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                    <span id="errorAge" class="error"></span>
                </div>

                <div class="field input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
                <span id="errorPassword" class="error"></span>
                </div>

                <div class="field input">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" autocomplete="off" required>
                <span id="errorConfirmPassword" class="error"></span>
                </div>

                <!--Google reCaptcha code snippet-->
                <div class="g-recaptcha" data-sitekey="6LfPmFYqAAAAAGBHzmAwPNKWVKixf1sKjljVw2sy"  style="max-width: fit-content; margin-left:auto; margin-right:auto"></div>

                <div class="field">
                <input type="submit" class="btn" name="submit" value="Sign Up" required>
                </div>

                <div class="links">
                    Already have account? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>

</div>
    
    
//JS
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('regForm');
        const username = document.getElementById('username');
        const email = document.getElementById('email');
        const age = document.getElementById('age');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');

        form.addEventListener('submit', function(event) {
            let valid = true;

            if(username.value.trim().length < 6) {
                document.getElementById('errorUsername').textContent = 'Username must be at least 6 characters';
                valid = false;
            }
            else {
                document.getElementById('errorUsername').textContent = '';
            }
            
            // Copied email validation snippet accordingly tutorialspoint.com
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value.trim())) {
                document.getElementById('errorEmail').textContent = 'Please enter a valid email address';
                valid = false;
            } else {
                document.getElementById('errorEmail').textContent = '';
            }

            if(age.value < 18) {
                document.getElementById('errorAge').textContent = 'You must be at least 18 years old';
                valid = false;
            }
            else {
                document.getElementById('errorAge').textContent = '';
            }

            if(password.value.length < 4) {
                document.getElementById('errorPassword').textContent = 'Password must be at least 4 characters';
                valid = false;
            }
            else {
                document.getElementById('errorPassword').textContent = '';
            }

            if(password.value != confirmPassword.value) {
                document.getElementById('errorConfirmPassword').textContent = 'Passwords do not match!';
                valid = false;
            }
            else {
                document.getElementById('errorConfirmPassword').textContent = '';
            }

            if(valid == false) {
                event.preventDefault();
            }
        });
    });
    </script>

</body>
</html>