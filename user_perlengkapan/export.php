<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['akses']) && ($_SESSION['akses'] == 'perlengkapan')) {
     if ($_GET['file'] == "bp-pdf") {
          include "export_bp_pdf.php";
     } elseif ($_GET['file'] == "tp-pdf") {
          include "export_tp_pdf.php";
     } else {
          echo "<h1>Dokumen Tidak Ditemukan!</h1>";
     }
} else {
     header("Location:../index.php");
}
