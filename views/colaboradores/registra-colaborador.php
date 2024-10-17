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
          <h1 class="m-0">Registra de colaborador</h1>
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
          <form action="" autocomplete="off">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">Complete los datos</div>
                  <div class="col-md-6 text-right">
                    <a href="./lista-colaborador" class="btn btn-sm btn-primary">Mostrar lista</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4 form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" maxlength="40" id="apellidos" autofocus required>
                  </div>
                  <div class="col-md-4 form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" maxlength="40" id="nombres" required>
                  </div>
                  <div class="col-md-4 form-group">
                    <label for="telefono">Teléfono</label>
                    <input
                      type="tel"
                      class="form-control"
                      pattern="[0-9]+"
                      title="Solo se permiten números"
                      id="telefono"
                      minlength="9"
                      maxlength="9"
                      required>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-sm btn-outline-secondary" type="reset">Cancelar</button>
                <button class="btn btn-sm btn-primary" type="submit">Registrar</button>
              </div>
            </div> <!-- ./card -->
          </form>
        </div> <!-- ./col-md-12 -->
      </div><!-- /.row -->

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