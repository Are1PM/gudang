<?php
session_start();
//cek apakah user sudah login
if (!isset($_SESSION['username'])) {
	die("Anda belum login"); //jika belum login jangan lanjut
}
//cek level user
if ($_SESSION['akses'] != "bagian") {
	die("Anda bukan user bagian"); //jika bukan admin jangan lanjut
}
?>
<html>

<head>
	<title>Aplikasi Gudang</title>
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
						<?= "Tanggal : " . date("d-M-y"); ?></strong></div>
			</td>
			<td>&nbsp;</td>
			<td align="right">Selamat Datang&nbsp;<font color="#FF6600"><strong> <?= $_SESSION['username'] ?></strong></font>&nbsp;|&nbsp;<a href="../logout.php">Log Out >>&nbsp;&nbsp;</a></td>
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
								<li><a href="home_bagian.php?page=beranda" title="Beranda">&nbsp;Beranda</a></li>
								<li><a href="home_bagian.php?page=lihat-data-bagian" title="lihat-data-bagian">&nbsp;Data Bagian</a></li>
								<li><a href="home_bagian.php?page=lihat-data-pegawai" title="lihat-data-pegawai">&nbsp;Data Pegawai</a></li>
								<li><a href="home_bagian.php?page=lihat-data-barang-perlengkapan" title="lihat-data-barang-perlengkapan">&nbsp;Data Barang Perlengkapan</a></li>
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
								case 'lihat-data-bagian':
									include "lihat-data-bagian.php";
									break;
								case 'lihat-data-pegawai':
									include "lihat-data-pegawai.php";
									break;
								case 'lihat-data-barang-perlengkapan':
									include "lihat-data-barang-perlengkapan.php";
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
</body>

</html>