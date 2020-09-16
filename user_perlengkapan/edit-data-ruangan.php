<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <?php
include '../koneksi.php';
if (isset($_GET['id_ruangan'])) {
	$id_ruangan = $_GET['id_ruangan'];
} else {
	die ("Error. No Kode Selected! ");	
}

//proses edit data ruangan
if (isset($_POST['Edit'])) {
	$id_ruangan	= $_POST['hid_ruangan'];
	$nama_ruangan	= $_POST['nama_ruangan'];
	$pj	= $_POST['pj'];
	
	//update data
	$query = "UPDATE ruangan SET nama_ruangan='$nama_ruangan', pj='$pj' WHERE id_ruangan='$id_ruangan'";
	$sql = mysqli_query ($Open,$query);
	//setelah berhasil update
	if ($sql) {
		echo "<h3><font color=green><center><blink>Data Ruangan Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='home_perlengkapan.php?page=lihat-data-ruangan' title='kembali ke form lihat data ruangan'><br><br>";	
	} else {
		echo "<h3><font color=red><center>Data Ruangan gagal diedit</center></font></h3>";	
	}
}

//Tampilkan data dari tabel ruangan
$query = "SELECT * FROM ruangan WHERE id_ruangan='$id_ruangan'";
$sql = mysqli_query($Open,$query);
$hasil = mysqli_fetch_array ($sql);
$id_ruangan	= $hasil['id_ruangan'];
$nama_ruangan	= $hasil['nama_ruangan'];
$pj	          = $hasil['pj'];
?>
     <form action="#" method="POST" name="edit-data-ruangan" enctype="multipart/form-data">
          <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="550">&nbsp;</td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="550">
                         <font color="orange" size="4" face="arial"><b>Edit Data Ruangan</b></font>
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
                    <td width="550" align="center"><b>Data Ruangan</b></td>
               </tr>
               <tr>
                    <td width="18">&nbsp;</td>
                    <td width="142" height="36"></td>
                    <td width="550">
                              <input type="hidden" name="hid_ruangan" value="<?=$id_ruangan?>"></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="36">Nama ruangan</td>
                    <td><input type="text" name="nama_ruangan" size="30" maxlength="30" value="<?=$nama_ruangan?>"></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="36">Penanggung Jawab</td>
                    <td><input type="text" name="pj" size="20" maxlength="20" value="<?=$pj?>"></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="Edit" value="Edit Data">&nbsp;&nbsp;
                         <input type="button" value="Cancel"
                              onclick=location.href="home_perlengkapan.php?page=lihat-data-ruangan"
                              title="kembali ke lihat data ruangan"></td>
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