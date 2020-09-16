<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['akses']) && ($_SESSION['akses'] == 'prodi')) {
     if ($_GET['file'] == "stok-pdf") {
          include "export_stok_pdf.php";
     } else {
          echo "<h1>Dokumen Tidak Ditemukan!</h1>";
     }
} else {
     header("Location:../index.php");
}
