<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <?php
include '../koneksi.php';

if (isset($_GET['id_pakai_brg'])) {
     $id_pakai_brg = $_GET['id_pakai_brg'];
} else {
	die ("Error. No Kode Selected! ");	
}

//proses edit data satuan
if (isset($_POST['Edit'])) {
	$id_pakai_brg	= $_POST['hid_pakai_brg'];
   	$tgl_pakai	= $_POST['tgl_pakai'];
	
	
	//update data
	$query = "UPDATE pakai_barang SET 
				tgl_pakai='$tgl_pakai'
			WHERE id_pakai_brg='$id_pakai_brg'";
     $sql = mysqli_query($Open,$query);
	//setelah berhasil update
	if ($sql) {
		echo "<h3><font color=green><center><blink>Data Pakai Barang Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='home_pegawai.php?page=lihat-data-pakai-barang' title='kembali ke form lihat data pakai barang'><br><br>";	
	} else {
		echo "<h3><font color=red><center>Data pakai barang gagal diedit</center></font></h3>";	
	}
}

//Tampilkan data dari tabel satuan
$query = "SELECT * FROM pakai_barang WHERE id_pakai_brg='$id_pakai_brg'";
$sql = mysqli_query($Open,$query);
$hasil = mysqli_fetch_array($sql);

$id_pakai_brg	= $hasil['id_pakai_brg'];
$tgl_pakai	= $hasil['tgl_pakai'];
     
?>
     <form action="#" method="POST" name="postform">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
				</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>&nbsp;</td>
				<td><font size="3"><b>FORM EDIT DATA AMBIL BARANG</b></font></td>
			</tr>
			
               <tr>
                    <td width="18">&nbsp;</td>
                    <td width="142" height="36"></td>
                    <td width="550">
                              <input type="hidden" name="hid_pakai_brg" value="<?=$id_pakai_brg?>"></td>
               </tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Pakai</td>
				<td colspan="2" width="190"><input type="text" name="tgl_pakai" size="16" value="<?=$tgl_pakai?>"/>
				<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl_pakai);return false;" ><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
				</td>
			</tr>
			<tr>
			<tr>
			
				<td height="72">&nbsp;</td>
				<td>&nbsp;</td>
				<td>
                    <input type="submit" name="Edit" value="Edit Data">&nbsp;&nbsp;&nbsp;
                    <input type="button" value="Cancel"
                              onclick=location.href="home_pegawai.php?page=lihat-data-pakai-barang"
                              title="kembali ke lihat data pakai barang">
                    </td>	
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
		</table>
	</form>
	<iframe width=174 height=189 name="gToday:normal:../assets/calender/normal.js" id="gToday:normal:../assets/calender/normal.js" src="../assets/calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>

     <?php
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>
</div>