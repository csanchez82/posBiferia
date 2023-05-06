  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Productos</li>
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
          <th>Código alterno</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Existencia</th>
          <th>Acciones</th>
        </tr>

        </thead>

        <tbody>
          <tr>
            <td>750102564</td>
            <td>Barritas de piña</td>
            <td>4</td>
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


<!--MODAL AGREGAR PRODUCTO-->
<div class="modal fade" id="modalAgregar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar productos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          
              <form role="form" method="post" enctype="multipart/form-data">



              
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <input type="reset" class="btn btn-warning" value="Limpiar">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
