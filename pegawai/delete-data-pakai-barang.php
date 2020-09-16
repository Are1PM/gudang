<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['id_pakai_brg'])) {
	$id_pakai_brg = $_GET['id_pakai_brg'];
	$query   = "SELECT * FROM pakai_barang WHERE id_pakai_brg='$id_pakai_brg'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
}else {
		die ("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");	
}
	//proses delete data
	if (!empty($id_pakai_brg) && $id_pakai_brg != "") {
		$hapus = "DELETE FROM pakai_barang WHERE id_pakai_brg='$id_pakai_brg'";
		$sql = mysqli_query($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data Pakai Barang Berhasil dihapus');
				document.location='home_pegawai.php?page=lihat-data-pakai-barang';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data pakai barang gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>