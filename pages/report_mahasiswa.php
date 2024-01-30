<?php
ob_start();
include "../conf/conn.php";
require_once("../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$id = $_GET['id'];
$query = mysqli_query($connection, "select * from mahasiswa where id_mahasiswa='$id'");

$html = '<center><h3>Data Mahasiswa</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
  <tr>
  <th>No</th>
  <th>nim</th>
  <th>nama mahasiswa</th>
  <th>kelas</th>
  <th>jurusan</th>
  
  </tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
  $html .= "<tr><td>" . $no . "</td><td>" . $row['nim'] . "</td><td>" . $row['nama'] . "</td><td>" . $row['kelas'] . "</td><td>" . $row['jurusan'] . "</td></tr>";
  $no++;
}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_mahasiswa.pdf');
