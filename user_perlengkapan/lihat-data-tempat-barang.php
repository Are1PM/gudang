<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Tempat Barang</b></font>
     </h2><br>
<input type="button" value="Tambah" title="Tambah data tempat barang"
          onclick=window.open('home_perlengkapan.php?page=form-input-data-tempat-barang','_self');><br><br>
     <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="20" height="42">No</td>&nbsp;
               <th width="80">Kode Barang</td>&nbsp;
               <th width="100">Ruangan</td>&nbsp;
               <th width="80">Tanggal Masuk</td>&nbsp;
               <th width="10">Keadaan</th>
               <th width="80">Action</td>&nbsp;
          </tr>
          <?php
	include "../koneksi.php";
	$Cari="SELECT * FROM tempat_brg t, ruangan r WHERE t.id_ruangan=r.id_ruangan ORDER BY id_tempat";
	$Tampil = mysqli_query($Open,$Cari);
	$nomer=0;
    while ($hasil = mysqli_fetch_array ($Tampil)) {
			$id_tempat	= stripslashes($hasil['id_tempat']);
               $kode_brg	     = stripslashes ($hasil['kode_brg']);
               $nama_ruangan	= stripslashes ($hasil['nama_ruangan']);
               $tgl_masuk	= stripslashes ($hasil['tgl_masuk']);
               $keadaan	= stripslashes ($hasil['keadaan']);
		{
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
               <td height="32"><?=$nomer?><div align="center"></div>
               </td>
               <td><?=$kode_brg?><div align="center"></div>
               <td><?=$nama_ruangan?><div align="center"></div>
               <td><?=$tgl_masuk?><div align="center"></div>
               <td><?=$keadaan?><div align="center"></div>
               </td>
               <td bgcolor="#EEF2F7">
                    <div align="center"><a href="home_perlengkapan.php?page=edit-data-tempat-barang&id_tempat=<?=$id_tempat?>">Edit</a>
                         | <a href="home_perlengkapan.php?page=delete-data-tempat-barang&id_tempat=<?=$id_tempat?>">Delete</a></div>
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