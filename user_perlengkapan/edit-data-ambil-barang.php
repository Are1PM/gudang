<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
	<?php
	include '../koneksi.php';

	if (isset($_GET['id_ambil_brg'])) {
		$id_ambil_brg = $_GET['id_ambil_brg'];
	} else {
		die("Error. No Kode Selected! ");
	}

	//proses edit data satuan
	if (isset($_POST['Edit'])) {
		$id_ambil_brg	= $_POST['hid_ambil_brg'];
		$kode_brg		= $_POST['kode_brg'];
		$jumlah_ambil = $_POST['jumlah_ambil'];
		$tgl_ambil	= $_POST['tgl_ambil'];
		$id_prodi		= $_POST['id_prodi'];

		//update data
		$query = "UPDATE ambil_barang SET
				kode_brg='$kode_brg',
				tgl_ambil='$tgl_ambil',
				id_prodi='$id_prodi',
				jumlah_ambil='$jumlah_ambil'
			WHERE id_ambil_brg='$id_ambil_brg'";
		$sql = mysqli_query($Open, $query);
		//setelah berhasil update
		if ($sql) {
			echo "<h3><font color=green><center><blink>Data Ambil Barang Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='home_perlengkapan.php?page=lihat-data-ambil-barang' title='kembali ke form lihat data ambil barang'><br><br>";
		} else {
			echo "<h3><font color=red><center>Data ambil barang gagal diedit</center></font></h3>";
		}
	}

	//Tampilkan data dari tabel satuan
	$query = "SELECT * FROM ambil_barang WHERE id_ambil_brg='$id_ambil_brg'";
	$sql = mysqli_query($Open, $query);
	$hasil = mysqli_fetch_array($sql);

	$id_ambil_brg	= $hasil['id_ambil_brg'];
	$kode_brg		= $hasil['kode_brg'];
	$jumlah_ambil = $hasil['jumlah_ambil'];
	$tgl_ambil	= $hasil['tgl_ambil'];
	$id_prodi		= $hasil['id_prodi'];

	$q = "SELECT kode_brg,nama_brg FROM barang ORDER BY nama_brg";
	$tampil_barang = mysqli_query($Open, $q);
	$q = "SELECT * FROM prodi ORDER BY nama_prodi";
	$tampil_prodi = mysqli_query($Open, $q);


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
					<input type="hidden" name="hid_ambil_brg" value="<?= $id_ambil_brg ?>"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Barang</td>
				<td>
					<select name="kode_brg">
						<option value="0">-- Pilih Barang --</option>
						<?php
						while ($hasil = mysqli_fetch_array($tampil_barang)) :
						?>
							<option value="<?= $hasil['kode_brg'] ?>" <?= ($kode_brg == $hasil['kode_brg']) ? "selected" : ""; ?>><?= $hasil['nama_brg'] ?></option>
						<?php
						endwhile;
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td width="18">&nbsp;</td>
				<td>Jumlah Ambil</td>
				<td width="550">
					<input type="number" name="jumlah_ambil" value="<?= $jumlah_ambil ?>"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Ambil</td>
				<td colspan="2" width="190"><input type="text" name="tgl_ambil" size="16" value="<?= $tgl_ambil ?>" />
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl_ambil);return false;"><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Prodi</td>
				<td>
					<select name="id_prodi">
						<option value="0">-- Pilih Prodi --</option>
						<?php
						while ($hasil = mysqli_fetch_array($tampil_prodi)) :
						?>
							<option value="<?= $hasil['id_prodi'] ?>" <?= ($id_prodi == $hasil['id_prodi']) ? "selected" : ""; ?>><?= $hasil['nama_prodi'] ?></option>
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
					<input type="button" value="Cancel" onclick=location.href="home_perlengkapan.php?page=lihat-data-ambil-barang" title="kembali ke lihat data pakai barang">
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