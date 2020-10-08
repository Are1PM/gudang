<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
	<?php
	include '../koneksi.php';

	$q = "SELECT * FROM barang_perlengkapan ORDER BY bp_nama";
	$tampil_bp = mysqli_query($Open, $q);
	$q = "SELECT * FROM bagian ORDER BY bagian_nama";
	$tampil_bagian = mysqli_query($Open, $q);


	?>
	<form action="home_perlengkapan.php?page=input-data-transaksi-perlengkapan" method="POST" name="postform">
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
					<font size="3"><b>FORM EDIT DATA TRANSAKSI PERLENGKAPAN</b></font>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>bagian</td>
				<td>
					<select name="bp_id">
						<option value="0">-- Pilih barang --</option>
						<?php
						while ($hasil = mysqli_fetch_array($tampil_bp)) :
						?>
							<option value="<?= $hasil['bp_id'] ?>"><?= $hasil['bp_nama'] ?></option>
						<?php
						endwhile;
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Transaksi</td>
				<td colspan="2" width="190"><input type="text" name="tp_tgl_transaksi" size="16" />
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tp_tgl_transaksi);return false;"><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
				</td>
			</tr>
			<tr>
				<td width="18">&nbsp;</td>
				<td>Jumlah Ambil</td>
				<td width="550">
					<input type="number" name="tp_jumlah"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>bagian</td>
				<td>
					<select name="tp_bagian_id">
						<option value="0">-- Pilih bagian --</option>
						<?php
						while ($hasil = mysqli_fetch_array($tampil_bagian)) :
						?>
							<option value="<?= $hasil['bagian_id'] ?>"><?= $hasil['bagian_nama'] ?></option>
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
					<input type="button" value="Cancel" onclick=location.href="home_perlengkapan.php?page=lihat-data-transaksi-perlengkapan" title="kembali ke lihat data pakai barang">
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