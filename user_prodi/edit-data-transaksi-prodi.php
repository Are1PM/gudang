<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
	<?php
	include '../koneksi.php';

	if (isset($_GET['t_prodi_id'])) {
		$t_prodi_id = $_GET['t_prodi_id'];
	} else {
		die("Error. No Kode Selected! ");
	}

	//proses edit data satuan
	if (isset($_POST['Edit'])) {
		$t_prodi_id	= $_POST['ht_prodi_id'];
		$t_prodi_tgl_transaksi	= $_POST['t_prodi_tgl_transaksi'];
		$t_prodi_pegawai_id		= $_POST['t_prodi_pegawai_id'];

		//update data
		$query = "UPDATE transaksi_prodi SET
				t_prodi_tgl_transaksi='$t_prodi_tgl_transaksi',
				t_prodi_pegawai_id='$t_prodi_pegawai_id'
			WHERE t_prodi_id='$t_prodi_id'";
		$sql = mysqli_query($Open, $query);
		echo mysqli_error($Open);
		//setelah berhasil update
		if ($sql) {
			echo "<h3><font color=green><center><blink>Data Transaksi Prodi Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='home_prodi.php?page=lihat-data-transaksi-prodi' title='kembali ke form lihat data transaksi prodi'><br><br>";
		} else {
			echo "<h3><font color=red><center>Data transaksi perlengkapan gagal diedit</center></font></h3>";
		}
	}

	//Tampilkan data dari tabel satuan
	$query = "SELECT * FROM transaksi_prodi WHERE t_prodi_id='$t_prodi_id'";
	$sql = mysqli_query($Open, $query);
	$hasil = mysqli_fetch_array($sql);

	$t_prodi_id	= $hasil['t_prodi_id'];
	$t_prodi_tgl_transaksi	= $hasil['t_prodi_tgl_transaksi'];
	$t_prodi_pegawai_id		= $hasil['t_prodi_pegawai_id'];

	$q = "SELECT * FROM pegawai ORDER BY pegawai_nama";
	$tampil_pegawai = mysqli_query($Open, $q);


	?>
	<form action="#" method="POST" name="postform">
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
					<font size="3"><b>FORM EDIT DATA AMBIL BARANG</b></font>
				</td>
			</tr>

			<tr>
				<td width="18">&nbsp;</td>
				<td width="142" height="36"></td>
				<td width="550">
					<input type="hidden" name="ht_prodi_id" value="<?= $t_prodi_id ?>"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Transaksi</td>
				<td colspan="2" width="190"><input type="text" name="t_prodi_tgl_transaksi" size="16" value="<?= $t_prodi_tgl_transaksi ?>" />
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
							<option value="<?= $hasil['pegawai_id'] ?>" <?= ($t_prodi_pegawai_id == $hasil['pegawai_id']) ? "selected" : ""; ?>><?= $hasil['pegawai_nama'] ?></option>
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
					<input type="submit" name="Edit" value="Edit Data">&nbsp;&nbsp;&nbsp;
					<input type="button" value="Cancel" onclick=location.href="home_prodi.php?page=lihat-data-transaksi-perlengkapan" title="kembali ke lihat data pakai barang">
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