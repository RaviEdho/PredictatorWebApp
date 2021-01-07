<?php
session_start();
unset ($_SESSION['username']);
unset ($_SESSION['id']);
unset ($_SESSION['jurusan']);

session_destroy();

echo "<script>document.location.href = '../index.php'</script>";
?>