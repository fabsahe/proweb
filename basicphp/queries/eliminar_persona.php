<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP básico</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../favicon.png">
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
            <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
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
      	<div class="row"><br></div>
		<?php 
		require_once "../config.php";
		$con = conectaDB();

    $id = $_POST["id"];


		$eliminar = "DELETE FROM persona WHERE id='$id'";
		if( $con ) {
			$result = $con->query($eliminar);
			if (!$result) {
			    echo "ERROR";
			} else {
			    echo "<div class=\"alert alert-success\" role=\"alert\">
  						Persona eliminada correctamente.
					</div>\n";
			    echo "<a href=\"../index.php\">Volver al inicio</a>";
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
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  </body>
</html>