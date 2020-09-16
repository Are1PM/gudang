<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['id_satuan'])) {
	$id_satuan = $_GET['id_satuan'];
	$query   = "SELECT * FROM satuan WHERE id_satuan='$id_satuan'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
}
	else {
		die ("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
	if (!empty($id_satuan) && $id_satuan != "") {
		$hapus = "DELETE FROM satuan WHERE id_satuan='$id_satuan'";
		$sql = mysqli_query($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data Satuan Berhasil dihapus');
				document.location='home_perlengkapan.php?page=lihat-data-satuan';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data satuan gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>