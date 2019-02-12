<?php 
  session_start();
  require_once "../base/config.php";
  $con = conectaDB();
  if( !isset($_SESSION['alias']) ) {
    header("Location: login.php");
  }
  $usuario_actual = $_SESSION['alias'];
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
          <h1 class="h3 mb-2 text-gray-800">Agregar noticia</h1>

          <!-- Formulario -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Nueva noticia</h6>
            </div>
            <div class="card-body">
              <div class="col-lg-10">

              <form id="nuevaNoticia" name="nuevaNoticia" enctype="multipart/form-data" method="post" action="consultas/ins_noti.php">
                <div class="form-group">
                  <label for="titulo">Título</label>
                  <input type="text" class="form-control form-control-user" id="titulo" name="titulo" required>
                </div>
                <div class="form-group">
                  <label for="contenNoticia">Contenido</label>
                  <textarea class="form-control" id="contenNoticia" name="contenido" rows="5" required="required"></textarea>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="fotografia">Fotografía</label>
                    <input type="file" class="form-control form-control-file" id="fotografia" name="fotografia">
                  </div>
                  <div class="col-sm-6">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="autor">Autor</label>
                    <?php
                      $query1 = $con->query("SELECT nombre FROM usuarios WHERE alias='$usuario_actual'"); 
                      $res1 = $query1->fetch();
                    ?>
                    <input class="form-control" type="text" placeholder="<?=$res1['nombre']?>" readonly>
                  </div>
                  <div class="col-sm-6">
                    <label for="fecha">Sección</label>
                    <select class="form-control" id="seccion" name="seccion" required>
                      <option></option>
                      <?php
                      $query2 = $con->query("SELECT id, nombre FROM secciones");
                      foreach( $query2 as $r2 ) {
                        echo "<option value=\"".$r2['id']."\">".$r2['nombre']."</option>\n";
                      }
                      ?>
                    </select>
                  </div>
                </div>         
                <hr>       
                    <button type="submit" class="btn btn-primary btn-user">
                      Guardar noticia
                    </button>
                <hr>

              </form>
              
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
