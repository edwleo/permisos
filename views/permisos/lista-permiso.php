<?php
//Configuración aplicación
require_once "../../app/config/App.php";
?>

<?php
//Incluye la cabecera del DASHBOARD y 2 secciones NAV + ASIDE
require_once "../includes/header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php echo renderContentHeader("Lista permisos", "Inicio", SERVERURL . "views"); ?>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="row">
                <div class="col-md-6">Permisos registrados</div>
                <div class="col-md-6 text-right"><a href="./registra-permiso" class="btn btn-sm btn-primary">Registrar</a></div>
              </div>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Colaborador</th>
                      <th>Día</th>
                      <th>Tipo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Juan Raul Perez Ochoa</td>
                      <td>17-10-2024</td>
                      <td>Sin retorno</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Juan Raul Perez Ochoa</td>
                      <td>17-10-2024</td>
                      <td>Sin retorno</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Juan Raul Perez Ochoa</td>
                      <td>17-10-2024</td>
                      <td>Sin retorno</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Juan Raul Perez Ochoa</td>
                      <td>17-10-2024</td>
                      <td>Sin retorno</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Juan Raul Perez Ochoa</td>
                      <td>17-10-2024</td>
                      <td>Sin retorno</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div> <!-- ./card-body -->
          </div> <!-- ./card -->
        </div> <!-- ./col-md-12 -->
      </div> <!-- /.row -->

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
//Incluye las últimas 2 secciones: ASIDE + FOOTER y <SCRIPT>
require_once "../includes/footer.php";
?>

</body>

</html>