<?php
//cek button
if ($_POST['Submit'] == "Submit") {
	//Kirimkan Variabel
	$brg_prodi_nama	= $_POST['brg_prodi_nama'];
	$brg_prodi_stok	= stripslashes($_POST['brg_prodi_stok']);
	$brg_prodi_tgl_masuk	= stripslashes($_POST['brg_prodi_tgl_masuk']);
	$brg_prodi_tgl_keluar	= stripslashes($_POST['brg_prodi_tgl_keluar']);
	$brg_prodi_jml_masuk	= stripslashes($_POST['brg_prodi_jml_masuk']);
	$brg_prodi_jml_keluar	= stripslashes($_POST['brg_prodi_jml_keluar']);
	$brg_prodi_prodi_id	= stripslashes($_POST['brg_prodi_prodi_id']);

	//validasi data jika kosong
	if (
		empty($_POST['brg_prodi_nama']) ||
		empty($_POST['brg_prodi_stok']) ||
		empty($_POST['brg_prodi_tgl_masuk']) ||
		empty($_POST['brg_prodi_tgl_keluar']) ||
		empty($_POST['brg_prodi_jml_masuk']) ||
		empty($_POST['brg_prodi_jml_keluar']) ||
		empty($_POST['brg_prodi_prodi_id'])
	) {
?>
		<script language="JavaScript">
			alert('Data Harap Dilengkapi');
			document.location = 'home_prodi.php?page=form-input-data-barang-prodi';
		</script>
	<?php
	}
	include "../koneksi.php";
	//Masukan data ke Table Login
	$input	= "INSERT INTO barang_prodi VALUES (
		null,
		'$brg_prodi_nama',
		'$brg_prodi_stok',
		'$brg_prodi_tgl_masuk',
		'$brg_prodi_tgl_keluar',
		'$brg_prodi_jml_masuk',
		'$brg_prodi_jml_keluar',
		'$brg_prodi_prodi_id'
		)";
	$query_input = mysqli_query($Open, $input);
	echo mysqli_error($Open);

	if ($query_input) {
		//Jika Sukses
	?>
		<script language="JavaScript">
			alert('Data Barang Prodi Berhasil diinput');
			document.location = 'home_prodi.php?page=lihat-data-barang-prodi';
		</script>
<?php
	} else {
		//Jika Gagal
		echo "Data Barang Prodi Gagal diinput, Silahkan diulangi!";
	}
	//Tutup koneksi engine mysqli
	mysqli_close($Open);
}
?>