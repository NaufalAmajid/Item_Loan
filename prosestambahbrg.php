<?php
    include'config/koneksi.php';
    $namafolder="upload/"; 
	$id_brg = $_POST ['id_brg'];
	$nama_brg = $_POST['nama_brg'];
	$jenis_brg = $_POST ['jenis_brg'];
	$stok_brg = $_POST ['stok_brg'];
	$foto = $_POST['foto'];



if (isset($_POST['tambah'])){
$target = "images/";
$fileName = $target.basename($_FILES['foto']['name']);
$_FILES['foto']['upload'];
//var_dump($fileName);
//die();
move_uploaded_file($file_tmp, 'images/'.$nama);
	//move_uploaded_file($fileName);
// Simpan di Folder Gambar
$images = 
$query = $mysqli->query("INSERT INTO barang(id_brg,nama_brg,jenis_brg,stok_brg,foto) values (NULL, '$nama_brg','$jenis_brg','$stok_brg','$fileName')");

}



        if ($images) {
    header("location:barang.php");
} else {
    echo "gagal menambah data";
  }

?>
