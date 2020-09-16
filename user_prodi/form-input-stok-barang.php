	<?php 
		include "../koneksi.php";
		$q = "SELECT * FROM satuan ORDER BY nama_satuan";
		$tampil_satuan = mysqli_query($Open, $q);
		$q = "SELECT * FROM  kategori ORDER BY nama_kategori";
		$tampil_kategori = mysqli_query($Open, $q);

	?>
	<form action="home_prodi.php?page=input-master-barang" method="POST" name="postform" enctype="multipart/form-data">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
				</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>&nbsp;</td>
				<td><font size="3"><b>FORM INPUT MASTER BARANG</b></font></td>
			</tr>
				<tr>
					<td width="5%" height="36">&nbsp;</td>
					<td width="25%">&nbsp;</td>
					<td width="70%">&nbsp;</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Kode Barang</td>
				<td><input type="text" name="kode_brg" size="20" maxlength="10"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Barang</td>
				<td><input type="text" name="nama_brg" size="30"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>No. Inventaris</td>
				<td><input type="text" name="no_inventaris" size="20"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jenis Barang</td>
				<td><input type="text" name="jenis_brg" size="20"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Masuk</td>
				<td colspan="2" width="190"><input type="text" name="tgl_masuk" size="16" />
				<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl_masuk);return false;" ><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Keluar</td>
				<td colspan="2" width="190"><input type="text" name="tgl_keluar" size="16" />
				<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl_keluar);return false;" ><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jumlah Masuk</td>
				<td><input type="number" name="jumlah_masuk" size="20"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jumlah Keluar</td>
				<td><input type="number" name="jumlah_keluar" size="20"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tahun Perolehan</td>
				<td><input type="text" name="tahun_perolehan" size="20"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Gambar</td>
				<td><input type="file" name="image" size="20"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Satuan</td>
				<td>
				<select name="id_satuan">
					<option value="0">- Pilih Satuan -</option>
					<?php 
						while($result=mysqli_fetch_assoc($tampil_satuan)):
					?>
						<option value="<?= $result['id_satuan'] ?>"><?= $result['nama_satuan'] ?></option>
					<?php 
						endwhile;
					?>
				</select>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Kategori</td>
				<td>
				<select name="id_kategori">
					<option value="0">- Pilih Kategori -</option>
					<?php 
						while($result=mysqli_fetch_assoc($tampil_kategori)):
					?>
					<option value="<?= $result['id_kategori'] ?>"><?= $result['nama_kategori'] ?></option>
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
