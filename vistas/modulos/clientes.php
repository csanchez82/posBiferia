  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Clientes</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                          <li class="breadcrumb-item active">Clientes</li>
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
                      Agregar Cliente
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
                              <th>RFC</th>
                              <th>Nombre</th>
                              <th>Primer Apellido</th>
                              <th>Teléfono</th>
                              <th>Régimen Fiscal</th>
                              <th>Acciones</th>
                          </tr>

                      </thead>

                      <tbody>

                          <?php

              $item=null;
              $valor=null;
              $cliente=ControladorClientes::ctrMostrarClientes($item,$valor);
              
              foreach ($cliente as $key => $value) {
               
                echo '<tr>
                <td>'.$value["rfc"].'</td>
                <td>'.$value["nombre"].'</td>
                <td>'.$value["apellido1"].'</td>
                <td>'.$value["telefono"].'</td>
                <td>'.$value["regimenFiscal_id"].'</td>
                
                <td>
                <div class="btn-group">
                <button class="btn btn-warning btnEditarClientes" idClientes="'.$value["id"].'" data-toggle="modal" data-target="#modalEditar"> <i class="fas fa-edit"></i></button>
                
                <button class="btn btn-danger btnEliminarClientes" idClientes="'.$value["id"].'"><i class="fas fa-eraser"></i></button>
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


  <!--MODAL AGREGAR CLIENTE-->
  <div class="modal fade" id="modalAgregar">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Agregar Clientes</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form role="form" method="post" enctype="multipart/form-data">
                      <!-- PRIMER FILA -->
                      <div class="row">
                          <div class="col-lg-4 col-md-4 form-group">
                              <label>Primer Apellido: <code>*</code></label>
                              <input type="text" class="form-control form-control-border" name="nuevoApellido1"
                                  required>
                          </div>
                          <div class="col-lg-4 col-md-4 form-group">
                              <label>Segundo Apellido:</label>
                              <input type="text" class="form-control form-control-border" name="nuevoApellido2">
                          </div>
                          <div class="col-lg-4 col-md-4 form-group">
                              <label>Nombre: <code>*</code></label>
                              <input type="text" class="form-control form-control-border" name="nuevoNombre" required>
                          </div>
                      </div>

                      <!-- SEGUNDA FILA -->
                      <div class="row">
                          <div class="col-lg-4 col-md-4 form-group">
                              <label>RFC: <code>*</code></label>
                              <input type="text" class="form-control form-control-border" value="XAXX010101000"
                                  name="nuevoRFC" required style="text-transform:uppercase">
                          </div>
                          <div class="col-lg-4 col-md-4 form-group">
                              <label>Régimen Fiscal: <code>*</code></label>
                              <select class="form-control form-control-border" name="nuevoRegimen" required>
                                  <option selected disabled>Selecciona...</option>
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                              </select>
                          </div>
                          <div class="col-lg-4 col-md-4 form-group">
                              <label>Número de Registro de Identidad Fiscal: <code>*</code></label>
                              <input type="text" class="form-control form-control-border" name="nuevoNumRegistro"
                                  required style="text-transform:uppercase">
                          </div>
                      </div>

                      <!-- TERCERA FILA -->
                      <div class="row">
                          <div class="col-lg-6 col-md-6 form-group">
                              <label>USO CFDI:</label>
                              <select class="form-control form-control-border" name="nuevoCFDI">
                                  <option selected disabled>Selecciona...</option>
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                              </select>
                          </div>
                          <div class="col-lg-6 col-md-6 form-group">
                              <label>FORMA DE PAGO:</label>
                              <select class="form-control form-control-border" name="nuevaFormaPago">
                                  <option selected disabled>Selecciona...</option>
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                              </select>
                          </div>
                      </div>

                      <!-- CUARTA FILA -->
                      <div class="row">
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Calle:</label>
                              <input type="text" class="form-control form-control-border" name="nuevaCalle">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Colonia:</label>
                              <input type="text" class="form-control form-control-border" name="nuevoColonia">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Número:</label>
                              <input type="text" class="form-control form-control-border" name="nuevoNumero">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>CP:</label>
                              <input type="text" class="form-control form-control-border" name="nuevoCP">
                          </div>
                      </div>

                      <!-- QUINTA FILA -->
                      <div class="row">
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Localidad:</label>
                              <input type="text" class="form-control form-control-border" name="nuevaLocalidad">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Municipio:</label>
                              <input type="text" class="form-control form-control-border" name="nuevoMunicipio">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Estado:</label>
                              <input type="text" class="form-control form-control-border" name="nuevoEstado">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>País:</label>
                              <input type="text" class="form-control form-control-border" name="nuevoPais">
                          </div>
                      </div>

                      <!-- SEXTA FILA -->
                      <div class="row">
                          <div class="col-lg-6 col-md-6 form-group">
                              <label>Días de Crédito: <code>*</code></label>
                              <input type="number" min="0" value="0" class="form-control form-control-border"
                                  name="nuevoDiasCredito" required>
                          </div>
                          <div class="col-lg-6 col-md-6 form-group">
                              <label>Límite de Crédito: <code>*</code></label>
                              <input type="number" min="0" value="0" class="form-control form-control-border"
                                  name="nuevoLimiteCredito" required>
                          </div>
                      </div>

                      <!-- SEPTIMA FILA -->
                      <div class="row">
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Correo 1:</label>
                              <input type="email" class="form-control form-control-border" name="nuevoCorreo1">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Correo 2:</label>
                              <input type="email" class="form-control form-control-border" name="nuevoCorreo2">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Teléfono:</label>
                              <input type="tel" class="form-control form-control-border" name="nuevoTel">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Celular:</label>
                              <input type="tel" class="form-control form-control-border" name="nuevoCel">
                          </div>
                      </div>

                      <!--OCTAVA FILA-->
                      <div class="row">
                          <div class="form-group col-md-4">
                              <label>Seleccionar Banco:</label>
                              <select class="form-control form-control-border" name="nuevoBanco">
                                  <option selected disabled>Selecciona...</option>
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                              </select>
                          </div>
                          <div class="form-group col-md-4">
                              <label>Número de Cuenta:</label>
                              <input type="text" class="form-control form-control-border" name="nuevoNumeroCuenta">
                          </div>
                          <div class="form-group col-md-4">
                              <label>Tipo de Moneda:</label>
                              <select class="form-control form-control-border" name="nuevaMoneda">
                                  <option selected disabled>Selecciona...</option>
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                              </select>
                          </div>
                      </div>

                      <!-- BOTONES -->
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Guardar</button>
                      </div>

                      <?php
                      $crearCliente=new ControladorClientes();
                      $crearCliente -> ctrCrearCliente();
                      ?>

                  </form>
              </div>
          </div>
      </div>
  </div>

  <!--MODAL EDITAR CLIENTE-->
  <div class="modal fade" id="modalEditar">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Editar Clientes</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form role="form" method="post" enctype="multipart/form-data">
                      <!-- PRIMER FILA -->
                      <div class="row">
                          <div class="col-lg-4 col-md-4 form-group">
                              <label>Primer Apellido: <code>*</code></label>
                              <input type="text" class="form-control form-control-border" name="editarApellido1"
                                  id="editarApellido1" required>
                          </div>
                          <div class="col-lg-4 col-md-4 form-group">
                              <label>Segundo Apellido:</label>
                              <input type="text" class="form-control form-control-border" name="editarApellido2"
                                  id="editarApellido2">
                          </div>
                          <div class="col-lg-4 col-md-4 form-group">
                              <label>Nombre: <code>*</code></label>
                              <input type="text" class="form-control form-control-border" name="editarNombre"
                                  id="editarNombre" required>
                          </div>
                      </div>

                      <!-- SEGUNDA FILA -->
                      <div class="row">
                          <div class="col-lg-4 col-md-4 form-group">
                              <label>RFC: <code>*</code></label>
                              <input type="text" class="form-control form-control-border" name="editarRFC"
                                  id="editarRFC" required style="text-transform:uppercase">
                          </div>
                          <div class="col-lg-4 col-md-4 form-group">
                              <label>Régimen Fiscal: <code>*</code></label>
                              <select class="form-control form-control-border" name="editarRegimen" id="editarRegimen"
                                  required>
                                  <option selected disabled>Selecciona...</option>
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                              </select>
                          </div>
                          <div class="col-lg-4 col-md-4 form-group">
                              <label>Número de Registro de Identidad Fiscal: <code>*</code></label>
                              <input type="text" class="form-control form-control-border" name="editarNumRegistro"
                                  id="editarNumRegistro" required style="text-transform:uppercase">
                          </div>
                      </div>

                      <!-- TERCERA FILA -->
                      <div class="row">
                          <div class="col-lg-6 col-md-6 form-group">
                              <label>USO CFDI:</label>
                              <select class="form-control form-control-border" name="editarCFDI" id="editarCFDI">
                                  <option selected disabled>Selecciona...</option>
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                              </select>
                          </div>
                          <div class="col-lg-6 col-md-6 form-group">
                              <label>FORMA DE PAGO:</label>
                              <select class="form-control form-control-border" name="editarFormaPago"
                                  id="editarFormaPago">
                                  <option selected disabled>Selecciona...</option>
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                              </select>
                          </div>
                      </div>

                      <!-- CUARTA FILA -->
                      <div class="row">
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Calle:</label>
                              <input type="text" class="form-control form-control-border" name="editarCalle"
                                  id="editarCalle">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Colonia:</label>
                              <input type="text" class="form-control form-control-border" name="editarColonia"
                                  id="editarColonia">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Número:</label>
                              <input type="text" class="form-control form-control-border" name="editarNumero"
                                  id="editarNumero">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>CP:</label>
                              <input type="text" class="form-control form-control-border" name="editarCP" id="editarCP">
                          </div>
                      </div>

                      <!-- QUINTA FILA -->
                      <div class="row">
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Localidad:</label>
                              <input type="text" class="form-control form-control-border" name="editarLocalidad"
                                  id="editarLocalidad">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Municipio:</label>
                              <input type="text" class="form-control form-control-border" name="editarMunicipio"
                                  id="editarMunicipio">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Estado:</label>
                              <input type="text" class="form-control form-control-border" name="editarEstado"
                                  id="editarEstado">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>País:</label>
                              <input type="text" class="form-control form-control-border" name="editarPais"
                                  id="editarPais">
                          </div>
                      </div>

                      <!-- SEXTA FILA -->
                      <div class="row">
                          <div class="col-lg-6 col-md-6 form-group">
                              <label>Días de Crédito: <code>*</code></label>
                              <input type="number" class="form-control form-control-border" name="editarDiasCredito"
                                  id="editarDiasCredito" required>
                          </div>
                          <div class="col-lg-6 col-md-6 form-group">
                              <label>Límite de Crédito: <code>*</code></label>
                              <input type="number" class="form-control form-control-border" name="editarLimiteCredito"
                                  id="editarLimiteCredito" required>
                          </div>
                      </div>

                      <!-- SEPTIMA FILA -->
                      <div class="row">
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Correo 1:</label>
                              <input type="email" class="form-control form-control-border" name="editarCorreo1"
                                  id="editarCorreo1">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Correo 2:</label>
                              <input type="email" class="form-control form-control-border" name="editarCorreo2"
                                  id="editarCorreo2">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Teléfono:</label>
                              <input type="tel" class="form-control form-control-border" name="editarTel"
                                  id="editarTel">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Celular:</label>
                              <input type="tel" class="form-control form-control-border" name="editarCel"
                                  id="editarCel">
                          </div>
                          <div class="col-lg-3 col-md-3 form-group">
                              <label>Número de Cuenta:</label>
                              <input type="text" class="form-control form-control-border" name="editarNumeroCuenta"
                                  id="editarNumeroCuenta">
                          </div>
                      </div>

                      <!--OCTAVA FILA-->
                      <div class="row">
                          <div class="form-group col-md-4">
                              <label>Seleccionar Banco:</label>
                              <select class="form-control form-control-border" name="nuevoBanco">
                                  <option selected disabled>Selecciona...</option>
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                              </select>
                          </div>
                          <div class="form-group col-md-4">
                              <label>Número de Cuenta:</label>
                              <input type="text" class="form-control form-control-border" name="nuevoNumeroCuenta">
                          </div>
                          <div class="form-group col-md-4">
                              <label>Tipo de Moneda:</label>
                              <select class="form-control form-control-border" name="nuevaMoneda">
                                  <option selected disabled>Selecciona...</option>
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                              </select>
                          </div>
                      </div>



                      <!-- BOTONES -->
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Guardar cambios</button>
                          <input type="hidden" name="idClientes" id="idClientes">
                      </div>

                      <?php
                      $editarCliente= new ControladorClientes();
                      $editarCliente-> ctrEditarCliente();
                      ?>

                  </form>
              </div>
          </div>
      </div>
  </div>

  <?php
  $eliminarClientes = new ControladorClientes();
  $eliminarClientes -> ctrEliminarCliente();