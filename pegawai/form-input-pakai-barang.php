<?php 
	include "../koneksi.php";
	$q = "SELECT kode_brg,nama_brg FROM barang ORDER BY nama_brg";
	$tampil_barang = mysqli_query($Open, $q);
	$q = "SELECT * FROM prodi ORDER BY nama_prodi";
	$tampil_prodi = mysqli_query($Open, $q);
	$q = "SELECT * FROM pegawai ORDER BY nama_pegawai";
	$tampil_pegawai = mysqli_query($Open, $q);
?>

	<form action="home_pegawai.php?page=input-data-pakai-barang" method="POST" name="postform">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
				</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>&nbsp;</td>
				<td><font size="3"><b>FORM INPUT DATA PAKAI BARANG</b></font></td>
			</tr>
				<tr>
					<td width="5%" height="36">&nbsp;</td>
					<td width="25%">&nbsp;</td>
					<td width="70%">&nbsp;</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Pakai</td>
				<td colspan="2" width="190"><input type="text" name="tgl_pakai" size="16" />
				<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl_pakai);return false;" ><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
				</td>
			</tr>
			<tr>
			
				<td height="72">&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="Submit" value="Submit">&nbsp;&nbsp;&nbsp;
					<input type="reset" name="reset" value="Reset"></td>
			</tr>
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
		</table>
	</form>
	<iframe width=174 height=189 name="gToday:normal:../assets/calender/normal.js" id="gToday:normal:../assets/calender/normal.js" src="../assets/calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
