<br />
<?php
//cek button
if ($_POST['Submit'] == "Submit") {
    //Kirimkan Variabel
    $t_prodi_tgl_transaksi    = $_POST['t_prodi_tgl_transaksi'];
    $t_prodi_pegawai_id        = $_POST['t_prodi_pegawai_id'];

    //validasi data jika kosong
    if (empty($_POST['t_prodi_tgl_transaksi']) || empty($_POST['t_prodi_pegawai_id'])) {
?>
        <script language="JavaScript">
            alert('Data Harap Dilengkapi');
            document.location = 'home_prodi.php?page=form-input-transaksi-prodi';
        </script>
    <?php
    }

    //Masukan data ke Table Login
    include "../koneksi.php";
    $input    = "INSERT INTO transaksi_prodi VALUES (
			null,
            '$t_prodi_tgl_transaksi',
			'$t_prodi_pegawai_id'
			)";
    $query_input = mysqli_query($Open, $input);

    if ($query_input) {
        //Jika Sukses
    ?>
        <script language="JavaScript">
            alert('Data Ambil Barang Berhasil diinput');
            document.location = 'home_prodi.php?page=lihat-data-transaksi-prodi';
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