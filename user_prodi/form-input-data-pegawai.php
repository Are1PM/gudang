<?php 
	include "../koneksi.php";
	$q = "SELECT * FROM bagian ORDER BY bagian_id";
	$tampil = mysqli_query($Open, $q);
?>
<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1110px; height:375px;">
<form action="home_prodi.php?page=input-data-pegawai" method="POST" name="form-input-data-pegawai">
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
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td width="789">&nbsp;</td>
	</tr>
	<br>
	<tr>
		<td width="20" height="36">&nbsp;</td>
		<td width="165">NIP/NID</td>
		<td><input type="text" name="pegawai_nip_nid" size="25" maxlength="20"></td>
	</tr>
	<tr>
		<td height="36">&nbsp;</td>
		<td>Nama Pegawai</td>
		<td><input type="text" name="pegawai_nama" size="50" maxlength="20"></td>
	</tr>
	<tr>
		<td height="36">&nbsp;</td>
		<td>Jabatan</td>
		<td><input type="text" name="pegawai_jabatan" size="20" maxlength="20"></td>
	</tr>
	<tr>
		<td height="36">&nbsp;</td>
		<td>No. HP</td>
		<td><input type="text" name="pegawai_no_hp" size="20" maxlength="20"></td>
	</tr>
	<tr>
		<td height="36">&nbsp;</td>
		<td>Bagian</td>
		<td><select name="pegawai_bagian_id">
		<option value="0">- Pilih Bagian -</option>
				<?php 
					while($result = mysqli_fetch_assoc($tampil)){
						?>
							<option value="<?= $result['bagian_id'] ?>"><?= $result["bagian_nama"] ?></option>
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
		<td><input type="submit" name="Submit" value="Submit">&nbsp;&nbsp;&nbsp;
			<input type="reset" name="reset" value="Reset"></td>
		</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td width="589" height="32">&nbsp;</td>
	</tr>
</table>
</form>
</div>