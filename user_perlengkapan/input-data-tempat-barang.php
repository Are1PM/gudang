<br />
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$kode_brg	= $_POST['kode_brg'];
	$id_ruangan	= $_POST['id_ruangan'];
	$tgl_masuk	= $_POST['tgl_masuk'];
	$keadaan		= $_POST['keadaan'];

	
	//validasi data jika kosong
	if (empty($_POST['kode_brg']) || empty($_POST['id_ruangan']) || empty($_POST['tgl_masuk']) || empty($_POST['keadaan']) ) {
	?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home_perlengkapan.php?page=form-input-data-satuan';
	</script>
	<?php
	}
	
//Masukan data ke Table Login
include "../koneksi.php";
$input	="INSERT INTO tempat_brg VALUES (null,'$kode_brg','$id_ruangan','$tgl_masuk','$keadaan')";
$query_input =mysqli_query($Open,$input);

if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Tempat Barang Berhasil diinput');
		document.location='home_perlengkapan.php?page=lihat-data-tempat-barang';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Data Tempat Barang Gagal diinput, Silahkan diulangi!";
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
	}

?>