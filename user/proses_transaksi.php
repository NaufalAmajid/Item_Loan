<?php
require_once "../config/koneksi.php";
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title> Peminjaman Sukses </title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div id="wrapper">
		<div class="container">
				<div class="title text-center">
					<h3>Peminjaman Selesai</h3>
					<hr>
				</div>
				<div class="hero-unit">
					<h3>Selamat Peminjaman Anda Berhasil</h3>
				</div>
				
					<?php
					if (isset($_POST['finish'])) {
					?>
					<div class="hero-unit">
						<?php
							echo '<h4>Terima kasih Anda sudah meminjam alat di Laboratorium Teknik Kimia UNS.</h4>';
						?>
					</div>
						<table>
							<tr>
								<td style="width: 100px;">Nama</td>
								<td>: <?= $_POST['nama'] ?></td>
							</tr>
							<tr>
								<td style="width: 100px;">Kelas</td>
								<td>: <?= $_POST['kelas'] ?></td>
							</tr>
							<tr>
								<td style="width: 100px;">Tgl Pinjam</td>
								<td>: <?= $_POST['tgl_pinjam'] ?></td>
							</tr>
						</table>
						<div class="hero-unit">
							<h5><b>Detail Barang yang dipinjam</b></h5>
							<table class="table table-bordered">
								<thead>
									<tr>
										<td>No</td>
										<td>Nama Barang</td>
										<td>Jumlah</td>
									</tr>
								</thead>
								<tbody>
									<?php
										$index = 1;
										foreach($_SESSION['items'] as $key => $value){
											
											$query = $mysqli->query("SELECT * FROM barang WHERE barang.id_brg = '$key'");
											$data = mysqli_fetch_array($query);

											echo '<tr>';
											echo '<td>'.$index++.'</td>';
											echo '<td>'.$data['nama_brg'].'</td>';
											echo '<td>'.$value.'</td>';
											echo '</tr>';

											mysqli_free_result($query);
										}
									?>
								</tbody>
							</table>
						</div>
					<?php

						$item = $_SESSION['items'];
						$id_anggota = $_SESSION['id_anggota'];

						// foreach ($item as $key => $value) {
						// 	$d = $mysqli->query("INSERT INTO peminjaman(id_brg, id_anggota, jml_pinjam, tgl_pinjam) VALUES ('$key',
						// 					'$id_anggota',
						// 					'$value',
						// 					'$tgl'
						// 					)") or die($mysqli->error);
						// }
					}
					// session_destroy();
					?>
					<div class="row">
						<div class="col-lg-6">
							<button type="button" id="back" class="btn btn-warning col-lg-12">Kembali</button>
						</div>
						<div class="col-lg-6">
							<button type="button" id="print" class="btn btn-info col-lg-12">Cetak</button>
						</div>
					</div>
		</div>
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#print').click(function(){
					$('#back').hide();
					$('#print').hide();					
					window.print();
					$('#back').show();
					$('#print').show();


				});

				$('#back').click(function(){
					window.location.href = 'view_cart.php';
				});
			});
		</script>
	</body>

</html>