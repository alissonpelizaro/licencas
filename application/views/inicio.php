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
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Instâncias</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $instancias ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">(30 dias)</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Usuários</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $usuarios ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">(30 dias)</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Atendimentos</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $atendimentos ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">(7 dias)</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">(30 dias)</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Clientes</h3>
                </div>
                <div class="col text-right">
                  <a href="clientes" class="btn btn-sm btn-primary">Ver todos</a>
                </div>
              </div>
            </div>
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
        </div>



        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Utilização</h6>
                  <h2 class="mb-0">Total de contratos</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="chart-orders" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 <a href="https://www.enterness.com" class="font-weight-bold ml-1" target="_blank">Enterness</a> - Todos os direitos reservados
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <img src="./assets/img/brand/favicon.png" height="35px" alt="Enterness">
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
<?php include 'assets/inc/scripts.php'; ?>
</body>

</html>
