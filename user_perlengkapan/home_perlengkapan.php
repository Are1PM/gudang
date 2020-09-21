<?php
session_start();
//cek apakah user sudah login
if (!isset($_SESSION['username'])) {
	header("Location:../index.php"); //jika belum login jangan lanjut
}
//cek level user
if ($_SESSION['akses'] != "perlengkapan") {
	header("Location:../index.php"); //jika bukan admin jangan lanjut
}
?>
<html>

<head>
	<title>SI Inventaris Barang</title>
	<link href="../assets/css/style.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		ul.navbar {
			list-style-type: none;
			padding: 0;
			margin: 0;
			position: relative;
			top: 0.5em;
			left: 1em;
			width: 11em;
		}

		ul.navbar li {
			background: #E6E6FA;
			margin: 0.5em 0;
			padding: 0.3em;
			border-right: 0.5em solid #FF6600;
		}

		ul.navbar a {
			text-decoration: none;
		}

		h1 {
			font-family: Helvetica, Geneva, Arial, Sans-Regular, sans-serif
		}

		address {
			margin-top: 1em;
			padding-top: 1em;
			border-top: thin dotted
		}

		a:link,
		a:visited,
		a:active {
			font-family: Verdana, Arial, Helvetica, sans-serif;
			font-size: 11px;
			color: #000000;
			text-decoration: none;
		}

		a:hover {
			font-family: Verdana, Arial, Helvetica, sans-serif;
			font-size: 12px;
			color: blue;
			text-decoration: none;
		}
	</style>
</head>

