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
        <h1 class="mt-5">Consultar personas</h1>
        <br>
        <?php 
        require_once "config.php";
        $con = conectaDB();
        if( $con ) {
          $consulta = "SELECT * FROM persona";
          $result = $con->query($consulta);
          if (!$result) {
              print "<p>Error en la consulta.</p>\n";
          } else {
        ?>    
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Sexo</th>
                  <th scope="col">Edad</th>
                  <th scope="col">Dirección</th>
                </tr>
              </thead>
              <tbody> 
        <?php           
              foreach ($result as $row) {
                echo "<tr>\n";
                echo "  <th scope=\"row\">$row[id]</th>\n";
                echo "  <td>$row[nombre]</td>\n";
                echo "  <td>$row[apellido]</td>\n";
                if( $row['sexo']==0 )
                  echo "  <td>Hombre</td>\n";
                else
                  echo "  <td>Mujer</td>\n";
                echo "  <td>$row[edad]</td>\n";  
                echo "  <td>$row[direccion]</td>\n";
                echo "</tr>";
              }
          
          ?>

            </tbody>
          </table>
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
