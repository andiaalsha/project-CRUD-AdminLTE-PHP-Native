<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DETAIL PENJUALAN MULTI
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA DETAIL PENJUALAN</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-body table-responsive">
            <table id="penjualan_multi" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>ID JUAL</th>
                  <th>ID BARANG</th>
                  <th>HARGA</th>
                  <th>QTY</th>
                  <TH>TOTAL</TH>
                </tr>
              </thead>
              <tbody>

              <?php
                include "conf/conn.php";
                $id=$_GET['id'];
                $no = 0;
                $query = mysqli_query($connection, "SELECT * FROM `detail_jual` WHERE id_jual='$id';") or die(mysqli_error($connection));
                while ($row = mysqli_fetch_array($query)) {
                ?>

                  <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['id_jual']; ?></td>
                <td><?php echo $row['id_barang']; ?></td>
                <td><?php echo $row['harga']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo $row['total']; ?></td>

                  </tr>

                <?php } ?>

              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
       
<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#penjualan').DataTable();
  });
</script>