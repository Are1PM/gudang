<br />
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$bagian_nama	= $_POST['bagian_nama'];
	
	//validasi data jika kosong
	if (empty($_POST['bagian_nama']) ) {
	?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home_perlengkapan.php?page=form-input-data-bagian';
	</script>
	<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "../koneksi.php";
//cek Kode Barang di database
$cek=mysqli_num_rows(mysqli_query($Open,"SELECT bagian_nama FROM bagian WHERE bagian_nama='$_POST[bagian_nama]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('Nama bagian sudah dipakai !, silahkan diulang kembali');
		document.location='home_perlengkapan.php?page=form-input-data-bagian';
		</script>
<?php
}
//Masukan data ke Table Login
$input	="INSERT INTO bagian VALUES (null,'$bagian_nama')";
$query_input =mysqli_query($Open,$input);

if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Bagian Berhasil diinput');
		document.location='home_perlengkapan.php?page=lihat-data-bagian';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Data Bagian Gagal diinput, Silahkan diulangi!";
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
	}
}
?>