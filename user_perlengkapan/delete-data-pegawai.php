<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['id_pegawai'])) {
	$id_pegawai = $_GET['id_pegawai'];
	$query   = "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
}
	else {
		die ("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
	if (!empty($id_pegawai) && $id_pegawai != "") {
		$hapus = "DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'";
		$sql = mysqli_query($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data Pegawai Berhasil dihapus');
				document.location='home_perlengkapan.php?page=lihat-data-pegawai';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data Pegawai gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>