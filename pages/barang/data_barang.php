<body> <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA BARANG
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA BARANG</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <a href="index.php?page=tambah_barang" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
          </div>
          <div class="box-body table-responsive">
            <table id="mahasiswa" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA BARANG</th>
                  <th>HARGA</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>

                <?php
                include "conf/conn.php";
                $no = 0;
                $query = mysqli_query($connection, "SELECT * FROM barang ORDER BY id DESC") or die(mysqli_error($connection));
                while ($row = mysqli_fetch_array($query)) {
                ?>

                  <tr>
                    <td><?php echo $no = $no + 1; ?></td>
                    <td><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td>
                      <center>
                        <a href="index.php?page=ubah_barang&id=<?= $row['id']; ?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="pages/barang/hapus_barang.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
                      </center>
                    </td>
                  </tr>
                </body>
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
    $('#barang').DataTable();
  });
</script>