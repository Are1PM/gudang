<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
     <?php
include '../koneksi.php';
if (isset($_GET['kode_brg'])) {
	$kode_brg = $_GET['kode_brg'];
} else {
	die ("Error. No Kode Selected! ");	
}

//proses edit data barang
if (isset($_POST['Edit'])) {
	$kode_brg	= $_POST['hkode_brg'];
	$image		= $_FILES['image']['name'];
	$nama_brg	= $_POST['nama_brg'];
	$no_inventaris	= $_POST['no_inventaris'];
     $jenis_brg	= $_POST['jenis_brg'];
     $tgl_masuk	= stripslashes ($_POST['tgl_masuk']);
     $tgl_keluar	= stripslashes ($_POST['tgl_keluar']);
     $jumlah_masuk	= stripslashes ($_POST['jumlah_masuk']);
     $jumlah_keluar	= stripslashes ($_POST['jumlah_keluar']);
     $tahun_perolehan	= stripslashes ($_POST['tahun_perolehan']);
     $id_satuan	= stripslashes ($_POST['id_satuan']);
     $id_kategori	= stripslashes ($_POST['id_kategori']);
	//Cek Photo
	if (strlen($image)>0) {
		//upload Photo
		if (is_uploaded_file($_FILES['image']['tmp_name'])) {
			move_uploaded_file ($_FILES['image']['tmp_name'], "../assets/img/".$image);
			mysqli_query ($Open,"UPDATE barang SET image='$image' WHERE kode_brg='$kode_brg'");
		}
	}
	
	//update data
	$query = "UPDATE barang SET 
                    nama_brg='$nama_brg',
                    no_inventaris='$no_inventaris',
                    jenis_brg='$jenis_brg',
                    tgl_masuk='$tgl_masuk',
                    tgl_keluar='$tgl_keluar',
                    jumlah_masuk='$jumlah_masuk',
                    jumlah_keluar='$jumlah_keluar',
                    tahun_perolehan='$tahun_perolehan',
                    id_satuan='$id_satuan',
                    id_kategori='$id_kategori'
               WHERE kode_brg='$kode_brg'";
	$sql = mysqli_query ($Open,$query);
	//setelah berhasil update
	if ($sql) {
		echo "<h3><font color=green><center><blink>Data Barang Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='home_perlengkapan.php?page=lihat-data-barang' title='kembali ke form lihat data barang'><br><br>";	
	} else {
		echo "<h3><font color=red><center>Data Barang gagal diedit</center></font></h3>";	
	}
}

//Tampilkan data dari tabel barang
$query = "SELECT * FROM barang WHERE kode_brg='$kode_brg'";
$sql = mysqli_query($Open,$query);
$hasil = mysqli_fetch_array ($sql);
$kode_brg	= $hasil['kode_brg'];
$image_data	= $hasil['image'];
$nama_brg		= $hasil['nama_brg'];
$no_inventaris	= $hasil['no_inventaris'];
$jenis_brg	= $hasil['jenis_brg'];
$tgl_masuk	= stripslashes ($hasil['tgl_masuk']);
$tgl_keluar	= stripslashes ($hasil['tgl_keluar']);
$jumlah_masuk	= stripslashes ($hasil['jumlah_masuk']);
$jumlah_keluar	= stripslashes ($hasil['jumlah_keluar']);
$tahun_perolehan	= stripslashes ($hasil['tahun_perolehan']);
$id_satuan	= stripslashes ($hasil['id_satuan']);
$id_kategori	= stripslashes ($hasil['id_kategori']);

$q = "SELECT * FROM satuan ORDER BY nama_satuan";
$tampil_satuan = mysqli_query($Open, $q);
$q = "SELECT * FROM  kategori ORDER BY nama_kategori";
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
                    <td width="18">&nbsp;</td>
                    <td width="142" height="36">Kode Barang</td>
                    <td width="550">:<b><?=$kode_brg?>
                              <input type="hidden" name="hkode_brg" value="<?=$kode_brg?>"></b></td>
               </tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="36">Nama Barang</td>
                    <td><input type="text" name="nama_brg" size="30" maxlength="30" value="<?=$nama_brg?>"></td>
               </tr>
               <tr>
				<td height="36">&nbsp;</td>
				<td>No. Inventaris</td>
				<td><input type="text" name="no_inventaris" size="20" value="<?= $no_inventaris?>"></td>
			</tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="36">Jenis Barang</td>
                    <td><input type="text" name="jenis_brg" size="20" maxlength="20" value="<?=$jenis_brg?>"></td>
               </tr>
               <tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Masuk</td>
				<td colspan="2" width="190"><input type="text" name="tgl_masuk" size="16" value="<?= $tgl_masuk?>"/>
				<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl_masuk);return false;" ><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Keluar</td>
				<td colspan="2" width="190"><input type="text" name="tgl_keluar" size="16" value="<?= $tgl_keluar?>"/>
				<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl_keluar);return false;" ><img src="../assets/calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jumlah Masuk</td>
				<td><input type="number" name="jumlah_masuk" size="20" value="<?= $jumlah_masuk?>"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jumlah Keluar</td>
				<td><input type="number" name="jumlah_keluar" size="20" value="<?= $jumlah_keluar?>"></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tahun Perolehan</td>
				<td><input type="text" name="tahun_perolehan" size="20" value="<?= $tahun_perolehan?>"></td>
			</tr>
               <tr>
				<td height="36">&nbsp;</td>
				<td>Satuan</td>
				<td>
				<select name="id_satuan">
					<option value="0">- Pilih Satuan -</option>
					<?php 
						while($result=mysqli_fetch_assoc($tampil_satuan)):
					?>
						<option value="<?= $result['id_satuan'] ?>" <?= ($id_satuan==$result['id_satuan'])?"selected":"" ?>><?= $result['nama_satuan'] ?></option>
					<?php 
						endwhile;
					?>
				</select>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Kategori</td>
				<td>
				<select name="id_kategori">
					<option value="0">- Pilih Kategori -</option>
					<?php 
						while($result=mysqli_fetch_assoc($tampil_kategori)):
					?>
					<option value="<?= $result['id_kategori'] ?>" <?= ($id_kategori==$result['id_kategori'])?"selected":"" ?>><?= $result['nama_kategori'] ?></option>
					<?php 
						endwhile;
					?>
				</select>
				</td>
			</tr>
               <tr>
                    <td>&nbsp;</td>
                    <td height="160">Image</td>
                    <td><?php if (empty($image_data))
					echo"<img src='../assets/img/no-img.png' width='100' height='110'><br>No Image";
					else
					echo"<img class='shadow' align=left src='../assets/img/$image_data' width='100' height='110' title='$image_data'>";
				?><br /><?= $image_data ?><br><br><input type="file" name="image" size="30" /></td>
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