<?php 
	include "../koneksi.php";
	$q = "SELECT * FROM prodi ORDER BY id_prodi";
	$tampil = mysqli_query($Open, $q);
?>
<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1110px; height:375px;">
<form action="home_perlengkapan.php?page=input-data-user-prodi" method="POST" name="form-input-data-user-prodi">
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
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td width="789">&nbsp;</td>
	</tr>
	<br>
	<tr>
		<td width="20" height="36">&nbsp;</td>
		<td width="165">Username</td>
		<td><input type="text" name="user" size="15" maxlength="10" style="text-transform: uppercase;"></td>
	</tr>
	<tr>
		<td height="36">&nbsp;</td>
		<td>Password</td>
		<td><input type="text" name="pass" size="20" maxlength="20"></td>
	</tr>
	<tr>
		<td height="36">&nbsp;</td>
		<td>Prodi</td>
		<td><select name="id_prodi">
		<option value="0">- Pilih Prodi -</option>
				<?php 
					while($result = mysqli_fetch_assoc($tampil)){
						?>
							<option value="<?= $result['id_prodi'] ?>"><?= $result["nama_prodi"] ?></option>
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