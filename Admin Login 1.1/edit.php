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
    <title>Change Profile</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/Beforefinalstyle.css">
</head>
<body>
    <div class="nav" style="position: sticky; top:0; overflow:hidden;">
        <div class="logo">
            <a href="home.php">
                <img src ="images/logo.png" width="80px" height="48px" alt="BusekaLogo" class="logo-image">
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
            <a href="#">Change Profile</a>
            <a href="logout.php"><button class="btn">Logout</button></a>
        </div>
    </div>
    
    <div class="container">
        <div class="box form-box">
            <?php

            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                
                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', Age='$age' WHERE Id=$id") or die("error occured");

                if($edit_query){
                    echo "<div class='message'>
                        <p>Profile Updated Success!</p>
                    </div> <br>";
                    echo "<a href='home.php'><button class='btn'>Go to Home</button>";
                }
            }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                }

            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $res_Email;?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age;?>" autocomplete="off" required>
                </div>

                <div class="field">
                <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
    
</body>
</html>