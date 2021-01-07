<?php include 'database/connection.php'; 
session_start();
$query = "SELECT id, nama FROM univ";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/style.css" >
    <link rel="stylesheet" href="style/fullpage.css">

    <title>The Predictator</title>
</head>
<body>
    
    <nav class="home">
        <div class="navcon">
            <div class="navcol1">
                <div class="logo"><a href="index.php" class="logolink">The Predictator</a></div>
            </div>
            <div class="navcol2">
            <ul class="navigate">
                <li><a href="index.php" class="navigation">Home</a></li>
                <li><a href="search.php" class="navigation">Data PTN</a></li>
                <li><a href="about.php" class="navigation selected">About Us</a></li>
                <?php if(isset($_SESSION['id'])): ?>
                    <div class="separator" style="width: 10%;"></div>
                    <li><button class="navigation" onclick="document.location='dashboard'">Dashboard</button></li>
                    <li><button class="navigation logout" onclick="document.location='database/logout.php'">Keluar</button></li>
                <?php endif ?>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3>Greet the devs!</h3>
        <div class="container-about">
            <div class="aboutbox">
                <img src="assets/images/devs/1.jpg" alt="">
                <div class="namadev">Ravi Edho Nugraha</div>
                <div class="nimdev">11190910000038</div>
            </div>
            <div class="aboutbox">
                <img src="assets/images/devs/2.jpeg" alt="">
                <div class="namadev">Farhan Muhammad Najib</div>
                <div class="nimdev">11190910000033</div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="javascript/fullpage.js"></script>
</body>
</html>