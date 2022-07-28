<?php
include 'config/koneksi.php';
$id_brg = $_GET['id'];
$hapus = $mysqli->query("DELETE FROM barang WHERE id_brg=$id_brg");
if($hapus){
	echo "<script>alert('Berhasil Hapus'); window.location = 'barang.php'</script>";
		} else { 
        echo "<script>alert('Gagal Hapus'); window.location = 'barang.php'</script>";
		}
?>