<?php
include "../../conf/conn.php";
if ($_POST) {
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $query = ("INSERT INTO barang(id,nama_barang,harga) VALUES ('','" . $nama_barang. "','" . $harga. "')");
    if (!mysqli_query($connection, "$query")) {
        die(mysqli_error($connection));
    } else {
        echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_barang"</script>';
    }
}
