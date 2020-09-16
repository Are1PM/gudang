<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Ambil Barang</b></font>
     </h2><br>
     <input type="button" value="Tambah" title="Tambah data ambil barang" onclick=window.open('home_perlengkapan.php?page=form-input-ambil-barang','_self');><br><br>
     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="5%" height="42">No</td>&nbsp;
               <th width="30%">Nama Barang</td>&nbsp;
               <th width="10%">Tanggal Ambil</td>&nbsp;
               <th width="10%">Jumlah Ambil</td>&nbsp;
               <th width="30%">Prodi</td>&nbsp;
               <th width="15%">Action</td>&nbsp;
          </tr>
          <?php
          include "../koneksi.php";
          $Cari = "SELECT * FROM barang brg, ambil_barang ab, prodi p WHERE ab.id_prodi=p.id_prodi AND ab.kode_brg=brg.kode_brg ORDER BY id_ambil_brg";
          $Tampil = mysqli_query($Open, $Cari);
          $nomer = 0;
          while ($hasil = mysqli_fetch_array($Tampil)) {
               $id_ambil_brg     = stripslashes($hasil['id_ambil_brg']);
               $nama_brg          = stripslashes($hasil['nama_brg']);
               $jumlah_ambil = stripslashes($hasil['jumlah_ambil']);
               $tgl_ambil     = stripslashes($hasil['tgl_ambil']);
               $nama_prodi          = stripslashes($hasil['nama_prodi']); {
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
                         <td><?= $nama_brg ?><div align="center"></div>
                         <td><?= $tgl_ambil ?><div align="center"></div>
                         <td><?= $jumlah_ambil ?></td>
                         <td><?= $nama_prodi ?><div align="center"></div>
                         </td>
                         <td bgcolor="#EEF2F7">
                              <div align="center"><a href="home_perlengkapan.php?page=edit-data-ambil-barang&id_ambil_brg=<?= $id_ambil_brg ?>">Edit</a>
                                   | <a href="home_perlengkapan.php?page=delete-data-ambil-barang&id_ambil_brg=<?= $id_ambil_brg ?>">Delete</a></div>
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
          }
          //Tutup koneksi engine MySQL
          mysqli_close($Open);
          ?>
     </table>
</div>