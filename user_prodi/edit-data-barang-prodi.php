<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <?php
     include '../koneksi.php';
     if (isset($_GET['brg_prodi_id'])) {
          $brg_prodi_id = $_GET['brg_prodi_id'];
     } else {
          die("Error. No Kode Selected! ");
     }

     //proses edit data barang
     if (isset($_POST['Edit'])) {
          $brg_prodi_id     = $_POST['hbrg_prodi_id'];
          $brg_prodi_nama     = $_POST['brg_prodi_nama'];
          $brg_prodi_stok     = $_POST['brg_prodi_stok'];
          $brg_prodi_tgl_masuk     = stripslashes($_POST['brg_prodi_tgl_masuk']);
          $brg_prodi_tgl_keluar     = stripslashes($_POST['brg_prodi_tgl_keluar']);
          $brg_prodi_jml_masuk     = stripslashes($_POST['brg_prodi_jml_masuk']);
          $brg_prodi_jml_keluar     = stripslashes($_POST['brg_prodi_jml_keluar']);
          $brg_prodi_prodi_id     = stripslashes($_POST['brg_prodi_prodi_id']);

          //update data
          $query = "UPDATE barang_prodi SET 
                    brg_prodi_nama='$brg_prodi_nama',
                    brg_prodi_stok='$brg_prodi_stok',
                    brg_prodi_tgl_masuk='$brg_prodi_tgl_masuk',
                    brg_prodi_tgl_keluar='$brg_prodi_tgl_keluar',
                    brg_prodi_jml_masuk='$brg_prodi_jml_masuk',
                    brg_prodi_jml_keluar='$brg_prodi_jml_keluar',
                    brg_prodi_prodi_id='$brg_prodi_prodi_id'
               WHERE brg_prodi_id='$brg_prodi_id'";
          $sql = mysqli_query($Open, $query);
          //setelah berhasil update
          if ($sql) {
               echo "<h3><font color=green><center><blink>Data Barang Prodi Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='home_prodi.php?page=lihat-data-barang-prodi' title='kembali ke form lihat data barang prodi'><br><br>";
          } else {
               echo "<h3><font color=red><center>Data Barang Prodi gagal diedit</center></font></h3>";
          }
     }

     //Tampilkan data dari tabel barang
     $query = "SELECT * FROM barang_prodi WHERE brg_prodi_id='$brg_prodi_id'";
     $sql = mysqli_query($Open, $query);
     $hasil = mysqli_fetch_array($sql);
     $brg_prodi_id     = $hasil['brg_prodi_id'];
     $brg_prodi_nama          = $hasil['brg_prodi_nama'];
     $brg_prodi_stok     = $hasil['brg_prodi_stok'];
     $brg_prodi_tgl_masuk     = stripslashes($hasil['brg_prodi_tgl_masuk']);
     $brg_prodi_tgl_keluar     = stripslashes($hasil['brg_prodi_tgl_keluar']);
     $brg_prodi_jml_masuk     = stripslashes($hasil['brg_prodi_jml_masuk']);
     $brg_prodi_jml_keluar     = stripslashes($hasil['brg_prodi_jml_keluar']);
     $brg_prodi_prodi_id     = stripslashes($hasil['brg_prodi_prodi_id']);

     $q = "SELECT * FROM  prodi ORDER BY prodi_nama";
     $tampil_prodi = mysqli_query($Open, $q);
     ?>
     <form action="#" method="POST" name="postform" enctype="multipart/form-data">
          <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="550">&nbsp;</td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="650">
                         <h2 align="center">
                              <font color="orange" size="4" face="arial"><b>Edit Data Barang</b></font>
                         </h2>
                    </td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="550">&nbsp;</td>
               </tr>
               <tr bgcolor="#DFE6EF" height="20">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="550" align="center"><b>Data Barang</b></td>
               </tr>
               <tr>
                    <input type="hidden" name="hbrg_prodi_id" value="<?= $brg_prodi_id ?>"></b></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="36">Nama Barang</td>
                    <td><input type="text" name="brg_prodi_nama" size="30" maxlength="30" value="<?= $brg_prodi_nama ?>"></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="36">Stok Barang</td>
                    <td><input type="text" name="brg_prodi_stok" size="20" maxlength="20" value="<?= $brg_prodi_stok ?>"></td>
               </tr>
               <tr>
                    <td height="36">&nbsp;</td>
                    <td>Tanggal Masuk</td>
                    <td colspan="2" width="190"><input type="text" name="brg_prodi_tgl_masuk" size="16" value="<?= $brg_prodi_tgl_masuk ?>" />
                         <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.brg_prodi_tgl_masuk);return false;"><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
                    </td>
               </tr>
               <tr>
                    <td height="36">&nbsp;</td>
                    <td>Tanggal Keluar</td>
                    <td colspan="2" width="190"><input type="text" name="brg_prodi_tgl_keluar" size="16" value="<?= $brg_prodi_tgl_keluar ?>" />
                         <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.bp_ta$brg_prodi_tgl_keluar);return false;"><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
                    </td>
               </tr>
               <tr>
                    <td height="36">&nbsp;</td>
                    <td>Jumlah Masuk</td>
                    <td><input type="number" name="brg_prodi_jml_masuk" size="20" value="<?= $brg_prodi_jml_masuk ?>"></td>
               </tr>
               <tr>
                    <td height="36">&nbsp;</td>
                    <td>Jumlah Keluar</td>
                    <td><input type="number" name="brg_prodi_jml_keluar" size="20" value="<?= $brg_prodi_jml_keluar ?>"></td>
               </tr>
               <tr>
                    <td height="36">&nbsp;</td>
                    <td>Prodi</td>
                    <td>
                         <select name="brg_prodi_prodi_id">
                              <option value="0">- Pilih Prodi -</option>
                              <?php
                              while ($result = mysqli_fetch_assoc($tampil_prodi)) :
                              ?>
                                   <option value="<?= $result['prodi_id'] ?>" <?= ($brg_prodi_prodi_id == $result['prodi_id']) ? "selected" : "" ?>><?= $result['prodi_nama'] ?></option>
                              <?php
                              endwhile;
                              ?>
                         </select>
                    </td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="20">&nbsp;</td>
                    <td>&nbsp;</td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="Edit" value="Edit Data">&nbsp;&nbsp;
                         <input type="button" value="Cancel" onclick=location.href="home_prodi.php?page=lihat-data-barang" title="kembali ke lihat data barang"></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="32">&nbsp;</td>
                    <td>&nbsp;</td>
               </tr>
          </table>
     </form>
     <iframe width=174 height=189 name="gToday:normal:../assets/calender/normal.js" id="gToday:normal:../assets/calender/normal.js" src="../assets/calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>

     <?php
     //Tutup koneksi engine mysqli
     mysqli_close($Open);
     ?>
</div>