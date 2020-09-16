<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['kode_brg'])) {
	$kode_brg = $_GET['kode_brg'];
	$query   = "SELECT * FROM barang WHERE kode_brg='$kode_brg'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
}
	else {
		die ("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
	if (!empty($kode_brg) && $kode_brg != "") {
		$hapus = "DELETE FROM barang WHERE kode_brg='$kode_brg'";
		$sql = mysqli_query($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data Barang Berhasil dihapus');
				document.location='home_perlengkapan.php?page=lihat-data-barang';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data Barang gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>