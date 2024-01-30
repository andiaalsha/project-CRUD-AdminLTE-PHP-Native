<?php
include "../../conf/conn.php";
if ($_POST) {
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $query = ("UPDATE barang SET nama_barang='$nama_barang',harga='$harga' WHERE id ='$id'");
    if (!mysqli_query($connection, "$query")) {
        die(mysqli_error($connection));
    } else {
        echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../../index.php?page=data_barang"</script>';
    }
}
