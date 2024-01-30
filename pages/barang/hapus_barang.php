<?php
include "../../conf/conn.php";
$id = $_GET['id'];
$query = ("DELETE FROM barang WHERE id ='$id'");
if (!mysqli_query($connection, "$query")) {
    die(mysqli_error($connection));
} else {
    echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="../../index.php?page=data_barang"</script>';
}
