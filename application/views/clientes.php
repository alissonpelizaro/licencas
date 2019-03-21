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
                  <h3 class="mb-0">Clientes</h3>
                </div>
                <div class="col text-right">
                  <button class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#modal-novoCliente">Novo cliente</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <?php if(isset($cadastro) && $cadastro){
                ?>
                <div class="alert alert-success" role="alert">
                  <strong>Sucesso!</strong> Um novo cliente foi cadastrado!
                </div>
                <?php
              } else if(isset($edicao) && $edicao){
                ?>
                <div class="alert alert-info" role="alert">
                  <strong>Feito!</strong> As informações do cliente foram atualizadas!
                </div>
                <?php
              } else if(isset($apagar) && $apagar){
                ?>
                <div class="alert alert-primary" role="alert">
                  <strong>Apagado!</strong> O cliente foi excluído com sucesso!
                </div>
                <?php
              } ?>

              <div class="table-responsive">
                <?php if($clientes){
                  ?>
                  <!-- Projects table -->
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Responsável</th>
                        <th class="text-center" scope="col">Último sincronismo</th>
                        <th class="text-center" scope="col" style="width: 10px;">Licenças contratadas</th>
                        <th class="text-center" scope="col" style="width: 10px;">Licenças utilizadas</th>
                        <th class="text-center" scope="col" style="width: 10px;">%</th>
                        <th scope="col" style="width: 10px;"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  foreach ($clientes as $cliente) {
                        $lc = $cliente->cd + $cliente->sd +$cliente->ad;
                        $lu = $cliente->cu + $cliente->su +$cliente->au;
                        $por = ($lu * 100)/$lc;
                        if($por > 100){
                          $iconColor = "danger";
                        } else if($por > 90){
                          $iconColor = "warning";
                        } else {
                          $iconColor = "success";
                        }
                        ?>
                        <tr>
                          <th scope="row"><?php echo $cliente->fantasia ?></th>
                          <th scope="row"><?php echo $cliente->responsavel ?></th>
                          <td class="text-center"><?php echo $cliente->dataSincronismo ? dataBdParaHtml($cliente->dataSincronismo) : "Nunca"; ?></td>
                          <td class="text-center"><?php echo $lc; ?></td>
                          <td class="text-center"><?php echo $lu; ?></td>
                          <td>
                            <i class="fas fa-chart-bar text-<?php echo $iconColor; ?> mr-3"></i> <?php echo number_format($por, 2) ?>%
                          </td>
                          <td>
                            <a href="<?php echo base_url() ?>clientes/edita/<?php echo $cliente->idCliente * 527 ?>">
                              Editar
                            </a>
                          </td>
                        </tr>
                        <?php
                      }
                      ?>

                    </tbody>
                  </table>
                  <?php
                }  else {
                  ?>
                  <tr>
                    <p class="text-center text-muted">Nenhum cliente cadastrado</p>

                  </tr>
                  <?php
                }  ?>
              </div>
            </div>


            <div class="modal fade" id="modal-novoCliente" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Cadastro de novo cliente</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form class="" action="<?php echo base_url() ?>clientes/cadastracliente" method="post">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="fantasia" class="text-muted mb-0"><small>Nome fantasia</small></label>
                            <input type="text" name="fantasia" required maxlength="45" class="form-control form-control-alternative" placeholder="Nome fantasia">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="razao" class="text-muted mb-0"><small>Razão social</small></label>
                            <input type="text" name="razao" required maxlength="45" class="form-control form-control-alternative" placeholder="Razão social">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="fantasia" class="text-muted mb-0"><small>Responsável</small></label>
                            <input type="text" name="responsavel" required class="form-control form-control-alternative" placeholder="Nome do responsável">
                          </div>
                        </div>
                        <div class="col-md-9">
                          <label for="fantasia" class="text-muted mb-0"><small>Token</small></label>
                          <div class="form-group" id="divToken">
                            <input type="text" name="token" readonly class="form-control form-control-alternative is-invalid" id="token" placeholder="Token de sincronismo">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for="fantasia" class="text-muted mb-0"><small></small></label>
                          <button type="button" id="btnGeraToken" class="btn btn-success">Gerar</button>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fantasia" class="text-muted mb-0"><small>Coordenadores</small></label>
                            <div class="input-group input-group-alternative mb-4">
                              <input class="form-control" name="coordenadores" required placeholder="0" type="number" min="0" max="999">
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
                              <input class="form-control" name="supervisores" required placeholder="0" type="number" min="0" max="999">
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
                              <input class="form-control" name="agentes" required placeholder="0" type="number" min="0" max="999">
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Salvar cliente</button>
                      <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Sair</button>
                    </div>
                  </form>
                </div>
              </div>
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
