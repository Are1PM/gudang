<br />
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
    //Kirimkan Variabel
    $tp_tgl_transaksi    = $_POST['tp_tgl_transaksi'];
    $tp_jumlah = $_POST['tp_jumlah'];
    $tp_bagian_id        = $_POST['tp_bagian_id'];

    //validasi data jika kosong
    if (empty($_POST['tp_tgl_transaksi']) || empty($_POST['tp_bagian_id']) || empty($_POST['tp_jumlah'])) {
?>
        <script language="JavaScript">
            alert('Data Harap Dilengkapi');
            document.location = 'home_perlengkapan.php?page=form-input-transaksi-perlengkapan';
        </script>
    <?php
    }

    //Masukan data ke Table Login
    include "../koneksi.php";
    $input    = "INSERT INTO transaksi_perlengkapan VALUES (
			null,
            '$tp_tgl_transaksi',
            '$tp_jumlah',
			'$tp_bagian_id'
			)";
    $query_input = mysqli_query($Open, $input);

    if ($query_input) {
        //Jika Sukses
    ?>
        <script language="JavaScript">
            alert('Data Ambil Barang Berhasil diinput');
            document.location = 'home_perlengkapan.php?page=lihat-data-transaksi-perlengkapan';
        </script>
<?php
    } else {
        //Jika Gagal
        echo "Data Transaksi Perlengkapan Gagal diinput, Silahkan diulangi!";
    }
    //Tutup koneksi engine mysqli
    mysqli_close($Open);
}

?>