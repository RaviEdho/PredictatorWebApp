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
                <li><a href="index.php" class="navigation selected">Home</a></li>
                <li><a href="search.php" class="navigation">Data PTN</a></li>
                <li><a href="about.php" class="navigation">About Us</a></li>
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
        <div class="container-home">
            <div class="column-home">
                <div class="img-biglogo">
                    <img src="assets/images/Predictator.png" alt="">
                </div>
                <div class="text-logo">The Predictator</div>
                <div class="text-logodesc">Your portal for a better SNMPTN</div>
            </div>
            <div class="column-home">
                <div class="box-attracthome">
                    <p style="margin-top: 0px;">Cari tau PTN impianmu</p>
                    <form action="search.php" method="get" class="form-searchptn">
                        <input type="search" name="search" id="keyword" placeholder="Masukkan nama PTN..." class="textarea-searchbar" onfocusout="hide()">
                        <input type="submit" value="Cari" class="button-searchhome">
                    </form>
                    <div class="hasilsearch" id="hasilsearch"></div>
                </div>
                <br>
                <?php if(!isset($_SESSION['id'])): ?>
                    <div class="infomasuk">
                        <p class="text-home">Mau prediksikan peluang kelulusanmu?</p>
                        <button class="button-homelogin" onclick="document.location='login.php'">Masuk</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="javascript/fullpage.js"></script>
    <script type="text/javascript">
        var myFullpage = new fullpage('#fullpage', {
        anchors: ['Page1', 'Page2', 'Page3', 'Page4'],
        navigation: true
    });</script>
</body>
</html>