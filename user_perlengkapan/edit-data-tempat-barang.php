<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <?php
include '../koneksi.php';

if (isset($_GET['id_tempat'])) {
     $id_tempat = $_GET['id_tempat'];
} else {
	die ("Error. No Kode Selected! ");	
}

//proses edit data satuan
if (isset($_POST['Edit'])) {
	$id_tempat	= $_POST['hid_tempat'];
     $kode_brg	     = $_POST['kode_brg'];
     $id_ruangan	= $_POST['id_ruangan'];
     $tgl_masuk	= $_POST['tgl_masuk'];
     $keadaan       = $_POST['keadaan'];

	
	//update data
	$query = "UPDATE tempat_brg SET kode_brg='$kode_brg', id_ruangan='$id_ruangan',tgl_masuk='$tgl_masuk',keadaan='$keadaan' WHERE id_tempat='$id_tempat'";
     $sql = mysqli_query($Open,$query);
	//setelah berhasil update
	if ($sql) {
		echo "<h3><font color=green><center><blink>Data Tempat Barang Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='home_perlengkapan.php?page=lihat-data-tempat-barang' title='kembali ke form lihat data tempat barang'><br><br>";	
	} else {
		echo "<h3><font color=red><center>Data tempat barang gagal diedit</center></font></h3>";	
	}
}

//Tampilkan data dari tabel satuan
$query = "SELECT * FROM tempat_brg WHERE id_tempat='$id_tempat'";
$sql = mysqli_query($Open,$query);
$hasil = mysqli_fetch_array($sql);

$id_tempat	= $hasil['id_tempat'];
$kode_brg	     = $hasil['kode_brg'];
$id_ruangan	= $hasil['id_ruangan'];
$tgl_masuk	= $hasil['tgl_masuk'];
$keadaan	     = $hasil['keadaan'];

     $q = "SELECT kode_brg,nama_brg FROM barang";
	$tampil_barang = mysqli_query($Open, $q);
	$q = "SELECT id_ruangan,nama_ruangan FROM ruangan";
     $tampil_ruangan = mysqli_query($Open, $q);
     
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
				<td><font size="3"><b>FORM INPUT DATA TEMPAT BARANG</b></font></td>
			</tr>
			
               <tr>
                    <td width="18">&nbsp;</td>
                    <td width="142" height="36"></td>
                    <td width="550">
                              <input type="hidden" name="hid_tempat" value="<?=$id_tempat?>"></td>
               </tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Barang</td>
				<td>
				<select name="kode_brg">
				<option value="0">-- Pilih Barang --</option>
				<?php 
					while($hasil = mysqli_fetch_array($tampil_barang)):
				?>
					<option value="<?= $hasil['kode_brg'] ?>" <?= ($kode_brg==$hasil['kode_brg'])?"selected":""; ?>><?= $hasil['nama_brg'] ?></option>
				<?php 
					endwhile;
				?>
				</select>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Ruangan</td>
				<td>
				<select name="id_ruangan">
				<option value="0">-- Pilih Ruangan --</option>
				<?php 
					while($hasil = mysqli_fetch_array($tampil_ruangan)):
				?>
					<option value="<?= $hasil['id_ruangan'] ?>" <?= ($id_ruangan==$hasil['id_ruangan'])?"selected":""; ?>><?= $hasil['nama_ruangan'] ?></option>
				<?php 
					endwhile;
				?>
				</select>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Masuk</td>
				<td colspan="2" width="190"><input type="text" name="tgl_masuk" size="16" value="<?=$tgl_masuk?>"/>
				<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl_masuk);return false;" ><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Keadaan</td>
				<td colspan="2" width="190">
				<select name="keadaan">
				<option value="0">- Pilih Keadaan -</option>
				<option value="Baik" <?= ($keadaan=="Baik")?"selected":""; ?>>Baik</option>
				<option value="Rusak" <?= ($keadaan=="Rusak")?"selected":""; ?>>Rusak</option>
				</select>
				</td>
			</tr>
			<tr>
			
				<td height="72">&nbsp;</td>
				<td>&nbsp;</td>
				<td>
                    <input type="submit" name="Edit" value="Edit Data">&nbsp;&nbsp;&nbsp;
                    <input type="button" value="Cancel"
                              onclick=location.href="home_perlengkapan.php?page=lihat-data-tempat-barang"
                              title="kembali ke lihat data tempat barang">
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