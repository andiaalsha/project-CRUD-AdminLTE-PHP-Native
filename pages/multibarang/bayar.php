<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<?php
if (!empty($_SESSION['kantong_belanja'])) {
?>
    <h4>Daftar Belanja Anda</h4>
    <br>
    <table class="table table-bordered">
        <tr align="center">
            <th>No</th>
            <th>Nama Barang</th>
            <th>Pembelian</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
        <?php
        if (isset($_SESSION['kantong_belanja'])) {
            $cart = unserialize(serialize($_SESSION['kantong_belanja']));
            $index = 0;
            $no = 1;
            $total = 0;
            $total_bayar = 0;
            for ($i = 0; $i < count($cart); $i++) {
                $total = $_SESSION['kantong_belanja'][$i]['harga'] *
                    $_SESSION['kantong_belanja'][$i]['pembelian'];
                $total_bayar += $total;
        ?>
                <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td><?= $cart[$i]['nama_barang']; ?></td>
                    <td align="center"><?= $cart[$i]['pembelian']; ?></td>
                    <td><?= $cart[$i]['harga']; ?></td>
                    <td><?= $total; ?></td>
                </tr>
            <?php
                $index++;
            }
            ?>
            <tr>
                <td colspan="4" align="right"><strong>Total Bayar</strong></td>
                <td><strong><?= $total_bayar; ?></strong></td>
                <td align="center">
                </td>
            </tr>
            <form method="POST" action="pages/multibarang/bayar_proses.php">
                <tr>
                    <td>Total Belanja</td>
                    <td><input class="form-control" type="number" name="total" id="total" value="<?= $total_bayar; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Jumlah Bayar</td>
                    <td><input class="form-control" type="number" name="bayar" id="bayar" min="<?= $total_bayar; ?>" onKeyup="hitung();"></td>
                </tr>
                <tr>
                    <td>Kembali</td>
                    <td><input class="form-control" type="number" name="kembali" id="kembali" readonly></td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i>Bayar</button>
                    </td>
                </tr>
            </form>
    </table>
    <br>
    <hr>
<?php
        }
    }
?>
<script type="text/javascript">
    function hitung() {
        var bayar = document.getElementById('bayar').value;
        var total = document.getElementById('total').value;
        var result = bayar - total;
        if (!isNaN(result)) {
            document.getElementById('kembali').value = result;
        }
    }
</script>