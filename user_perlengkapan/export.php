<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['akses']) && ($_SESSION['akses'] == 'perlengkapan')) {
     if ($_GET['file'] == "pdf") {
          include "export_pdf_bro.php";
     } elseif ($_GET['file'] == "stok-pdf") {
          include "export_stok_pdf.php";
     } else {
          echo "<h1>Dokumen Tidak Ditemukan!</h1>";
     }
} else {
     header("Location:../index.php");
}
