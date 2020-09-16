<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Pakai Barang</b></font>
     </h2><br>
<input type="button" value="Tambah" title="Tambah data pakai barang"
          onclick=window.open('home_pegawai.php?page=form-input-pakai-barang','_self');><br><br>
     <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="20" height="42">No</td>&nbsp;
               <th width="100">Tanggal Pakai</td>&nbsp;
               <th width="80">Action</td>&nbsp;
          </tr>
          <?php
	include "../koneksi.php";
	$Cari="SELECT * FROM pakai_barang ORDER BY id_pakai_brg";
	$Tampil = mysqli_query($Open,$Cari);
	$nomer=0;
     while ($hasil = mysqli_fetch_array ($Tampil)) {
			$id_pakai_brg	= stripslashes($hasil['id_pakai_brg']);
               $tgl_pakai	     = stripslashes ($hasil['tgl_pakai']);
		{
	$nomer++;
?>
          <tr align="center" bgcolor="#DFE6EF">
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
          </tr>
          <tr align="center">
               <td height="32"><?=$nomer?><div align="center"></div>
               </td>
               <td><?=$tgl_pakai?><div align="center"></div>
               </td>
               <td bgcolor="#EEF2F7">
                    <div align="center"><a href="home_pegawai.php?page=edit-data-pakai-barang&id_pakai_brg=<?=$id_pakai_brg?>">Edit</a>
                         | <a href="home_pegawai.php?page=delete-data-pakai-barang&id_pakai_brg=<?=$id_pakai_brg?>">Delete</a></div>
               </td>
          </tr>
          <tr align="center" bgcolor="#DFE6EF">
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