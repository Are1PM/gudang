<br />
<?php
include '../koneksi.php';
// Cek Kode
if (isset($_GET['tp_id'])) {
    $tp_id = $_GET['tp_id'];
    $query   = "SELECT * FROM transaksi_perlengkapan WHERE tp_id='$tp_id'";
    $hasil   = mysqli_query($Open, $query);
    $data    = mysqli_fetch_array($hasil);
} else {
    die("Error. Tidak ada data yang dipilih Silakan cek kembali! ");
}
//proses delete data
if (!empty($tp_id) && $tp_id != "") {

    $hapus = "DELETE FROM transaksi_perlengkapan WHERE tp_id='$tp_id'";
    $hapus_bptp = "DELETE FROM barang_perlengkapan_has_transaksi_perlengkapan WHERE tp_id='$tp_id'";
    $sql = mysqli_query($Open, $hapus_bptp);
    $sql = mysqli_query($Open, $hapus);
    if ($sql) {
?>
        <script language="JavaScript">
            alert('Data Transaksi Perlengkapan Berhasil dihapus');
            document.location = 'home_perlengkapan.php?page=lihat-data-transaksi-perlengkapan';
        </script>
<?php
    } else {
        echo "<h2><font color=red><center>Data transaksi perlengkapan gagal dihapus</center></font></h2>";
    }
}
//Tutup koneksi engine mysqli
mysqli_close($Open);
?>