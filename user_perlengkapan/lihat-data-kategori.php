<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Kategori</b></font>
     </h2><br>
<input type="button" value="Tambah" title="Tambah data kategori"
          onclick=window.open('home_perlengkapan.php?page=form-input-data-kategori','_self');><br><br>
     <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="20" height="42">No</td>&nbsp;
               <th width="100">Nama Kategori</td>&nbsp;
               <th width="100">Nama Jumlah</td>&nbsp;
               <th width="80">Action</td>&nbsp;
          </tr>
          <?php
	include "../koneksi.php";
	$Cari="SELECT * FROM kategori ORDER BY kategori_id";
	$Tampil = mysqli_query($Open,$Cari);
	$nomer=0;
    while (	$hasil = mysqli_fetch_array ($Tampil)) {
			$kategori_id	= stripslashes($hasil['kategori_id']);
			$kategori_nama	= stripslashes ($hasil['kategori_nama']);
               $Jumlah = stripslashes ($hasil['kategori_jumlah']);
		{
	$nomer++;
?>
          <tr align="center" bgcolor="#DFE6EF">
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
          </tr>
          <tr align="center">
               <td height="32"><?=$nomer?><div align="center"></div>
               </td>
               <td><?=$kategori_nama?><div align="center"></div>
               </td>
               <td><?=$Jumlah?><div align="center"></div>
               </td>
               <td bgcolor="#EEF2F7">
                    <div align="center"><a href="home_perlengkapan.php?page=edit-data-kategori&kategori_id=<?=$kategori_id?>">Edit</a>
                         | <a href="home_perlengkapan.php?page=delete-data-kategori&kategori_id=<?=$kategori_id?>">Delete</a></div>
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