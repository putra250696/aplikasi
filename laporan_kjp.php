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
$tampil=mysql_query("select * from pegawai,k_jabatan where pegawai.nip=k_jabatan.nip order by pegawai.nip ASC");
	echo "<h2 class='head'>LAPORAN DATA KENAIKAN JABATAN  PEGAWAI</h2>
	<table class='tabel'>
	<thead>
  <tr>
	<td>No</td>
    <td>Nip</td>
	<td>Nama Pegawai</td>
    <td>History Jabatan Lama</td>
	<td>Jabatan Baru</td>
	<td>Masa Kerja</td>
	<td>Keterangan</td>
  </tr>
  </thead>";
  $no=1;
  while($dt=mysql_fetch_array($tampil)){
  $jo=mysql_query("select * from k_jabatan where nip='$dt[nip]'");
  $peg=mysql_fetch_array($jo);
  $kj=mysql_query("select * from h_jabatan where idkjb='$peg[idkjb]'");
  $cek=mysql_num_rows($kj);
  $kjj=mysql_query("select * from h_jabatan where idkjb='$peg[idkjb]' order by idh DESC");
  $kjk=mysql_fetch_array($kjj);
  echo "<tr>
	<td>$no</td>
    <td>$dt[nip]</td>
	<td>$dt[nama]</td>
    <td>";
	$no=1;
	while($jbo=mysql_fetch_array($kj)){
	$ptgl=explode('-',$jbo['tgl_ajb']);
	$atgl=explode('-',$jbo['tgl_kjb']);
	$pt=$ptgl[0];
	$at=$atgl[0];
	if($cek==1){
	echo "$jbo[jab_old] (Dari Tahun $pt S/D Tahun $at)";
	}else {
	 echo "$no. $jbo[jab_old] (Dari Tahun $pt S/D Tahun $at)</br>";
	 $no++;
		}
	}
	echo"</td>
	<td>$kjk[jabatan_baru]</td>
	<td>$dt[masa_kerja] Tahun</td>
	<td>$dt[keterangan]</td>
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
