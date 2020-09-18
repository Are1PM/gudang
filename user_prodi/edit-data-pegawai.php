<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <?php
include '../koneksi.php';
if (isset($_GET['pegawai_id'])) {
	$pegawai_id = $_GET['pegawai_id'];
} else {
	die ("Error. No Kode Selected! ");	
}

//proses edit data satuan
if (isset($_POST['Edit'])) {
	$pegawai_id	= $_POST['hpegawai_id'];
	$pegawai_nip_nid = $_POST['pegawai_nip_nid'];
	$pegawai_nama	= $_POST['pegawai_nama'];
	$pegawai_jabatan	= $_POST['pegawai_jabatan'];
	$pegawai_no_hp	= $_POST['pegawai_no_hp'];
	$pegawai_bagian_id	= $_POST['pegawai_bagian_id'];


	//update data
	$query = "UPDATE pegawai SET pegawai_nip_nid='$pegawai_nip_nid', pegawai_nama='$pegawai_nama', pegawai_jabatan='$pegawai_jabatan', pegawai_no_hp='$pegawai_no_hp', pegawai_bagian_id='$pegawai_bagian_id' WHERE pegawai_id='$pegawai_id'";
	$sql = mysqli_query ($Open,$query);
	//setelah berhasil update
	if ($sql) {
		echo "<h3><font color=green><center><blink>Data Pegawai Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='home_prodi.php?page=lihat-data-pegawai' title='kembali ke form lihat data Pegawai'><br><br>";	
	} else {
		echo "<h3><font color=red><center>Data pegawai gagal diedit</center></font></h3>";	
	}
}

//Tampilkan data dari tabel satuan
$query = "SELECT * FROM pegawai WHERE pegawai_id='$pegawai_id'";
$sql = mysqli_query($Open,$query);
$hasil = mysqli_fetch_array($sql);
if(!$hasil){
     ?>
	<script language="JavaScript">
		alert('Data Pegawai Tidak Ditemukan');
		document.location='home_prodi.php?page=lihat-data-pegawai';
	</script>
<?php
}
$pegawai_id	= $hasil['pegawai_id'];
$pegawai_nip_nid = $hasil['pegawai_nip_nid'];
$pegawai_nama	= $hasil['pegawai_nama'];
$pegawai_jabatan	= $hasil['pegawai_jabatan'];
$pegawai_no_hp	= $hasil['pegawai_no_hp'];
$pegawai_bagian_id	= $hasil['pegawai_bagian_id'];

$q = "SELECT * FROM bagian ORDER BY bagian_id";
$tampil = mysqli_query($Open, $q);

?>
   <form action="#" method="POST" name="form-input-data-pegawai">
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td width="789">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td width="789"><font color="orange" size="3" face="arial"><b>Form Input Data Pegawai</b></font></td>
	</tr>
     <tr>
          <td width="18">&nbsp;</td>
          <td width="142" height="16"></td>
          <td width="550">
                    <input type="hidden" name="hpegawai_id" value="<?=$pegawai_id?>"></td>
     </tr>
	<tr>
		<td width="20" height="36">&nbsp;</td>
		<td width="165">NIP/NID</td>
		<td><input type="text" name="pegawai_nip_nid" size="25" maxlength="20" value="<?= $pegawai_nip_nid ?>"></td>
	</tr>
	<tr>
		<td width="20" height="36">&nbsp;</td>
		<td width="165">Nama Pegawai</td>
		<td><input type="text" name="pegawai_nama" size="25" maxlength="20" value="<?= $pegawai_nama ?>"></td>
	</tr>
	<tr>
		<td height="36">&nbsp;</td>
		<td>Jabatan</td>
		<td><input type="text" name="pegawai_jabatan" size="20" maxlength="20" value="<?= $pegawai_jabatan ?>"></td>
	</tr>
	<tr>
		<td height="36">&nbsp;</td>
		<td>No HP</td>
		<td><input type="text" name="pegawai_no_hp" size="20" maxlength="20" value="<?= $pegawai_no_hp ?>"></td>
	</tr>
	<tr>
		<td height="36">&nbsp;</td>
		<td>Bagian</td>
		<td><select name="pegawai_bagian_id">
		<option value="0">- Pilih Bagian -</option>
				<?php 
					while($result = mysqli_fetch_assoc($tampil)){
						?>
							<option value="<?= $result['bagian_id'] ?>" <?= ($result['bagian_id'] == $pegawai_bagian_id )?"selected":""; ?>><?= $result["bagian_nama"] ?></option>
						<?php
					}
				?>
			</select></td>
	</tr>  
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td width="589" height="32">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><input type="submit" name="Edit" value="Edit Data">&nbsp;&nbsp;&nbsp;
          <input type="button" value="Cancel"
                              onclick=location.href="home_prodi.php?page=lihat-data-pegawai"
                              title="kembali ke lihat data Pegawai"></td>
		</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td width="589" height="32">&nbsp;</td>
	</tr>
</table>
</form>
     <?php
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>
</div>