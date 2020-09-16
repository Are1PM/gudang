<br />
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$tgl_pakai	= $_POST['tgl_pakai'];
	//validasi data jika kosong
	if (empty($_POST['tgl_pakai'])) {
		
	?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home_pegawai.php?page=form-input-pakai-barang';
	</script>
	<?php
	}
	// else if(checkdate())
	
//Masukan data ke Table Login
include "../koneksi.php";
$input	="INSERT INTO pakai_barang VALUES (
			null,
			'$tgl_pakai'
			)";
$query_input =mysqli_query($Open,$input);

if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Pakai Barang Berhasil diinput');
		document.location='home_pegawai.php?page=lihat-data-pakai-barang';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Data Pakai Barang Gagal diinput, Silahkan diulangi!";
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
	}

?>