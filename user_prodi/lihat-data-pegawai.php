<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <h2 align="center">
          <font color="orange" size="4" face="arial"><b>Data Pegawai</b></font>
     </h2><br>
<input type="button" value="Tambah" title="Tambah data Pegawai"
          onclick=window.open('home_prodi.php?page=form-input-data-pegawai','_self');><br><br>
     <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FF6600">
               <th width="20" height="42">No</td>&nbsp;
               <th width="100">NIP/NID</td>&nbsp;
               <th width="150">Nama</td>&nbsp;
               <th width="70">Jabatan</td>&nbsp;
               <th width="70">No HP</td>&nbsp;
               <th width="130">Bagian</td>&nbsp;
               <th width="80">Action</td>&nbsp;
          </tr>
          <?php
	include "../koneksi.php";
	$Cari="SELECT * FROM pegawai pg, bagian b WHERE pg.pegawai_bagian_id=b.bagian_id ORDER BY pegawai_id";
	$Tampil = mysqli_query($Open,$Cari);
	$nomer=0;
    while ($hasil = mysqli_fetch_array ($Tampil)) {
			$pegawai_id	     = stripslashes($hasil['pegawai_id']);
			$pegawai_nip_nid    = stripslashes ($hasil['pegawai_nip_nid']);
			$pegawai_nama	     = stripslashes($hasil['pegawai_nama']);
			$pegawai_jabatan    = stripslashes($hasil['pegawai_jabatan']);
               $pegawai_no_hp    = stripslashes($hasil['pegawai_no_hp']);
			$bagian_nama	     = stripslashes($hasil['bagian_nama']);
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
               <td>&nbsp;</td>
          </tr>
          <tr align="center">
               <td height="32"><?=$nomer?><div align="center"></div>
               </td>
               <td><?=$pegawai_nip_nid?><div align="center"></div>
               </td>
               <td><?=$pegawai_nama?><div align="center"></div>
               </td>
               <td><?=$pegawai_jabatan?><div align="center"></div>
               </td>
               <td><?=$pegawai_no_hp?><div align="center"></div>
               </td>
               <td><?=$bagian_nama?><div align="center"></div>
               </td>
               <td bgcolor="#EEF2F7">
                    <div align="center"><a href="home_prodi.php?page=edit-data-pegawai&pegawai_id=<?=$pegawai_id?>">Edit</a>
                         | <a href="home_prodi.php?page=delete-data-pegawai&pegawai_id=<?=$pegawai_id?>">Delete</a></div>
               </td>
          </tr>
          <tr align="center" bgcolor="#DFE6EF">
               <td>&nbsp;</td>
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