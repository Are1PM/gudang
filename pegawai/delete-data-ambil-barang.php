<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['id_ambil_brg'])) {
	$id_ambil_brg = $_GET['id_ambil_brg'];
	$query   = "SELECT * FROM ambil_barang WHERE id_ambil_brg='$id_ambil_brg'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
}else {
		die ("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");	
}
	//proses delete data
	if (!empty($id_ambil_brg) && $id_ambil_brg != "") {
		$hapus = "DELETE FROM ambil_barang WHERE id_ambil_brg='$id_ambil_brg'";
		$sql = mysqli_query($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data Ambil Barang Berhasil dihapus');
				document.location='home_pegawai.php?page=lihat-data-ambil-barang';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data ambil barang gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>