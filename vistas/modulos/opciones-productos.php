  <style>
.opcion-input {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Opciones de productos</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                          <li class="breadcrumb-item active">Opciones de productos</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="card">
              <div class="card-header">

                  <button class="btn btn-light" data-toggle="modal" data-target="#modalAgregar">
                      Agregar opción
                  </button>


              </div>
              <div class="card-body">

                  <table id="example" class="table table-striped tabla">

                      <thead>

                          <tr>
                              <th>Número</th>
                              <th>Nombre</th>
                              <th>Descripción</th>
                              <th>Fecha de creación</th>
                              <th>Acciones</th>
                          </tr>

                      </thead>

                      <tbody>
                          <tr>
                              <td>1</td>
                              <td>Cocción</td>
                              <td>Nivel de cocción de los alimentos</td>
                              <td>01 01 2010</td>
                              <td>
                                  <div class="btn-group">
                                      <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                      <button class="btn btn-danger"><i class="fas fa-eraser"></i></button>
                                  </div>
                              </td>
                          </tr>


                      </tbody>

                  </table>

              </div>
          </div>
      </section>
  </div>


  <!--MODAL AGREGAR-->
  <div class="modal fade" id="modalAgregar">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Agregar opción</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form role="form" method="post" enctype="multipart/form-data">


                      <div class="form-group">
                          <label>Nombre: <code>*</code></label>
                          <input type="text" class="form-control form-control-border" name="opcion[]" required>
                      </div>

                      <button type="button" class="btn btn-light" id="agregarOpcionBtn">Agregar opción</button>

                      <div id="inputsContainer" class="row">
                          <!-- Los inputs de opción se agregarán aquí -->
                      </div>





              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <input type="reset" class="btn btn-warning" value="Limpiar">
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              <?php
              $crearOpcion= new ControladorOpciones();
              $crearOpcion-> ctrCrearOpcion();
              ?>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>