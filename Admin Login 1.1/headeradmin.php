<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'BUSeka'; ?></title>
     <!--Google Fonts-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--Gicons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.j"></script>
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
                <a href="register.php"><button class="btn-ijk" style="font-weight: 400;">Sign Up</button></a>
            <?php else: ?>
                <a href="logout.php"><button class="btn-ijk">Logout</button></a>
            <?php endif; ?>
        </div>
    </header>
</body>
</html>