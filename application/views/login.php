<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include 'assets/inc/head.php';
?>
<!-- Navbar -->
<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="https://www.enterness.com">
      <img height="60px" src="<?php echo base_url(); ?>assets/img/brand/original.png" />
    </a>
  </div>
</nav>
<!-- Header -->
<div class="header bg-gradient-primary py-7 py-lg-8">
  <div class="container">
    <div class="header-body text-center mb-3">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6">
          <h1 class="text-enterness">Bem vindo à<br/><b>Enterness</b></h1>
          <p class="text-enterness">Você está acessando uma área restrita.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="separator separator-bottom separator-skew zindex-100">
    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
    </svg>
  </div>
</div>
<!-- Page content -->
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
          <?php if(isset($invalidUser)){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <span class="alert-inner--icon"><i class="fas fa-times"></i></span>
              <span class="alert-inner--text"><strong>Erro!</strong> Usuário ou senha inválido!</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
          } ?>
          <div class="text-center text-muted mb-4 mt-4">
            <small>Entre com suas credenciais:</small>
          </div>
          <form role="form" action="<?php echo base_url(); ?>login/execLogin" method="POST">
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                </div>
                <input class="form-control pl-3" name="login" placeholder="Usuário" maxlength="30" type="text">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                </div>
                <input class="form-control pl-3" name="password" placeholder="Senha" maxlength="30" type="password">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4">Entrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Footer -->
<footer class="py-5">
  <div class="container">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-12">
        <div class="copyright text-center text-muted">
          &copy; 2019 <a href="https://www.enterness.com" class="font-weight-bold ml-1 text-muted" target="_blank">Enterness</a> - Todos os direitos reservados
        </div>
      </div>
    </div>
  </div>
</footer>
<?php include 'assets/inc/scripts.php'; ?>
</body>
</html>
