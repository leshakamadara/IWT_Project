<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./finalstyle.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php

        include "./php/config.php";
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];
        }

        ?>


            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>

                <div class="field input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                <input type="submit" class="btn" name="submit" value="Sign Up" required>
                </div>

                <div class="links">
                    Already have account? <a href="login.php">Sign In</a>
                </div>

            </form>
        </div>
    </div>
    
</body>
</html>