<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">
<h2 align="center"><font color="orange" size="3" face="arial"><b>Review Input Barang Masuk</b></font></h2><br>
<table width="1110" border="0" align="center" cellpadding="0" cellspacing="0">
<tr bgcolor="#FF6600">
	<th width="60" height="40">ID Transaction</td>&nbsp;
	<th width="70">Tanggal</td>&nbsp;
	<th width="60">Kode Barang</td>&nbsp;
	<th width="170">Nama Barang</td>&nbsp;
	<th width="70">Jenis Barang</td>&nbsp;      
	<th width="70">Jumlah Barang Masuk</td>&nbsp;
	<th width="80">Action</td>&nbsp;     
</tr>
<?php
	if (isset($_GET['id_tran_msk'])) {
	$id_tran_msk = $_GET['id_tran_msk'];
	} else {
		die ("Error. Tidak ada ID yang dipilih Silakan cek kembali! ");	
	}
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "gudang";
	mysql_connect($host,$username,$password) or die("Koneksi gagal");
	mysql_select_db($db) or die("Database tidak bisa dibuka");
	$Cari="SELECT * FROM histori_brg_msk WHERE id_tran_msk='$id_tran_msk'";
	$tampil = mysql_query($Cari);
	while (	$hasil = mysql_fetch_array ($tampil)) {
			$id_tran_msk = stripslashes ($hasil['id_tran_msk']);
			$tgl_msk = $hasil['tgl_msk'];
			$kode_brg = stripslashes ($hasil['kode_brg']);
			$nama_brg = stripslashes ($hasil['nama_brg']);
			$jenis_brg = stripslashes ($hasil['jenis_brg']);
			$jml_msk = stripslashes ($hasil['jml_msk']);
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
	</tr>
	<tr align="center">
		<td><?=$id_tran_msk?><div align="center"></div></td>
		<td height="32"><?php
			if ($hasil['tgl_msk'] === NULL)
				$hasil['tgl_msk'] = "NULL"; 
				echo("$tgl_msk\n");
		?><div align="center"></div></td>
		<td><?=$kode_brg?><div align="center"></div></td>
		<td><?=$nama_brg?><div align="center"></div></td>
		<td><?=$jenis_brg?><div align="center"></div></td>
		<td><?=$jml_msk?><div align="center"></div></td>
		<td bgcolor="#EEF2F7"><div align="center"><a href="homegudang.php?page=form-input-barang-masuk">OK</a> | <a href="homegudang.php?page=delete-input-barang-masuk&id_tran_msk=<?=$id_tran_msk?>">Cancel</a></div></td>
	</tr>
	<tr align="center" bgcolor="#DFE6EF">
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