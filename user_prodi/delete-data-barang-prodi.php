<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['brg_prodi_id'])) {
	$brg_prodi_id = $_GET['brg_prodi_id'];
	$query   = "SELECT * FROM barang_prodi WHERE brg_prodi_id='$brg_prodi_id'";
	$hasil   = mysqli_query($Open, $query);
	$data    = mysqli_fetch_array($hasil);
} else {
	die("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");
}
//proses delete data
if (!empty($brg_prodi_id) && $brg_prodi_id != "") {
	$hapus = "DELETE FROM barang_prodi WHERE brg_prodi_id='$brg_prodi_id'";
	$sql = mysqli_query($Open, $hapus);
	if ($sql) {
?>
		<script language="JavaScript">
			alert('Data Barang Prodi Berhasil dihapus');
			document.location = 'home_prodi.php?page=lihat-data-barang-prodi';
		</script>
<?php
	} else {
		echo "<h2><font color=red><center>Data Barang Prodi gagal dihapus</center></font></h2>";
	}
}
//Tutup koneksi engine mysqli
mysqli_close($Open);
?>