<body style="background-image: url('../assets/image/uho-1.jpg');background-size: cover;">
	<br>
	<table width="1306" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr style="background-image: url('../assets/image/fmipa.jpg');background-size: cover; background-position: 20% 20%;">
			<td width="10">&nbsp;</td>
			<td width="140" height="120">
				<div align="center"><img src="../assets/image/logo.png" width="100" height="90"></div>
			</td>
			<td width="10">&nbsp;</td>
			<td width="1136">
				<div align="center"><span class="header">SI Inventaris Barang<br></span>
			<td width="10"></td>
		</tr>
		<tr bgcolor="#F8F8FF">
			<td>&nbsp;</td>
			<td height="27">
				<div align="left"><strong>
						<? echo "Tanggal : ".date("d-M-y");?></strong></div>
			</td>
			<td>&nbsp;</td>
			<td align="right">Selamat Datang&nbsp;<font color="#FF6600"><strong>
						<?= ucfirst($_SESSION['username']) ?></strong></font>&nbsp;|&nbsp;<a href="../logout.php">Log
					Out >>&nbsp;&nbsp;</a></td>
			<td>&nbsp;</td>
		</tr>
		<tr bgcolor="#F8F8FF">
			<td>&nbsp;</td>
			<td rowspan="4" valign="top">
				<table width="144" height="400" bgcolor="#B0C4DE" border="0" cellspacing="0" cellpadding="0" align="top">
					<tr>
						<td valign="top">
							<ul class="navbar">
								<li><b>MAIN MENU</b></li><br>
								<li><a href="home_perlengkapan.php?page=beranda" title="Beranda">&nbsp;Beranda</a></li>
								<li><a href="home_perlengkapan.php?page=lihat-data-barang" title="Master data barang">&nbsp;Master Barang Perlengkapan</a></li>
								<li><a href="home_perlengkapan.php?page=lihat-data-kategori" title="Master data kategori">&nbsp;Master Kategori</a></li>
								<li><a href="home_perlengkapan.php?page=lihat-data-bagian" title="Master data bagian">&nbsp;Master Bagian</a></li>
								<li><a href="home_perlengkapan.php?page=lihat-data-prodi" title="Master data prodi">&nbsp;Master Prodi</a></li>
								<li><a href="home_perlengkapan.php?page=lihat-data-ambil-barang" title="Master data ambil barang">&nbsp;Data Ambil Barang</a></li>
								<li><a href="home_perlengkapan.php?page=lihat-data-tempat-barang" title="Master data tempat barang">&nbsp;Master Tempat Barang</a></li>
								<li><a href="home_perlengkapan.php?page=lihat-data-pegawai" title="Master data pegawai">&nbsp;Master Pegawai</a></li>
								<li><a href="home_perlengkapan.php?page=lihat-data-user-prodi" title="Master data user prodi">&nbsp;Master User Prodi</a></li>
							</ul>
						</td>
					</tr>
				</table>
			</td>
			<td rowspan="4">&nbsp;</td>
			<td rowspan="4" valign="top">
				<table width="1136" height="400" bgcolor="white" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="936" valign="top">
							<?php
							$page = (isset($_GET['page'])) ? $_GET['page'] : "main";
							switch ($page) {
								case 'beranda':
									include 'beranda.php';
									break;
								case 'lihat-data-barang':
									include "lihat-data-barang.php";
									break;
								case 'lihat-data-ambil-barang':
									include "lihat-data-ambil-barang.php";
									break;
								case 'lihat-data-kategori':
									include "lihat-data-kategori.php";
									break;
								case 'lihat-data-bagian':
									include "lihat-data-bagian.php";
									break;
								case 'lihat-data-prodi':
									include "lihat-data-prodi.php";
									break;
								case 'lihat-data-user-prodi':
									include "lihat-data-user-prodi.php";
									break;
								case 'lihat-data-pegawai':
									include "lihat-data-pegawai.php";
									break;
								case 'lihat-data-tempat-barang':
									include "lihat-data-tempat-barang.php";
									break;
								case 'lihat-stok-barang':
									include "lihat-stok-barang.php";
									break;
								case 'form-input-master-barang':
									include "form-input-master-barang.php";
									break;
								case 'form-input-ambil-barang':
									include "form-input-ambil-barang.php";
									break;
								case 'form-input-stok-barang':
									include "form-input-stok-barang.php";
									break;
								case 'form-input-data-bagian':
									include "form-input-data-bagian.php";
									break;
								case 'form-input-data-prodi':
									include "form-input-data-prodi.php";
									break;
								case 'form-input-data-kategori':
									include "form-input-data-kategori.php";
									break;
								case 'form-input-data-tempat-barang':
									include "form-input-data-tempat-barang.php";
									break;
								case 'form-input-data-user-prodi':
									include "form-input-data-user-prodi.php";
									break;
								case 'form-input-data-pegawai':
									include "form-input-data-pegawai.php";
									break;
								case 'delete-data-user-prodi':
									include "delete-data-user-prodi.php";
									break;
								case 'delete-data-pegawai':
									include "delete-data-pegawai.php";
									break;
								case 'delete-data-barang':
									include "delete-data-barang.php";
									break;
								case 'delete-stok-barang':
									include "delete-data-barang.php";
									break;
								case 'delete-data-bagian':
									include "delete-data-bagian.php";
									break;
								case 'delete-data-prodi':
									include "delete-data-prodi.php";
									break;
								case 'delete-data-kategori':
									include "delete-data-kategori.php";
									break;
								case 'delete-data-tempat-barang':
									include "delete-data-tempat-barang.php";
									break;
								case 'delete-data-ambil-barang':
									include "delete-data-ambil-barang.php";
									break;
								case 'edit-data-pegawai':
									include "edit-data-pegawai.php";
									break;
								case 'edit-data-user-prodi':
									include "edit-data-user-prodi.php";
									break;
								case 'edit-data-barang':
									include "edit-data-barang.php";
									break;
								case 'edit-stok-barang':
									include "edit-stok-barang.php";
									break;
								case 'edit-data-ambil-barang':
									include "edit-data-ambil-barang.php";
									break;
								case 'edit-data-bagian':
									include "edit-data-bagian.php";
									break;
								case 'edit-data-prodi':
									include "edit-data-prodi.php";
									break;
								case 'edit-data-kategori':
									include "edit-data-kategori.php";
									break;
								case 'edit-data-tempat-barang':
									include "edit-data-tempat-barang.php";
									break;
								case 'form-input-data-user':
									include "form-input-data-user.php";
									break;
								case 'input-master-barang':
									include "input-master-barang.php";
									break;
								case 'input-data-ambil-barang':
									include "input-data-ambil-barang.php";
									break;
								case 'input-stok-barang':
									include "input-stok-barang.php";
									break;
								case 'input-data-pegawai':
									include "input-data-pegawai.php";
									break;
								case 'input-data-user-prodi':
									include "input-data-user-prodi.php";
									break;
								case 'input-data-bagian':
									include "input-data-bagian.php";
									break;
								case 'input-data-prodi':
									include "input-data-prodi.php";
									break;
								case 'input-data-kategori':
									include "input-data-kategori.php";
									break;
								case 'input-data-tempat-barang':
									include "input-data-tempat-barang.php";
									break;
								case 'export-pdf':
									echo "<script language=\"JavaScript\">
									document.location='export.php?file=pdf';
									</script>";
									break;
								case 'export-stok-pdf':
									echo "<script language=\"JavaScript\">
									document.location='export.php?file=stok-pdf';
									</script>";
									break;
								case 'main':
								default:
									include '../aboutuser.php';
							}
							?></td>
					</tr>
				</table>
			</td>
			<td rowspan="4">&nbsp;</td>
		</tr>
		<tr bgcolor="#F8F8FF">
			<td>&nbsp;</td>
		</tr>
		<tr bgcolor="#F8F8FF">
			<td>&nbsp;</td>
		</tr>
		<tr bgcolor="#F8F8FF">
			<td>&nbsp;</td>
		</tr>
		<tr bgcolor="#F8F8FF">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<?php
		include "../footer.php";
		?>
	</table>
	<div align="center"></div>

	<script>
		var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
			coll[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var content = this.nextElementSibling;
				if (content.style.display === "none") {
					content.style.display = "block";
				} else {
					content.style.display = "none";
				}
			});
		}
	</script>
</body>

</html>