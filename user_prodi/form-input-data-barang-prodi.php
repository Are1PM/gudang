	<?php
	include "../koneksi.php";
	$q = "SELECT * FROM  prodi ORDER BY prodi_nama";
	$tampil_prodi = mysqli_query($Open, $q);

	?>
	<form action="home_prodi.php?page=input-data-barang-prodi" method="POST" name="postform" enctype="multipart/form-data">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<font size="3"><b>FORM INPUT MASTER BARANG</b></font>
				</td>
			</tr>
			<tr>
				<td width="5%" height="36">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Barang</td>
				<td><input type="text" name="brg_prodi_nama" size="30"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Stok Barang</td>
				<td><input type="number" name="brg_prodi_stok" size="30"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Masuk</td>
				<td colspan="2" width="190"><input type="text" name="brg_prodi_tgl_masuk" size="16" />
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.brg_prodi_tgl_masuk);return false;"><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Keluar</td>
				<td colspan="2" width="190"><input type="text" name="brg_prodi_tgl_keluar" size="16" />
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.brg_prodi_tgl_keluar);return false;"><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jumlah Masuk</td>
				<td><input type="number" name="brg_prodi_jml_masuk" size="20"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jumlah Keluar</td>
				<td><input type="number" name="brg_prodi_jml_keluar" size="20"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Kategori</td>
				<td>
					<select name="brg_prodi_prodi_id">
						<option value="0">- Pilih Prodi -</option>
						<?php
						while ($result = mysqli_fetch_assoc($tampil_prodi)) :
						?>
							<option value="<?= $result['prodi_id'] ?>"><?= $result['prodi_nama'] ?></option>
						<?php
						endwhile;
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td height="72">&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="Submit" value="Submit">&nbsp;&nbsp;&nbsp;
					<input type="reset" name="reset" value="Reset"></td>
			</tr>
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
		</table>
	</form>
	<iframe width=174 height=189 name="gToday:normal:../assets/calender/normal.js" id="gToday:normal:../assets/calender/normal.js" src="../assets/calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>