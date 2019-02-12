    <header class="blog-header py-3">
      <div class="container">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-light" href="index.php">
            <img class="img-logo" src="img/logo_m.png" alt="logo" width="50" height="50"> Painani
          </a>
          <p class="fecha">
    <?php 
    $week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");  
    $months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");  
    $year_now = date ("Y");  
    $month_now = date ("n");  
    $day_now = date ("j");  
    $week_day_now = date ("w");  
    $date = $week_days[$week_day_now] . ", " . $day_now . " de " . $months[$month_now] . " de " . $year_now;   
    echo $date;  
    ?>
          </p>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="btn btn-sm btn-outline-secondary" target="_blank" href="panela/">Ingresar</a>
        </div>
      </div>
      </div>
    </header>

    <?php 
      $q_sec = $con->query("SELECT * FROM secciones");
    ?>
    <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
        <?php 
        foreach ($q_sec as $row1) {
          if( $row1['id']==$_seccion )
            echo "<a class=\"p-2 seccion-actual\" href=\"ver_seccion.php?id=".$row1['id']."\">".$row1['nombre']."</a>";
          else
            echo "<a class=\"p-2\" href=\"ver_seccion.php?id=".$row1['id']."\">".$row1['nombre']."</a>";
        }
        ?>
      </nav>
    </div>