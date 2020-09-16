<br />
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$nama_prodi	= $_POST['nama_prodi'];
	
	//validasi data jika kosong
	if (empty($_POST['nama_prodi']) ) {
	?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home_perlengkapan.php?page=form-input-data-prodi';
	</script>
	<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "../koneksi.php";
//cek Kode Barang di database
$cek=mysqli_num_rows(mysqli_query($Open,"SELECT nama_prodi FROM prodi WHERE nama_prodi='$_POST[nama_prodi]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('Nama Prodi sudah dipakai !, silahkan diulang kembali');
		document.location='home_perlengkapan.php?page=form-input-data-prodi';
		</script>
<?php
}
//Masukan data ke Table Login
$input	="INSERT INTO prodi VALUES (null,'$nama_prodi')";
$query_input =mysqli_query($Open,$input);

if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Prodi Berhasil diinput');
		document.location='home_perlengkapan.php?page=lihat-data-prodi';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Data Prodi Gagal diinput, Silahkan diulangi!";
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
	}
}
?>