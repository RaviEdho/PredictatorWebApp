<?php include 'connection.php';

    session_start();
    if(isset($_SESSION['id'])) {
        $uid = $_SESSION['id'];
        $jurusan = $_SESSION['jurusan'];
    } else {
        echo "<script>document.location='../index.php'</script>";
    }
    
    $retrieve = mysqli_query($connection, "SELECT * FROM pilihan WHERE userid = '$uid'");
    $datapilihan = [];
    while($row = mysqli_fetch_array($retrieve))
    {
        $datapilihan[] = $row;
    }

    $query = "SELECT * FROM nilai WHERE id = '$uid'";
    $retrieve = mysqli_query($connection, $query);

    $datanilai = [];
    while($row = mysqli_fetch_array($retrieve))
    {
        $datanilai[] = $row;
    }

    $r1 = ($datanilai[0]['mp1s1'] + $datanilai[0]['mp1s2'] + $datanilai[0]['mp1s3'] + $datanilai[0]['mp1s4'] + $datanilai[0]['mp1s5'])/5;
    $r2 = ($datanilai[0]['mp2s1'] + $datanilai[0]['mp2s2'] + $datanilai[0]['mp2s3'] + $datanilai[0]['mp2s4'] + $datanilai[0]['mp2s5'])/5;
    $r3 = ($datanilai[0]['mp3s1'] + $datanilai[0]['mp3s2'] + $datanilai[0]['mp3s3'] + $datanilai[0]['mp3s4'] + $datanilai[0]['mp3s5'])/5;
    $r4 = ($datanilai[0]['mp4s1'] + $datanilai[0]['mp4s2'] + $datanilai[0]['mp4s3'] + $datanilai[0]['mp4s4'] + $datanilai[0]['mp4s5'])/5;
    $r5 = ($datanilai[0]['mp5s1'] + $datanilai[0]['mp5s2'] + $datanilai[0]['mp5s3'] + $datanilai[0]['mp5s4'] + $datanilai[0]['mp5s5'])/5;
    $r6 = ($datanilai[0]['mp6s1'] + $datanilai[0]['mp6s2'] + $datanilai[0]['mp6s3'] + $datanilai[0]['mp6s4'] + $datanilai[0]['mp6s5'])/5;
    
    $query = "SELECT * FROM univ";
    $retrieve = mysqli_query($connection, $query);

    $dataprodi = [];
    while($row = mysqli_fetch_array($retrieve))
    {
        $datauniv[] = $row;
    }

    $query = "SELECT * FROM prodi WHERE jurusan = '$jurusan'";
    $retrieve = mysqli_query($connection, $query);

    $dataprodi = [];
    while($row = mysqli_fetch_array($retrieve))
    {
        $dataprodi[] = $row;
    }

    $peluang = [];
    foreach($dataprodi as $prodi){
        $peluang[$prodi['idprodi']] = (($prodi['b1']*$r1 + $prodi['b2']*$r2 + $prodi['b3']*$r3 + $prodi['b4']*$r4 + $prodi['b5']*$r5 + $prodi['b6']*$r6)/10)-(100/$prodi['dt']);

        if ($prodi['idprodi'] == $datapilihan[0]['idprodi1']) {
            $peluang1 = $peluang[$prodi['idprodi']];
            $namaprodi1 = $prodi['nama'];
        } else if($prodi['idprodi'] == $datapilihan[0]['idprodi2']) {
            $peluang2 = $peluang[$prodi['idprodi']] * 0.6;
            $namaprodi2 = $prodi['nama'];
        }
    }

    arsort($peluang);
    
    $peringkat = array_slice($peluang, 0, 5, true);
    $idperingkat = array_keys($peringkat);
    $peluangperingkat = array_values($peringkat);
    
    $query = "SELECT * FROM prodi WHERE idprodi = '$idperingkat[0]' OR idprodi = '$idperingkat[1]' OR idprodi = '$idperingkat[2]' OR idprodi = '$idperingkat[3]' OR idprodi = '$idperingkat[4]' OR idprodi = '$idperingkat[4]'";
    $retrieve = mysqli_query($connection, $query);

    $dataprodi2 = [];
    while($row = mysqli_fetch_array($retrieve))
    {
        $dataprodi2[] = $row;
    }

    foreach ($dataprodi2 as $p) {
        for($i = 0; $i < 5; $i++) {
            if($p['idprodi'] == $idperingkat[$i]) {
                $namaprodiperingkat[$i] = $p['nama'];
                $idptnperingkat[$i] = $p['idptn'];
            }
        }
    }
?>