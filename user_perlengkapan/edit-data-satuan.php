<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <?php
include '../koneksi.php';
if (isset($_GET['id_satuan'])) {
	$id_satuan = $_GET['id_satuan'];
} else {
	die ("Error. No Kode Selected! ");	
}

//proses edit data satuan
if (isset($_POST['Edit'])) {
	$id_satuan	= $_POST['hid_satuan'];
	$nama_satuan	= $_POST['nama_satuan'];
	
	//update data
	$query = "UPDATE satuan SET nama_satuan='$nama_satuan' WHERE id_satuan='$id_satuan'";
	$sql = mysqli_query ($Open,$query);
	//setelah berhasil update
	if ($sql) {
		echo "<h3><font color=green><center><blink>Data satuan Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='home_perlengkapan.php?page=lihat-data-satuan' title='kembali ke form lihat data satuan'><br><br>";	
	} else {
		echo "<h3><font color=red><center>Data satuan gagal diedit</center></font></h3>";	
	}
}

//Tampilkan data dari tabel satuan
$query = "SELECT * FROM satuan WHERE id_satuan='$id_satuan'";
$sql = mysqli_query($Open,$query);
$hasil = mysqli_fetch_array ($sql);
$id_satuan	= $hasil['id_satuan'];
$nama_satuan	= $hasil['nama_satuan'];
?>
     <form action="#" method="POST" name="edit-data-satuan" enctype="multipart/form-data">
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
                         <font color="orange" size="4" face="arial"><b>Edit Data satuan</b></font>
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
                    <td width="550" align="center"><b>Data satuan</b></td>
               </tr>
               <tr>
                    <td width="18">&nbsp;</td>
                    <td width="142" height="36"></td>
                    <td width="550">
                              <input type="hidden" name="hid_satuan" value="<?=$id_satuan?>"></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="36">Nama satuan</td>
                    <td><input type="text" name="nama_satuan" size="30" maxlength="30" value="<?=$nama_satuan?>"></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="Edit" value="Edit Data">&nbsp;&nbsp;
                         <input type="button" value="Cancel"
                              onclick=location.href="home_perlengkapan.php?page=lihat-data-satuan"
                              title="kembali ke lihat data satuan"></td>
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