<?php
include "config/koneksi.php";

$username = $_POST['username'];
$pass     = $_POST['password'];

// pastikan username dan password adalah berupa huruf atau angka.

$login=mysql_query("SELECT * FROM user WHERE userid='$username' AND passid='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION[namauser]     = $r[userid];
  $_SESSION[passuser]     = $r[passid];
  $_SESSION[leveluser]    = $r[level_user];
  
  
  if($_SESSION[leveluser]==1){
	header('location:media.php?module=pegawai');
  } else if($_SESSION[leveluser]==2){
	header('location:media.php?module=laporan');
  } if($_SESSION[leveluser]==3){
	header('location:media.php?module=absensi');
  }
}
else{
  include "error-login.php";
}
?>
