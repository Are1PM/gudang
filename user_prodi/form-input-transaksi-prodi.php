<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
	<?php
	include '../koneksi.php';

	$q = "SELECT * FROM pegawai ORDER BY pegawai_nama";
	$tampil_pegawai = mysqli_query($Open, $q);


	?>
	<form action="home_prodi.php?page=input-data-transaksi-prodi" method="POST" name="postform">
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
					<font size="3"><b>FORM EDIT DATA TRANSAKSI PRODI</b></font>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Transaksi</td>
				<td colspan="2" width="190"><input type="text" name="t_prodi_tgl_transaksi" size="16" />
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.t_prodi_tgl_transaksi);return false;"><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Pegawai</td>
				<td>
					<select name="t_prodi_pegawai_id">
						<option value="0">-- Pilih Pegawai --</option>
						<?php
						while ($hasil = mysqli_fetch_array($tampil_pegawai)) :
						?>
							<option value="<?= $hasil['pegawai_id'] ?>"><?= $hasil['pegawai_nama'] ?></option>
						<?php
						endwhile;
						?>
					</select>
				</td>
			</tr>

			<tr>

				<td height="72">&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<input type="submit" name="Submit" value="Submit">&nbsp;&nbsp;&nbsp;
					<input type="button" value="Cancel" onclick=location.href="home_prodi.php?page=lihat-data-transaksi-prodi" title="kembali ke lihat data pakai barang">
				</td>
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
		</table>
	</form>
	<iframe width=174 height=189 name="gToday:normal:../assets/calender/normal.js" id="gToday:normal:../assets/calender/normal.js" src="../assets/calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>

	<?php
	//Tutup koneksi engine mysqli
	mysqli_close($Open);
	?>
</div>