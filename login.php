<?php
session_start();
include "koneksi.php";
$user = $_POST['user'];
$password = $_POST['password'];
$akses = $_POST['akses'];
$op = $_GET['op'];

if ($op == "in") {
    if ($akses != "0" && $akses != "prodi") {
        $sql = mysqli_query($Open, "SELECT * FROM login  WHERE username='$user' AND password='$password'");
    } elseif ($akses == "prodi") {
        $sql = mysqli_query($Open, "SELECT * FROM prodi  WHERE username='$user' AND password='$password'");
    } else {
?>
        <script language="JavaScript">
            alert('Hak akses tidak sesuai. Silahkan diulang kembali!');
            document.location = 'index.php';
        </script>
    <?php
    }

    if (mysqli_num_rows($sql) == 1) { //jika berhasil akan bernilai 1
        $qry = mysqli_fetch_array($sql);

        $_SESSION['akses'] = $akses;
        $_SESSION['username'] = $user;

        if ($akses == "perlengkapan") {
            header("location:user_perlengkapan/home_perlengkapan.php");
        } else if ($akses == "prodi") {
            $_SESSION['prodi_id'] = $qry['prodi_id'];
            header("location:user_prodi/home_prodi.php");
        } else if ($akses == "pegawai") {
            header("location:pegawai/home_pegawai.php");
        } else if ($akses == "bagian") {
            header("location:user_bagian/home_bagian.php");
        }
    } else {
    ?>
        <script language="JavaScript">
            alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
            document.location = 'index.php';
        </script>
<?php
    }
} else if ($op == "out") {
    unset($_SESSION['user']);
    unset($_SESSION['level']);
    header("location:index.php");
}
?>