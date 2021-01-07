<?php
    include "connection.php";
    session_start();

    $namadep = $_POST['namadep'];
    $namabel = $_POST['namabel'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jurusan = $_POST['jurusan'];

    
    $query = "INSERT INTO user VALUES ('', '$username', '$password', '$namadep', '$namabel', '$jurusan') ";
    mysqli_query($connection, $query);
    $cek1 = mysqli_affected_rows($connection);

    $regnew = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username' ");

    $result = [];
    while($row = mysqli_fetch_array($regnew))
    {
        $result[] = $row;
    }
    $uid = $result[0]['id'];

    mysqli_query($connection, "INSERT INTO nilai VALUES ('$uid', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0') ");
    $cek2 = mysqli_affected_rows($connection);

    mysqli_query($connection, "INSERT INTO pilihan VALUES ('$uid', '0', '0', '0', '0', '0', '0') ");
    $cek2 = mysqli_affected_rows($connection);

    if ($cek1 > 0 && $cek2 > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $uid;
        $_SESSION['jurusan'] = $jurusan;
        echo '<script>document.location="../dashboard/landing.php"</script>';
    } else {
        echo '<script>alert("gagal mendaftar")</script>';
    }
?>