<?php
require_once('../assets/TCPDF-master/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Daftar Barang');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
// $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(20, 4, 2);

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
     <h1 align="center">Daftar Barang Prodi</h1>
     <table width="100%" border="1">
          <tr>
               <th width="4%" align="center">No</th>
               <th width="20%" align="center">Nama Barang</th>
               <th width="7%" align="center">Jumlah Barang</th>
               <th width="7%" align="center">Stok Barang</th>
               <th width="15%" align="center">Tanggal Masuk</th>
               <th width="15%" align="center">Tanggal Keluar</th>
               <th width="8%" align="center">Jumlah Masuk</th>
               <th width="8%" align="center">Jumlah Keluar</th>
               <th width="7%" align="center">Prodi</th>
          </tr>
     
     ';
$Cari = "SELECT * FROM barang_prodi bp INNER JOIN prodi p ON p.prodi_id=bp.brg_prodi_prodi_id ORDER BY brg_prodi_id";
$Tampil = mysqli_query($Open, $Cari);
$nomer = 0;
while ($hasil = mysqli_fetch_array($Tampil)) {

     $brg_prodi_nama     = stripslashes($hasil['brg_prodi_nama']);
     $brg_prodi_jumlah     = stripslashes($hasil['brg_prodi_jumlah']);
     $brg_prodi_stok     = stripslashes($hasil['brg_prodi_stok']);
     $brg_prodi_tgl_masuk     = stripslashes($hasil['brg_prodi_tgl_masuk']);
     $brg_prodi_tgl_keluar     = stripslashes($hasil['brg_prodi_tgl_keluar']);
     $brg_prodi_jml_masuk     = stripslashes($hasil['brg_prodi_jml_masuk']);
     $brg_prodi_jml_keluar     = stripslashes($hasil['brg_prodi_jml_keluar']);
     $prodi_nama     = stripslashes($hasil['prodi_nama']); {
          $nomer++;

          $html .= "
          <tr align=\"center\" >
          <td height=\"32\" >$nomer</td>
          ";
          $html .= "
          <td>$brg_prodi_nama</td>
          <td>$brg_prodi_jumlah</td>
          <td>$brg_prodi_stok</td>
          <td>$brg_prodi_tgl_masuk</td>
          <td>$brg_prodi_tgl_keluar</td>
          <td>$brg_prodi_jml_masuk</td>
          <td>$brg_prodi_jml_keluar</td>
          <td>$prodi_nama</td>
          
     </tr>
     ";
     }
}
//Tutup koneksi engine MySQL
mysqli_close($Open);

$html .= '</table>';

// print a block of text using Write()
$pdf->WriteHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Daftar Barang.pdf', 'I');
