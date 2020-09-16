<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <?php
include '../koneksi.php';
if (isset($_GET['bp_id'])) {
	$bp_id = $_GET['bp_id'];
} else {
	die ("Error. No Kode Selected! ");	
}

//proses edit data barang
if (isset($_POST['Edit'])) {
	$bp_id	= $_POST['hbp_id'];
	$bp_image		= $_FILES['bp_image']['name'];
	$bp_nama	= $_POST['bp_nama'];
     $bp_sumber	= $_POST['bp_sumber'];
	$bp_no_inventaris	= $_POST['bp_no_inventaris'];
     $bp_jenis_barang	= $_POST['bp_jenis_barang'];
     $bp_tgl_masuk	= stripslashes($_POST['bp_tgl_masuk']);
     $bp_tgl_keluar	= stripslashes($_POST['bp_tgl_keluar']);
     $bp_jumlah_masuk	= stripslashes ($_POST['bp_jumlah_masuk']);
     $bp_jumlah_keluar	= stripslashes ($_POST['bp_jumlah_keluar']);
     $bp_thn_perolehan	= stripslashes ($_POST['bp_thn_perolehan']);
     $bp_stok_brg	= stripslashes ($_POST['bp_stok_brg']);
     $bp_kategori_id	= stripslashes ($_POST['bp_kategori_id']);
	//Cek Photo
	if (strlen($bp_image)>0) {
		//upload Photo
		if (is_uploaded_file($_FILES['bp_image']['tmp_name'])) {
			move_uploaded_file ($_FILES['bp_image']['tmp_name'], "../assets/img/".$bp_image);
			mysqli_query ($Open,"UPDATE barang SET bp_image='$bp_image' WHERE bp_id='$bp_id'");
		}
	}
	
	//update data
	$query = "UPDATE barang_perlengkapan SET 
                    bp_nama='$bp_nama',
                    bp_sumber='$bp_sumber',
                    bp_no_inventaris='$bp_no_inventaris',
                    bp_jenis_barang='$bp_jenis_barang',
                    bp_tgl_masuk='$bp_tgl_masuk',
                    bp_tgl_keluar='$bp_tgl_keluar',
                    bp_jumlah_masuk='$bp_jumlah_masuk',
                    bp_jumlah_keluar='$bp_jumlah_keluar',
                    bp_thn_perolehan='$bp_thn_perolehan',
                    bp_stok_brg='$bp_stok_brg',
                    bp_kategori_id='$bp_kategori_id'
               WHERE bp_id='$bp_id'";
	$sql = mysqli_query ($Open,$query);
	//setelah berhasil update
	if ($sql) {
		echo "<h3><font color=green><center><blink>Data Barang Perlengkapan Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='home_perlengkapan.php?page=lihat-data-barang' Perlengkapan title='kembali ke form lihat data barang'><br><br>";	
	} else {
		echo "<h3><font color=red><center>Data Barang Perlengkapan gagal diedit</center></font></h3>";	
	}
}

//Tampilkan data dari tabel barang
$query = "SELECT * FROM barang_perlengkapan WHERE bp_id='$bp_id'";
$sql = mysqli_query($Open,$query);
$hasil = mysqli_fetch_array ($sql);
$bp_id	= $hasil['bp_id'];
$bp_image_data	= $hasil['bp_image'];
$bp_nama		= $hasil['bp_nama'];
$bp_sumber		= $hasil['bp_sumber'];
$bp_no_inventaris	= $hasil['bp_no_inventaris'];
$bp_jenis_barang	= $hasil['bp_jenis_barang'];
$bp_tgl_masuk	= stripslashes ($hasil['bp_tgl_masuk']);
$bp_tgl_keluar	= stripslashes ($hasil['bp_tgl_keluar']);
$bp_jumlah_masuk	= stripslashes ($hasil['bp_jumlah_masuk']);
$bp_jumlah_keluar	= stripslashes ($hasil['bp_jumlah_keluar']);
$bp_thn_perolehan	= stripslashes ($hasil['bp_thn_perolehan']);
$bp_stok_brg	= stripslashes ($hasil['bp_stok_brg']);
$bp_kategori_id	= stripslashes ($hasil['bp_kategori_id']);

