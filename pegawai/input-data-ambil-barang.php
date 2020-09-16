<br />
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$kode_brg		= $_POST['kode_brg'];
	$tgl_ambil	= $_POST['tgl_ambil'];
	$id_prodi		= $_POST['id_prodi'];
	$id_pegawai	= $_POST['id_pegawai'];

	//validasi data jika kosong
	if (empty($_POST['kode_brg']) || empty($_POST['tgl_ambil']) || empty($_POST['id_prodi']) || empty($_POST['id_pegawai']) ) {
	?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home_pegawai.php?page=form-input-ambil-barang';
	</script>
	<?php
	}
	
//Masukan data ke Table Login
include "../koneksi.php";
$input	="INSERT INTO ambil_barang VALUES (
			null,
			'$kode_brg',
			'$tgl_ambil',
			'$id_prodi',
			'$id_pegawai'
			)";
$query_input =mysqli_query($Open,$input);

if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Ambil Barang Berhasil diinput');
		document.location='home_pegawai.php?page=lihat-data-ambil-barang';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Data Ambil Barang Gagal diinput, Silahkan diulangi!";
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
	}

?>