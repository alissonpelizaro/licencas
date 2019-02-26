<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
  <div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand pt-0" href="<?php echo base_url(); ?>inicio">
      <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
    </a>
    <!-- User -->
    <ul class="nav align-items-center d-md-none">
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle">
              <img alt="Image placeholder" src="./assets/img/theme/default.jpg">
            </span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">Olá, Fulano!</h6>
          </div>
          <a href="#!" class="dropdown-item">
            <i class="ni ni-single-02"></i>
            <span>Meu perfil</span>
          </a>
          <a href="#!" class="dropdown-item">
            <i class="ni ni-settings-gear-65"></i>
            <span>Configurações</span>
          </a>
          <a href="#!" class="dropdown-item">
            <i class="ni ni-support-16"></i>
            <span>Suporte</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#!" class="dropdown-item">
            <i class="ni ni-user-run"></i>
            <span>Sair</span>
          </a>
        </div>
      </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
      <!-- Collapse header -->
      <div class="navbar-collapse-header d-md-none">
        <div class="row">
          <div class="col-6 collapse-brand">
            <a href="<?php echo base_url(); ?>inicio">
              <img src="./assets/img/brand/blue.png">
            </a>
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </div>
      <!-- Form -->
      <form class="mt-4 mb-3 d-md-none">
        <div class="input-group input-group-rounded input-group-merge">
          <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fa fa-search"></span>
            </div>
          </div>
        </div>
      </form>
      <!-- Navigation -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>inicio">
            <i class="fas fa-chart-line text-primary"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>clientes">
            <i class="fas fa-building text-info"></i> Clientes
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#!">
            <i class="fas fa-key text-orange"></i>Acessos
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#!">
            <i class="ni ni-bullet-list-67 text-red"></i> Relatórios
          </a>
        </li>
      </ul>
      <!-- Divider -->
      <hr class="my-3">
      <!-- Heading -->
      <h6 class="navbar-heading text-muted">Ajuda</h6>
      <!-- Navigation -->
      <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
          <a class="nav-link" href="#!">
            <i class="ni ni-spaceship"></i> Suporte
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
