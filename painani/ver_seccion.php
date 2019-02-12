<?php
  session_start();
  require_once "base/config.php";
  $con = conectaDB(); 
  $_seccion = $_GET['id'];
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

            <div class="container-fluid">
            <?php 
            $consulta1 = $con->query("SELECT * FROM noticias WHERE id_seccion=$_seccion ORDER BY likes");
            $cont=0;
            $it = 0;
            foreach ($consulta1 as $row1) {
              if( $it==0 ) {
                echo "<div class=\"row fila-noti\">\n";
              }
              echo "<div class=\"col-md-4\">
                      <div class=\"noti-preview\">
                        <a class=\"link-noti\" href=\"ver_noticia.php?id=".$row1['id']."\">
                          <img src=\"img/".$row1['foto']."\" width=\"250\" height=\"150\">
                        </a>
                          <div>".$row1['titulo']."</div>
                        
                      </div>
                    </div>\n";
              if( $it==2 ) {
                echo "</div>\n";
              }
              $it++;
              if( $it==3 )
                $it=0;
              $cont++;
              if( $cont > 9 )
                break;
            }
            if( $it==1 || $it==2 )
              echo "</div>\n";
            ?>
            </div>

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
