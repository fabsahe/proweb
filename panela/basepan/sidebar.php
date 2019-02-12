    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="../img/logo_b_m.png" alt="logo" width="50" height="50">
        </div>
        <div class="sidebar-brand-text mx-3">Painani</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-tachometer"></i>
          <span>Panela</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Contenido
      </div>

      <!-- Nav Item - Menu Noticias -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-newspaper"></i>
          <span>Noticias</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="ver_noticias.php">Consultar</a>
            <a class="collapse-item" href="agregar_noticia.php">Agregar</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Menu Secciones -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSections" aria-expanded="true" aria-controls="collapseSections">
          <i class="fas fa-layer-group"></i>
          <span>Secciones</span>
        </a>
        <div id="collapseSections" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="ver_secciones.php">Consultar</a>
            <a class="collapse-item" href="agregar_seccion.php">Agregar</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Comentarios -->
      <li class="nav-item">
        <a class="nav-link" href="ver_comentarios.php">
          <i class="fas fa-comments"></i>
          <span>Comentarios</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Editores
      </div>

      <!-- Nav Item - Menu Usuarios -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-user"></i>
          <span>Usuarios</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="ver_usuarios.php">Consultar</a>
            <a class="collapse-item" href="agregar_usuario.php">Agregar</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>