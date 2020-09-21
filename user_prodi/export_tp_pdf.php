<?php
require_once('../assets/TCPDF-master/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Daftar Transaksi');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
// $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(30, 4, 2);

// set auto page breaks
// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
     require_once(dirname(__FILE__) . '/lang/eng.php');
     $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 8);

// add a page
$pdf->AddPage();

// set some text to print

include "../koneksi.php";
// <th width="16%" align="center">Image</th>
$html = '
     <h1 align="center">Daftar Transaksi Prodi</h1>
     <table width="100%" border="1">
          <tr>
               <th width="5%" align="center">No</th>
               <th width="20%" align="center">Tanggal Transaksi</th>
               <th width="20%" align="center">Bagian</th>
          </tr>
     
     ';
$Cari = "SELECT * FROM transaksi_prodi tp INNER JOIN pegawai b ON b.pegawai_id=tp.t_prodi_pegawai_id ORDER BY t_prodi_id";
$Tampil = mysqli_query($Open, $Cari);
$nomer = 0;
while ($hasil = mysqli_fetch_array($Tampil)) {

     $t_prodi_tgl_transaksi     = stripslashes($hasil['t_prodi_tgl_transaksi']);
     $pegawai_nama     = stripslashes($hasil['pegawai_nama']);
     $nomer++;

     $html .= "
          <tr align=\"center\" >
          <td height=\"20\" >$nomer</td>
          ";
     $html .= "
          <td>$t_prodi_tgl_transaksi</td>
          <td>$pegawai_nama</td>
     </tr>
     ";
}
//Tutup koneksi engine MySQL
mysqli_close($Open);

$html .= '</table>';

// print a block of text using Write()
$pdf->WriteHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Daftar Barang.pdf', 'I');
