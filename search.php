<?php include 'database/connection.php';

    session_start();
    if(isset($_SESSION['id'])) {
        $uid = $_SESSION['id'];
    }
    
    if(isset($_GET['search'])) {
        $s = $_GET['search'];

        $query = "SELECT * FROM univ WHERE nama LIKE '%$s%' OR kota LIKE '%$s%' OR provinsi LIKE '%$s%'";
        $retrieve = mysqli_query($connection, $query);

        $data = [];
        while($row = mysqli_fetch_array($retrieve))
        {
            $data[] = $row;
        }
    } else {
        $query = "SELECT * FROM univ";
        $retrieve = mysqli_query($connection, $query);

        $data = [];
        while($row = mysqli_fetch_array($retrieve))
        {
            $data[] = $row;
        }
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
        <div class="containersearch">
            <div class="searchbar">
                <form action="" method="post" class="searchform">
                    <input type="text" name="keyword" id="keyword" autocomplete="off" value="<?php if(isset($_GET['search'])) { echo $s; }?>">
                    <input type="submit" value="CARI" id="searchbutton">
                </form>
            </div>
            <div class="searchresult" id="searchresult">
                <?php foreach ($data as $univ): ?>
                    <a href="ptn.php?id=<?=$univ['idptn']?>" class="linkuniv">
                        <div class="listuniv">
                            <div class="logouniv"><img src="assets/images/logouniv/<?=$univ['idptn']?>.png" alt=""></div>
                            <div class="infouniv">
                                <div class="namauniv"><?= $univ['nama'] ?></div>
                                <div class="lokasiuniv"><?= $univ['kota'].", ".$univ['provinsi'] ?></div>
                            </div>
                        </div>
                    </a>
                    <hr class="line">
                <?php endforeach ?>
            </div>
        </div>
    </div>
    
    <script>
        var keyword = document.getElementById('keyword');
        var tombolCari = document.getElementById('searchbutton');
        var container = document.getElementById('searchresult');
        
        keyword.addEventListener('keyup', function(){

            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    container.innerHTML = xhr.responseText;
                }
            }

            xhr.open('GET', 'database/ajaxsearch.php?keyword=' + keyword.value, true);
            xhr.send();
        });
    </script>
</body>
</html>
