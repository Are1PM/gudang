<br />
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$kode_brg	= $_POST['kode_brg'];
	$nama_brg	= $_POST['nama_brg'];
	$jenis_brg	= stripslashes ($_POST['jenis_brg']);
	$no_inventaris = stripslashes ($_POST['no_inventaris']);
	$image		= $_FILES['image']['name'];
	$tgl_masuk	= stripslashes ($_POST['tgl_masuk']);
	$tgl_keluar	= stripslashes ($_POST['tgl_keluar']);
	$jumlah_masuk	= stripslashes ($_POST['jumlah_masuk']);
	$jumlah_keluar	= stripslashes ($_POST['jumlah_keluar']);
	$tahun_perolehan	= stripslashes($_POST['tahun_perolehan']);
	$id_satuan	= stripslashes ($_POST['id_satuan']);
	$id_kategori	= stripslashes ($_POST['id_kategori']);
	
	//Cek Photo
	if (strlen($image)>0) {
		//upload Photo
		if (is_uploaded_file($_FILES['image']['tmp_name'])) {
			move_uploaded_file ($_FILES['image']['tmp_name'], "../assets/img/".$image);
		}
	}
	
	//validasi data jika kosong
	if (
		empty($_POST['kode_brg']) ||
		empty($_POST['nama_brg']) ||
		empty($_POST['no_inventaris']) ||
		empty($_POST['jenis_brg']) ||
		empty($_POST['tgl_masuk']) ||
		empty($_POST['tgl_keluar']) ||
		empty($_POST['jumlah_masuk']) ||
		empty($_POST['jumlah_keluar']) ||
		empty($_POST['tahun_perolehan']) ||
		empty($_POST['id_satuan']) ||
		empty($_POST['id_kategori'])
		) {
	?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home_prodi.php?page=form-input-master-barang';
	</script>
	<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "../koneksi.php";
//cek Kode Barang di database
$cek=mysqli_num_rows(mysqli_query($Open,"SELECT kode_brg FROM barang WHERE kode_brg='$_POST[kode_brg]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('Kode Barang sudah dipakai !, silahkan diulang kembali');
		document.location='home_prodi.php?page=form-input-master-barang';
		</script>
<?php
}
//Masukan data ke Table Login
$input	="INSERT INTO barang VALUES (
		'$kode_brg',
		'$nama_brg',
		'$no_inventaris',
		'$jenis_brg',
		'$tgl_masuk',
		'$tgl_keluar',
		'$jumlah_masuk',
		'$jumlah_keluar',
		'$tahun_perolehan',
		'$id_satuan',
		'$id_kategori',
		'$image'
		)";
$query_input =mysqli_query($Open,$input);

if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Master Barang Berhasil diinput');
		document.location='home_prodi.php?page=lihat-data-barang';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Data User Gagal diinput, Silahkan diulangi!";
	}
//Tutup koneksi engine mysqli
	mysqli_close($Open);
	}
}
?>