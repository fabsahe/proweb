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
        <h1 class="mt-5">Crear persona</h1>
        <hr>
        <?php 
        require_once "config.php";
        $con = conectaDB();
        if( $con ) {
          ?>
          <form action="queries/crear_persona.php" method="post">
            <div class="form-group row">
              <label for="inputNombre" class="col-sm-2 col-form-label">Nombre*</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputApellido" class="col-sm-2 col-form-label">Apellido*</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="inputApellido" name="apellido" placeholder="Apellido" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputDireccion" class="col-sm-2 col-form-label">Dirección</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="inputDireccion" name="direccion" placeholder="Dirección">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEdad" class="col-sm-2 col-form-label">Edad</label>
              <div class="col-sm-4">
                <input type="number" class="form-control" id="inputEdad" name="edad" placeholder="Edad">
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Sexo*</legend>
                <div class="col-sm-5">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="gridRadios1" value="0" checked>
                    <label class="form-check-label" for="gridRadios1">
                      Hombre
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="gridRadios2" value="1">
                    <label class="form-check-label" for="gridRadios2">
                      Mujer
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>

            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </form>
          <?php
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
