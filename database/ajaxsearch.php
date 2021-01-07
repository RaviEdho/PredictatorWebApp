<?php
    include 'connection.php';


    $keyword = $_GET["keyword"];
    $searchquery = "SELECT * FROM univ WHERE nama LIKE '%$keyword%' OR kota LIKE '%$keyword%' OR provinsi LIKE '%$keyword%'";
    $search = mysqli_query($connection, $searchquery);

    $result = [];
    while($row = mysqli_fetch_array($search))
    {
        $result[] = $row;
    }
?>

<?php if (count($result) == 0): ?>
    Tidak ada hasil yang ditemukan :(
<?php endif ?>

<?php foreach ($result as $univ): ?>
    <a href="ptn.php?id=<?=$univ['idptn']?>" class="linkuniv">
        <div class="listuniv">
            <div class="logouniv"><img src="assets/images/logouniv/<?=$univ['idptn']?>.png" alt=""></div>
            <div class="infouniv">
                <div class="namauniv"><?= $univ['nama'] ?></div>
                <div class="lokasiuniv"><?= $univ['kota'].", ".$univ['provinsi'] ?></div>
            </div>
        </div>
    </a>
    <hr>
<?php endforeach ?>