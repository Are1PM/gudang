<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Prodi</b></font>
     </h2><br>
     <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="20" height="42">No</td>&nbsp;
               <th width="200">Nama Prodi</td>&nbsp;
          </tr>
          <?php
          include "../koneksi.php";
          $Cari = "SELECT * FROM prodi ORDER BY prodi_id";
          $Tampil = mysqli_query($Open, $Cari);
          $nomer = 0;
          while ($hasil = mysqli_fetch_array($Tampil)) {
               $prodi_id          = stripslashes($hasil['prodi_id']);
               $prodi_nama     = stripslashes($hasil['prodi_nama']); {
                    $nomer++;
          ?>
                    <tr align="center" bgcolor="#DFE6EF">
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                    </tr>
                    <tr align="center">
                         <td height="32"><?= $nomer ?><div align="center"></div>
                         </td>
                         <td><?= $prodi_nama ?><div align="center"></div>
                         </td>

                    </tr>
                    <tr align="center" bgcolor="#DFE6EF">
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