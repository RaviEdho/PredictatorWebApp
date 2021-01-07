<?php include 'database/connection.php';

    session_start();
    $id = $_GET['id'];
    
    

    $univquery = "SELECT * FROM univ WHERE idptn = '$id'";
    $retrieveuniv = mysqli_query($connection, $univquery);

    if (isset($_SESSION['id'])) {
        $jurusan = $_SESSION['jurusan'];
        $prodiquery = "SELECT * FROM prodi WHERE idptn = '$id' AND  jurusan = '$jurusan' ";
    } else {
        $prodiquery = "SELECT * FROM prodi WHERE idptn = '$id'";
    }
    
    $retrieveprodi = mysqli_query($connection, $prodiquery);

    $univ = [];
    while($row = mysqli_fetch_array($retrieveuniv))
    {
        $univ[] = $row;
    }

    $prodi = [];
    while($row = mysqli_fetch_array($retrieveprodi))
    {
        $prodi[] = $row;
    }
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
    
    <nav class="dashboard">
        <div class="navcon-dashboard">
            <div class="navcol1-dashboard">
                <div class="logo"><a href="<?php if(isset($_SESSION['id'])) { echo 'dashboard'; } else { echo 'index.php';} ?>" class="logolink">The Predictator</a></div>
            </div>
            <div class="navcol2-dashboard">
            <ul class="navigate">
                <li><button class="navigation" onclick="document.location='index.php'">Home</button></li>
                <li><button class="navigation selected" onclick="document.location='search.php'">Data PTN</button></li>
                <li><button class="navigation" onclick="document.location='about.php'">About Us</button></li>
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
        <div class="container-ptn">
            <div class="boxptn">
                <div class="biglogouniv"><img src="assets/images/logouniv/<?=$id?>.png" alt=""></div>
                <div class="namaptn"><?= $univ[0]['nama'] ?></div>
                <div class="lokasiptn"><?= $univ[0]['kota'].", ".$univ[0]['provinsi'] ?></div>
            </div>
            <div class="boxprodi">
                <div class="listprodiheader">Daftar Prodi yang ditawarkan melalui SNMPTN</div>
                <?php foreach($prodi as $data): ?>
                    <div class="listprodi">
                        <div class="prodi">
                            <div class="namaprodi"><?=$data['nama']?></div>
                            <div class="dt">
                                <div class="dtheader">Daya tampung 2020</div>
                                <div class="dtvalue"><?=$data['dt']?></div>
                            </div>
                        </div>
                        <hr class="line">
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="javascript/script.js"></script>
</body>
</html>