<?php
  session_start();
  require_once "base/config.php";
  $con = conectaDB(); 
  $_noticia = $_GET['id'];

?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ballinas, Martina, Flores Durán y Martina">
    <title>Noticias del painani</title>

    <!-- CSS de Bootstrap -->
    <link href="bibliotecas/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS de personalizacion -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
  </head>
  <body>
    <?php 
    include "base/header.php";
    ?>


    <main role="main" class="container">
      <div class="row">
        <div class="col-md-9 blog-main">
          <h3 class="destacado">
            Destacadas
          </h3>

          <div class="blog-post">
          <?php 
          
          ?>


        <h2 class="blog-post-title">Sample blog post</h2>
        <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>



          </div><!-- /.blog-post -->


        </div><!-- /.blog-main -->

      <?php 
      include "base/sidebar.php";
      ?>

      </div><!-- /.row -->

    </main><!-- /.container -->

<?php 
  include 'base/footer.php';
?>
  </body>
</html>
