<?php
  session_start();
  require_once "base/config.php";
  $con = conectaDB(); 
  $_seccion = $_GET['id_sec'];
  $_noticia = $_GET['id_noti'];
  $q_sec = $con->query("SELECT nombre FROM secciones WHERE id=$_seccion");
  $res_sec = $q_sec->fetch();
  $nom_sec = $res_sec['nombre'];
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
    <link href="bibliotecas/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
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
          <h3 class="subtitulo">
            Noticias de <span class="dest"><?=$nom_sec?></span>
          </h3>

          <div class="blog-post">
          <?php 
          $consulta1 = $con->query("SELECT * FROM noticias WHERE id=$_noticia");
          $res1 = $consulta1->fetch();
          $alias = $res1['autor'];
          $consulta2 = $con->query("SELECT nombre FROM usuarios WHERE alias='$alias'");
          $res2 = $consulta2->fetch();
          ?>


        <h2 class="blog-post-title"><?=$res1['titulo']?></h2>
        <p class="blog-post-meta"><?=fecha_nice($res1['fecha'])?>, por <a class="nombre-autor" href="#"><?=$res2['nombre']?></a></p>
        <img class="img-noti" src="img/<?=$res1['foto']?>" width="600" height="320" alt="<?=$res1['titulo']?>">
        <p><?=$res1['contenido']?>
        </p>

        <button type="button" id="likes_<?=$_noticia?>" class="like btn btn-sm btn-outline-success">
          <i class="far fa-thumbs-up"></i> <span id="num-likes"><?=$res1['likes']?></span> me gusta 
        </button>
        <hr>
          </div><!-- /.blog-post -->

        <div class="comentarios">
          <?php 
            $consulta3 = $con->query("SELECT * FROM comentarios WHERE id_noticia=$_noticia ORDER BY fecha");
          ?>
          <h4 class="comentarios-title">Comentarios <span class="badge badge-info"><?=$consulta3->rowCount()?></span></h4>
          <?php 

            foreach ($consulta3 as $row3) {
          ?>
          <div class="col-md-10">
            <div class="card flex-md-row mb-4 shadow-sm">
              <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-success"><?=$row3['autor']?></strong>

                <div class="mb-1 text-muted"><?=fecha_hora($row3['fecha'])?></div>
                <p class="card-text mb-auto"><?=$row3['contenido']?></p>
              </div>
            </div>
          </div>
        <?php } ?>
        <hr>
        </div>

                
        <div class="form-comentarios">
          <h4>Deja un comentario</h4>
          <form action="ins_com.php" method="post">
              <div class="form-group">
              <input type="hidden" name="id_sec" value="<?=$_seccion?>">
              <input type="hidden" name="id_noti" value="<?=$_noticia?>">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe tu nombre" required>
            </div>
            <div class="form-group">
              <label for=contenido">Comentario</label>
              <textarea class="form-control" id="contenido" name="contenido" rows="3" placeholder="Escribe tu comentario..." required="required"></textarea>
            </div>

            <button type="submit" class="btn btn-info">Enviar</button>
          </form>
          <hr>
        </div>

        </div><!-- /.blog-main -->


      <?php 
      include "base/sidebar.php";
      ?>

      </div><!-- /.row -->

    </main><!-- /.container -->

<?php 
  include 'base/footer.php';
?>
  <script>
    $(document).ready(function(){

        // like click
        $(".like").click(function(){
            var id = this.id;   // Button id
            var split_id = id.split("_");

            var text = split_id[0];
            var postid = split_id[1];  // postid

            if( $("#likes_"+postid).hasClass("btn-success") ) {
              return;
            }

            // AJAX Request
            $.ajax({
                url: 'like.php',
                type: 'post',
                data: {postid:postid},
                dataType: 'json',
                success: function(data){
                    var likes = data['likes'];

                    $("#num-likes").text(likes); // ajustando likes

                    $("#likes_"+postid).removeClass( "btn-outline-success" ).addClass( "btn-success" );

                }
            });

        });

    });
  </script>
  </body>
</html>
