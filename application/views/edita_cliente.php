<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include 'assets/inc/head.php';
?>

<body>
  <?php include 'assets/inc/sidebar.php'; ?>
  <!-- Main content -->
  <div class="main-content">
    <?php include 'assets/inc/navbar.php'; ?>
    <!-- Header -->
    <div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Dark background-->
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Editar cliente</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo base_url() ?>clientes">
                    <button class="btn btn-sm btn-primary">Voltar</button>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body">

              <form class="" action="<?php echo base_url() ?>clientes/editacliente" method="post">
                <input type="hidden" name="hash" value="<?php echo $cliente->idCliente * 421 ?>">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="fantasia" class="text-muted mb-0"><small>Nome fantasia</small></label>
                      <input type="text" name="fantasia" required maxlength="45" value="<?php echo $cliente->fantasia ?>" class="form-control form-control-alternative" placeholder="Nome fantasia">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="razao" class="text-muted mb-0"><small>Razão social</small></label>
                      <input type="text" name="razao" required maxlength="45" value="<?php echo $cliente->razao ?>" class="form-control form-control-alternative" placeholder="Razão social">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="fantasia" class="text-muted mb-0"><small>Responsável</small></label>
                      <input type="text" name="responsavel" required value="<?php echo $cliente->responsavel ?>" class="form-control form-control-alternative" placeholder="Nome do responsável">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="fantasia" class="text-muted mb-0"><small>Token</small></label>
                    <div class="form-group <?php echo $cliente->token ? "has-success" : ""; ?>" id="divToken">
                      <input type="text" name="token" readonly value="<?php echo $cliente->token ?>" class="form-control form-control-alternative is-invalid" id="token" placeholder="Token de sincronismo">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label for="fantasia" class="text-muted mb-0"><small></small></label><br>
                    <button type="button" id="btnGeraToken" class="btn btn-success">Gerar</button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="fantasia" class="text-muted mb-0"><small>Coordenadores</small></label>
                      <div class="input-group input-group-alternative mb-4">
                        <input class="form-control" name="coordenadores" value="<?php echo $cliente->cd ?>" required placeholder="0" type="number" min="0" max="999">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="fantasia" class="text-muted mb-0"><small>Supervisores</small></label>
                      <div class="input-group input-group-alternative mb-4">
                        <input class="form-control" name="supervisores" value="<?php echo $cliente->sd ?>" required placeholder="0" type="number" min="0" max="999">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="fantasia" class="text-muted mb-0"><small>Agentes</small></label>
                      <div class="input-group input-group-alternative mb-4">
                        <input class="form-control" name="agentes" value="<?php echo $cliente->ad ?>" required placeholder="0" type="number" min="0" max="999">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Salvar cliente</button>
                    <small class="mt-3" style="float:right">
                      <a href="#!" class="text-danger text-right" data-toggle="modal" data-target="#modal-apagar">Excluir cliente</a>
                    </small>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>

      <div class="modal fade" id="modal-apagar" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
          <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Tem certeza?</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <div class="modal-body">

              <div class="py-3 text-center">
                <i class="fas fa-exclamation-triangle display-2"></i>
                <h4 class="heading mt-4">Tenha cuidado!</h4>
                <p>Você está prestes a apagar definitivamente esse cliente. </p>
              </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo base_url(); ?>clientes/apagar/<?php echo $cliente->idCliente * 323 ?>">
                <button type="button" class="btn btn-white">Ok, apagar!</button>
              </a>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cancelar</button>
            </div>

          </div>
        </div>
      </div>

      <?php include 'assets/inc/footer.php'; ?>
    </div>
  </div>

  <?php include 'assets/inc/scripts.php'; ?>

  <script type="text/javascript">
  $(document).ready(function(){
    $('#btnGeraToken').click(function(){
      $("#token").val(generatePassword(50));
      $("#divToken").addClass('has-success');
    });


  });

  function generatePassword(len) {
    var pwd = [],
    cc = String.fromCharCode,
    R = Math.random,
    rnd, i;
    pwd.push(cc(48 + (0 | R() * 10))); // push a number
    pwd.push(cc(65 + (0 | R() * 26))); // push an upper case letter
    for (i = 2; i < len; i++) {
      rnd = 0 | R() * 62; // generate upper OR lower OR number
      pwd.push(cc(48 + rnd + (rnd > 9 ? 7 : 0) + (rnd > 35 ? 6 : 0)));
    }
    // shuffle letters in password
    return pwd.sort(function() { return R() - .5; }).join('');
  }
  </script>
</body>

</html>
