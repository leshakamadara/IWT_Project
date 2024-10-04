<?php

session_start();

include("php/config.php");

if(!isset($_SESSION['true'])) {
    header("location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/Beforefinalstyle.css">
</head>
<body>
    <div class="nav" style="position: sticky; top:0; overflow:hidden;">
        <div class="logo">
            <a href="home.php">
                <img src ="./images/logo.png" width="80px" height="48px" alt="BusekaLogo" class="logo-image">
            </a>
        </div>

        <div class="right-links">
        <a href="#link">Manage Users</a>
        <a href="#link">Manage Drivers</a>
        <a href="#link">Manage Clerks</a>
        <a href="#link">Manage Bookings</a>
        <a href="#link">Manage Scedules</a>
        <a href="#link">Support Agents</a>

        </div>

        <div class="right-links">

            <?php

            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT * FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];

            }

        
            ?>
            <a href="edit.php">Change Profile</a>
            <a href="logout.php"><button class="btn">Logout</button></a>
        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="your-username">
                    <h1>Hello <b><?php echo $res_Uname ?></b>, Welcome</h1>
                </div>

                
            </div>
            <div class="bottom">
                <div class="email-email">
                    <p>Your email is <b><?php echo $res_Email ?></b></p>
                </div>

                <div class="your-age">
                    <p>Your Age <b><?php echo $res_Age ?> years</b></p>
                </div>
            </div>
        </div>
    </main>

    <div class="bannerhello">
    <img src ="images/admindash.png" style="width: 40%; display:block; margin-left:auto; margin-right:auto;">
    </div>
</body>
</html>