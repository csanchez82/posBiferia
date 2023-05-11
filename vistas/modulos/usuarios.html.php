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
         
        <table id="example" class="table table-striped tabla">

        <thead>

        <tr>
          <th>#</th>
          <th>Departamento</th>
          <th>Familia</th>
          <th>Descripción</th>
          <th>Acciones</th>
        </tr>

        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>Abarrote 0%</td>
            <td>Agua</td>
            <td>Descripción</td>
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


<!--MODAL AGREGAR USUARIO-->
<div class="modal fade" id="modalAgregar">
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
                  <input type="text" class="form-control form-control-border" 
                  name="nuevoNombre" required>
              </div>

                 <!--ENTRADA PARA EL USUARIO-->
                 <div class="form-group">
                  <label>Nombre de usuario: <code>*</code></label>
                  <input type="text" class="form-control form-control-border" 
                  name="nuevoUsuario" required>
              </div>

               <!--ENTRADA PARA EL PASSWORD-->
               <div class="form-group">
                  <label>Contraseña: <code>*</code></label>
                  <input type="password" class="form-control form-control-border" 
                  name="nuevoPassword" required>
              </div>

              <!--ENTRADA PARA EL PERFIL-->
              <div class="form-group">
                  <label>Perfil: <code>*</code></label>
                  <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger">
                    <option selected>Seleccionar perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Ventas">Ventas</option>
                    <option value="Especial">Especial</option>
                  </select>
                </div>
                
                <!--ENTRADA PARA LA FOTO-->
                <div class="form-group">
                  <div class="panel">Seleccionar foto</div>
                  <input type="file" name="nuevaFoto" id="nuevaFoto">
                  <p class="help-block">Peso máximo 20 MB</p>
                  <img src="vistas/dist/img/usuarios/defecto.jpg" class="img-thumbnail" width="100px">
                </div>
                </select>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
