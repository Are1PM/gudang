<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <?php
include '../koneksi.php';
if (isset($_GET['id_user_prodi'])) {
	$id_user_prodi = $_GET['id_user_prodi'];
} else {
	die ("Error. No Kode Selected! ");	
}

//proses edit data satuan
if (isset($_POST['Edit'])) {
	$id_user_prodi	= $_POST['hid_user_prodi'];
	$username	= $_POST['user'];
	$password	= $_POST['pass'];
	$id_prodi	= $_POST['id_prodi'];
	
	//update data
	$query = "UPDATE user_prodi SET username='$username', password='$password', id_prodi='$id_prodi' WHERE id_user_prodi='$id_user_prodi'";
	$sql = mysqli_query ($Open,$query);
	//setelah berhasil update
	if ($sql) {
		echo "<h3><font color=green><center><blink>Data User Prodi Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='home_perlengkapan.php?page=lihat-data-user-prodi' title='kembali ke form lihat data user prodi'><br><br>";	
	} else {
		echo "<h3><font color=red><center>Data user prodi gagal diedit</center></font></h3>";	
	}
}

//Tampilkan data dari tabel satuan
$query = "SELECT * FROM user_prodi WHERE id_user_prodi='$id_user_prodi'";
$sql = mysqli_query($Open,$query);
$hasil = mysqli_fetch_array($sql);
if(!$hasil){
     ?>
	<script language="JavaScript">
		alert('Data User Prodi Tidak Ditemukan');
		document.location='home_perlengkapan.php?page=lihat-data-user-prodi';
	</script>
<?php
}
$id_user_prodi	= $hasil['id_user_prodi'];
$username	= $hasil['username'];
$password	= $hasil['password'];
$id_prodi	= $hasil['id_prodi'];

$q = "SELECT * FROM prodi ORDER BY id_prodi";
$tampil = mysqli_query($Open, $q);

?>
   <form action="#" method="POST" name="form-input-data-user-prodi">
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td width="789">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td width="789"><font color="orange" size="3" face="arial"><b>Form Input Data User Prodi</b></font></td>
	</tr>
     <tr>
          <td width="18">&nbsp;</td>
          <td width="142" height="16"></td>
          <td width="550">
                    <input type="hidden" name="hid_user_prodi" value="<?=$id_user_prodi?>"></td>
     </tr>
	<tr>
		<td width="20" height="36">&nbsp;</td>
		<td width="165">Username</td>
		<td><input type="text" name="user" size="15" maxlength="10" style="text-transform: uppercase;" value="<?= $username ?>"></td>
	</tr>
	<tr>
		<td height="36">&nbsp;</td>
		<td>Password</td>
		<td><input type="text" name="pass" size="20" maxlength="20" value="<?= $password ?>"></td>
	</tr>
	<tr>
		<td height="36">&nbsp;</td>
		<td>Prodi</td>
		<td><select name="id_prodi">
		<option value="0">- Pilih Prodi -</option>
				<?php 
					while($result = mysqli_fetch_assoc($tampil)){
						?>
							<option value="<?= $result['id_prodi'] ?>" <?= ($result['id_prodi'] == $id_prodi )?"selected":""; ?>><?= $result["nama_prodi"] ?></option>
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
                              onclick=location.href="home_perlengkapan.php?page=lihat-data-user-prodi"
                              title="kembali ke lihat data user prodi"></td>
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