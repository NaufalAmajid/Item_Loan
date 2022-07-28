<?php
session_start();
if(!isset($_SESSION['admin'])) {
   header('location:login.php');
} else {
   $username = $_SESSION['admin'];
   require_once 'config/koneksi.php';
}

include "config/koneksi.php";
if(isset($_POST["tambah"])) {
    $username = $_POST ['nama'];
    $NIM = $_POST ['NIM'];
    $password = $_POST ['password'];
    $kelas = $_POST['kelas'] . '-' . $_POST['jurusan'] . '-' . $_POST['no'];

    $query = $mysqli->query("INSERT INTO anggota(nama, NIM, password, kelas ) values ('$username','$NIM','$password', '$kelas')");

        if ($query) {
        echo "<script>alert('Data Berhasil Ditambahkan!')</script>";
        echo "<script>window.location.href='peminjam.php'</script>";
  } else {
        echo "<script>alert('Data Gagal Ditambahkan!')</script>";
        echo "<script>window.location.href='peminjam.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="bootstrap/dist/css/global.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>


  <body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Peminjaman Alat</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['admin']; ?> <i class="fa fa-caret-down"></i>
              </a>
            <ul class="dropdown-menu dropdown-user">
             <li class="divider"></li>
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>

          </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class=""><a href="dashboard.php"><i class="fa fa-dashboard">&nbsp;&nbsp;&nbsp;Dashboard</i></a></li>
            <li><a href="barang.php"><i class="fa fa-flask">&nbsp;&nbsp;&nbsp;Barang</i></a></li>
            <li><a href="peminjam.php"><i class="fa fa-user">&nbsp;&nbsp;&nbsp;Anggota</i></a></li>
            <li><a href="peminjaman.php"><i class="fa fa-gear">&nbsp;&nbsp;&nbsp;Peminjaman</i></a></li>
            <li><a href="pengembalian.php"><i class="fa fa-book">&nbsp;&nbsp;&nbsp;Pengembalian</i></a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">Data Anggota</h2>
           <div class="d-sm-flex justify-content-between align-items-center">
                  
                  <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Anggota</button>
                                </div>
              <div class="data-tables datatable-light">
                     <table id="dataTable3" class="display" style="width:100%">
                     <thead class="thead-light">
                        <tr>
                          <th>ID Anggota</th>
                          <th>Nama Mahasiswa</th>
						              <th>NIM</th>
                          <th>Kelas</th>
                          <th>Opsi</th>
                          <th>Hapus</th>
                        </tr>
                     </thead>
            <tbody>
                     <?php
                     $query = $mysqli->query("SELECT * FROM anggota");
                     $id_peminjam=1;
                     while ($lihat = mysqli_fetch_array($query)){
                      ?>
                      
                        <tr>
                          <td><?php echo $lihat['id_anggota']; ?></td>
                          <td><?php echo $lihat['nama'];?></td>
							           <td><?php echo $lihat['NIM'];?></td>
                          <td><?php echo $lihat['kelas'];?></td>

                          <td style="">
                            <!-- <a href="buku_pinjam.php?id_anggota=<?php echo $lihat['id_anggota']; ?>" class="btn btn-danger">Lihat Barang <i class="fa fa-eye"></i></a> -->
                            <a href="editpeminjam.php?id_peminjam=<?php echo $lihat['id_anggota']; ?>" class="btn btn-warning">Edit</a>
                          </td>
                            <td>
                              <a href="hapuspeminjam.php?id=<?php echo $lihat['id_anggota']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>


                        </tr>
                        <?php
                        } ?>
                        </tbody>
              </table>

        <!-- modal input -->
      <div id="myModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Anggota</h4>
            </div>
            <div class="modal-body">
              <form action="peminjam.php" method="post" enctype="multipart/form-data" >
                    <div class ="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text"  name="nama" class="form-control" placeholder="Nama Lengkap" required autofocus>
                    </div>
           
                    <div class ="form-group">
                        <label for="exampleInputPassword1">NIM</label>
                        <input type="text"  name="NIM" class="form-control" placeholder="NIM" required>
                    </div>
           
                   <div class ="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password"   name="password"
                        class="form-control" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <label>Kelas</label>
                    <div class ="form-group">
                        <div class="col-md-4">
                          <select name="kelas" class="form-control">
                            <option value="" disabled selected>Pilih Prodi</option>
                            <option value="10">DIII</option>
                            <option value="11">Sarjana</option>
                            <option value="12">Pasca Sarjana</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <select name="jurusan" class="form-control">
                            <option value="" disabled selected>Pilih Laboratorium</option>
                            <option value="Inst I">Instruksional I</option>
                            <option value="Instl II">Instruksional II</option>
                            <option value="KE">Konversi Energi</option>
                            <option value="BIO">Bioproses</option>
                            <option value="BAT">Baterai</option>
                            <option value="PP">Pilot Plant</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <select name="no" class="form-control">
                            <option value="" disabled selected>Kegiatan</option>
                            <option value="TA">TA</option>
                            <option value="RISET">RISET</option>
                          </select>
                        </div>
                    </div>
                </div> 
                <br>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input name="tambah" type="submit" class="btn btn-primary" value="Tambah">
              </div>
            </form>
          </div>
        </div>
      </div>

<script>
  $(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
  } );
  </script>
    <?php require_once "templates/footer.php" ?>
  <!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- Start datatable js -->
   <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    <?php require_once "templates/footer.php" ?>
    </body>
</html>