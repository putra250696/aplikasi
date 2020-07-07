<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LAPORAN DATA ABSENSI PERIODE</title>
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
SESSION_START();
include "config/koneksi.php";

include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";
$nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                      "Juni", "Juli", "Agustus", "September", 
                      "Oktober", "November", "Desember");
$bln=$_SESSION['bln'];
$thn=$_SESSION['thn']; 
$bln=strtoupper($nama_bln[$bln]);
$tampil=mysql_query("select * from pegawai,jabatan,bagian where pegawai.id_jab=jabatan.id_jab and
pegawai.id_bag=bagian.id_bag");
$cekabsen=mysql_query("select * from absensi where Month(tanggal_absen)='$bln' and Year(tanggal_absen)='$thn'");
$cek=mysql_num_rows($cekabsen);
if($cek>0){
	echo "<h2 class='head'>LAPORAN DATA ABSENSI PERIODE $bull $_POST[tahun]</h2>
	<table class='tabel'>
	<thead>
  <tr>
	<td rowspan='2'>No</td>
    <td rowspan='2'>Nip</td>
	<td rowspan='2'>Nama Pegawai</td>
    <td rowspan='2'>Bagian</td>
	<td rowspan='2'>Kehadiran</td>
	<td colspan='2'>Tidak Hadir</td>
	<td rowspan='2'>Terlambat</td>
  </tr>
  <tr>
	<td>Izin</td>
    <td>Sakit</td>
	
  </tr>
  </thead>";
  $no=1;
  while($dt=mysql_fetch_array($cekabsen)){
	$absen=mysql_query("select * from absensi where Month(tanggal_absen)='$_POST[bulan]'
		and Year(tanggal_absen)='$_POST[tahun]' and status_masuk='Y' and status_keluar='Y' and nip='$dt[nip]'");
	$jml=mysql_num_rows($absen);
	$telat=mysql_query("select * from absensi where Month(tanggal_absen)='$_POST[bulan]'
		and Year(tanggal_absen)='$_POST[tahun]' and terlambat='Y' and nip='$dt[nip]'");
	$izin=mysql_query("select * from absensi where Month(tanggal_absen)='$_POST[bulan]'
		and Year(tanggal_absen)='$_POST[tahun]' and ket='I' and nip='$dt[nip]'");
	
	$sakit=mysql_query("select * from absensi where Month(tanggal_absen)='$_POST[bulan]'
		and Year(tanggal_absen)='$_POST[tahun]' and ket='S' and nip='$dt[nip]'");
	
	$tot_telat=mysql_num_rows($telat);
	$tot_izin=mysql_num_rows($izin);
	$tot_sakit=mysql_num_rows($sakit);
	
  echo "<tr>
	<td>$no.</td>
    <td>$dt[nip]</td>
	<td>$dt[nama]</td>
    <td>$dt[n_bag]</td>
	<td>$jml hari</td>
	<td>$tot_izin hari</td>
	<td>$tot_sakit hari</td>
	<td>$tot_telat kali</td>
  </tr>";
  $no++;
  }
echo "  
</table>

	";
	?>
	<div style="text-align:center;padding:20px;">
	<input class="noPrint" type="button" value="Cetak Halaman" onclick="window.print()">
	</div>
<?php 
} else {
	echo "<h2 class='head'>Data Tidak Ditemukan</h2>";
}
?>
</div>
</body>
</html>
