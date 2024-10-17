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
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Lista de colaboradores</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="row">
                <div class="col-md-6">Colaboradores</div>
                <div class="col-md-6 text-right"><a href="./registra-colaborador" class="btn btn-sm btn-primary">Registrar</a></div>
              </div>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Apellidos</th>
                      <th>Nombres</th>
                      <th>Teléfono</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Francia Minaya</td>
                      <td>Jhon Edward</td>
                      <td>956111222</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Francia Minaya</td>
                      <td>Jhon Edward</td>
                      <td>956111222</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Francia Minaya</td>
                      <td>Jhon Edward</td>
                      <td>956111222</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Francia Minaya</td>
                      <td>Jhon Edward</td>
                      <td>956111222</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Francia Minaya</td>
                      <td>Jhon Edward</td>
                      <td>956111222</td>
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