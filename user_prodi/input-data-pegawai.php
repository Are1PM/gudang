<br />
<body bgcolor="#EEF2F7">
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$pegawai_nip_nid	= $_POST['pegawai_nip_nid'];
	$pegawai_nama	= $_POST['pegawai_nama'];
	$pegawai_jabatan	= $_POST['pegawai_jabatan'];
	$pegawai_no_hp	= $_POST['pegawai_no_hp'];
	$pegawai_bagian_id		= $_POST['pegawai_bagian_id'];
//validasi data jika user dan nama kosong
	if (empty($_POST['pegawai_nip_nid'])|| empty($_POST['pegawai_nama'])|| empty($_POST['pegawai_jabatan'])|| empty($_POST['pegawai_no_hp']) || empty($_POST['pegawai_bagian_id'])) {
?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home_prodi.php?page=form-input-data-pegawai';
	</script>
<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "../koneksi.php";
//cek User di database
$cek=mysqli_num_rows(mysqli_query($Open,"SELECT pegawai_nip_nid FROM pegawai WHERE pegawai_nip_nid='$pegawai_nip_nid'"));


if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('NIP/NID sudah dipakai !, silahkan diulang kembali');
		document.location='home_prodi.php?page=form-input-data-pegawai';
		</script>
<?php
}
//Masukan data ke Table Login
$input	="INSERT INTO pegawai (pegawai_id,pegawai_nip_nid, pegawai_nama, pegawai_jabatan, pegawai_no_hp,pegawai_bagian_id) VALUES (null,'$pegawai_nip_nid','$pegawai_nama','$pegawai_jabatan','$pegawai_no_hp','$pegawai_bagian_id')";
$query_input =mysqli_query($Open,$input);
	if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data User Berhasil diinput');
		document.location='home_prodi.php?page=lihat-data-pegawai';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Data User Gagal diinput, Silahkan diulangi!";
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
	}
}
?>
</body>