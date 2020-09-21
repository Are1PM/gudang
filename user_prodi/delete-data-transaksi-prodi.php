<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['t_prodi_id'])) {
    $t_prodi_id = $_GET['t_prodi_id'];
    $query   = "SELECT * FROM transaksi_prodi WHERE t_prodi_id='$t_prodi_id'";
    $hasil   = mysqli_query($Open, $query);
    $data    = mysqli_fetch_array($hasil);
} else {
    die("Error. Tidak ada data yang dipilih Silakan cek kembali! ");
}
//proses delete data
if (!empty($t_prodi_id) && $t_prodi_id != "") {
    $hapus = "DELETE FROM transaksi_prodi WHERE t_prodi_id='$t_prodi_id'";
    $sql = mysqli_query($Open, $hapus);
    if ($sql) {
?>
        <script language="JavaScript">
            alert('Data Transaksi Prodi Berhasil dihapus');
            document.location = 'home_prodi.php?page=lihat-data-transaksi-prodi';
        </script>
<?php
    } else {
        echo "<h2><font color=red><center>Data transaksi prodi gagal dihapus</center></font></h2>";
    }
}
//Tutup koneksi engine mysqli
mysqli_close($Open);
?>