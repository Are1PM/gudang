<br />
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$kategori_nama	= $_POST['kategori_nama'];
	$kategori_jumlah	= $_POST['kategori_jumlah'];
	
	//validasi data jika kosong
	if (empty($_POST['kategori_nama']) || empty($_POST['kategori_jumlah']) ) {
	?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home_perlengkapan.php?page=form-input-data-kategori';
	</script>
	<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "../koneksi.php";
//cek Kode Barang di database
$cek=mysqli_num_rows(mysqli_query($Open,"SELECT kategori_nama FROM kategori WHERE kategori_nama='$_POST[kategori_nama]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('Nama kategori sudah dipakai !, silahkan diulang kembali');
		document.location='home_perlengkapan.php?page=form-input-data-kategori';
		</script>
<?php
}
//Masukan data ke Table Login
$input	="INSERT INTO kategori VALUES (null,'$kategori_nama', '$kategori_jumlah')";
$query_input =mysqli_query($Open,$input);

if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Kategori Berhasil diinput');
		document.location='home_perlengkapan.php?page=lihat-data-kategori';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Data Kategori Gagal diinput, Silahkan diulangi!";
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
	}
}
?>