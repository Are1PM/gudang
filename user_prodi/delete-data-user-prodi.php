<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['id_user_prodi'])) {
	$id_user_prodi = $_GET['id_user_prodi'];
	$query   = "SELECT * FROM user_prodi WHERE id_user_prodi='$id_user_prodi'";
	$hasil   = mysqli_query($Open, $query);
	$data    = mysqli_fetch_array($hasil);
} else {
	die("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");
}
//proses delete data
if (!empty($id_user_prodi) && $id_user_prodi != "") {
	$hapus = "DELETE FROM user_prodi WHERE id_user_prodi='$id_user_prodi'";
	$sql = mysqli_query($Open, $hapus);
	if ($sql) {
?>
		<script language="JavaScript">
			alert('Data User Prodi Berhasil dihapus');
			document.location = 'home_prodi.php?page=lihat-data-user-prodi';
		</script>
<?php
	} else {
		echo "<h2><font color=red><center>Data user prodi gagal dihapus</center></font></h2>";
	}
}
//Tutup koneksi engine mysqli
mysqli_close($Open);
?>