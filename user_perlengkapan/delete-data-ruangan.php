<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['id_ruangan'])) {
	$id_ruangan = $_GET['id_ruangan'];
	$query   = "SELECT * FROM ruangan WHERE id_ruangan='$id_ruangan'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
}
	else {
		die ("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
	if (!empty($id_ruangan) && $id_ruangan != "") {
		$hapus = "DELETE FROM ruangan WHERE id_ruangan='$id_ruangan'";
		$sql = mysqli_query($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data ruangan Berhasil dihapus');
				document.location='home_perlengkapan.php?page=lihat-data-ruangan';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data Ruangan gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>