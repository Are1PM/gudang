<br />
<body bgcolor="#EEF2F7">
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$username	= $_POST['user'];
	$password	= $_POST['pass'];
	$id_prodi		= $_POST['id_prodi'];
//validasi data jika user dan nama kosong
	if (empty($_POST['user'])|| empty($_POST['pass'])|| empty($_POST['id_prodi'])) {
?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home_perlengkapan.php?page=form-input-data-user-prodi';
	</script>
<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "../koneksi.php";
//cek User di database
$cek=mysqli_num_rows(mysqli_query($Open,"SELECT username FROM user_prodi WHERE username='$username'"));


if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('USERNAME sudah dipakai !, silahkan diulang kembali');
		document.location='home_perlengkapan.php?page=form-input-data-user-prodi';
		</script>
<?php
}
//Masukan data ke Table Login
$input	="INSERT INTO user_prodi (id_user_prodi,username, password, id_prodi) VALUES (null,'$username','$password','$id_prodi')";
$query_input =mysqli_query($Open,$input);
	if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data User Berhasil diinput');
		document.location='home_perlengkapan.php?page=lihat-data-user-prodi';
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