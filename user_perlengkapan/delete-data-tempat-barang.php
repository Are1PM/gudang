<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['id_tempat'])) {
	$id_tempat = $_GET['id_tempat'];
	$query   = "SELECT * FROM tempat_brg WHERE id_tempat='$id_tempat'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
}else {
		die ("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");	
}
	//proses delete data
	if (!empty($id_tempat) && $id_tempat != "") {
		$hapus = "DELETE FROM tempat_brg WHERE id_tempat='$id_tempat'";
		$sql = mysqli_query($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data Tempat Barang Berhasil dihapus');
				document.location='home_perlengkapan.php?page=lihat-data-tempat-barang';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data tempat barang gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>