<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['pegawai_id'])) {
	$pegawai_id = $_GET['pegawai_id'];
	$query   = "SELECT * FROM pegawai WHERE pegawai_id='$pegawai_id'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
}
	else {
		die ("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
	if (!empty($pegawai_id) && $pegawai_id != "") {
		$hapus = "DELETE FROM pegawai WHERE pegawai_id='$pegawai_id'";
		$sql = mysqli_query($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data Pegawai Berhasil dihapus');
				document.location='home_prodi.php?page=lihat-data-pegawai';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data Pegawai gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>