<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Satuan</b></font>
     </h2><br>
<input type="button" value="Tambah" title="Tambah data satuan"
          onclick=window.open('home_perlengkapan.php?page=form-input-data-satuan','_self');><br><br>
     <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="20" height="42">No</td>&nbsp;
               <th width="100">Nama Satuan</td>&nbsp;
               <th width="80">Action</td>&nbsp;
          </tr>
          <?php
	include "../koneksi.php";
	$Cari="SELECT * FROM satuan ORDER BY id_satuan";
	$Tampil = mysqli_query($Open,$Cari);
	$nomer=0;
    while ($hasil = mysqli_fetch_array ($Tampil)) {
			$id_satuan	= stripslashes($hasil['id_satuan']);
			$nama_satuan	= stripslashes ($hasil['nama_satuan']);
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
               <td><?=$nama_satuan?><div align="center"></div>
               </td>
               <td bgcolor="#EEF2F7">
                    <div align="center"><a href="home_perlengkapan.php?page=edit-data-satuan&id_satuan=<?=$id_satuan?>">Edit</a>
                         | <a href="home_perlengkapan.php?page=delete-data-satuan&id_satuan=<?=$id_satuan?>">Delete</a></div>
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