        <aside class="col-md-3 blog-sidebar">
          <!--<div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">Acerca de</h4>
            <p class="mb-0">Lorem ipsum dolor</p>
          </div>-->

          <div class="p-3">
            <h4 class="font-italic">Últimas</h4>
            <?php 
            $res_ul = $con->query("SELECT * FROM noticias ORDER BY fecha DESC LIMIT 6");

            ?>
            <ol class="list-unstyled mb-0">
              <?php 
                foreach ($res_ul as $fila) {
                  echo "<li><small>".$fila['fecha']."</small><br><a href=\"ver_noticia.php?id_sec=".$fila['id_seccion']."&id_noti=".$fila['id']."\">".$fila['titulo']."</a></li><hr>\n";
                }
              ?>
              
            </ol>
          </div>


        </aside><!-- /.blog-sidebar -->