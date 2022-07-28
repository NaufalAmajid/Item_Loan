<!DOCTYPE html>
<html>
        <meta charset="UTF-8">
        <title> Peminjaman Alat </title>

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
   <head>
<body>
  <?php include "navbar.php" ?> </body>
 </head>
    <body>
    

<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      
      <div class="caption">
        <h3><b>Judul produk</b></h3>
        <p> 
        <p><a href="#" class="btn btn-primary" role="button">Read More</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="thumbnail">
      
      <div class="caption">
        <h3><b>Contact person</h3>
        <p>Agus Setiawan : 085728111595 </p>
        
        <p><a href="#" class="btn btn-primary" role="button">Read More</a></p>
      </div>
    </div>
  </div>

</div>
  <?php require_once "templates/footer.php" ?>
        <script type="text/javascript">
        $('.carousel').carousel();
        </script>
  </body>
</html>