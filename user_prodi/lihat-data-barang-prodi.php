<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Barang Prodi</b></font>
     </h2><br>
     <input type="button" value="Export To PDF" title="Save as PDF Format" onclick="window.open('home_prodi.php?page=export-bprodi-pdf','_blank');">
     <input type="button" value="Tambah" title="Tambah data barang" onclick="window.open('home_prodi.php?page=form-input-data-barang-prodi','_self');"><br><br>
     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600" height="25px">
               <th width="5%">No</td>&nbsp;
               <th width="15%">Nama Barang</td>&nbsp;
               <th width="10%">Stok Barang</td>&nbsp;
               <th width="10%">Tanggal Masuk</td>&nbsp;
               <th width="10%">Tanggal Keluar</td>&nbsp;
               <th width="10%">Jumlah Masuk</td>&nbsp;
               <th width="10%">Jumlah Keluar</td>&nbsp;
               <th width="10%">Prodi</td>&nbsp;
               <th width="10%">Action</td>&nbsp;
          </tr>
          <?php
          include "../koneksi.php";
          $prodi_id = $_SESSION['prodi_id'];
          $Cari = "SELECT * FROM barang_prodi bp LEFT JOIN prodi p ON p.prodi_id=bp.brg_prodi_prodi_id WHERE bp.brg_prodi_prodi_id=$prodi_id ORDER BY brg_prodi_id";
          $Tampil = mysqli_query($Open, $Cari);
          $nomer = 0;

          while ($hasil = mysqli_fetch_array($Tampil)) {
               $brg_prodi_id          = stripslashes($hasil['brg_prodi_id']);
               $brg_prodi_nama     = stripslashes($hasil['brg_prodi_nama']);
               $brg_prodi_stok     = stripslashes($hasil['brg_prodi_stok']);
               $brg_prodi_tgl_masuk     = stripslashes($hasil['brg_prodi_tgl_masuk']);
               $brg_prodi_tgl_keluar     = stripslashes($hasil['brg_prodi_tgl_keluar']);
               $brg_prodi_jml_masuk     = stripslashes($hasil['brg_prodi_jml_masuk']);
               $brg_prodi_jml_keluar     = stripslashes($hasil['brg_prodi_jml_keluar']);
               $prodi_nama     = stripslashes($hasil['prodi_nama']); {
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
                    </tr>
                    <tr align="center">
                         <td height="32"><?= $nomer ?><div align="center"></div>
                         </td>
                         <td><?= $brg_prodi_nama ?><div align="center"></div>
                         </td>
                         <td><?= $brg_prodi_stok ?><div align="center"></div>
                         </td>
                         <td><?= date("d-m-Y", strtotime($brg_prodi_tgl_masuk)) ?><div align="center"></div>
                         </td>
                         <td><?= date("d-m-Y", strtotime($brg_prodi_tgl_keluar)) ?><div align="center"></div>
                         </td>
                         <td><?= $brg_prodi_jml_masuk ?><div align="center"></div>
                         </td>
                         <td><?= $brg_prodi_jml_keluar ?><div align="center"></div>
                         </td>
                         <td><?= $prodi_nama ?><div align="center"></div>
                         </td>
                         <td bgcolor="#EEF2F7">
                              <div align="center"><a href="home_prodi.php?page=edit-data-barang-prodi&brg_prodi_id=<?= $brg_prodi_id ?>">Edit</a>
                                   | <a href="home_prodi.php?page=delete-data-barang-prodi&brg_prodi_id=<?= $brg_prodi_id ?>">Delete</a></div>
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
                    </tr>
          <?php
               }
          }
          //Tutup koneksi engine MySQL
          mysqli_close($Open);
          ?>
     </table>
</div>