  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Familias</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                          <li class="breadcrumb-item active">Familias</li>
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
                      Agregar familia
                  </button>


              </div>
              <div class="card-body">

                  <table id="example1" class="table table-striped tabla">

                      <thead>

                          <tr>
                              <th>#</th>
                              <th>Departamento</th>
                              <th>Familia</th>
                              <th>Descripción</th>
                              <th>Creación</th>
                              <th>Acciones</th>
                          </tr>

                      </thead>

                      <tbody>
                      <?php
         $item=null;
         $valor=null; 
         $familias=ControladorFamilias::ctrMostrarFamilias($item,$valor);
         
         
         foreach ($familias as $key => $value) {
          $departamentos = ControladorDepartamentos::ctrMostrarDepartamentos("id", $value["departamento_id"]);
            echo ' <tr>
            <td>'.($key+1).'</td>
            <td>'.$departamentos["departamento"].'</td>
            <td>'.$value["familia"].'</td>
            <td>'.$value["descripcion"].'</td>
            <td>'.$value["fecha"].'</td>
            <td>
            <div class="btn-group">
              <button class="btn btn-warning btnEditarFamilia" idFamilia="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarFamilia"> <i class="fas fa-edit"></i></button>
              
              <button class="btn btn-danger btnEliminarFamilia" idFamilia="'.$value["id"].'"><i class="fas fa-eraser"></i></button>
            </div>
          </td>
          </tr>';
         }
        ?>
                      </tbody>

                  </table>

              </div>
          </div>
      </section>
  </div>


  <!--MODAL AGREGAR-->
  <div class="modal fade" id="modalAgregar">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Agregar familias</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form role="form" method="post" enctype="multipart/form-data">

                      <!--SELECCIONAR DEPARTAMENTOS-->
                      <div class="form-group">
                          <label>Seleccionar departamento <code>*</code></label>
                          <select class="custom-select form-control-border border-width-2" name="nuevoDepartamentoID">
                              <option value="">Lista de departamentos</option>
                              <?php
                              $item = null;
                              $valor = null;
                              $departamentos = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

                              foreach ($departamentos as $key => $value) {
                                  echo '<option value="'.$value["id"].'">'.$value["departamento"].'</option>';
                              }
                              ?>
                            </select>
                        </div>

                            <!--ENTRADA PARA EL NOMBRE-->
                      <div class="form-group">
                          <label>Nombre: <code>*</code></label>
                          <input type="text" class="form-control form-control-border" name="nuevaFamilia" required>
                      </div>

                      <!--ENTRADA PARA DESCRIPCIÓN-->
                      <div class="form-group">
                          <label>Descripción: <code></code></label>
                          <input type="text" class="form-control form-control-border" name="nuevaDescripcion">
                      </div>


              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              <?php
              $crearFamilia=new ControladorFamilias();
              $crearFamilia->ctrIngresarFamilia();
              ?>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

  <!--MODAL EDITAR-->
  <div class="modal fade" id="modalEditarFamilia">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Editar familias</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form role="form" method="post" enctype="multipart/form-data">

                      <!--SELECCIONAR DEPARTAMENTOS-->
                      <div class="form-group">
                          <label>Seleccionar departamento <code>*</code></label>
                          <select class="custom-select form-control-border border-width-2" name="editarDepartamentoID" id="editarDepartamentoID">
                              <option value="">Lista de departamentos</option>
                              <?php
                              $item = null;
                              $valor = null;
                              $departamentos = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

                              foreach ($departamentos as $key => $value) {
                                  echo '<option value="'.$value["id"].'">'.$value["departamento"].'</option>';
                              }
                              ?>
                            </select>
                        </div>

                            <!--ENTRADA PARA EL NOMBRE-->
                      <div class="form-group">
                          <label>Nombre: <code>*</code></label>
                          <input type="text" class="form-control form-control-border" name="editarFamilia" id="editarFamilia" required>
                          
                      </div>

                      <!--ENTRADA PARA DESCRIPCIÓN-->
                      <div class="form-group">
                          <label>Descripción: <code></code></label>
                          <input type="text" class="form-control form-control-border" name="editarDescripcion" id="editarDescripcion">
                      </div>


              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <input type="hidden" name="idFamilia" id="idFamilia">
              </div>
              <?php
              $editarFamilia=new ControladorFamilias();
              $editarFamilia->ctrEditarFamilia();
              ?>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

  <!--ELIMINAR DEPARTAMENTO-->
  <?php
  $borrarFamilia = new ControladorFamilias();
  $borrarFamilia -> ctrEliminarFamilia();
  ?>