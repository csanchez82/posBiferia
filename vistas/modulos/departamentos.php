  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Departamentos</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                          <li class="breadcrumb-item active">Departamentos</li>
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

                  <button class="btn btn-light" data-toggle="modal" data-target="#modalAgregarDepartamento">
                      Agregar departamento
                  </button>

                  <div class="card-tools">

                  </div>
              </div>
              <div class="card-body">

                  <table id="example1" class="table table-striped tabla">

                      <thead>

                          <tr>
                              <th>#</th>
                              <th>Nombre</th>
                              <th>Descripción</th>
                              <th>Creación</th>
                              <th>Acciones</th>
                          </tr>

                      </thead>

                      <tbody>

                          <?php
         $item=null;
         $valor=null; 
         $departamentos=ControladorDepartamentos::ctrMostrarDepartamentos($item,$valor);
         
         foreach ($departamentos as $key => $value) {
            echo ' <tr>
            <td>'.($key+1).'</td>
            <td>'.$value["departamento"].'</td>
            <td>'.$value["descripcion"].'</td>
            <td>'.$value["fecha"].'</td>
            <td>
              <div class="btn-group">
                <button class="btn btn-warning btnEditarDepartamento" idDepartamento="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarDepartamento"> <i class="fas fa-edit"></i></button>
                
                <button class="btn btn-danger btnEliminarDepartamento" idDepartamento="'.$value["id"].'"><i class="fas fa-eraser"></i></button>
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
  <!--MODAL AGREGAR DEPARTAMENTO-->
  <div class="modal fade" id="modalAgregarDepartamento">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Agregar departamento</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form role="form" method="post" enctype="multipart/form-data">

                      <!--ENTRADA PARA EL NOMBRE-->
                      <div class="form-group">
                          <label>Nombre: <code>*</code></label>
                          <input type="text" class="form-control form-control-border" name="nuevoDepartamento" required>
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
            $crearDepartamento=new ControladorDepartamentos();
            $crearDepartamento->ctrCrearDepartamento();
            ?>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

  <!--MODAL EDITAR DEPARTAMENTO-->
  <div class="modal fade" id="modalEditarDepartamento">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Editar departamento</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form role="form" method="post" enctype="multipart/form-data">

                      <!--ENTRADA PARA EL NOMBRE-->
                      <div class="form-group">
                          <label>Nombre: <code>*</code></label>
                          <input type="text" class="form-control form-control-border" name="editarDepartamento"
                              id="editarDepartamento" required>
                          <input type="hidden" name="idDepartamento" id="idDepartamento">
                      </div>

                      <!--ENTRADA PARA DESCRIPCIÓN-->
                      <div class="form-group">
                          <label>Descripción: <code></code></label>
                          <input type="text" class="form-control form-control-border" name="editarDescripcion"
                              id="editarDescripcion">
                      </div>



              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              <?php
            $editarDepartamento=new ControladorDepartamentos();
            $editarDepartamento->ctrEditarDepartamento();
            ?>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

  <!--BORRAR DEPARTAMENTO-->
  <?php
  $borrarDepartamento= new ControladorDepartamentos();
  $borrarDepartamento->ctrEliminarDepartamento();
  ?>