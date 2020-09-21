<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Ambil Barang</b></font>
     </h2><br>
     <input type="button" value="Export To PDF" title="Save as PDF Format" onclick="window.open('home_prodi.php?page=export-tp-pdf','_blank');">
     <input type="button" value="Tambah" title="Tambah data transaksi prodi" onclick=window.open('home_prodi.php?page=form-input-transaksi-prodi','_self');><br><br>
     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="5%" height="42">No</td>&nbsp;
               <th width="30%">Tanggal Transaksi Prodi</td>&nbsp;
               <th width="30%">Pegawai</td>&nbsp;
               <th width="15%">Action</td>&nbsp;
          </tr>
          <?php
          include "../koneksi.php";
          $Cari = "SELECT * FROM transaksi_prodi tp, pegawai p WHERE tp.t_prodi_pegawai_id=p.pegawai_id ORDER BY t_prodi_id";
          $Tampil = mysqli_query($Open, $Cari);
          $nomer = 0;
          while ($hasil = mysqli_fetch_array($Tampil)) {
               $t_prodi_id     = stripslashes($hasil['t_prodi_id']);
               $t_prodi_tgl_transaksi          = stripslashes($hasil['t_prodi_tgl_transaksi']);
               $pegawai_nama          = stripslashes($hasil['pegawai_nama']); {
                    $nomer++;
          ?>
                    <tr align="center" bgcolor="#DFE6EF">
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                    </tr>
                    <tr align="center">
                         <td height="32"><?= $nomer ?><div align="center"></div>
                         </td>
                         <td><?= $t_prodi_tgl_transaksi ?><div align="center"></div>
                         <td><?= $pegawai_nama ?><div align="center"></div>
                         </td>
                         <td bgcolor="#EEF2F7">
                              <div align="center"><a href="home_prodi.php?page=edit-data-transaksi-prodi&t_prodi_id=<?= $t_prodi_id ?>">Edit</a>
                                   | <a href="home_prodi.php?page=delete-data-transaksi-prodi&t_prodi_id=<?= $t_prodi_id ?>">Delete</a></div>
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