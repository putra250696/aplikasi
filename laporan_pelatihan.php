<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/print.css" type="text/css"  />
</head>
<style>
@media print {
input.noPrint { display: none; }
}
</style>
<body class="body">
<div id="wrapper">
<?php
include "config/koneksi.php";

include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";
$tampil=mysql_query("select * from pegawai,pelatihan where pegawai.nip=pelatihan.nip order by id_pelatihan");
	echo "<h2 class='head'>LAPORAN PELATIHAN PEGAWAI</h2>
	<table class='tabel'>
	<thead>
  <tr>
	<td>No</td>
    <td>Nip</td>
	<td>Nama Pegawai</td>
    <td>Topik Pelatihan</td>
	<td>Tgl Pelatihan</td>
	<td>Hasil Pelatihan</td>
  </tr>
  </thead>";
  $no=1;
  function nilai($var){
	if($var>=60 and $var<65 ){
		echo "Buruk";
	}
	else if($var>=65 and $var<=75 ){
		echo "Cukup Baik";
	}
	else if($var>75 and $var<=85 ){
		echo "Baik";
	}
	
	else if($var>85 and $var<=95 ){
		echo "Sangat Baik";
	} 
	else {
		echo "N/A";
	}
}
  while($dt=mysql_fetch_array($tampil)){
  echo "<tr>
	<td>$no</td>
    <td>$dt[nip]</td>
    <td>$dt[nama]</td>
    <td>$dt[topik_pelatihan]</td>
	<td>".tgl_indo($dt['tgl_pelatihan'])."</td>
	<td>";nilai($dt['hasil_pelatihan']); echo "</td>
  </tr>";
  $no++;
  }
echo "  
</table>

	";
	?>
	<div>
	<input class="noPrint" type="button" value="Cetak Halaman" onclick="window.print()">
	</div>
</div>
</body>
</html>
