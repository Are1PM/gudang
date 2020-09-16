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
$pdf->SetMargins(2, 4, 2);

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
     <table width="100%" border="1">
          <tr>
               <th width="4%" align="center">No</th>
               <th width="12%"align="center">Kode Barang</th>
               <th width="20%" align="center">Nama Barang</th>
               <th width="10%" align="center">No Inventaris</th>
               <th width="7%" align="center">Jenis Barang</th>
               <th width="8%" align="center">Tanggal Masuk</th>
               <th width="8%" align="center">Tanggal Keluar</th>
               <th width="7%" align="center">Tahun Perolehan</th>
               <th width="5%" align="center">Jumlah Masuk</th>
               <th width="5%" align="center">Jumlah Keluar</th>
               <th width="7%" align="center">Satuan</th>
               <th width="7%" align="center">Kategori</th>
          </tr>
     
     ';
$Cari = "SELECT * FROM barang b INNER JOIN satuan s ON s.id_satuan=b.id_satuan INNER JOIN kategori k ON k.id_kategori=b.id_kategori ORDER BY kode_brg";
$Tampil = mysqli_query($Open, $Cari);
$nomer = 0;
while ($hasil = mysqli_fetch_array($Tampil)) {
     $kode_brg     = stripslashes($hasil['kode_brg']);
     $image          = stripslashes($hasil['image']);
     $nama_brg     = stripslashes($hasil['nama_brg']);
     $no_inventaris     = stripslashes($hasil['no_inventaris']);
     $jenis_brg     = stripslashes($hasil['jenis_brg']);
     $tgl_masuk     = stripslashes($hasil['tgl_masuk']);
     $tgl_keluar     = stripslashes($hasil['tgl_keluar']);
     $jumlah_masuk     = stripslashes($hasil['jumlah_masuk']);
     $jumlah_keluar     = stripslashes($hasil['jumlah_keluar']);
     $tahun_perolehan     = stripslashes($hasil['tahun_perolehan']);
     $nama_satuan     = stripslashes($hasil['nama_satuan']);
     $nama_kategori     = stripslashes($hasil['nama_kategori']); {
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
          <td>$no_inventaris</td>
          <td>$jenis_brg</td>
          <td>$tgl_masuk</td>
          <td>$tgl_keluar</td>
          <td>$tahun_perolehan</td>
          <td>$jumlah_masuk</td>
          <td>$jumlah_keluar</td>
          <td>$nama_satuan</td>
          <td>$nama_kategori</td>
          
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
