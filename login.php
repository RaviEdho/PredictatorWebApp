<?php include 'database/connection.php';
    session_start();
    if(isset($_SESSION['id'])) {
        echo '<script>document.location="index.php"</script>';
    }
?>


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

    <title>Masuk ke The Predictator</title>
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
        <div class="container-login">
            <div class="column-login-1">
                
            </div>
            <div class="column-login-2">
                <div class="login-box">
                    <div class="text-loginheader">Masuk ke <b>Predictator</b></div>
                    <form action="database/log.php" method="post" class="form-login">
                        <div class="text-cred">Username</div>
                        <input type="text" name="username" id="username" class="textarea-login" autocomplete="off" required>
                        <div class="text-cred">Password</div>
                        <input type="password" name="password" id="username" minlength="8" class="textarea-login" autocomplete="off" required>
                        <div class="login2column">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Tetap login</label>
                            <input type="submit" value="Masuk" class="button-login">
                        </div>
                        
                    </form>
                </div>
                <div class="infodaftar-login">
                    <p class="text-login">Belum punya akun The Predictator?</p>
                    <button class="button-registerlogin" onclick="document.location='register.php'">Daftar</button>
                </div>
            </div>
        </div>
    </div>
    

    <script src="javascript/script.js"></script>
</body>

</html>