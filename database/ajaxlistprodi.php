<?php
    include 'connection.php';
    session_start();

    $id = $_GET["id"];
    $jurusan = $_SESSION['jurusan'];
    $searchquery = "SELECT * FROM prodi WHERE idptn = '$id' AND jurusan = '$jurusan'";
    $search = mysqli_query($connection, $searchquery);

    $result = [];
    while($row = mysqli_fetch_array($search))
    {
        $result[] = $row;
    }
?>

<option value="0">Pilih Program Studi...</option>
<select name="prodi" id="prodi" class="inputbox" style="margin-top: 5px; margin-bottom: 20px;">
    <?php foreach ($result as $prodi): ?>
        <option value="<?=$prodi['idprodi']?>"><?=$prodi['nama']?></option>
    <?php endforeach ?>
</select>
