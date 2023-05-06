  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Empresa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Empresa</li>
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
          
          <!-- <button class="btn btn-light" data-toggle="modal" data-target="#modalAgregar">
          Agregar familia
          </button> -->

          
        </div>
        <div class="card-body">
         
        <table id="example" class="table table-striped tabla">

        <thead>

        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Web</th>
          <th>Logo</th>
          <th>Acciones</th>
        </tr>

        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>NegSoft México</td>
            <td>contacto@negsoft.com</td>
            <td>www.negsoft.com</td>
            <td><img src="vistas/dist/img/plantilla/defecto.png" 
                  class="img-thumbnail" width="40px" alt=""></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-warning"><i class="fas fa-edit" data-toggle="modal" data-target="#modalEditar"></i></button>
              </div>
            </td>
          </tr>

          
        </tbody>

        </table>

        </div>
      </div>
    </section>
  </div>

    <!--MODAL EDITAR EMPRESA-->
    <div class="modal fade" id="modalEditar">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Editar empresa</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form role="form" method="post" enctype="multipart/form-data">

                  <div>
                              <label>Nombre: <code>*</code></label>
                              <input type="text" class="form-control form-control-border" name="nuevoNombre" required>
                          </div>

                          <div>
                              <label>Correo: <code></code></label>
                              <input type="text" class="form-control form-control-border" name="nuevoNombre">
                          </div>

                          <div>
                              <label>Web: <code></code></label>
                              <input type="text" class="form-control form-control-border" name="nuevoNombre">
                          </div>

                      <!--ENTRADA PARA LA FOTO-->
                      <div class="form-group">
                          <div class="panel">Seleccionar foto</div>
                          <input type="file" name="editarFoto" class="nuevaFoto">
                          <p class="help-block">Peso máximo 2 MB</p>
                          <img src="vistas/dist/img/plantilla/defecto.png" class="img-thumbnail previsualizar" width="100px">
                          <input type="hidden" name="fotoActual" id="fotoActual">
                      </div>
                      </select>



              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              <?php
              $editarEmpresa= new ControladorEmpresas();
              $editarEmpresa-> ctrEditarEmpresa();
            ?>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

