$ambil=mysql_query("select * from pegawai where nip='$_GET[id]'");
	$t=mysql_fetch_array($ambil);
	echo "<h2 class='head'>Data Pegawai</h2>
	<div class='rp' >
	<div class='foto'>";
	if($t[foto]==""){
		echo "<img src='image_peg/no.jpg' width='200' height='240' />";
	} else {
	echo "<img src='image_peg/small_$t[foto]' width='200' height='240' />";
	}
	echo "</div>
	<table class='tabelform tabpad'>
	<tr>
	<td>Nip</td><td>:</td><td>$t[nip]</td>
	</tr>
	<tr>
	<td>Nama Pegawai</td><td>:</td><td>$t[nama]</td>
	</tr>
	<tr>
	<td>Tempat Lahir</td><td>:</td><td>$t[tmpt_lahir]</td>
	</tr>
	<tr>
	<td>Tanggal Lahir</td><td>:</td><td>"; 
	echo "".tgl_indo($t['tgl_lahir'])."";
	echo "</td>
	</tr>
	
	<tr>
	<td>Jenis Kelamin</td><td>:</td><td>";
	if($t['jenis_kelamin']=='L'){
	echo "Pria";
	} else {
	echo "Wanita";
	}	
	echo "</td></tr>
	
	<tr>
	<td>Alamat</td><td>:</td><td>$t[alamat]</td>
	</tr>
	
	<tr>
	<td>Tanggal Masuk</td><td>:</td><td>";
	echo "".tgl_indo($t['tgl_masuk'])."";
	echo "
	</td>
	</tr>
	
	<tr>
	<td>Bagian</td><td>:</td><td>";
	$bag=mysql_query("select * from bagian where id_bag='$t[id_bag]'");
	$b=mysql_fetch_array($bag);
	echo "$b[n_bag]";	
	echo "</td>
	</tr>
	
	<tr>
	<td>Jabatan</td><td>:</td><td>";
	$jab=mysql_query("select * from jabatan where id_jab='$t[id_jab]'");
	$j=mysql_fetch_array($jab);
	echo "$j[n_jab]";
	echo "</td>
	</tr>
	
	<tr>
	<td colspan='3'>[ <a href='?module=pegawai&act=edit&id=$t[nip]'> Edit Profil </a>] [ <a href='?module=pegawai&act=pwd&id=$t[nip]'> Ganti Password </a>]</td>
	</tr>
	
	</table>
	<div style='clear:both'></div>
	<h2 class='head'>Riwayat pendidikan</h2>
	<table class='tabel'>
	<thead>
	<tr>
	<td>Tahun</td>
	<td>Detail Pendidikan</td>
	</tr>
	</thead>";
	$nip=$_SESSION['namauser'];
	$ri=mysql_query("select * from pendidikan where nip='$_GET[id]' order by idp ASC");
	if(mysql_num_rows($ri)==0){
	echo "<tr>
	<td colspan='2'>*Tidak Ada Data*</td>
	</tr>";
	} else {
	while($p=mysql_fetch_array($ri)){
	echo "
	<tr>
	<td>$p[t_pdk]</td>
	<td>$p[d_pdk] [ <a href='?module=pegawai&act=rpedit&id=$p[idp]'>edit</a> | 
	<a href='$aksi?module=pegawai&act=rpdel&id=$p[idp]&nip=$p[nip]'>hapus</a>]</td>
	</tr>";
	}
	}
	echo "
	<tr><td colspan='2'><a href='?module=pegawai&act=rp&id=$_GET[id]'>Tambah Data</a></td></td>
	</table>
	</div>
	
	
	<div class='rp2'>
	<h2 class='head'>PENGALAMAN KERJA</h2>
	<table class='tabel'>	
	<thead>
	<tr>
	<td>Nama Pekerjaan</td>
	<td>Detail Pekerjaan</td>
	</tr>	
	</thead>";
	$nip=$_SESSION['namauser'];
	$ri=mysql_query("select * from pengalaman_kerja where nip='$_GET[id]' order by id_peker ASC");
	if(mysql_num_rows($ri)==0){
	echo "<tr>
	<td colspan='2'>*Tidak Ada Data*</td>
	</tr>";
	} else {
	while($p=mysql_fetch_array($ri)){
	echo "
	<tr>
	<td>$p[nm_pekerjaan]</td>
	<td>$p[d_pekerjaan] [ <a href='?module=pegawai&act=pkedit&id=$p[id_peker]'>edit</a> | 
	<a href='$aksi?module=pegawai&act=pkdel&id=$p[id_peker]&nip=$p[nip]'>hapus</a>]</td>
	</tr>";
	}
	}
	echo "
	<tr><td colspan='2'><a href='?module=pegawai&act=pk&id=$_GET[id]'>Tambah Data</a></td></td>
	</table>
	</div>
		<div style='clear:both'></div>
	";	