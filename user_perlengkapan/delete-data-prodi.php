<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['id_prodi'])) {
	$id_prodi = $_GET['id_prodi'];
	$query   = "SELECT * FROM prodi WHERE id_prodi='$id_prodi'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
}
	else {
		die ("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
	if (!empty($id_prodi) && $id_prodi != "") {
		$hapus = "DELETE FROM prodi WHERE id_prodi='$id_prodi'";
		$sql = mysqli_query($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data atuan Berhasil dihapus');
				document.location='home_perlengkapan.php?page=lihat-data-prodi';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data prodi gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>