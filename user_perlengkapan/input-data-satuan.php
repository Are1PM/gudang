<br />
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$nama_satuan	= $_POST['nama_satuan'];
	
	//validasi data jika kosong
	if (empty($_POST['nama_satuan']) ) {
	?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home_perlengkapan.php?page=form-input-data-satuan';
	</script>
	<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "../koneksi.php";
//cek Kode Barang di database
$cek=mysqli_num_rows(mysqli_query($Open,"SELECT nama_satuan FROM satuan WHERE nama_satuan='$_POST[nama_satuan]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('Nama Satuan sudah dipakai !, silahkan diulang kembali');
		document.location='home_perlengkapan.php?page=form-input-data-satuan';
		</script>
<?php
}
//Masukan data ke Table Login
$input	="INSERT INTO satuan VALUES (null,'$nama_satuan')";
$query_input =mysqli_query($Open,$input);

if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Satuan Berhasil diinput');
		document.location='home_perlengkapan.php?page=lihat-data-satuan';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Data Satuan Gagal diinput, Silahkan diulangi!";
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
	}
}
?>