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

                <button class="btn btn-light" data-toggle="modal" data-target="#modalAgregarProducto">
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
         $productos=ControladorProductos::ctrMostrarProductos($item,$valor);
         
         foreach ($productos as $key => $value) {
           echo ' <tr>
            <td>'.($key+1).'</td>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["descripcion"].'</td>
            <td>'.$value["fecha"].'</td>
            <td>
              <div class="btn-group">
                <button class="btn btn-warning btnEditarProducto" idProducto="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarProducto"> <i class="fas fa-edit"></i></button>
                
                <button class="btn btn-danger btnEliminarProducto" idProducto="'.$value["id"].'"><i class="fas fa-eraser"></i></button>
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
<!--MODAL AGREGAR PRODUCTO-->
<div class="modal fade" id="modalAgregarProducto">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar departamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form role="form" method="post" enctype="multipart/form-data">

                    <!--PRIMER RENGLÓN-->
                    <h5>Información básica</h5>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Nombre: <code>*</code></label>
                            <input type="text" class="form-control form-control-border" name="nuevoNombre" required>
                        </div>

                        <!-- Campo de selección de tipo de producto -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tipo: <code>*</code></label>
                                <select id="campo-tipo" class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="nuevoTipo" required>
                                    <option value="Artículo">Artículo</option>
                                    <option value="Servicio">Servicio</option>
                                    <option value="Ensamble">Ensamble</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Descripción: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="nuevaDescripcion">
                        </div>
                    </div>

                    <!--SEGUNDO RENGLÓN-->
                    <div class="form-group row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Seleccionar proveedor <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="nuevoProveedor">
                                    <option value="">Lista de proveedores</option>
                                    <?php
                                $item = null;
                                $valor = null;
                                $Proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                                foreach ($Proveedores as $key => $value) {
                                    echo '<option value="'.$value["id"].'">'.$value["nombre"].' '.$value["apellido1"].' '.$value["apellido2"].'</option>';
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Seleccionar departamento <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="nuevoDepartamento"
                                    id="departamentoSelect">
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
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Seleccionar familia <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="nuevaFamilia" id="familiaSelect">
                                    <option value="">Lista de familias</option>
                                    <?php
                                $item = null;
                                $valor = null;
                                $Familias = ControladorFamilias::ctrMostrarFamilias($item, $valor);

                                foreach ($Familias as $key => $value) {
                                    echo '<option value="'.$value["id"].'">'.$value["familia"].'</option>';
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--TERCER RENGLÓN-->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seleccionar porcentaje de IVA <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="nuevoIVA">
                                    <option value="">Lista de porcentajes</option>
                                    <?php
                $item = null;
                $valor = null;
                $iva = ControladorIVA::ctrMostrarIVA($item, $valor);

                foreach ($iva as $key => $value) {
                    echo '<option value="'.$value["id"].'">'.$value["porcentaje"].'%</option>';
                }
                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seleccionar porcentaje de IEPS <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="nuevoIEPS">
                                    <option value="">Lista de porcentajes</option>
                                    <?php
                $item = null;
                $valor = null;
                $ieps = ControladorIEPS::ctrMostrarIEPS($item, $valor);

                foreach ($ieps as $key => $value) {
                    echo '<option value="'.$value["id"].'">'.$value["porcentaje"].'%</option>';
                }
                ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--CUARTO RENGLÓN-->
                    <div id="renglon-inventario" class="form-group row">
                        <div class="col-md-3">
                            <label>Mínimo en inventario:</label>
                            <input type="number" step="0.00001" value="0" class="form-control form-control-border"
                                name="nuevoMinimo" required>
                        </div>
                        <div class="col-md-3">
                            <label>Máximo en inventario:</label>
                            <input type="number" step="0.00001" value="0" class="form-control form-control-border"
                                name="nuevoMaximo" required>
                        </div>
                        <div class="col-md-3">
                            <label>Inventario actual:</label>
                            <input type="number" step="0.00001" value="0" class="form-control form-control-border"
                                name="nuevoInventario" required>
                        </div>
                        <div class="col-md-3">
                            <label>Porcentaje de merma:</label>
                            <input type="number" step="0.00001" value="0" class="form-control form-control-border"
                                name="nuevaMerma" required>
                        </div>
                    </div>

                    <!--QUINTO RENGLÓN-->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <div
                                    class="custom-control custom-switch custom-switch-off-light custom-switch-on-success mb-3">
                                    <input type="checkbox" class="custom-control-input" id="nuevoGranel"
                                        name="nuevoGranel">
                                    <label class="custom-control-label" for="nuevoGranel">Este artículo se vende a
                                        granel.</label>
                                </div>
                                <div
                                    class="custom-control custom-switch custom-switch-off-light custom-switch-on-success mb-3">
                                    <input type="checkbox" class="custom-control-input" id="nuevoOcultar"
                                        name="nuevoOcultar">
                                    <label class="custom-control-label" for="nuevoOcultar">Ocultar este
                                        artículo.</label>
                                </div>
                                <div
                                    class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="nuevoIncluyeImpuestos"
                                        name="nuevoIncluyeImpuestos">
                                    <label class="custom-control-label" for="nuevoIncluyeImpuestos">Precios del artículo
                                        incluyen impuestos.</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="panel">Seleccionar foto</div>
                                <input type="file" name="nuevaImagenProducto" class="nuevaImagenProducto">
                                <p class="help-block">Peso máximo 2 MB</p>
                                <img src="vistas/dist/img/productos/defecto.jpg" class="img-thumbnail previsualizar"
                                    width="100px">
                            </div>
                        </div>
                    </div>


                    <!--SEXTO RENGLÓN-->
                    <h5>Códigos</h5>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Código de barras: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="nuevoCod"
                                id="codigoBarrasInput">
                        </div>
                        <div class="col-md-6">
                            <label>Código alterno: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="nuevoCodAlterno"
                                id="codigoAlternoInput">
                        </div>
                    </div>

                    <!--SÉPTIMO RENGLÓN-->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Seleccionar Clave Unidad <code>*</code></label>
                            <select class="form-control-boder select2 select2-danger"
                                data-dropdown-css-class="select2-danger" name="nuevaUnidad">
                                <option value="">Lista de claves</option>
                                <?php
                $item = null;
                $valor = null;
                $unidades = ControladorUnidades::ctrMostrarUnidad($item, $valor);
                foreach ($unidades as $key => $value) {
                    echo '<option value="'.$value["id"].'">'.$value["claveUnidad"].' - '.$value["nombre"].'</option>';
                }
            ?>
                            </select>
                        </div>



                        <div class="col-md-6">
                            <label>Seleccionar Clave Producto/Servicio <code>*</code></label>
                            <select class="form-control-boder select2 select2-danger"
                                data-dropdown-css-class="select2-danger" name="nuevoProdServ">
                                <option value="">Lista de claves</option>
                                <?php
                $item = null;
                $valor = null;
                $prodServs = ControladorProdServs::ctrMostrarProdServ($item, $valor);
                foreach ($prodServs as $key => $value) {
                    echo '<option value="'.$value["id"].'">'.$value["clave"].' - '.$value["descripcion"].'</option>';
                }
            ?>
                            </select>
                        </div>
                    </div>

                    <!--SÉPTIMO RENGLÓN-->
                    <h5>Precios</h5>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Costo: <code>*</code></label>
                            <input type="number" step="0.00001" class="form-control form-control-border"
                                name="nuevoCosto">
                        </div>
                        <div class="col-md-3">
                            <label>Precio 1:<code>*</code></label>
                            <input type="number" step="0.00001" name="nuevoPrecio1"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-md-3">
                            <label>Precio 2:<code>*</code></label>
                            <input type="number" step="0.00001" name="nuevoPrecio2"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-md-3">
                            <label>Precio 3:<code>*</code></label>
                            <input type="number" step="0.00001" name="nuevoPrecio3"
                                class="form-control form-control-border">
                        </div>
                    </div>
                    <!--OCTAVO RENGLÓN-->
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="nuevoObligar" name="nuevoObligar">
                            <label class="custom-control-label" for="nuevoObligar">Al agregar este artículo dentro del
                                POS, obligar a seleccionar un precio de la lista</label>
                        </div>
                    </div>
                    <!--NOVENOO RENGLÓN-->
                    <h5>Opciones</h5>

                    <!--DÉCIMO RENGLÓN-->
                    <h5>Procesos de tablajería</h5>



            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <?php
            $crearProducto=new ControladorProductos();
            $crearProducto->ctrCrearProducto();
            ?>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--MODAL EDITAR PRODUCTO-->
<div class="modal fade" id="modalEditarProducto">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editat producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form role="form" method="post" enctype="multipart/form-data">

                    <!--PRIMER RENGLÓN-->
                    <h5>Información básica</h5>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Nombre: <code>*</code></label>
                            <input type="text" class="form-control form-control-border" name="editarNombre"
                                id="editarNombre" required>
                        </div>

                        <!-- Campo de selección de tipo de producto -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tipo: <code>*</code></label>
                                <select id="campo-tipo" class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="editarTipo" id="editarTipo" required>
                                    <option value="Artículo">Artículo</option>
                                    <option value="Servicio">Servicio</option>
                                    <option value="Ensamble">Ensamble</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Descripción: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="editarDescripcion"
                                id="editarDescripcion">
                        </div>
                    </div>

                    <!--SEGUNDO RENGLÓN-->
                    <div class="form-group row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Seleccionar proveedor <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="editarProveedor"
                                    id="editarProveedor">
                                    <option value="">Lista de proveedores</option>
                                    <?php
                                $item = null;
                                $valor = null;
                                $Proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                                foreach ($Proveedores as $key => $value) {
                                    echo '<option value="'.$value["id"].'">'.$value["nombre"].' '.$value["apellido1"].' '.$value["apellido2"].'</option>';
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Seleccionar departamento <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="editarDepartamento"
                                    id="editarDepartamento">
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
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Seleccionar familia <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="" id="editarFamilia">
                                    <option value="">Lista de familias</option>
                                    <?php
                                $item = null;
                                $valor = null;
                                $Familias = ControladorFamilias::ctrMostrarFamilias($item, $valor);

                                foreach ($Familias as $key => $value) {
                                    echo '<option value="'.$value["id"].'">'.$value["familia"].'</option>';
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--TERCER RENGLÓN-->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seleccionar porcentaje de IVA <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="editarIVA" id="editarIVA">
                                    <option value="">Lista de porcentajes</option>
                                    <?php
                $item = null;
                $valor = null;
                $iva = ControladorIVA::ctrMostrarIVA($item, $valor);

                foreach ($iva as $key => $value) {
                    echo '<option value="'.$value["id"].'">'.$value["porcentaje"].'%</option>';
                }
                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seleccionar porcentaje de IEPS <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="editarIEPS" id="editarIEPS">
                                    <option value="">Lista de porcentajes</option>
                                    <?php
                $item = null;
                $valor = null;
                $ieps = ControladorIEPS::ctrMostrarIEPS($item, $valor);

                foreach ($ieps as $key => $value) {
                    echo '<option value="'.$value["id"].'">'.$value["porcentaje"].'%</option>';
                }
                ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--CUARTO RENGLÓN-->
                    <div id="renglon-inventario" class="form-group row">
                        <div class="col-md-3">
                            <label>Mínimo en inventario:</label>
                            <input type="number" step="0.00001" value="0" class="form-control form-control-border"
                                name="editarMinimo" id="editarMinimo" required>
                        </div>
                        <div class="col-md-3">
                            <label>Máximo en inventario:</label>
                            <input type="number" step="0.00001" value="0" class="form-control form-control-border"
                                name="editarMaximo" id="editarMaximo" required>
                        </div>
                        <div class="col-md-3">
                            <label>Inventario actual:</label>
                            <input type="number" step="0.00001" value="0" class="form-control form-control-border"
                                name="editarInventario" id="editarInventario" required>
                        </div>
                        <div class="col-md-3">
                            <label>Porcentaje de merma:</label>
                            <input type="number" step="0.00001" value="0" class="form-control form-control-border"
                                name="editarMerma" id="editarMerma" required>
                        </div>
                    </div>

                    <!--QUINTO RENGLÓN-->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <div
                                    class="custom-control custom-switch custom-switch-off-light custom-switch-on-success mb-3">
                                    <input type="checkbox" class="custom-control-input" id="editarGranel"
                                        name="editarGranel">
                                    <label class="custom-control-label" for="editarGranel">Este artículo se vende a
                                        granel.</label>
                                </div>
                                <div
                                    class="custom-control custom-switch custom-switch-off-light custom-switch-on-success mb-3">
                                    <input type="checkbox" class="custom-control-input" id="editarOcultar"
                                        name="editarOcultar">
                                    <label class="custom-control-label" for="editarOcultar">Ocultar este
                                        artículo.</label>
                                </div>
                                <div
                                    class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="editarIncluyeImpuestos"
                                        name="editarIncluyeImpuestos">
                                    <label class="custom-control-label" for="editarIncluyeImpuestos">Precios del
                                        artículo
                                        incluyen impuestos.</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="panel">Seleccionar foto</div>
                                <input type="file" name="nuevaImagenProducto" class="nuevaImagenProducto">
                                <p class="help-block">Peso máximo 2 MB</p>
                                <img src="vistas/dist/img/productos/defecto.jpg" class="img-thumbnail previsualizar"
                                    width="100px">
                            </div>
                        </div>
                    </div>


                    <!--SEXTO RENGLÓN-->
                    <h5>Códigos</h5>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Código de barras: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="editarCod" id="editarCod">
                        </div>
                        <div class="col-md-6">
                            <label>Código alterno: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="editarCodAlterno"
                                id="editarCodAlterno">
                        </div>
                    </div>

                    <!--SÉPTIMO RENGLÓN-->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Seleccionar Clave Unidad <code>*</code></label>
                            <select class="form-control-boder select2 select2-danger"
                                data-dropdown-css-class="select2-danger" name="editarUnidad" id="editarUnidad">
                                <option value="">Lista de claves</option>
                                <?php
                $item = null;
                $valor = null;
                $unidades = ControladorUnidades::ctrMostrarUnidad($item, $valor);
                foreach ($unidades as $key => $value) {
                    echo '<option value="'.$value["id"].'">'.$value["claveUnidad"].' - '.$value["nombre"].'</option>';
                }
            ?>
                            </select>
                        </div>



                        <div class="col-md-6">
                            <label>Seleccionar Clave Producto/Servicio <code>*</code></label>
                            <select class="form-control-boder select2 select2-danger"
                                data-dropdown-css-class="select2-danger" name="editarProdServ" id="editarProdServ">
                                <option value="">Lista de claves</option>
                                <?php
                $item = null;
                $valor = null;
                $prodServs = ControladorProdServs::ctrMostrarProdServ($item, $valor);
                foreach ($prodServs as $key => $value) {
                    echo '<option value="'.$value["id"].'">'.$value["clave"].' - '.$value["descripcion"].'</option>';
                }
            ?>
                            </select>
                        </div>
                    </div>

                    <!--SÉPTIMO RENGLÓN-->
                    <h5>Precios</h5>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Costo: <code>*</code></label>
                            <input type="number" step="0.00001" class="form-control form-control-border"
                                name="editarCosto" id="editarCosto">
                        </div>
                        <div class="col-md-3">
                            <label>Precio 1:<code>*</code></label>
                            <input type="number" step="0.00001" name="editarPrecio1" id="editarPrecio1"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-md-3">
                            <label>Precio 2:<code>*</code></label>
                            <input type="number" step="0.00001" name="editarPrecio2" id="editarPrecio2"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-md-3">
                            <label>Precio 3:<code>*</code></label>
                            <input type="number" step="0.00001" name="editarPrecio3" id="editarPrecio3"
                                class="form-control form-control-border">
                        </div>
                    </div>
                    <!--OCTAVO RENGLÓN-->
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="editarObligar" name="editarObligar">
                            <label class="custom-control-label" for="editarObligar">Al agregar este artículo dentro del
                                POS, obligar a seleccionar un precio de la lista</label>
                        </div>
                    </div>
                    <!--NOVENOO RENGLÓN-->
                    <h5>Opciones</h5>

                    <!--DÉCIMO RENGLÓN-->
                    <h5>Procesos de tablajería</h5>



            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <input type="hidden" name="idProducto" id="idProducto">
            </div>
            <?php
            $editarProducto=new ControladorProductos();
            $editarProducto->ctrEditarProducto();
            ?>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php
            $borrarProducto=new ControladorProductos();
            $borrarProducto->ctrEliminarProducto();