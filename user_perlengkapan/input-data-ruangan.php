<br />
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$nama_ruangan	= $_POST['nama_ruangan'];
	$pj	= $_POST['pj'];
	
	//validasi data jika kosong
	if (empty($_POST['nama_ruangan']) || empty($_POST['pj']) ) {
	?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home_perlengkapan.php?page=form-input-data-ruangan';
	</script>
	<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "../koneksi.php";
//cek Kode Barang di database
$cek=mysqli_num_rows(mysqli_query($Open,"SELECT nama_ruangan FROM ruangan WHERE nama_ruangan='$_POST[nama_ruangan]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('Nama Ruangan sudah dipakai !, silahkan diulang kembali');
		document.location='home_perlengkapan.php?page=form-input-data-ruangan';
		</script>
<?php
}
//Masukan data ke Table Login
$input	="INSERT INTO ruangan VALUES (null,'$nama_ruangan','$pj')";
$query_input =mysqli_query($Open,$input);

if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Ruangan Berhasil diinput');
		document.location='home_perlengkapan.php?page=lihat-data-ruangan';
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