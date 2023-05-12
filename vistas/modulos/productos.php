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
                    Agregar producto
                </button>


            </div>
            <div class="card-body">

                <table id="example1" class="table table-striped">

                    <thead>

                        <tr>
                            <th>Imagen</th>
                            <th>Código de barras</th>
                            <th>Nombre</th>
                            <th>Costo</th>
                            <th>Precio</th>
                            <th>Existencia</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php
                        
                        $item = null;
                        $valor = null;

                        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

                        foreach ($productos as $key => $value) {
                            echo '<tr>
                            <td><img src="vistas/dist/img/productos/defecto.jpg" class="img-thumbnail" width="40px"></td>
                            <td>'.$value["codBarras"].'</td>
                            <td>'.$value["nombre"].'</td>
                            <td>'.$value["costo"].'</td>
                            <td>'.$value["precio1"].'</td>
                            <td>'.$value["existencia"].'</td>
                            <td>
                        <div class="btn-group">
                            <button class="btn btn-warning btnEditarProducto" idProducto="'.$value["id"].'" data-toggle="modal"
                            data-target="#modalEditar"><i class="fas fa-edit"></i></button>
                            
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
<div class="modal fade" id="modalAgregar">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar productos</h4>
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
                                <label>IVA: <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger" name="nuevoIVA">
                                    <option selected>Seleccionar</option>
                                    <option value="0%">0%</option>
                                    <option value="8%">8%</option>
                                    <option value="11%">11%</option>
                                    <option value="16%">16%</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>IEPS: <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="nuevoIEPS" required>
                                    <option selected>Seleccionar</option>
                                    <option value="0%">0%</option>
                                    <option value="3%">3%</option>
                                    <option value="5%">5%</option>
                                    <option value="5.3%">5.3%</option>
                                    <option value="6%">6%</option>
                                    <option value="7%">7%</option>
                                    <option value="8%">8%</option>
                                    <option value="9%">9%</option>
                                    <option value="25%">25%</option>
                                    <option value="26.5%">26.5%</option>
                                    <option value="30.4%">30.4%</option>
                                    <option value="160%">160%</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--CUARTO RENGLÓN-->
                    <div id="renglon-inventario" class="form-group row">
                        <div class="col-md-3">
                            <label>Mínimo en inventario:</label>
                            <input type="number" step="0.01" value="0" class="form-control form-control-border"
                                name="nuevoMinimo" required>
                        </div>
                        <div class="col-md-3">
                            <label>Máximo en inventario:</label>
                            <input type="number" step="0.01" value="0" class="form-control form-control-border"
                                name="nuevoMaximo" required>
                        </div>
                        <div class="col-md-3">
                            <label>Inventario actual:</label>
                            <input type="number" step="0.01" value="0" class="form-control form-control-border"
                                name="nuevoInventario" required>
                        </div>
                        <div class="col-md-3">
                            <label>Porcentaje de merma:</label>
                            <input type="number" step="0.01" value="0" class="form-control form-control-border"
                                name="nuevaMerma" required>
                        </div>
                    </div>



                    <!--QUINTO RENGLÓN-->
                    <div class="form-group row">
                        <div class="class-md-6">
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
                        <div class="class-md-6 offset-md-3">
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
                    <br>
                    <h5>Información fiscal</h5>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unidad de medida: <code>*</code></label>
                                <select class="custom-select form-control-border" name="nuevaUnidad">
                                    <option selected>Seleccionar</option>
                                    <option value="H87-Pieza">H87-Pieza</option>
                                    <option value="EA-Elemento">EA-Elemento</option>
                                    <option value="E48-Unidad de Servicio">E48-Unidad de Servicio</option>
                                    <option value="ACT-Actividad">ACT-Actividad</option>
                                    <option value="KGM-Kilogramo">KGM-Kilogramo</option>
                                    <option value="E51-Trabajo">E51-Trabajo</option>
                                    <option value="A9-Tarifa">A9-Tarifa</option>
                                    <option value="MTR-Metro">MTR-Metro</option>
                                    <option value="AB-Paquete a granel">AB-Paquete a granel</option>
                                    <option value="BB-Caja base">BB-Caja base</option>
                                    <option value="KT-Kit">KT-Kit</option>
                                    <option value="SET-Conjunto">SET-Conjunto</option>
                                    <option value="LTR-Litro">LTR-Litro</option>
                                    <option value="XBX-Caja">XBX-Caja</option>
                                    <option value="MON-Mes">MON-Mes</option>
                                    <option value="HUR-Hora">HUR-Hora</option>
                                    <option value="MTK-Metro cuadrado">MTK-Metro cuadrado</option>
                                    <option value="11-Equipos">11-Equipos</option>
                                    <option value="MGM-Miligramo">MGM-Miligramo</option>
                                    <option value="XPK-Paquete">XPK-Paquete</option>
                                    <option value="XKI-Kit (Conjunto de piezas)">XKI-Kit (Conjunto de piezas)</option>
                                    <option value="AS-Variedad">AS-Variedad</option>
                                    <option value="GRM-Gramo">GRM-Gramo</option>
                                    <option value="PR-Par">PR-Par</option>
                                    <option value="DPC-Docenas de piezas">DPC-Docenas de piezas</option>
                                    <option value="xun-Unidad">xun-Unidad</option>
                                    <option value="DAY-Día">DAY-Día</option>
                                    <option value="XLT-Lote">XLT-Lote</option>
                                    <option value="10-Grupos">10-Grupos</option>
                                    <option value="MLT-Mililitro">MLT-Mililitro</option>
                                    <option value="E54-Viaje">E54-Viaje</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Clave de producción: <code>*</code></label>
                                <select class="custom-select form-control-border" name="nuevaClave">
                                    <option selected>Seleccionar</option>
                                    <option value="01010101- No existe en el catálogo">01010101- No existe en el
                                        catálogo</option>
                                    <option value="10101500- Animales vivos de granja">10101500- Animales vivos de
                                        granja</option>
                                    <option value="10101501- Gatos vivos">10101501- Gatos vivos</option>
                                    <option value="10101502- Perros">10101502- Perros</option>
                                    <option value="10101504- Visón">10101504- Visón</option>
                                    <option value="10101505- Ratas">10101505- Ratas</option>
                                    <option value="10101506- Caballos">10101506- Caballos</option>
                                    <option value="10101507- Ovejas">10101507- Ovejas</option>
                                    <option value="10101508- Cabras">10101508- Cabras</option>
                                    <option value="10101509- Asnos">10101509- Asnos</option>
                                    <option value="10101510- Ratones">10101510- Ratones</option>
                                    <option value="10101511- Cerdos">10101511- Cerdos</option>
                                    <option value="10101512- Conejos">10101512- Conejos</option>
                                    <option value="10101513- Cobayas o conejillos de indias">10101513- Cobayas o
                                        conejillos de indias</option>
                                    <option value="10101514- Primates">10101514- Primates</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--SÉPTIMO RENGLÓN-->
                    <h5>Precios</h5>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Costo: <code>*</code></label>
                            <input type="number" step="0.01" class="form-control form-control-border" name="nuevoCosto">
                        </div>
                        <div class="col-md-3">
                            <label>Precio 1:<code>*</code></label>
                            <input type="number" step="0.01" name="nuevoPrecio1"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-md-3">
                            <label>Precio 2:<code>*</code></label>
                            <input type="number" step="0.01" name="nuevoPrecio2"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-md-3">
                            <label>Precio 3:<code>*</code></label>
                            <input type="number" step="0.01" name="nuevoPrecio3"
                                class="form-control form-control-border">
                        </div>
                    </div>
                    <!--SÉPTIMO RENGLÓN-->
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="nuevoObligar" name="nuevoObligar">
                            <label class="custom-control-label" for="nuevoObligar">Al agregar este artículo dentro del
                                POS, obligar a seleccionar un precio de la lista</label>
                        </div>
                    </div>
                    <!--SÉPTIMO RENGLÓN-->
                    <h5>Opciones</h5>

                    <!--SÉPTIMO RENGLÓN-->
                    <h5>Procesos de tablajería</h5>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input type="reset" class="btn btn-warning" value="Limpiar">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <?php
            $crearProducto = new ControladorProductos();
            $crearProducto -> ctrCrearProducto();
            ?>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!--MODAL EDITAR PRODUCTO-->
<div class="modal fade" id="modalEditar">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar productos</h4>
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
                                <select class="custom-select form-control-border" name="editarTipo" id="editarTipo"
                                    required>
                                    <option selected>Seleccionar</option>
                                    <option value="Artículo">Artículo</option>
                                    <option value="Servicio">Servicio</option>
                                    <option value="Ensamble">Ensamble</option>
                                </select>
                            </div>
                        </div>




                        <div class="col-md-4">
                            <label>Descripción: <code></code></label>
                            <input type="text" class="form-control form-control-border" id="editarDescripcion"
                                name="editarDescripcion">
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
                                    data-dropdown-css-class="select2-danger" name="editarFamilia" id="editarFamilia">
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
                                <label>IVA: <code>*</code></label>
                                <select class="custom-select form-control-border" name="editarIVA" id="editarIVA">
                                    <option value="0.00">0%</option>
                                    <option value="8.00">8%</option>
                                    <option value="11.00">11%</option>
                                    <option value="16.00">16%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>IEPS: <code>*</code></label>
                                <select class="custom-select form-control-border" name="editarIEPS" id="editarIEPS"
                                    required>
                                    <option value="0.00">0%</option>
                                    <option value="3.00">3%</option>
                                    <option value="5.00">5%</option>
                                    <option value="5.30">5.3%</option>
                                    <option value="6.00">6%</option>
                                    <option value="7.00">7%</option>
                                    <option value="8.00">8%</option>
                                    <option value="9.00">9%</option>
                                    <option value="25.00">25%</option>
                                    <option value="26.50">26.5%</option>
                                    <option value="30.40">30.4%</option>
                                    <option value="160.00">160%</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <!--CUARTO RENGLÓN-->
                    <div id="renglon-inventario" class="form-group row">
                        <div class="col-md-3">
                            <label>Mínimo en inventario:</label>
                            <input type="number" step="0.01" value="0" class="form-control form-control-border"
                                name="editarMinimo" id="editarMinimo" required>
                        </div>
                        <div class="col-md-3">
                            <label>Máximo en inventario:</label>
                            <input type="number" step="0.01" value="0" class="form-control form-control-border"
                                name="editarMaximo" id="editarMaximo" required>
                        </div>
                        <div class="col-md-3">
                            <label>Inventario actual:</label>
                            <input type="number" step="0.01" value="0" class="form-control form-control-border"
                                name="editarInventario" id="editarInventario" required>
                        </div>
                        <div class="col-md-3">
                            <label>Porcentaje de merma:</label>
                            <input type="number" step="0.01" value="0" class="form-control form-control-border"
                                name="editarMerma" id="editarMerma" required>
                        </div>
                    </div>



                    <!--QUINTO RENGLÓN-->
                    <div class="form-group row">
                        <div class="class-md-6">
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
                                    <input type="checkbox" class="custom-control-input" name="editarOcultar"
                                        id="editarOcultar">
                                    <label class="custom-control-label" for="editarOcultar">Ocultar este
                                        artículo.</label>
                                </div>
                                <div
                                    class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" name="editarIncluyeImpuestos"
                                        id="editarIncluyeImpuestos">
                                    <label class="custom-control-label" for="editarIncluyeImpuestos">Precios del
                                        artículo
                                        incluyen impuestos.</label>
                                </div>
                            </div>
                        </div>
                        <div class="class-md-6 offset-md-3">
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
                    <br>
                    <h5>Información fiscal</h5>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unidad de medida: <code>*</code></label>
                                <select class="custom-select form-control-border" name="editarUnidad" id="editarUnidad">
                                    <option selected>Seleccionar</option>
                                    <option value="H87-Pieza">H87-Pieza</option>
                                    <option value="EA-Elemento">EA-Elemento</option>
                                    <option value="E48-Unidad de Servicio">E48-Unidad de Servicio</option>
                                    <option value="ACT-Actividad">ACT-Actividad</option>
                                    <option value="KGM-Kilogramo">KGM-Kilogramo</option>
                                    <option value="E51-Trabajo">E51-Trabajo</option>
                                    <option value="A9-Tarifa">A9-Tarifa</option>
                                    <option value="MTR-Metro">MTR-Metro</option>
                                    <option value="AB-Paquete a granel">AB-Paquete a granel</option>
                                    <option value="BB-Caja base">BB-Caja base</option>
                                    <option value="KT-Kit">KT-Kit</option>
                                    <option value="SET-Conjunto">SET-Conjunto</option>
                                    <option value="LTR-Litro">LTR-Litro</option>
                                    <option value="XBX-Caja">XBX-Caja</option>
                                    <option value="MON-Mes">MON-Mes</option>
                                    <option value="HUR-Hora">HUR-Hora</option>
                                    <option value="MTK-Metro cuadrado">MTK-Metro cuadrado</option>
                                    <option value="11-Equipos">11-Equipos</option>
                                    <option value="MGM-Miligramo">MGM-Miligramo</option>
                                    <option value="XPK-Paquete">XPK-Paquete</option>
                                    <option value="XKI-Kit (Conjunto de piezas)">XKI-Kit (Conjunto de piezas)</option>
                                    <option value="AS-Variedad">AS-Variedad</option>
                                    <option value="GRM-Gramo">GRM-Gramo</option>
                                    <option value="PR-Par">PR-Par</option>
                                    <option value="DPC-Docenas de piezas">DPC-Docenas de piezas</option>
                                    <option value="xun-Unidad">xun-Unidad</option>
                                    <option value="DAY-Día">DAY-Día</option>
                                    <option value="XLT-Lote">XLT-Lote</option>
                                    <option value="10-Grupos">10-Grupos</option>
                                    <option value="MLT-Mililitro">MLT-Mililitro</option>
                                    <option value="E54-Viaje">E54-Viaje</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Clave de producción: <code>*</code></label>
                                <select class="custom-select form-control-border" name="editarClave" id="editarClave">
                                    <option selected>Seleccionar</option>
                                    <option value="01010101- No existe en el catálogo">01010101- No existe en el
                                        catálogo</option>
                                    <option value="10101500- Animales vivos de granja">10101500- Animales vivos de
                                        granja</option>
                                    <option value="10101501- Gatos vivos">10101501- Gatos vivos</option>
                                    <option value="10101502- Perros">10101502- Perros</option>
                                    <option value="10101504- Visón">10101504- Visón</option>
                                    <option value="10101505- Ratas">10101505- Ratas</option>
                                    <option value="10101506- Caballos">10101506- Caballos</option>
                                    <option value="10101507- Ovejas">10101507- Ovejas</option>
                                    <option value="10101508- Cabras">10101508- Cabras</option>
                                    <option value="10101509- Asnos">10101509- Asnos</option>
                                    <option value="10101510- Ratones">10101510- Ratones</option>
                                    <option value="10101511- Cerdos">10101511- Cerdos</option>
                                    <option value="10101512- Conejos">10101512- Conejos</option>
                                    <option value="10101513- Cobayas o conejillos de indias">10101513- Cobayas o
                                        conejillos de indias</option>
                                    <option value="10101514- Primates">10101514- Primates</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--SÉPTIMO RENGLÓN-->
                    <h5>Precios</h5>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Costo: <code>*</code></label>
                            <input type="number" step="0.01" class="form-control form-control-border" name="editarCosto"
                                id="editarCosto">
                        </div>
                        <div class="col-md-3">
                            <label>Precio 1:<code>*</code></label>
                            <input type="number" step="0.01" name="editarPrecio1" id="editarPrecio1"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-md-3">
                            <label>Precio 2:<code>*</code></label>
                            <input type="number" step="0.01" name="editarPrecio2" id="editarPrecio2"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-md-3">
                            <label>Precio 3:<code>*</code></label>
                            <input type="number" step="0.01" name="editarPrecio3" id="editarPrecio3"
                                class="form-control form-control-border">
                        </div>
                    </div>
                    <!--SÉPTIMO RENGLÓN-->
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="editarObligar" name="editarObligar">
                            <label class="custom-control-label" for="editarObligar">Al agregar este artículo dentro del
                                POS, obligar a seleccionar un precio de la lista</label>
                        </div>
                    </div>
                    <!--SÉPTIMO RENGLÓN-->
                    <h5>Opciones</h5>

                    <!--SÉPTIMO RENGLÓN-->
                    <h5>Procesos de tablajería</h5>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input type="reset" class="btn btn-warning" value="Limpiar">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <input type="hidden" id="idProducto" name="id">
            </div>
            <?php
            $editarProducto = new ControladorProductos();
            $editarProducto->ctrEditarProducto();
            ?>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php
  $eliminarProducto=new ControladorProductos();
  $eliminarProducto->ctrEliminarProducto();