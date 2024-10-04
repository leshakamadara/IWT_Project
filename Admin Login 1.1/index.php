
<?php
session_start();
$pageTitle = 'Admin Login'; // Set the page title for the header
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" href="css/finalstyle.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js"></script>
</head>
<body>
<?php include 'headeradmin.php'; ?>

    <div class="container" style="display: flex;">
    
    <div class="sideimage">
        <img src="images/admindash.png" style="width: 600px; height:600px; margin-right:100px">
    </div>

        <div class="box form-box">
            <?php

            include("php/config.php");
            if(isset($_POST['submit'])){
                $username = mysqli_real_escape_string($con,$_POST['username']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Username = '$username' AND Password = '$password'") or die ("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['true'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                }
                else{
                    echo "<div class='message'>
                    <p>Invalid Username or Password</p>
                </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Go Back</button>";
                }
                if(isset($_SESSION['true'])) {
                    header("location:home.php");
                }
            }else{

            ?>
            
            <header style="font-family: Poppins;">Admin Login</header>
            <form action="" method="post">
                <div class="field input">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                </div>

                <div class="field" style="height: 60px;">
                <input type="submit" class="btn" name="submit" value="Login" required>
                </div>

                <div class="links">
                    Don't have account? <a href="register.php"> Sign Up</a>
                </div>

            </form>
        </div>
        <?php } ?> <!--else Display this form -->
    </div>
    
</body>
</html>