$q = "SELECT * FROM  kategori ORDER BY kategori_nama";
$tampil_kategori = mysqli_query($Open, $q);
?>
     <form action="#" method="POST" name="postform" enctype="multipart/form-data">
          <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="550">&nbsp;</td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="650">
                    <h2 align="center">
                         <font color="orange" size="4" face="arial" ><b>Edit Data Barang</b></font>
                    </h2>
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
                    <td width="550" align="center"><b>Data Barang</b></td>
               </tr>
               <tr>
                    <input type="hidden" name="hbp_id" value="<?=$bp_id?>"></b></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="36">Nama Barang</td>
                    <td><input type="text" name="bp_nama" size="30" maxlength="30" value="<?=$bp_nama?>"></td>
               </tr>
               <tr>
				<td height="36">&nbsp;</td>
				<td>No. Inventaris</td>
				<td><input type="text" name="bp_no_inventaris" size="20" value="<?= $bp_no_inventaris?>"></td>
			</tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="36">Jenis Barang</td>
                    <td><input type="text" name="bp_jenis_barang" size="20" maxlength="20" value="<?=$bp_jenis_barang?>"></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="36">Sumber Barang</td>
                    <td><input type="text" name="bp_sumber" size="30" maxlength="30" value="<?=$bp_sumber?>"></td>
               </tr>
               <tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Masuk</td>
				<td colspan="2" width="190"><input type="text" name="bp_tgl_masuk" size="16" value="<?= $bp_tgl_masuk?>"/>
				<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.bp_tgl_masuk);return false;" ><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Keluar</td>
				<td colspan="2" width="190"><input type="text" name="bp_tgl_keluar" size="16" value="<?= $bp_tgl_keluar?>"/>
				<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.bp_ta$bp_tgl_keluar);return false;" ><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jumlah Masuk</td>
				<td><input type="number" name="bp_jumlah_masuk" size="20" value="<?= $bp_jumlah_masuk?>"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jumlah Keluar</td>
				<td><input type="number" name="bp_jumlah_keluar" size="20" value="<?= $bp_jumlah_keluar?>"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tahun Perolehan</td>
				<td><input type="text" name="bp_thn_perolehan" size="20" value="<?= $bp_thn_perolehan?>"></td>
			</tr>
               <tr>
               <td height="36">&nbsp;</td>
				<td>Stok Barang</td>
				<td><input type="text" name="bp_stok_brg" size="20" value="<?= $bp_stok_brg?>"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Kategori</td>
				<td>
				<select name="bp_kategori_id">
					<option value="0">- Pilih Kategori -</option>
					<?php 
						while($result=mysqli_fetch_assoc($tampil_kategori)):
					?>
					<option value="<?= $result['kategori_id'] ?>" <?= ($bp_kategori_id==$result['kategori_id'])?"selected":"" ?>><?= $result['kategori_nama'] ?></option>
					<?php 
						endwhile;
					?>
				</select>
				</td>
			</tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="160">bp_Image</td>
                    <td><?php if (empty($bp_image_data))
					echo"<img src='../assets/img/no-img.png' width='100' height='110'><br>No bp_Image";
					else
					echo"<img class='shadow' align=left src='../assets/img/$bp_image_data' width='100' height='110' title='$bp_image_data'>";
				?><br /><?= $bp_image_data ?><br><br><input type="file" name="bp_image" size="30" /></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="20">&nbsp;</td>
                    <td>&nbsp;</td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="20">&nbsp;</td>
                    <td>&nbsp;</td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="Edit" value="Edit Data">&nbsp;&nbsp;
                         <input type="button" value="Cancel"
                              onclick=location.href="home_perlengkapan.php?page=lihat-data-barang"
                              title="kembali ke lihat data barang"></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="32">&nbsp;</td>
                    <td>&nbsp;</td>
               </tr>
          </table>
     </form>
     <iframe width=174 height=189 name="gToday:normal:../assets/calender/normal.js" id="gToday:normal:../assets/calender/normal.js" src="../assets/calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>

     <?php
//Tutup koneksi engine mysqli
	mysqli_close($Open);
?>
</div>