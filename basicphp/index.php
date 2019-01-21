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
        <h1 class="mt-5">Operaciones básicas con PHP</h1>
        <hr>
        <?php 
        require_once "config.php";
        $con = conectaDB();
        if( $con ) {
          ?>
          <a class="btn btn-info" href="consultar.php" role="button">Consultar personas</a>
          <a class="btn btn-success" href="crear.php" role="button">Crear persona</a>
          <a class="btn btn-warning" href="modificar.php" role="button">Modificar persona</a>
          <a class="btn btn-danger" href="eliminar.php" role="button">Eliminar persona</a>
          <?php
        }
        ?>
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
