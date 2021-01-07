<?php include '../database/connection.php';
    session_start();
    if(!isset($_SESSION['id'])) {
        
    } else {
        $id = $_SESSION['id'];
        $jurusan = $_SESSION['jurusan'];
    }

    $retrieve = mysqli_query($connection, "SELECT * FROM nilai WHERE id = '$id'");
    $nilai = [];
    while($row = mysqli_fetch_array($retrieve))
    {
        $nilai[] = $row;
    }

    $datapilihan = mysqli_query($connection, "SELECT * FROM pilihan where userid = '$id'");
    $pilihan = [];
    while($row = mysqli_fetch_array($datapilihan))
    {
        $pilihan[] = $row;
    }

    $retrieve = mysqli_query($connection, "SELECT * FROM univ");
    $data = [];
    while($row = mysqli_fetch_array($retrieve))
    {
        $data[] = $row;
    }

    if($pilihan[0]['idptn1'] != 0 || $pilihan[0]['idptn2'] != 0) {
        $idptn1 = $pilihan[0]['idptn1'];
        $idptn2 = $pilihan[0]['idptn2'];
        $retrieve = mysqli_query($connection, "SELECT * FROM prodi WHERE (idptn = '$idptn1' OR idptn = '$idptn2') AND jurusan = '$jurusan'");
        $prodi = [];
        while($row = mysqli_fetch_array($retrieve))
        {
            $prodi[] = $row;
        }
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
        <div class="container-landing">
            <div class="subtitle-welcome">Selamat datang di Predictator! Silahkan isi data rapor dan pilihan untuk melanjutkan.</div>
            <form action="../database/input.php" method="post" class="input-nilai" id="forminputnilai">
                <div class="inputdialog">Matematika
                    <input type="number" name="mp1s1" id="mp1s1" class="inputbox" placeholder="Semester 1" min="0" max="100" value="<?php if($nilai[0]['mp1s1'] != 0)  { echo $nilai[0]['mp1s1']; } ?>">
                    <input type="number" name="mp1s2" id="mp1s2" class="inputbox" placeholder="Semester 2" min="0" max="100" value="<?php if($nilai[0]['mp1s2'] != 0)  { echo $nilai[0]['mp1s2']; } ?>">
                    <input type="number" name="mp1s3" id="mp1s3" class="inputbox" placeholder="Semester 3" min="0" max="100" value="<?php if($nilai[0]['mp1s3'] != 0)  { echo $nilai[0]['mp1s3']; } ?>">
                    <input type="number" name="mp1s4" id="mp1s4" class="inputbox" placeholder="Semester 4" min="0" max="100" value="<?php if($nilai[0]['mp1s4'] != 0)  { echo $nilai[0]['mp1s4']; } ?>">
                    <input type="number" name="mp1s5" id="mp1s5" class="inputbox" placeholder="Semester 5" min="0" max="100" value="<?php if($nilai[0]['mp1s5'] != 0)  { echo $nilai[0]['mp1s5']; } ?>">
                </div>
                <div class="inputdialog">Bahasa Indonesia
                    <input type="number" name="mp2s1" id="mp2s1" class="inputbox" placeholder="Semester 1" min="0" max="100" value="<?php if($nilai[0]['mp2s1'] != 0) { echo $nilai[0]['mp2s1']; } ?>">
                    <input type="number" name="mp2s2" id="mp2s2" class="inputbox" placeholder="Semester 2" min="0" max="100" value="<?php if($nilai[0]['mp2s2'] != 0) { echo $nilai[0]['mp2s2']; } ?>">
                    <input type="number" name="mp2s3" id="mp2s3" class="inputbox" placeholder="Semester 3" min="0" max="100" value="<?php if($nilai[0]['mp2s3'] != 0) { echo $nilai[0]['mp2s3']; } ?>">
                    <input type="number" name="mp2s4" id="mp2s4" class="inputbox" placeholder="Semester 4" min="0" max="100" value="<?php if($nilai[0]['mp2s4'] != 0) { echo $nilai[0]['mp2s4']; } ?>">
                    <input type="number" name="mp2s5" id="mp2s5" class="inputbox" placeholder="Semester 5" min="0" max="100" value="<?php if($nilai[0]['mp2s5'] != 0) { echo $nilai[0]['mp2s5']; } ?>">
                </div>
                <div class="inputdialog">Bahasa Inggris
                    <input type="number" name="mp3s1" id="mp3s1" class="inputbox" placeholder="Semester 1" min="0" max="100" value="<?php if($nilai[0]['mp3s1'] != 0) { echo $nilai[0]['mp3s1']; }  ?>">
                    <input type="number" name="mp3s2" id="mp3s2" class="inputbox" placeholder="Semester 2" min="0" max="100" value="<?php if($nilai[0]['mp3s2'] != 0) { echo $nilai[0]['mp3s2']; }  ?>">
                    <input type="number" name="mp3s3" id="mp3s3" class="inputbox" placeholder="Semester 3" min="0" max="100" value="<?php if($nilai[0]['mp3s3'] != 0) { echo $nilai[0]['mp3s3']; }  ?>">
                    <input type="number" name="mp3s4" id="mp3s4" class="inputbox" placeholder="Semester 4" min="0" max="100" value="<?php if($nilai[0]['mp3s4'] != 0) { echo $nilai[0]['mp3s4']; }  ?>">
                    <input type="number" name="mp3s5" id="mp3s5" class="inputbox" placeholder="Semester 5" min="0" max="100" value="<?php if($nilai[0]['mp3s5'] != 0) { echo $nilai[0]['mp3s5']; }  ?>">
                </div>
                <div class="inputdialog"><?php if($_SESSION['jurusan'] == 'ipa') echo 'Fisika'; else echo 'Sosiologi'; ?>
                    <input type="number" name="mp4s1" id="mp4s1" class="inputbox" placeholder="Semester 1" min="0" max="100" value="<?php if($nilai[0]['mp4s1'] != 0) { echo $nilai[0]['mp4s1']; } ?>">
                    <input type="number" name="mp4s2" id="mp4s2" class="inputbox" placeholder="Semester 2" min="0" max="100" value="<?php if($nilai[0]['mp4s2'] != 0) { echo $nilai[0]['mp4s2']; } ?>">
                    <input type="number" name="mp4s3" id="mp4s3" class="inputbox" placeholder="Semester 3" min="0" max="100" value="<?php if($nilai[0]['mp4s3'] != 0) { echo $nilai[0]['mp4s3']; } ?>">
                    <input type="number" name="mp4s4" id="mp4s4" class="inputbox" placeholder="Semester 4" min="0" max="100" value="<?php if($nilai[0]['mp4s4'] != 0) { echo $nilai[0]['mp4s4']; } ?>">
                    <input type="number" name="mp4s5" id="mp4s5" class="inputbox" placeholder="Semester 5" min="0" max="100" value="<?php if($nilai[0]['mp4s5'] != 0) { echo $nilai[0]['mp4s5']; } ?>">
                </div>
                <div class="inputdialog"><?php if($_SESSION['jurusan'] == 'ipa') echo 'Kimia'; else echo 'Geografi'; ?>
                    <input type="number" name="mp5s1" id="mp5s1" class="inputbox" placeholder="Semester 1" min="0" max="100" value="<?php if($nilai[0]['mp5s1'] != 0) { echo $nilai[0]['mp5s1']; } ?>">
                    <input type="number" name="mp5s2" id="mp5s2" class="inputbox" placeholder="Semester 2" min="0" max="100" value="<?php if($nilai[0]['mp5s2'] != 0) { echo $nilai[0]['mp5s2']; } ?>">
                    <input type="number" name="mp5s3" id="mp5s3" class="inputbox" placeholder="Semester 3" min="0" max="100" value="<?php if($nilai[0]['mp5s3'] != 0) { echo $nilai[0]['mp5s3']; } ?>">
                    <input type="number" name="mp5s4" id="mp5s4" class="inputbox" placeholder="Semester 4" min="0" max="100" value="<?php if($nilai[0]['mp5s4'] != 0) { echo $nilai[0]['mp5s4']; } ?>">
                    <input type="number" name="mp5s5" id="mp5s5" class="inputbox" placeholder="Semester 5" min="0" max="100" value="<?php if($nilai[0]['mp5s5'] != 0) { echo $nilai[0]['mp5s5']; } ?>">
                </div>
                <div class="inputdialog"><?php if($_SESSION['jurusan'] == 'ipa') echo 'Biologi'; else echo 'Ekonomi'; ?>
                    <input type="number" name="mp6s1" id="mp6s1" class="inputbox" placeholder="Semester 1" min="0" max="100" value="<?php if($nilai[0]['mp6s1'] != 0) { echo $nilai[0]['mp6s1']; } ?>">
                    <input type="number" name="mp6s2" id="mp6s2" class="inputbox" placeholder="Semester 2" min="0" max="100" value="<?php if($nilai[0]['mp6s2'] != 0) { echo $nilai[0]['mp6s2']; } ?>">
                    <input type="number" name="mp6s3" id="mp6s3" class="inputbox" placeholder="Semester 3" min="0" max="100" value="<?php if($nilai[0]['mp6s3'] != 0) { echo $nilai[0]['mp6s3']; } ?>">
                    <input type="number" name="mp6s4" id="mp6s4" class="inputbox" placeholder="Semester 4" min="0" max="100" value="<?php if($nilai[0]['mp6s4'] != 0) { echo $nilai[0]['mp6s4']; } ?>">
                    <input type="number" name="mp6s5" id="mp6s5" class="inputbox" placeholder="Semester 5" min="0" max="100" value="<?php if($nilai[0]['mp6s5'] != 0) { echo $nilai[0]['mp6s5']; } ?>">
                </div>
                <div class="inputdialogpilihan">
                    <label for="ptn1" class="inputtext">Pilihan PTN 1</label>
                    <select name="ptn1" id="ptn1" class="inputbox" onchange="theAjax1()" style="margin-top: 5px; margin-bottom: 20px;">
                        <option value="0">Pilih PTN...</option>
                        <?php foreach($data as $ptn): ?>

                            <option value="<?=$ptn['idptn']?>" <?php if($ptn['idptn'] == $pilihan[0]['idptn1']) {echo "selected"; } ?>><?=$ptn['nama']?></option>
                        <?php endforeach ?>
                    </select>
                    <label for="prodi1" class="inputtext">Pilihan Program Studi 1</label>
                    <select name="prodi1" id="prodi1" class="inputbox" <?php if($pilihan[0]['idprodi1'] == 0) {echo 'disabled="true"'; }?> style="margin-top: 5px; margin-bottom: 20px;">
                        <?php if($pilihan[0]['idprodi1'] != 0): ?>
                            <?php foreach ($prodi as $list): ?>
                                <?php if ($list['idptn'] == $pilihan[0]['idptn1']): ?>
                                    <option value="<?=$list['idprodi']?>" <?php if($list['idprodi'] == $pilihan[0]['idprodi1']) {echo "selected"; } ?>><?=$list['nama']?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php else: ?>
                            <option value="0">Pilih PTN terlebih dahulu...</option>
                        <?php endif ?>
                    </select>
                </div>
                <div class="inputdialogpilihan">
                    <label for="ptn2" class="inputtext">Pilihan PTN 2</label>
                    <select name="ptn2" id="ptn2" class="inputbox" onchange="theAjax2()" style="margin-top: 5px; margin-bottom: 20px;">
                        <option value="0">Pilih PTN...</option>
                        <?php foreach($data as $ptn): ?>
                            <option value="<?=$ptn['idptn']?>" <?php if($ptn['idptn'] == $pilihan[0]['idptn2']) {echo "selected"; } ?>><?=$ptn['nama']?></option>
                        <?php endforeach ?>
                    </select>
                    <label for="prodi2" class="inputtext">Pilihan Program Studi 2</label>
                    <select name="prodi2" id="prodi2" class="inputbox" <?php if($pilihan[0]['idprodi2'] == 0) {echo 'disabled="true"'; }?> style="margin-top: 5px; margin-bottom: 20px;">
                        <?php if($pilihan[0]['idprodi2'] != 0): ?>
                            <?php foreach ($prodi as $list): ?>
                                <?php if ($list['idptn'] == $pilihan[0]['idptn2']): ?>
                                    <option value="<?=$list['idprodi']?>" <?php if($list['idprodi'] == $pilihan[0]['idprodi2']) {echo "selected"; } ?>><?=$list['nama']?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php else: ?>
                            <option value="0">Pilih PTN terlebih dahulu...</option>
                        <?php endif ?>
                    </select>
                </div>
            </form>
            <div class="landingbuttonsgroup">
                <button type="submit" form="forminputnilai" value="Submit" class="landingbuttonsimpan">Simpan</button>
                <button class="landingbuttonskip" onclick="document.location='index.php'">Lewati</button>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="../javascript/script.js"></script>
    <script>
        var option1 = document.getElementById('ptn1');
        var container1 = document.getElementById('prodi1');
        
        function theAjax1(){
            var ajax1 = new XMLHttpRequest();
            ajax1.onreadystatechange = function(){
                if(ajax1.readyState == 4 && ajax1.status == 200){
                    container1.innerHTML = ajax1.responseText;
                }
            }
            if (option1.value != 0) {
                container1.disabled = false;
                ajax1.open('GET', '../database/ajaxlistprodi.php?id=' + option1.value, true);
                ajax1.send();
            } else {
                container1.disabled = true;
                container1.innerHTML = "<option value='0'>Pilih PTN terlebih dahulu...</option>";
            }
            
        }

        var option2 = document.getElementById('ptn2');
        var container2 = document.getElementById('prodi2');
        
        function theAjax2(){
            var ajax2 = new XMLHttpRequest();
            ajax2.onreadystatechange = function(){
                if(ajax2.readyState == 4 && ajax2.status == 200){
                    container2.innerHTML = ajax2.responseText;
                }
            }
            if (option2.value != 0) {
                container2.disabled = false;
                ajax2.open('GET', '../database/ajaxlistprodi.php?id=' + option2.value, true);
                ajax2.send();
            } else {
                container2.disabled = true;
                container2.innerHTML = "<option value='0'>Pilih PTN terlebih dahulu...</option>";
            }
            
        }
    </script>
</body>
</html>