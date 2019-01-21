<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP básico</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="favicon.png">
  </head>
  <body class="d-flex flex-column h-100">
    <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Programación web</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
    </header>

    <!-- Contenido principal -->
    <main role="main" class="flex-shrink-0">
      <div class="container">
      <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <h1 class="mt-5">Eliminar persona</h1>
        <hr>
        <?php 
        require_once "config.php";
        $con = conectaDB();
        if( $con ) {
          $id = $_POST["id"];
          $consulta = "SELECT * FROM persona WHERE id=$id";
          $result = $con->query($consulta);
          $cont=0;
          $datos;
          $valHombre;
          $valMujer;
          foreach ($result as $row) {
            $datos = $row;
            $cont++;
          }
          if( $cont==0 ) {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
                    No existe ninguna persona con ese ID.
                  </div>\n";
          }
          else {

          ?>
          <form action="queries/eliminar_persona.php" method="post">
            <div class="alert alert-warning" role="alert">
              Estás a punto de eliminar a <strong><?=$datos['nombre']." ".$datos['apellido']."."?></strong> ¿Deseas continuar?
            </div>
            <input type="hidden" name="id" value="<?=$id?>">
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
          <?php
          }
        }
        ?>
      </div>
      </div>
      </div>
    </main>

    <footer class="footer mt-auto py-3">
      <div class="container">
        <span class="text-muted">&copy; 2019 - Ballinas Palma Irving, Salinas Hernández Fabián</span>
      </div>
    </footer>
    <!-- JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
