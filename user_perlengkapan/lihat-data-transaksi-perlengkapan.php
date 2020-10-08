<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Transaksi Perlengkapan</b></font>
     </h2><br>
     <input type="button" value="Export To PDF" title="Save as PDF Format" onclick="window.open('home_perlengkapan.php?page=export-tp-pdf','_blank');">
     <input type="button" value="Tambah" title="Tambah data transaksi perlengkapan" onclick=window.open('home_perlengkapan.php?page=form-input-transaksi-perlengkapan','_self');><br><br>
     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="5%" height="42">No</td>&nbsp;
               <th width="30%">Nama Barang</td>&nbsp;
               <th width="20%">Tanggal Transaksi Perlengkapan</td>&nbsp;
               <th width="10%">Jumlah Transaksi</td>&nbsp;
               <th width="20%">Bagian</td>&nbsp;
               <th width="15%">Action</td>&nbsp;
          </tr>
          <?php
          include "../koneksi.php";
          $Cari = "SELECT tp.*, bg.*, bp.bp_nama  FROM transaksi_perlengkapan tp, bagian bg, barang_perlengkapan bp, barang_perlengkapan_has_transaksi_perlengkapan bptp WHERE tp.tp_bagian_id=bg.bagian_id AND bptp.bp_id=bp.bp_id AND bptp.tp_id=tp.tp_id ORDER BY tp_id";
          $Tampil = mysqli_query($Open, $Cari);
          $nomer = 0;
          while ($hasil = mysqli_fetch_array($Tampil)) {
               $tp_id     = stripslashes($hasil['tp_id']);
               $tp_tgl_transaksi          = stripslashes($hasil['tp_tgl_transaksi']);
               $tp_jumlah = stripslashes($hasil['tp_jumlah']);
               $bp_nama = stripslashes($hasil['bp_nama']);
               $bagian_nama          = stripslashes($hasil['bagian_nama']); {
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
                         <td><?= $bp_nama ?><div align="center"></div>
                         <td><?= $tp_tgl_transaksi ?><div align="center"></div>
                         <td><?= $tp_jumlah ?><div align="center"></div>
                         <td><?= $bagian_nama ?><div align="center"></div>
                         </td>
                         <td bgcolor="#EEF2F7">
                              <div align="center"><a href="home_perlengkapan.php?page=edit-data-transaksi-perlengkapan&tp_id=<?= $tp_id ?>">Edit</a>
                                   | <a href="home_perlengkapan.php?page=delete-data-transaksi-perlengkapan&tp_id=<?= $tp_id ?>">Delete</a></div>
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