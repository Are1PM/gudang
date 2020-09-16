<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data User Prodi</b></font>
     </h2><br>
<input type="button" value="Tambah" title="Tambah data user prodi"
          onclick=window.open('home_perlengkapan.php?page=form-input-data-user-prodi','_self');><br><br>
     <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="20" height="42">No</td>&nbsp;
               <th width="100">Username</td>&nbsp;
               <th width="100">Password</td>&nbsp;
               <th width="200">Prodi</td>&nbsp;
               <th width="80">Action</td>&nbsp;
          </tr>
          <?php
	include "../koneksi.php";
	$Cari="SELECT * FROM user_prodi u, prodi p WHERE u.id_prodi=p.id_prodi ORDER BY id_user_prodi";
	$Tampil = mysqli_query($Open,$Cari);
	$nomer=0;
    while ($hasil = mysqli_fetch_array ($Tampil)) {
			$id_user_prodi	= stripslashes($hasil['id_user_prodi']);
			$username	= stripslashes ($hasil['username']);
			$password	= stripslashes ($hasil['password']);
			$nama_prodi	= stripslashes ($hasil['nama_prodi']);
		{
	$nomer++;
?>
          <tr align="center" bgcolor="#DFE6EF">
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
          </tr>
          <tr align="center">
               <td height="32"><?=$nomer?><div align="center"></div>
               </td>
               <td><?=$username?><div align="center"></div>
               </td>
               <td><?=$password?><div align="center"></div>
               </td>
               <td><?=$nama_prodi?><div align="center"></div>
               </td>
               <td bgcolor="#EEF2F7">
                    <div align="center"><a href="home_perlengkapan.php?page=edit-data-user-prodi&id_user_prodi=<?=$id_user_prodi?>">Edit</a>
                         | <a href="home_perlengkapan.php?page=delete-data-user-prodi&id_user_prodi=<?=$id_user_prodi?>">Delete</a></div>
               </td>
          </tr>
          <tr align="center" bgcolor="#DFE6EF">
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