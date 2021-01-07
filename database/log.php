<?php
    include 'connection.php';

    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];
    $login = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username' AND password = '$password' " );

    $log = [];
    while($row = mysqli_fetch_array($login))
    {
        $log[] = $row;
    }

    if (count($log) != 1) {
        echo '<script>alert("Gagal masuk");document.location.href = "../index.php"</script>';
    }
    else {
        $_SESSION['username'] = $log[0]['username'];
        $_SESSION['id'] = $log[0]['id'];
        $_SESSION['jurusan'] = $log[0]['jurusan'];
        echo '<script>alert("Berhasil masuk");document.location.href = "../dashboard"</script>';
    }
?>