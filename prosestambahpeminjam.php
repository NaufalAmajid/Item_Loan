<?php
    include'config/koneksi.php';
$username = $_POST ['nama'];
$NIM = $_POST ['NIM'];
$password = $_POST ['password'];
$kelas = $_POST['kelas'] . '-' . $_POST['jurusan'] . '-' . $_POST['no'];
$query = $mysqli->query("INSERT INTO anggota(nama, NIM, password, kelas ) values ('$username','$NIM','$password', '$kelas')");

        if ($query) {
    header("location:peminjam.php");
} else {
    echo "gagal menambah data";
  }

?>
