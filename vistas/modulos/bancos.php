  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Bancos</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                          <li class="breadcrumb-item active">Bancos</li>
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
                      Agregar Banco
                  </button>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                          <i class="fas fa-times"></i>
                      </button>
                  </div>
              </div>
              <div class="card-body">

                  <table id="example1" class="table table-striped tabla">

                      <thead>

                          <tr>
                              <th>#</th>
                              <th>Nombre</th>
                              <th>Nota</th>
                              <th>Acciones</th>
                          </tr>

                      </thead>

                      <tbody>

                          <?php

              $item=null;
              $valor=null;
              $banco=ControladorBancos::ctrMostrarBanco($item,$valor);
              
              foreach ($banco as $key => $value) {
               
                echo '<tr>
                <td>'.($key+1).'</td>
                <td>'.$value["nombre"].'</td>
                <td>'.$value["notas"].'</td>
                
                <td>
                <div class="btn-group">
                <button class="btn btn-warning btnEditarBancos" idBancos="'.$value["id"].'" data-toggle="modal" data-target="#modalEditar"> <i class="fas fa-edit"></i></button>
                
                <button class="btn btn-danger btnEliminarBanco" idBancos="'.$value["id"].'"><i class="fas fa-eraser"></i></button>
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


  <!--MODAL AGREGAR Banco-->
  <div class="modal fade" id="modalAgregar">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Agregar Banco</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form role="form" method="post" enctype="multipart/form-data">

                      <!--ENTRADA PARA EL NOMBRE-->
                      <div class="form-group">
                          <label>Nombre: <code>*</code></label>
                          <input type="text" class="form-control form-control-border" name="nuevoNombre" required>
                      </div>

                      <!--ENTRADA PARA NOTAS-->
                      <div class="form-group">
                          <label>Notas: <code>*</code></label>
                          <input type="text" class="form-control form-control-border" name="nuevaNota" required>
                      </div>

              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              <?php
              $crearBanco= new ControladorBancos();
              $crearBanco-> ctrCrearBanco();
            ?>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

  <!--MODAL EDITAR Banco-->
  <div class="modal fade" id="modalEditar">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Editar Banco</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form role="form" method="post" enctype="multipart/form-data">

                      <!--ENTRADA PARA EL NOMBRE-->
                      <div class="form-group">
                          <label>Nombre: <code>*</code></label>
                          <input type="text" class="form-control form-control-border" name="editarNombre"
                              id="editarNombre" required>
                      </div>

                      <!--ENTRADA PARA NOTAS-->
                      <div class="form-group">
                          <label>Notas: <code>*</code></label>
                          <input type="text" class="form-control form-control-border" name="editarNota" id="editarNota"
                              required>
                      </div>

              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <input type="hidden" name="idBancos" id="idBancos">
              </div>
              <?php
              $editarBanco= new ControladorBancos();
              $editarBanco-> ctrEditarBanco();
              ?>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

  <?php
  $eliminarBanco= new ControladorBancos();
  $eliminarBanco-> ctrEliminarBanco();