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

    $rata1 = ($data[0]['mp1s1'] + $data[0]['mp1s2'] + $data[0]['mp1s3']  + $data[0]['mp1s4'] + $data[0]['mp1s5'])/5;
    $rata2 = ($data[0]['mp2s1'] + $data[0]['mp2s2'] + $data[0]['mp2s3']  + $data[0]['mp2s4'] + $data[0]['mp2s5'])/5;
    $rata3 = ($data[0]['mp3s1'] + $data[0]['mp3s2'] + $data[0]['mp3s3']  + $data[0]['mp3s4'] + $data[0]['mp3s5'])/5;
    $rata4 = ($data[0]['mp4s1'] + $data[0]['mp4s2'] + $data[0]['mp4s3']  + $data[0]['mp4s4'] + $data[0]['mp4s5'])/5;
    $rata5 = ($data[0]['mp5s1'] + $data[0]['mp5s2'] + $data[0]['mp5s3']  + $data[0]['mp5s4'] + $data[0]['mp5s5'])/5;
    $rata6 = ($data[0]['mp6s1'] + $data[0]['mp6s2'] + $data[0]['mp6s3']  + $data[0]['mp6s4'] + $data[0]['mp6s5'])/5;

    if ($_SESSION['jurusan'] == 'ipa') {
        $mp4 = 'Fisika';
        $mp5 = 'Kimia';
        $mp6 = 'Biologi';
    } else {
        $mp4 = 'Sosiologi';
        $mp5 = 'Geografi';
        $mp6 = 'Ekonomi';
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
        <div class="container-rekap">
            Rekapitulasi Data Nilai Rapor Pengguna
            <div class="canvasoverview">
                <div class="canvasboxoverview"><div class="judulcanvas">Perbandingan Rata-Rata tiap Mata Pelajaran</div><canvas id="canvasrerata" height="200px"></canvas></div>
                <div class="canvasboxoverview">
                    <div class="judulcanvas">Rataan Seluruh Mata Pelajaran</div>
                    <canvas id="canvasrataan" height="175px"></canvas>
                    <div class="rataantotal"><?php echo number_format(($rata1 + $rata2 + $rata3 + $rata4 + $rata5 + $rata6)/6, 2)  ?></div>
                </div>
            </div>
            
            <div class="canvascontainer">
                <div class="canvasbox">
                    <div class="mapelinfo">
                        <div class="namamapel">Matematika</div>
                        <div class="reratainfo"><div class="textrerata">Rata-rata</div><div class="nilairerata"><?= $rata1 ?></div></div>
                    </div>
                    <canvas id="mapel1" height="200px"></canvas>
                </div>
                <div class="canvasbox">
                    <div class="mapelinfo">
                        <div class="namamapel">Bahasa Indonesia</div>
                        <div class="reratainfo"><div class="textrerata">Rata-rata</div><div class="nilairerata"><?= $rata2 ?></div></div>
                    </div>
                    <canvas id="mapel2" height="200px"></canvas>
                </div>
                <div class="canvasbox">
                    <div class="mapelinfo">
                        <div class="namamapel">Bahasa Inggris</div>
                        <div class="reratainfo"><div class="textrerata">Rata-rata</div><div class="nilairerata"><?= $rata3 ?></div></div>
                    </div>
                    <canvas id="mapel3" height="200px"></canvas>
                </div>
                <div class="canvasbox">
                    <div class="mapelinfo">
                        <div class="namamapel"><?= $mp4  ?></div>
                        <div class="reratainfo"><div class="textrerata">Rata-rata</div><div class="nilairerata"><?= $rata4 ?></div></div>
                    </div>
                    <canvas id="mapel4" height="200px"></canvas>
                </div>
                <div class="canvasbox">
                    <div class="mapelinfo">
                        <div class="namamapel"><?= $mp5 ?></div>
                        <div class="reratainfo"><div class="textrerata">Rata-rata</div><div class="nilairerata"><?= $rata5 ?></div></div>
                    </div>
                    <canvas id="mapel5" height="200px"></canvas>
                </div>
                <div class="canvasbox">
                    <div class="mapelinfo">
                        <div class="namamapel"><?= $mp6 ?></div>
                        <div class="reratainfo"><div class="textrerata">Rata-rata</div><div class="nilairerata"><?= $rata6 ?></div></div>
                    </div>
                    <canvas id="mapel6" height="200px"></canvas>
                </div>
            </div> 
        </div>
    </div>
    
    <script type="text/javascript" src="../javascript/script.js"></script>
    <script src="../javascript/Chart.js"></script>
    <script>
        let option = {
            legend: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 100,
                        stepSize: 20

                    }
                }]
            }
        }

        Chart.defaults.global.defaultFontSize = 14;
        Chart.defaults.global.defaultFontFamily = "'system-ui'";
        var rerata = document.getElementById('canvasrerata').getContext('2d');
        var rataan = document.getElementById('canvasrataan').getContext('2d');
        var mp1 = document.getElementById('mapel1').getContext('2d');
        var mp2 = document.getElementById('mapel2').getContext('2d');
        var mp3 = document.getElementById('mapel3').getContext('2d');
        var mp4 = document.getElementById('mapel4').getContext('2d');
        var mp5 = document.getElementById('mapel5').getContext('2d');
        var mp6 = document.getElementById('mapel6').getContext('2d');

        var chartsmean = new Chart(rerata, {
            type: 'polarArea',
            data: {
                labels: ['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', '<?=$mp4?>', '<?=$mp5?>', '<?=$mp6?>'],
                datasets: [{
                    label: 'Nilai',
                    data: [<?php echo $rata1.", ",$rata2.", ",$rata3.", ",$rata4.", ",$rata5.", ",$rata6 ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: false
            }
        });
        var chartsmean = new Chart(rataan, {
            type: 'doughnut',
            data: {
                labels: ['Rata-rata', ''],
                datasets: [{
                    label: 'Nilai',
                    data: ['<?php echo ($rata1 + $rata2 + $rata3 + $rata4 + $rata5 + $rata6)/6 ?>', '<?php echo 100-(($rata1 + $rata2 + $rata3 + $rata4 + $rata5 + $rata6)/6) ?>'],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }],
            },
            options: {
                legend: false
            }
        });
        var charts1 = new Chart(mp1, {
            type: 'bar',
            data: {
                labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5'],
                datasets: [{
                    label: 'Nilai',
                    data: [<?php echo $data[0]['mp1s1'].", ",$data[0]['mp1s2'].", ",$data[0]['mp1s3'].", ",$data[0]['mp1s4'].", ",$data[0]['mp1s5'] ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: option
        });
        var charts2 = new Chart(mp2, {
            type: 'bar',
            data: {
                labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5'],
                datasets: [{
                    label: 'Nilai',
                    data: [<?php echo $data[0]['mp2s1'].", ",$data[0]['mp2s2'].", ",$data[0]['mp2s3'].", ",$data[0]['mp2s4'].", ",$data[0]['mp2s5'] ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: option
        });
        var charts3 = new Chart(mp3, {
            type: 'bar',
            data: {
                labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5'],
                datasets: [{
                    label: 'Nilai',
                    data: [<?php echo $data[0]['mp3s1'].", ",$data[0]['mp3s2'].", ",$data[0]['mp3s3'].", ",$data[0]['mp3s4'].", ",$data[0]['mp3s5'] ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: option
        });
        var charts4 = new Chart(mp4, {
            type: 'bar',
            data: {
                labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5'],
                datasets: [{
                    label: 'Nilai',
                    data: [<?php echo $data[0]['mp4s1'].", ",$data[0]['mp4s2'].", ",$data[0]['mp4s3'].", ",$data[0]['mp4s4'].", ",$data[0]['mp4s5'] ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: option
        });
        var charts5 = new Chart(mp5, {
            type: 'bar',
            data: {
                labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5'],
                datasets: [{
                    label: 'Nilai',
                    data: [<?php echo $data[0]['mp5s1'].", ",$data[0]['mp5s2'].", ",$data[0]['mp5s3'].", ",$data[0]['mp5s4'].", ",$data[0]['mp5s5'] ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: option
        });
        var charts6 = new Chart(mp6, {
            type: 'bar',
            data: {
                labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5'],
                datasets: [{
                    label: 'Nilai',
                    data: [<?php echo $data[0]['mp6s1'].", ",$data[0]['mp6s2'].", ",$data[0]['mp6s3'].", ",$data[0]['mp6s4'].", ",$data[0]['mp6s5'] ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: option
        });
    </script>
</body>
</html>