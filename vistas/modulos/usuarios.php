  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Usuarios</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                          <li class="breadcrumb-item active">Usuarios</li>
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

                  <button class="btn btn-light" data-toggle="modal" data-target="#modalAgregarUsuario">
                      Agregar usuario
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
                              <th>Usuario</th>
                              <th>Foto</th>
                              <th>Perfil</th>
                              <th>Estado</th>
                              <th>Último inicio de sesión</th>
                              <th>Acciones</th>
                          </tr>

                      </thead>

                      <tbody>

                          <?php

              $item=null;
              $valor=null;
              $usuarios=ControladorUsuarios::ctrMostrarUsuarios($item,$valor);
              
              foreach ($usuarios as $key => $value) {
               
                echo '<tr>
                <td>'.($key+1).'</td>
                <td>'.$value["nombre"].'</td>
                <td>'.$value["usuario"].'</td>';
                
                if ($value["foto"]!="") {
                  echo '<td><img src="'.$value["foto"].'" 
                  class="img-thumbnail" width="40px" alt=""></td>';
                } else {
                  echo '<td><img src="vistas/dist/img/usuarios/defecto.jpg" 
                  class="img-thumbnail" width="40px" alt=""></td>';
                }
                
                
                echo '<td>'.$value["perfil"].'</td>';
                
                
                if ($value["estado"]!=0) {
                    echo ' <td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                }else {
                   echo ' <td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                }
               
                
                
                
                
                echo '<td>'.date("d, M Y H:i:s", strtotime($value["ultimo_login"])).'</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-user-edit"></i></button>
                    <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'"><i class="fas fa-user-times"></i></button>
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


  <!--MODAL AGREGAR USUARIO-->
  <div class="modal fade" id="modalAgregarUsuario">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Agregar usuarios</h4>
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

                      <!--ENTRADA PARA EL USUARIO-->
                      <div class="form-group">
                          <label>Nombre de usuario: <code>*</code></label>
                          <input type="text" class="form-control form-control-border" name="nuevoUsuario" id="nuevoUsuario" required>
                      </div>

                      <!--ENTRADA PARA EL PASSWORD-->
                      <div class="form-group">
                          <label>Contraseña: <code>*</code></label>
                          <input type="password" class="form-control form-control-border" name="nuevoPassword" required>
                      </div>

                      <!--ENTRADA PARA EL PERFIL-->
                      <div class="form-group">
                          <label>Perfil: <code>*</code></label>
                          <select class="custom-select form-control-border" name="nuevoPerfil">
                              <option selected>Seleccionar perfil</option>
                              <option value="Administrador">Administrador</option>
                              <option value="Ventas">Ventas</option>
                              <option value="Especial">Especial</option>
                          </select>
                      </div>


                      <!--ENTRADA PARA LA FOTO-->
                      <div class="form-group">
                          <div class="panel">Seleccionar foto</div>
                          <input type="file" name="nuevaFoto" class="nuevaFoto">
                          <p class="help-block">Peso máximo 2 MB</p>
                          <img src="vistas/dist/img/usuarios/defecto.jpg" class="img-thumbnail previsualizar"
                              width="100px">
                      </div>
                      </select>



              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              <?php
              $crearUsuario= new ControladorUsuarios();
              $crearUsuario-> ctrCrearUsuario();
            ?>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

  <!--MODAL EDITAR USUARIO-->
  <div class="modal fade" id="modalEditarUsuario">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Editar usuarios</h4>
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
                          value="" id="editarNombre" required>
                      </div>

                      <!--ENTRADA PARA EL USUARIO-->
                      <div class="form-group">
                          <label>Nombre de usuario: <code>*</code></label>
                          <input type="text" class="form-control form-control-border" name="editarUsuario" id="editarUsuario" value=""readonly>
                      </div>

                      <!--ENTRADA PARA EL PASSWORD-->
                      <div class="form-group">
                          <label>Contraseña: <code>*</code></label>
                          <input type="password" class="form-control form-control-border" name="editarPassword" placeholder="Escribir nueva contraseña">
                          <input type="hidden" id="passwordActual" name="passwordActual">
                        </div>

                      <!--ENTRADA PARA EL PERFIL-->
                      <div class="form-group">
                          <label>Perfil: <code>*</code></label>
                          <select class="custom-select form-control-border" name="editarPerfil">
                              <option id="editarPerfil"></option>
                              <option value="Administrador">Administrador</option>
                              <option value="Ventas">Ventas</option>
                              <option value="Especial">Especial</option>
                          </select>
                      </div>


                      <!--ENTRADA PARA LA FOTO-->
                      <div class="form-group">
                          <div class="panel">Seleccionar foto</div>
                          <input type="file" name="editarFoto" class="nuevaFoto">
                          <p class="help-block">Peso máximo 2 MB</p>
                          <img src="vistas/dist/img/usuarios/defecto.jpg" class="img-thumbnail previsualizar" width="100px">
                          <input type="hidden" name="fotoActual" id="fotoActual">
                      </div>
                      </select>



              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              <?php
              $editarUsuario= new ControladorUsuarios();
              $editarUsuario-> ctrEditarUsuario();
            ?>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>


  <!--BORRAR USUARIO-->
  <?php
  $borrarUsuario= new ControladorUsuarios();
  $borrarUsuario-> ctrBorrarUsuario();