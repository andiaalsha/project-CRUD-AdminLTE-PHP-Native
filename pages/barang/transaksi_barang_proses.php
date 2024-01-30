<?php
include "../../conf/conn.php";
if ($_POST) {
    $id = $_POST['id'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $harga * $jumlah;
    $query = ("INSERT INTO penjualan(id_barang,harga,qty,total) VALUES
('" . $id . "','" . $harga . "','" . $jumlah . "','" . $total . "')");
    echo $query;
    if (!mysqli_query($connection, $query)) {
        die('mysqli_error');
    } else {
        echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_barang"</script>';
    }
}
?>