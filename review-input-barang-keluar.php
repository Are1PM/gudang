<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
<h2 align="center"><font color="orange" size="3" face="arial"><b>Review Input Barang Keluar</b></font></h2><br>
<table width="1110" border="0" align="center" cellpadding="0" cellspacing="0">
<tr bgcolor="#FF6600">
	<th width="40" height="40">ID Transaction</td>&nbsp;
	<th width="60">Tanggal</td>&nbsp;
	<th width="55">Kode Barang</td>&nbsp;
	<th width="140">Nama Barang</td>&nbsp;
	<th width="80">Jenis Barang</td>&nbsp;      
	<th width="80">Jumlah Barang Keluar</td>&nbsp;
	<th width="110">Picker</td>&nbsp;
	<th width="70">Action</td>&nbsp;     
</tr>
<?php
	if (isset($_GET['id_tran_klr'])) {
	$id_tran_klr = $_GET['id_tran_klr'];
	} else {
		die ("Error. Tidak ada ID yang dipilih Silakan cek kembali! ");	
	}
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "gudang";
	mysql_connect($host,$username,$password) or die("Koneksi gagal");
	mysql_select_db($db) or die("Database tidak bisa dibuka");
	$Cari="SELECT * FROM histori_brg_klr WHERE id_tran_klr='$id_tran_klr'";
	$tampil = mysql_query($Cari);
	while (	$hasil = mysql_fetch_array ($tampil)) {
			$id_tran_klr = stripslashes ($hasil['id_tran_klr']);
			$tgl_klr = $hasil['tgl_klr'];
			$kode_brg = stripslashes ($hasil['kode_brg']);
			$nama_brg = stripslashes ($hasil['nama_brg']);
			$jenis_brg = stripslashes ($hasil['jenis_brg']);
			$jml_klr = stripslashes ($hasil['jml_klr']);
			$picker = stripslashes ($hasil['picker']);
		{
?>
	<tr align="center" bgcolor="#DFE6EF">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr align="center">
		<td><?=$id_tran_klr?><div align="center"></div></td>
		<td height="32"><?php
			if ($hasil['tgl_klr'] === NULL)
				$hasil['tgl_klr'] = "NULL"; 
				echo("$tgl_klr\n");
		?><div align="center"></div></td>
		<td><?=$kode_brg?><div align="center"></div></td>
		<td><?=$nama_brg?><div align="center"></div></td>
		<td><?=$jenis_brg?><div align="center"></div></td>
		<td><?=$jml_klr?><div align="center"></div></td>
		<td><?=$picker?><div align="center"></div></td>
		<td bgcolor="#EEF2F7"><div align="center"><a href="homegudang.php?page=form-input-barang-keluar">OK</a> | <a href="homegudang.php?page=delete-input-barang-keluar&id_tran_klr=<?=$id_tran_klr?>">Cancel</a></div></td>
	</tr>
	<tr align="center" bgcolor="#DFE6EF">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
<?php
	}
	}
?>
</table>
</div>