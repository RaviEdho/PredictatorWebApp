<?php 
    include 'connection.php';

    session_start();

    $uid = $_SESSION['id'];
    $mp1s1 = $_POST['mp1s1'];
    $mp1s2 = $_POST['mp1s2'];
    $mp1s3 = $_POST['mp1s3'];
    $mp1s4 = $_POST['mp1s4'];
    $mp1s5 = $_POST['mp1s5'];
    $mp2s1 = $_POST['mp2s1'];
    $mp2s2 = $_POST['mp2s2'];
    $mp2s3 = $_POST['mp2s3'];
    $mp2s4 = $_POST['mp2s4'];
    $mp2s5 = $_POST['mp2s5'];
    $mp3s1 = $_POST['mp3s1'];
    $mp3s2 = $_POST['mp3s2'];
    $mp3s3 = $_POST['mp3s3'];
    $mp3s4 = $_POST['mp3s4'];
    $mp3s5 = $_POST['mp3s5'];
    $mp4s1 = $_POST['mp4s1'];
    $mp4s2 = $_POST['mp4s2'];
    $mp4s3 = $_POST['mp4s3'];
    $mp4s4 = $_POST['mp4s4'];
    $mp4s5 = $_POST['mp4s5'];
    $mp5s1 = $_POST['mp5s1'];
    $mp5s2 = $_POST['mp5s2'];
    $mp5s3 = $_POST['mp5s3'];
    $mp5s4 = $_POST['mp5s4'];
    $mp5s5 = $_POST['mp5s5'];
    $mp6s1 = $_POST['mp6s1'];
    $mp6s2 = $_POST['mp6s2'];
    $mp6s3 = $_POST['mp6s3'];
    $mp6s4 = $_POST['mp6s4'];
    $mp6s5 = $_POST['mp6s5'];
    $ptn1 = $_POST['ptn1'];
    $prodi1 = $_POST['prodi1'];
    $ptn2 = $_POST['ptn2'];
    $prodi2 = $_POST['prodi2'];
    
    $query = "UPDATE nilai
    SET mp1s1 = '$mp1s1', mp1s2 = '$mp1s2', mp1s3 = '$mp1s3', mp1s4 = '$mp1s4', mp1s5 = '$mp1s5',
    mp2s1 = '$mp2s1', mp2s2 = '$mp2s2', mp2s3 = '$mp2s3', mp2s4 = '$mp2s4', mp2s5 = '$mp2s5',
    mp3s1 = '$mp3s1', mp3s2 = '$mp3s2', mp3s3 = '$mp3s3', mp3s4 = '$mp3s4', mp3s5 = '$mp3s5',
    mp4s1 = '$mp4s1', mp4s2 = '$mp4s2', mp4s3 = '$mp4s3', mp4s4 = '$mp4s4', mp4s5 = '$mp4s5',
    mp5s1 = '$mp5s1', mp5s2 = '$mp5s2', mp5s3 = '$mp5s3', mp5s4 = '$mp5s4', mp5s5 = '$mp5s5',
    mp6s1 = '$mp6s1', mp6s2 = '$mp6s2', mp6s3 = '$mp6s3', mp6s4 = '$mp6s4', mp6s5 = '$mp6s5' WHERE id = '$uid' ";
    mysqli_query($connection, $query);
    $cek1 = mysqli_affected_rows($connection);

    $query = "UPDATE pilihan SET idptn1 = '$ptn1', idprodi1 = '$prodi1', idptn2 = '$ptn2', idprodi2 = '$prodi2' WHERE userid = '$uid'";
    mysqli_query($connection, $query);
    $cek2 = mysqli_affected_rows($connection);

    echo '<script>document.location="../dashboard"</script>'

?>