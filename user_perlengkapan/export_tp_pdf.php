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
$pdf->SetMargins(4, 4, 4);

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
     <h1 align="center">Daftar Barang</h1>
     <div style:"align-items: center;">
     <table width="100%" border="1">
          <tr>
               <th width="4%" align="center">No</th>
               <th width="15%"align="center">Kode Barang</th>
               <th width="15%" align="center">Nama Barang</th>
               <th width="15%" align="center">Jenis Barang</th>
               <th width="15%" align="center">Jumlah Barang</th>
               <th width="15%" align="center">Sisa Barang</th>
          </tr>
     
     ';
$Cari = "SELECT * FROM barang b INNER JOIN satuan s ON s.id_satuan=b.id_satuan INNER JOIN kategori k ON k.id_kategori=b.id_kategori ORDER BY kode_brg";
$Tampil = mysqli_query($Open, $Cari);
$nomer = 0;
while ($hasil = mysqli_fetch_array($Tampil)) {
     $kode_brg     = stripslashes($hasil['kode_brg']);
     $nama_brg     = stripslashes($hasil['nama_brg']);
     $jenis_brg     = stripslashes($hasil['jenis_brg']);

     $q = "SELECT  sum(jumlah_ambil) as total FROM ambil_barang WHERE kode_brg='$kode_brg'";
     $hitung = mysqli_query($Open, $q);

     $total = mysqli_fetch_assoc($hitung);
     $stok_barang     = stripslashes($hasil['jumlah_masuk']);
     $sisa_barang     = stripslashes($hasil['jumlah_masuk']) - $total['total']; {
          $nomer++;

          $html .= "
          <tr align=\"center\" >
          <td height=\"32\" >$nomer</td>
          ";
          // $html .="

          //           <td>
          //      ";

          //      if (empty($image)){
          //      $html .='
          //           <img src="../assets/img/no-img.png" width="100" height="110"><br>No Image
          //           ';
          //      }else{
          //      $html .="
          //           <img class=\"shadow\" src=\"../assets/img/$image\" width=\"100\" height=\"110\" title=\"$image\">
          //      ";
          //      }
          // $html .= "</td>";
          $html .= "
          <td>$kode_brg
          </td>
          <td>$nama_brg
          </td>
          <td>$jenis_brg</td>
          <td>$stok_barang</td>
          <td>$sisa_barang</td>
     </tr>
     ";
     }
}
//Tutup koneksi engine MySQL
mysqli_close($Open);

$html .= '</table></div>';

// print a block of text using Write()
$pdf->WriteHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Daftar Barang.pdf', 'I');
