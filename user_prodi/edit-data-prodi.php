<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <?php
include '../koneksi.php';
if (isset($_GET['prodi_id'])) {
	$prodi_id = $_GET['prodi_id'];
} else {
	die ("Error. No Kode Selected! ");	
}

//proses edit data prodi
if (isset($_POST['Edit'])) {
	$prodi_id	= $_POST['hprodi_id'];
	$prodi_nama	= $_POST['prodi_nama'];
	
	//update data
	$query = "UPDATE prodi SET prodi_nama='$prodi_nama' WHERE prodi_id='$prodi_id'";
	$sql = mysqli_query ($Open,$query);
	//setelah berhasil update
	if ($sql) {
		echo "<h3><font color=green><center><blink>Data prodi Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='home_prodi.php?page=lihat-data-prodi' title='kembali ke form lihat data prodi'><br><br>";	
	} else {
		echo "<h3><font color=red><center>Data prodi gagal diedit</center></font></h3>";	
	}
}

//Tampilkan data dari tabel prodi
$query = "SELECT * FROM prodi WHERE prodi_id='$prodi_id'";
$sql = mysqli_query($Open,$query);
$hasil = mysqli_fetch_array ($sql);
$prodi_id	= $hasil['prodi_id'];
$prodi_nama	= $hasil['prodi_nama'];
?>
     <form action="#" method="POST" name="edit-data-prodi" enctype="multipart/form-data">
          <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="550">&nbsp;</td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td width="550">
                         <font color="orange" size="4" face="arial"><b>Edit Data Prodi</b></font>
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
                    <td width="550" align="center"><b>Data Prodi</b></td>
               </tr>
               <tr>
                    <td width="18">&nbsp;</td>
                    <td width="142" height="36"></td>
                    <td width="550">
                              <input type="hidden" name="hprodi_id" value="<?=$prodi_id?>"></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="36">Nama prodi</td>
                    <td><input type="text" name="prodi_nama" size="30" maxlength="30" value="<?=$prodi_nama?>"></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="Edit" value="Edit Data">&nbsp;&nbsp;
                         <input type="button" value="Cancel"
                              onclick=location.href="home_prodi.php?page=lihat-data-prodi"
                              title="kembali ke lihat data prodi"></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="32">&nbsp;</td>
                    <td>&nbsp;</td>
               </tr>
          </table>
     </form>
     <?php
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>
</div>