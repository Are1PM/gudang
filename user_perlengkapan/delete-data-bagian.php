<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['bagian_id'])) {
	$bagian_id = $_GET['bagian_id'];
	$query   = "SELECT * FROM bagian WHERE bagian_id='$bagian_id'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
}
	else {
		die ("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
	if (!empty($bagian_id) && $bagian_id != "") {
		$hapus = "DELETE FROM bagian WHERE bagian_id='$bagian_id'";
		$sql = mysqli_query($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data Bagian Berhasil dihapus');
				document.location='home_perlengkapan.php?page=lihat-data-bagian';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data bagian gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>