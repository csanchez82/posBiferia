  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>IEPS</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                          <li class="breadcrumb-item active">IEPS</li>
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

                  <button class="btn btn-light" data-toggle="modal" data-target="#modalAgregarIEPS">
                      Agregar IEPS
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
                              <th>Porcentaje</th>
                              <th>Acciones</th>
                          </tr>

                      </thead>

                      <tbody>

                          <?php

              $item=null;
              $valor=null;
              $ieps=ControladorIEPS::ctrMostrarIEPS($item,$valor);
        
               foreach ($ieps as $key => $value) {
               
                 echo '<tr>
                 <td>'.($key+1).'</td>
                 <td>'.$value["porcentaje"].'%</td>
                
                 <td>
                 <div class="btn-group">
                 <button class="btn btn-warning btnEditarIEPS" idIEPS="'.$value["id"].'" data-toggle="modal" 
                 data-target="#modalEditar"> <i class="fas fa-edit"></i></button>
                
                 <button class="btn btn-danger btnEliminarIEPS" idIEPS="'.$value["id"].'"><i class="fas fa-eraser"></i></button>
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


  <!--MODAL AGREGAR IEPS-->
  <div class="modal fade" id="modalAgregarIEPS">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Agregar IEPS</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form role="form" method="post" enctype="multipart/form-data">

                      <!--ENTRADA PARA EL NOMBRE-->
                      <div class="form-group">
                          <label>Porcentaje: <code>*</code></label>
                          <input type="number" step="0.01" class="form-control form-control-border"
                              name="nuevoPorcentaje" required>
                      </div>

              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              <?php
              $crearIEPS= new ControladorIEPS();
              $crearIEPS-> ctrCrearIEPS();
            ?>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

  <!--MODAL EDITAR IEPS-->
  <div class="modal fade" id="modalEditar">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Editar IEPS</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form role="form" method="post" enctype="multipart/form-data">

                      <!--ENTRADA PARA EL NOMBRE-->
                      <div class="form-group">
                          <label>Porcentaje: <code>*</code></label>
                          <input type="number" class="form-control form-control-border" id="editarPorcentaje"
                              name="editarPorcentaje" required>

                      </div>

              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <input type="hidden" name="idIEPS" id="idIEPS">
              </div>
              <?php
              $editarIEPS= new ControladorIEPS();
              $editarIEPS-> ctrEditarIEPS();
            ?>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>



  <!--BORRAR IVA-->
  <?php
  $borrarIEPS= new ControladorIEPS();
  $borrarIEPS-> ctrEliminarIEPS();