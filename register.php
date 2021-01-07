<?php include 'database/connection.php';
    session_start();
    if(isset($_SESSION['id'])) {
        echo '<script>document.location="index.php"</script>';
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/style.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Questrial">
    <link type="text/css" rel="stylesheet" href="style/lightslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="javascript/lightslider.js"></script>

    <title>Daftar di The Predictator</title>
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
                <li><a href="about.php" class="navigation">About Us</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="container-register">
            <div class="column-register-1">
                <div class="text-attractfitur">Di Predictator, anda bisa...</div>
                <div class="slidingbox">
                    <ul id="lightSlider">
                        <li>
                            <div class="fiturbox">
                                <img src="assets/images/Attract-BarGraph.png" alt="">
                                <p>...memonitor perkembangan nilai rapor anda tiap semesternya.</p></div>
                        </li>
                        <li>
                            <div class="fiturbox">
                                <img src="assets/images/Attract-Percentage.png" alt="">
                                <p>...menghitung peluang kelolosan berdasarkan pilihan anda.</p></div>
                        </li>
                        <li>
                            <div class="fiturbox">
                                <img src="assets/images/Attract-Competition.png" alt="">
                                <p>...mengecek bagaimana persaingan pada prodi yang anda pilih.</p></div>
                        </li>
                        <li>
                            <div class="fiturbox">
                                <img src="assets/images/Attract-Recommendation.png" alt="">
                                <p>...mendapatkan rekomendasi prodi yang paling cocok berdasarkan nilai rapor anda.</p></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="column-register-2">
                <div class="register-box">
                    <div class="text-registerheader">Daftar akun baru <b>Predictator</b></div>
                    <form action="database/reg.php" method="post" class="form-register">
                        <div class="namacontainer">
                            <div class="column1">
                                <div class="text-cred">Nama Depan</div>
                                <input type="text" name="namadep" id="namabel" class="textarea-register" required maxlength="64">
                            </div>
                            <div class="column2">
                                <div class="text-cred">Nama Belakang</div>
                                <input type="text" name="namabel" id="namabel" class="textarea-register" required maxlength="64">
                            </div>
                        </div>
                        <div class="2column" style="display: flex; width: 100%; justify-content: center;">
                            <input type="radio" name="jurusan" id="ipa" value="ipa" required>
                            <label for="ipa">IPA</label>
                            <input type="radio" name="jurusan" id="ips" value="ips" required>
                            <label for="ips">IPS</label>
                        </div>
                        
                        <div class="text-cred">Username</div>
                        <input type="text" name="username" id="username" class="textarea-register" autocomplete="off" required>
                        <div class="text-cred">Password</div>
                        <input type="password" name="password" id="username" minlength="8" class="textarea-register" autocomplete="off" required>
                        <input type="submit" value="Daftar" class="button-register">
                    </form>
                </div>
                <div class="infomasuk-register">
                    <p class="text-register">Sudah pernah mendaftar di The Predictator?</p>
                    <button class="button-loginregister" onclick="document.location='login.php'">Masuk</button>
                </div>
            </div>
        </div>
    </div>

    <script src="javascript/script.js"></script>
    <script>
        $(document).ready(function() {
            $("#lightSlider").lightSlider({
                item: 1,
                auto: true,
                loop: true,
                pauseOnHover: true,
                pause: 3000,
                pager: false,
                slideMargin: 0,
                controls: false
            }); 
        });
    </script>
</body>
</html>