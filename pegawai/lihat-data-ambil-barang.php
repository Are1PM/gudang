<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Ambil Barang</b></font>
     </h2><br>
<br>
     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="5%" height="42">No</td>&nbsp;
               <th width="30%">Kode Barang</td>&nbsp;
               <th width="20%">Tanggal Ambil</td>&nbsp;
               <th width="40%">Prodi</td>&nbsp;
          </tr>
          <?php
    include "../koneksi.php";

    $Cari="SELECT * FROM barang brg, ambil_barang ab, prodi p WHERE brg.kode_brg=ab.kode_brg AND ab.id_prodi=p.id_prodi AND ab.id_prodi=".$_SESSION['id_prodi']." ORDER BY id_ambil_brg";
    $Tampil = mysqli_query($Open, $Cari);
    $nomer=0;
    while ($hasil = mysqli_fetch_array($Tampil)) {
        $id_ambil_brg	= stripslashes($hasil['id_ambil_brg']);
        $nama_brg	     = stripslashes($hasil['nama_brg']);
        $tgl_ambil	= stripslashes($hasil['tgl_ambil']);
        $nama_prodi	     = stripslashes($hasil['nama_prodi']);
        {
    $nomer++;
?>
          <tr align="center" bgcolor="#DFE6EF">
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
          </tr>
          <tr align="center">
               <td height="32"><?=$nomer?><div align="center"></div>
               </td>
               <td><?=$nama_brg?><div align="center"></div>
               <td><?=$tgl_ambil?><div align="center"></div>
               <td><?=$nama_prodi?><div align="center"></div>
               </td>
               
          </tr>
          <tr align="center" bgcolor="#DFE6EF">
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>

          </tr>
          <?php
        }
    }
//Tutup koneksi engine MySQL
    mysqli_close($Open);
?>
     </table>
</div>
