<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA PENJUALAN MULTI
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA PENJUALAN</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-body table-responsive">
            <table id="penjualan" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID PENJUALAN</th>
                  <th>TANGGAL</th>
                  <th>PEGAWAI</th>
                  <th>TOTAL</th>
                  <th>DETAIL</th>
                </tr>
              </thead>
              <tbody>

                <?php
                include "conf/conn.php";
                $no = 0;
                $query = mysqli_query($connection, "SELECT * FROM `jual` WHERE 1;") or die(mysqli_error($connection));
                while ($row = mysqli_fetch_array($query)) {
                ?>

                  <tr>
                    <form method="POST" action="pages/multibarang/detail_jual.php">
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['tgl']; ?></td>
                      <td><?php echo $row['pegawai']; ?></td>
                      <td><?php echo $row['total']; ?></td>
                      <td>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <a href="index.php?page=detail&id=<?= $row['id']; ?>" class="btn btn-success" role="button" title="Detail Data"><i class="glyphicon glyphicon-edit"></i></a>
                      </td>
                    </form>
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
