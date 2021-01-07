<?php include '../database/connection.php';
    include '../database/predict.php';
    
    if(!isset($_SESSION['id'])) {
        echo "<script>document.location='../index.php'</script>";
    } else {
        $uid = $_SESSION['id'];
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
                <li><button class="navigation" onclick="document.location='..about.php'">About Us</button></li>
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
        <h3>Selamat datang di halaman Prediksi.</h3>
        <div class="container-prediksi">
            <div class="boxpilihan1">
                <img class="imgpilihan1" src="../assets/images/logouniv/<?=$datapilihan[0]['idptn1']?>.png" alt="">
                <div class="namaunivpilihan1"><?=$datauniv[$datapilihan[0]['idptn1']-1]['nama']?></div>
                <div class="namaprodipilihan1"><?=$namaprodi1?></div>
                <div class="persen1"><?=number_format($peluang1, 2)?>%</div>
            </div>
            <div class="boxpilihan2">
                <img class="imgpilihan2" src="../assets/images/logouniv/<?=$datapilihan[0]['idptn2']?>.png" alt="">
                <div class="namaunivpilihan2"><?=$datauniv[$datapilihan[0]['idptn2']-1]['nama']?></div>
                <div class="namaprodipilihan1"><?=$namaprodi2?></div>
                <div class="persen2"><?=number_format($peluang2, 2)?>%</div>
            </div>
        </div>
        <div class="peringkatbox">
            <h3>Rekomendasi Pilihan Prodi dari Kami</h3>
            <?php for($i = 0; $i < 5; $i++): ?>
                <div class="peringkat">
                    <div class="peringkatkiri">
                        <div class="namaprodiperingkat"><?=$namaprodiperingkat[$i]?></div>
                        <div class="namaunivperingkat"><?=$datauniv[$idptnperingkat[$i]-1]['nama']?></div>
                    </div>
                    <div class="peringkatkanan">
                        <div class="judulpersen">Persentase lolos</div>
                        <div class="persenperingkat"><?=number_format($peluangperingkat[$i], 2)?>%</div>
                    </div>
                </div>
                <hr class="line">
            <?php endfor ?>
            
        </div>
    </div>
    
    <script type="text/javascript" src="../javascript/script.js"></script>
    <script src="../javascript/Chart.js"></script>
    </script>
</body>
</html>