<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Barang</b></font>
     </h2><br>
     <input type="button" value="Export To PDF" title="Save as PDF Format" onclick="window.open('home_perlengkapan.php?page=export-pdf','_blank');"> <input type="button" value="Tambah" title="Tambah data barang" onclick="window.open('home_perlengkapan.php?page=form-input-master-barang','_self');"><br><br>
     <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="5">No</td>&nbsp;
               <th width="80" height="42">Image</td>&nbsp;
               <th width="170">Nama Barang</td>&nbsp;
               <th width="170">No Inventaris</td>&nbsp;
               <th width="80">Sumber</td>&nbsp;
               <th width="70">Jenis Barang</td>&nbsp;
               <th width="60">Tanggal Masuk</td>&nbsp;
               <th width="60">Tanggal Keluar</td>&nbsp;
               <th width="60">Tahun Perolehan</td>&nbsp;
               <th width="60">Jumlah Masuk</td>&nbsp;
               <th width="60">Jumlah Keluar</td>&nbsp;
               <th width="60">Stok</td>&nbsp;
               <th width="60">Kategori</td>&nbsp;
               <th width="80">Action</td>&nbsp;
          </tr>
          <?php
          include "../koneksi.php";
          $Cari = "SELECT * FROM barang_perlengkapan bp LEFT JOIN kategori k ON k.kategori_id=bp.bp_kategori_id ORDER BY bp_id";
          $Tampil = mysqli_query($Open, $Cari);
          $nomer = 0;

          while ($hasil = mysqli_fetch_array($Tampil)) {
               $bp_id          = stripslashes($hasil['bp_id']);
               $bp_image          = stripslashes($hasil['bp_image']);
               $bp_nama     = stripslashes($hasil['bp_nama']);
               $bp_no_inventaris     = stripslashes($hasil['bp_no_inventaris']);
               $bp_sumber     = stripslashes($hasil['bp_sumber']);
               $bp_jenis_barang     = stripslashes($hasil['bp_jenis_barang']);
               $bp_tgl_masuk     = stripslashes($hasil['bp_tgl_masuk']);
               $bp_tgl_keluar     = stripslashes($hasil['bp_tgl_keluar']);
               $bp_jumlah_masuk     = stripslashes($hasil['bp_jumlah_masuk']);
               $bp_jumlah_keluar     = stripslashes($hasil['bp_jumlah_keluar']);
               $bp_thn_perolehan     = stripslashes($hasil['bp_thn_perolehan']);
               $bp_stok_brg     = stripslashes($hasil['bp_stok_brg']);
               $kategori_nama     = stripslashes($hasil['kategori_nama']); {
                    $nomer++;
          ?>
                    <tr align="center" bgcolor="#DFE6EF">
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
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
                         <td><?php
                              if (empty($bp_image))
                                   echo "<img src='../assets/img/no-img.png' width='100' height='110'><br>No Image";
                              else
                                   echo "<img class='shadow' src='../assets/img/$bp_image' width='100' height='110' title='$bp_image'>";
                              ?>&nbsp;</td>
                         <td><?= $bp_nama ?><div align="center"></div>
                         </td>
                         <td><?= $bp_no_inventaris ?><div align="center"></div>
                         </td>
                         <td><?= $bp_sumber ?><div align="center"></div>
                         </td>
                         <td><?= $bp_jenis_barang ?><div align="center"></div>
                         </td>
                         <td><?= date("d-m-Y",strtotime($bp_tgl_masuk)) ?><div align="center"></div>
                         </td>
                         <td><?= date("d-m-Y",strtotime($bp_tgl_keluar)) ?><div align="center"></div>
                         </td>
                         <td><?= $bp_thn_perolehan ?><div align="center"></div>
                         </td>
                         <td><?= $bp_jumlah_masuk ?><div align="center"></div>
                         </td>
                         <td><?= $bp_jumlah_keluar ?><div align="center"></div>
                         </td>
                         <td><?= $bp_stok_brg ?><div align="center"></div>
                         </td>
                         <td><?= $kategori_nama ?><div align="center"></div>
                         </td>
                         <td bgcolor="#EEF2F7">
                              <div align="center"><a href="home_perlengkapan.php?page=edit-data-barang&bp_id=<?= $bp_id ?>">Edit</a>
                                   | <a href="home_perlengkapan.php?page=delete-data-barang&bp_id=<?= $bp_id ?>">Delete</a></div>
                         </td>
                    </tr>
                    <tr align="center" bgcolor="#DFE6EF">
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
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