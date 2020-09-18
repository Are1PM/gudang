<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['prodi_id'])) {
	$prodi_id = $_GET['prodi_id'];
	$query   = "SELECT * FROM prodi WHERE prodi_id='$prodi_id'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
}
	else {
		die ("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
	if (!empty($prodi_id) && $prodi_id != "") {
		$hapus = "DELETE FROM prodi WHERE prodi_id='$prodi_id'";
		$sql = mysqli_query($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data prodi Berhasil dihapus');
				document.location='home_prodi.php?page=lihat-data-prodi';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data prodi gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>