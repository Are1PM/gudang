<?php
//buka koneksi ke engine mysqli
$Open = mysqli_connect("localhost", "root", "");
if (!$Open) {
	die("Koneksi ke Engine mysqli Gagal !<br>");
} else {
	// print("Engine Connected<br>");
}
//koneksi ke database
$Koneksi = mysqli_select_db($Open, "gudang");
if (!$Koneksi) {
	die("Koneksi ke Database Gagal !");
} else {
	// print("Database Connected<br><br><br>");
}