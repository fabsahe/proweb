<?php 
  session_start();
  require_once "../base/config.php";
  $con = conectaDB();
  if( !isset($_SESSION['alias']) ) {
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Panela</title>

  <!-- Custom fonts for this template-->
  <link href="../bibliotecas/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
  <!--<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    include 'basepan/sidebar.php';
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php
        include 'basepan/topbar.php';
        ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Lista de comentarios</h1>


          <!-- DataTables -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Comentarios</h6>
            </div>
            <div class="card-body">
              <?php 
              if( isset($_SESSION['exito_com']) ) {
                if( $_SESSION['exito_us']==2 ) {
                  echo "<div class=\"alert alert-success\" role=\"alert\">
                          Comentario modificado correctamente.
                        </div>";                  
                }
                if( $_SESSION['exito_us']==3 ) {
                  echo "<div class=\"alert alert-success\" role=\"alert\">
                          Comentario eliminado correctamente.
                        </div>";                  
                }
                $_SESSION['exito_us'] = 0;
              }
              ?>              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead> 
                    <tr>
                      <th>Autor</th>
                      <th>Contenido</th>
                      <th>Noticia</th>
                      <th>Fecha</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tfoot> 
                    <tr>
                      <th>Autor</th>
                      <th>Contenido</th>
                      <th>Noticia</th>
                      <th>Fecha</th>
                      <th>Opciones</th>
                    </tr>
                  </tfoot>  
                
                <?php 
                $consulta = "SELECT * FROM comentarios";
                $result = $con->query($consulta);
                foreach ($result as $row) {
                  $id_not = $row['id_noticia'];

                  $query1 = $con->query("SELECT titulo FROM noticias WHERE id=$id_not");
                  $res1 = $query1->fetch();
                  echo "<tr>\n";
                  echo "  <td>".$row['autor']."</td>\n";
                  echo "  <td>".$row['contenido']."</td>\n";
                  echo "  <td>".$res1['titulo']."</td>\n";
                  echo "  <td>".$row['fecha']."</td>\n";
                  echo "  <td><a class=\"btn btn-sm btn-info btn-circle\" href=\"editar_comentario.php?id=$row[id]\" title=\"Editar\"><i class=\"fas fa-edit\"></i></a>
                              <a class=\"btn btn-sm btn-danger btn-circle\" href=\"eliminar_comentario.php?id=$row[id]\" title=\"Eliminar\"><i class=\"fas fa-trash\"></i></a></td>\n";
                  echo "</tr>\n";
                }
                ?>

                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php 
      include 'basepan/footer.php';
      ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Modal editar -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Cerrar sesión?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona salir si estás seguro de querer cerrar tu sesión.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="basepan/logout.php">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Logout Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Cerrar sesión?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona salir si estás seguro de querer cerrar tu sesión.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="basepan/logout.php">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../bibliotecas/jquery/jquery-3.3.1.min.js"></script>
  <script src="../bibliotecas/bootstrap/js/bootstrap.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../bibliotecas/datatables/jquery.dataTables.min.js"></script>
  <script src="../bibliotecas/datatables/dataTables.bootstrap4.min.js"></script>


</body>

</html>
