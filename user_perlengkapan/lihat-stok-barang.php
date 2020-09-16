<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Stok Barang</b></font>
     </h2><br>
     <input type="button" value="Export To PDF" title="Save as PDF Format" onclick="window.open('home_perlengkapan.php?page=export-stok-pdf','_blank');"><br><br>
     <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="5" height="42">No</td>&nbsp;
               <th width=" 80">Kode Barang</td>&nbsp;
               <th width="170">Nama Barang</td>&nbsp;
               <th width="70">Jenis Barang</td>&nbsp;
               <th width="60">Stok Barang</td>&nbsp;
               <th width="60">Sisa Barang</td>&nbsp;
          </tr>
          <?php
          include "../koneksi.php";
          $Cari = "SELECT * FROM barang b LEFT JOIN satuan s ON s.id_satuan=b.id_satuan LEFT JOIN kategori k ON k.id_kategori=b.id_kategori ORDER BY kode_brg";
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
               $sisa_barang     = stripslashes($hasil['jumlah_masuk']) - $total['total'];

               $nomer++;
          ?>
               <tr align="center" bgcolor="#DFE6EF">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

               </tr>
               <tr align="center">
                    <td height="32"><?= $nomer ?><div align="center"></div>
                    </td>

                    <td><?= $kode_brg ?><div align="center"></div>
                    </td>
                    <td><?= $nama_brg ?><div align="center"></div>
                    </td>
                    <td><?= $jenis_brg ?><div align="center"></div>
                    </td>

                    <td><?= $stok_barang ?><div align="center"></div>
                    </td>
                    <td><?= $sisa_barang ?><div align="center"></div>
                    </td>

               </tr>
               <tr align="center" bgcolor="#DFE6EF">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
               </tr>
          <?php
          }

          //Tutup koneksi engine MySQL
          mysqli_close($Open);
          ?>
     </table>
</div>