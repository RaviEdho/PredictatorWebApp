<?php include '../database/connection.php';

    session_start();
    if(!isset($_SESSION['id'])) {
        echo "<script>document.location='../index.php'</script>";
    } else {
        $uid = $_SESSION['id'];
    }
    
    $query = "SELECT * FROM nilai WHERE id = '$uid' ";
    $retrieve = mysqli_query($connection, $query);

    $data = [];
    while($row = mysqli_fetch_array($retrieve))
    {
        $data[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/style.css" >
    <link rel="stylesheet" href="../style/fullpage.css">

    <title>The Predictator</title>
</head>
<body>
    
    <nav class="dashboard">
        <div class="navcon-dashboard">
            <div class="navcol1-dashboard">
                <div class="logo"><a href="index.php" class="logolink">The Predictator</a></div>
            </div>
            <div class="navcol2-dashboard">
            <ul class="navigate">
                <li><button class="navigation" onclick="document.location='index.php'">Home</button></li>
                <li><button class="navigation" onclick="document.location='../search.php'">Data PTN</button></li>
                <li><button class="navigation" onclick="document.location='../about.php'">About Us</button></li>
                <?php if(isset($_SESSION['id'])): ?>
                <div class="separator" style="width: 10%;"></div>
                <li><button class="navigation" onclick="document.location='profile.php'"><?=$_SESSION['username'] ?></button></li>
                <li><button class="navigation logout" onclick="document.location='../database/logout.php'">Keluar</button></li>
                <?php endif ?>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="container-dash">
            Selamat datang di Predictator!
            <div class="containermenu">
                <button class="fiturbutton" onclick="document.location='landing.php'">Ubah Profil dan Pilihan</button>
                <button class="fiturbutton" onclick="document.location='rekap.php'">Rekapitulasi Nilai Semester</button>
                <button class="fiturbutton" onclick="document.location='prediksi.php'">Prediksi SNMPTN</button>
                <button class="fiturbutton" onclick="document.location='../search.php'">Data Perguruan Tinggi Negeri</button>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="../javascript/script.js"></script>
    <script src="../javascript/Chart.js"></script>
    </script>
</body>
</html>