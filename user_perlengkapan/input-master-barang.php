<br />
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$bp_nama	= $_POST['bp_nama'];
	$bp_sumber	= $_POST['bp_sumber'];
	$bp_jenis_barang	= stripslashes ($_POST['bp_jenis_barang']);
	$bp_no_inventaris = stripslashes ($_POST['bp_no_inventaris']);
	$bp_image		= $_FILES['bp_image']['name'];
	$bp_tgl_masuk	= stripslashes ($_POST['bp_tgl_masuk']);
	$bp_tgl_keluar	= stripslashes ($_POST['bp_tgl_keluar']);
	$bp_jumlah_masuk	= stripslashes ($_POST['bp_jumlah_masuk']);
	$bp_jumlah_keluar	= stripslashes ($_POST['bp_jumlah_keluar']);
	$bp_thn_perolehan	= stripslashes($_POST['bp_thn_perolehan']);
	$bp_stok_brg	= stripslashes ($_POST['bp_stok_brg']);
	$bp_kategori_id	= stripslashes ($_POST['bp_kategori_id']);
	
	//Cek Photo
	if (strlen($bp_image)>0) {
		//upload Photo
		if (is_uploaded_file($_FILES['bp_image']['tmp_name'])) {
			move_uploaded_file ($_FILES['bp_image']['tmp_name'], "../assets/img/".$bp_image);
		}
	}
	
	//validasi data jika kosong
	if (
		empty($_POST['bp_nama']) ||
		empty($_POST['bp_no_inventaris']) ||
		empty($_POST['bp_sumber']) ||
		empty($_POST['bp_jenis_barang']) ||
		empty($_POST['bp_tgl_masuk']) ||
		empty($_POST['bp_tgl_keluar']) ||
		empty($_POST['bp_jumlah_masuk']) ||
		empty($_POST['bp_jumlah_keluar']) ||
		empty($_POST['bp_thn_perolehan']) ||
		empty($_POST['bp_stok_brg']) ||
		empty($_POST['bp_kategori_id'])
		) {
	?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home_perlengkapan.php?page=form-input-master-barang';
	</script>
	<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "../koneksi.php";
//cek Kode Barang di database
$cek=mysqli_num_rows(mysqli_query($Open,"SELECT bp_id FROM barang_perlengkapan WHERE bp_no_inventaris='$_POST[bp_no_inventaris]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('Kode Barang sudah dipakai !, silahkan diulang kembali');
		document.location='home_perlengkapan.php?page=form-input-master-barang';
		</script>
<?php
}
//Masukan data ke Table Login
$input	="INSERT INTO barang_perlengkapan VALUES (
		null,
		'$bp_nama',
		'$bp_thn_perolehan',
		'$bp_sumber',
		'$bp_no_inventaris',
		'$bp_tgl_masuk',
		'$bp_tgl_keluar',
		'$bp_jenis_barang',
		'$bp_jumlah_masuk',
		'$bp_jumlah_keluar',
		'$bp_stok_brg',
		'$bp_image',
		'$bp_kategori_id'
		)";
$query_input =mysqli_query($Open,$input);

if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Master Barang Berhasil diinput');
		document.location='home_perlengkapan.php?page=lihat-data-barang';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Data Barang Gagal diinput, Silahkan diulangi!";
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
	}
}
?>