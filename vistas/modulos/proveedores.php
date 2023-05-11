<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Proveedores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Proveedores</li>
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
                <button class="btn btn-light" data-toggle="modal" data-target="#modalAgregarProveedor">
                    Agregar proveedores
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
                <table id="example1" class="table table-striped">

                    <thead>

                        <tr>
                            <th>#</th>
                            <th>RFC</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Referencia</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php
                            $item=null;
                            $valor=null;
                            $proveedores=ControladorProveedores::ctrMostrarProveedores($item,$valor);

                            foreach ($proveedores as $key => $value) {
                                echo ' <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["rfc"].'</td>
                                <td>'.$value["apellido1"].' '.$value["apellido2"].' '.$value["nombre"].'</td>
                                <td><a href="tel:'.$value["telefono1"].'">'.$value["telefono1"].'</a></td>

                                
                                <td><a href="mailto:'.$value["correo1"].'">'.$value["correo1"].'</a></td>
                                <td>'.$value["referencia"].'</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btnEditarProveedor" idProveedor="'.$value["id"].'" data-toggle="modal"
                                        data-target="#modalEditarProveedor"><i class="fas fa-edit"></i></button>
                                        
                                        <button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value["id"].'"><i class="fas fa-eraser"></i></button>
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

<!--MODAL AGREGAR PROVEEDOR-->
<div class="modal fade" id="modalAgregarProveedor">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar proveedores</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form role="form" method="post" enctype="multipart/form-data">

                    <h5>Información personal</h5>

                    <div class="form-group row">


                        <div class="col-md-4">
                            <label>Primer apellido: <code>*</code></label>
                            <input type="text" class="form-control form-control-border" name="nuevoApellido1" required>
                        </div>

                        <div class="col-md-4">
                            <label>Segundo apellido: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="nuevoApellido2">
                        </div>

                        <div class="col-md-4">
                            <label>Nombre: <code>*</code></label>
                            <input type="text" class="form-control form-control-border" name="nuevoNombre" required>
                        </div>

                        <!--REFERENCIA-->
                        <div class="col-md-4">
                            <label>
                                Referencia: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="nuevaReferencia">
                        </div>

                        <div class="col-md-4">
                            <label>
                                RFC: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="nuevoRFC"
                                oninput="this.value = this.value.toUpperCase()" required>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Forma de pago por defecto: <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="nuevoPagoDefecto">
                                    <option selected>Seleccionar si por el momento no se tiene el dato</option>
                                    <option value="01-Efectivo">01-Efectivo</option>
                                    <option value="02-Cheque nominativo">02-Cheque nominativo</option>
                                    <option value="03-Transferencia electrónica de fondos">03-Transferencia
                                        electrónica de fondos</option>
                                    <option value="04-Tarjeta de crédito">04-Tarjeta de crédito</option>
                                    <option value="05-Monedero electrónico">05-Monedero electrónico</option>
                                    <option value="06-Dinero electrónico">06-Dinero electrónico</option>
                                    <option value="08-Vales de despensa">08-Vales de despensa</option>
                                    <option value="12-Dación en pago">12-Dación en pago</option>
                                    <option value="13-Pago por subrogación">13-Pago por subrogación</option>
                                    <option value="14-Pago por consignación">14-Pago por consignación</option>
                                    <option value="15-Condonación">15-Condonación</option>
                                    <option value="17-Compensación">17-Compensación</option>
                                    <option value="23-Novación">23-Novación</option>
                                    <option value="24-Confusión">24-Confusión</option>
                                    <option value="25-Remisión de deuda">25-Remisión de deuda</option>
                                    <option value="26-Prescripción o caducidad">26-Prescripción o caducidad</option>
                                    <option value="27-A satisfacción del acreedor">27-A satisfacción del acreedor
                                    </option>
                                    <option value="28-Tarjeta de débito">28-Tarjeta de débito</option>
                                    <option value="29-Tarjeta de servicios">29-Tarjeta de servicios</option>
                                    <option value="30-Aplicación de anticipos">30-Aplicación de anticipos</option>
                                    <option value="99-Por definir">99-Por definir</option>
                                </select>
                            </div>
                        </div>
                    </div>




                    <div class="form-group row">




                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Banco: <code>*</code></label>
                                <select class="custom-select form-control-border select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" style="width: 100%;"> name="nuevoBanco">
                                    <option value="Azteca">Azteca</option>
                                    <option value="Afirme">Afirme</option>
                                    <option value="Banamex">Banamex</option>
                                    <option value="BanBajio">BanBajio</option>
                                    <option value="Banco del Bajio">Banco del Bajio</option>
                                    <option value="BBVA">BBVA</option>
                                    <option value="Citibanamex">Citibanamex</option>
                                    <option value="Famsa">Famsa</option>
                                    <option value="HSBC">HSBC</option>
                                    <option value="Inbursa">Inbursa</option>
                                    <option value="Interacciones">Interacciones</option>
                                    <option value="IXE">IXE</option>
                                    <option value="Mercantil del Norte">Mercantil del Norte</option>
                                    <option value="Multiva">Multiva</option>
                                    <option value="Santander">Santander</option>
                                    <option value="Scotiabank">Scotiabank</option>
                                    <option value="Ve por Más">Ve por Más</option>
                                    <option value="Sin banco" selected>Sin banco</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label>Número de cuenta: <code></code></label>
                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                class="form-control form-control-border" name="nuevaCuenta">
                        </div>

                        <div class="col-md-3">
                            <label>CLABE interbancaria: <code></code></label>
                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                class="form-control form-control-border" name="nuevaCLABE">
                        </div>

                        <div class="col-md-3">
                            <label>Código Swift:
                                <code><i class="fas fa-question fa-xs" data-toggle="tooltip" title="Código que sirve para hacer transferencias internacionales."></i></code></label>
                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                class="form-control form-control-border" name="nuevoSwift">
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Días de crédito: <code></code></label>
                            <input type="number" min="0" class="form-control form-control-border"
                                name="nuevoDiasCredito">
                        </div>

                        <div class="col-md-4">
                            <label>Crédito disponible: <code></code></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control form-control-border"
                                    name="nuevoCreditoDisponible">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label>Días de entrega: <code></code></label>
                            <input type="number" min="0" class="form-control form-control-border"
                                name="nuevoDiasEntrega">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="nuevoGenerar" name="nuevoGenerar">
                            <label class="custom-control-label" for="nuevoGenerar">Permitir generar órdenes de compra
                                desde el POS</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="nuevoFacturable"
                                name="nuevoFacturable">
                            <label class="custom-control-label" for="nuevoFacturable">Este proveedor es
                                facturable</label>
                        </div>
                    </div>

                    <h5>Días de visita</h5>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="nuevoLunes" name="nuevoLunes">
                                <label for="nuevoLunes" class="custom-control-label">Lunes</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="nuevoMartes" name="nuevoMartes">
                                <label for="nuevoMartes" class="custom-control-label">Martes</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="nuevoMiercoles"
                                    name="nuevoMiercoles">
                                <label for="nuevoMiercoles" class="custom-control-label">Miércoles</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="nuevoJueves" name="nuevoJueves">
                                <label for="nuevoJueves" class="custom-control-label">Jueves</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="nuevoViernes"
                                    name="nuevoViernes">
                                <label for="nuevoViernes" class="custom-control-label">Viernes</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="nuevoSabado" name="nuevoSabado">
                                <label for="nuevoSabado" class="custom-control-label">Sábado</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="nuevoDomingo"
                                    name="nuevoDomingo">
                                <label for="nuevoDomingo" class="custom-control-label">Domingo</label>
                            </div>
                        </div>
                    </div>





                    <h5>Domicilio</h5>
                    <div class="form-group row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <label>País: <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="nuevoPais">
                                    <option selected>Seleccionar</option>
                                    <option value="México">México</option>
                                    <option value="Estados Unidos">Estados Unidos</option>
                                    <option value="Canadá">Canadá</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Estado: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="nuevoEstado">
                        </div>
                        <div class="col-md-4">
                            <label>Ciudad: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="nuevaCiudad">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-3">
                            <label>Calle: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="nuevaCalle">
                        </div>

                        <div class="col-md-3">
                            <label>Número: <code></code></label>
                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                class="form-control form-control-border" name="nuevoNumero">
                        </div>

                        <div class="col-md-3">
                            <label>Colonia: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="nuevaColonia">
                        </div>

                        <div class="col-md-3">
                            <label>C.P. : <code></code></label>
                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                class="form-control form-control-border" name="nuevoCP">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Correo electrónico principal: <code></code></label>
                            <input type="email" class="form-control form-control-border" name="nuevoCorreo1">
                        </div>

                        <div class="col-md-3">
                            <label>Correo electrónico 2: <code></code></label>
                            <input type="email" class="form-control form-control-border" name="nuevoCorreo2">
                        </div>

                        <div class="col-md-3">
                            <label>Número telefónico 1: <code></code></label>
                            <input type="tel" class="form-control form-control-border" name="nuevoTelefono1"
                                oninput="formatPhoneNumber(event)">
                        </div>

                        <div class="col-md-3">
                            <label>Número telefónico 2: <code></code></label>
                            <input type="tel" class="form-control form-control-border" name="nuevoTelefono2"
                                oninput="formatPhoneNumber(event)">
                        </div>
                    </div>





            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input type="reset" class="btn btn-warning">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <?php
              $crearProveedores= new ControladorProveedores();
              $crearProveedores-> ctrCrearProveedor();
            ?>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--MODAL EDITAR PROVEEDOR-->
<div class="modal fade" id="modalEditarProveedor">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar proveedores</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form role="form" method="post" enctype="multipart/form-data">

                    <h5>Información personal</h5>

                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Primer apellido: <code>*</code></label>
                            <input type="text" class="form-control form-control-border" name="editarApellido1"
                                id="editarApellido1" required>
                        </div>

                        <div class="col-md-4">
                            <label>Segundo apellido: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="editarApellido2"
                                id="editarApellido2">
                        </div>

                        <div class="col-md-4">
                            <label>Nombre: <code>*</code></label>
                            <input type="text" class="form-control form-control-border" name="editarNombre"
                                id="editarNombre" required>
                            <input type="hidden" id="idProveedor" name="idProveedor">
                        </div>

                        <!--REFERENCIA-->
                        <div class="col-md-4">
                            <label>Referencia: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="editarReferencia"
                                id="editarReferencia">
                        </div>

                        <div class="col-md-4">
                            <label>RFC: <code>*</code></label>
                            <input type="text" class="form-control form-control-border" name="editarRFC" id="editarRFC"
                                oninput="this.value = this.value.toUpperCase()" required>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Forma de pago por defecto: <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="editarPagoDefecto"
                                    id="editarPagoDefecto">
                                    <option selected>Seleccionar</option>
                                    <option value="01-Efectivo">01-Efectivo</option>
                                    <option value="02-Cheque nominativo">02-Cheque nominativo</option>
                                    <option value="03-Transferencia electrónica de fondos">03-Transferencia
                                        electrónica de fondos</option>
                                    <option value="04-Tarjeta de crédito">04-Tarjeta de crédito</option>
                                    <option value="05-Monedero electrónico">05-Monedero electrónico</option>
                                    <option value="06-Dinero electrónico">06-Dinero electrónico</option>
                                    <option value="08-Vales de despensa">08-Vales de despensa</option>
                                    <option value="12-Dación en pago">12-Dación en pago</option>
                                    <option value="13-Pago por subrogación">13-Pago por subrogación</option>
                                    <option value="14-Pago por consignación">14-Pago por consignación</option>
                                    <option value="15-Condonación">15-Condonación</option>
                                    <option value="17-Compensación">17-Compensación</option>
                                    <option value="23-Novación">23-Novación</option>
                                    <option value="24-Confusión">24-Confusión</option>
                                    <option value="25-Remisión de deuda">25-Remisión de deuda</option>
                                    <option value="26-Prescripción o caducidad">26-Prescripción o caducidad</option>
                                    <option value="27-A satisfacción del acreedor">27-A satisfacción del acreedor
                                    </option>
                                    <option value="28-Tarjeta de débito">28-Tarjeta de débito</option>
                                    <option value="29-Tarjeta de servicios">29-Tarjeta de servicios</option>
                                    <option value="30-Aplicación de anticipos">30-Aplicación de anticipos</option>
                                    <option value="99-Por definir">99-Por definir</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Banco: <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="editarBanco" id="editarBanco">
                                    <option selected>Seleccionar</option>
                                    <option value="Sin banco">Sin banco</option>
                                    <option value="BBVA">BBVA</option>
                                    <option value="Banamex">Banamex</option>
                                    <option value="BanBajio">BanBajio</option>
                                    <option value="Banca Afirme">Banca Afirme</option>
                                    <option value="Banco Azteca">Banco Azteca</option>
                                    <option value="Banco del Bajio">Banco del Bajio</option>
                                    <option value="Banco Famsa">Banco Famsa</option>
                                    <option value="Banco Inbursa">Banco Inbursa</option>
                                    <option value="Banco Interacciones">Banco Interacciones</option>
                                    <option value="Banco Mercantil del Norte">Banco Mercantil del Norte</option>
                                    <option value="Banco Multiva">Banco Multiva</option>
                                    <option value="Banco Santander">Banco Santander</option>
                                    <option value="Banco Ve por Más">Banco Ve por Más</option>
                                    <option value="Banorte">Banorte</option>
                                    <option value="Citibanamex">Citibanamex</option>
                                    <option value="HSBC">HSBC</option>
                                    <option value="IXE">IXE</option>
                                    <option value="Santander">Santander</option>
                                    <option value="Scotiabank">Scotiabank</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label>Número de cuenta: <code></code></label>
                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                class="form-control form-control-border" name="editarCuenta" id="editarCuenta">
                        </div>

                        <div class="col-md-3">
                            <label>CLABE interbancaria: <code></code></label>
                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                class="form-control form-control-border" name="editarCLABE" id="editarCLABE">
                        </div>

                        <div class="col-md-3">
                            <label data-toggle="tooltip"
                                title="El código Swift se usa para recibir transferencias internacionales">
                                Código Swift: <code><i class="fas fa-question fa-xs"></i></code></label>
                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                class="form-control form-control-border" name="editarSwift" id="editarSwift">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Días de crédito: <code></code></label>
                            <input type="number" min="0" class="form-control form-control-border"
                                name="editarDiasCredito" id="editarDiasCredito">
                        </div>

                        <div class="col-md-4">
                            <label>Crédito disponible: <code></code></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control form-control-border"
                                    name="editarCreditoDisponible" id="editarCreditoDisponible">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label>Días de entrega: <code></code></label>
                            <input type="number" min="0" class="form-control form-control-border"
                                name="editarDiasEntrega" id="editarDiasEntrega">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="editarGenerar" name="editarGenerar">
                            <label class="custom-control-label" for="editarGenerar">Permitir generar órdenes de compra
                                desde el POS</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="editarFacturable"
                                name="editarFacturable">
                            <label class="custom-control-label" for="editarFacturable">Este proveedor es
                                facturable</label>
                        </div>
                    </div>

                    <h5>Días de visita</h5>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="editarLunes" name="editarLunes">
                                <label for="editarLunes" class="custom-control-label">Lunes</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="editarMartes"
                                    name="editarMartes">
                                <label for="editarMartes" class="custom-control-label">Martes</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="editarMiercoles"
                                    name="editarMiercoles">
                                <label for="editarMiercoles" class="custom-control-label">Miércoles</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="editarJueves"
                                    name="editarJueves">
                                <label for="editarJueves" class="custom-control-label">Jueves</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="editarViernes"
                                    name="editarViernes">
                                <label for="editarViernes" class="custom-control-label">Viernes</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="editarSabado"
                                    name="editarSabado">
                                <label for="editarSabado" class="custom-control-label">Sábado</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="editarDomingo"
                                    name="editarDomingo">
                                <label for="editarDomingo" class="custom-control-label">Domingo</label>
                            </div>
                        </div>
                    </div>




                    <h5>Domicilio</h5>
                    <div class="form-group row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <label>País: <code>*</code></label>
                                <select class="form-control-boder select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" name="editarPais" id="editarPais">
                                    <option selected>Seleccionar</option>
                                    <option value="México">México</option>
                                    <option value="Estados Unidos">Estados Unidos</option>
                                    <option value="Canadá">Canadá</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Estado: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="editarEstado"
                                id="editarEstado">
                        </div>
                        <div class="col-md-4">
                            <label>Ciudad: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="editarCiudad"
                                id="editarCiudad">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-3">
                            <label>Calle: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="editarCalle"
                                id="editarCalle">
                        </div>

                        <div class="col-md-3">
                            <label>Número: <code></code></label>
                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                class="form-control form-control-border" name="editarNumero" id="editarNumero">
                        </div>

                        <div class="col-md-3">
                            <label>Colonia: <code></code></label>
                            <input type="text" class="form-control form-control-border" name="editarColonia"
                                id="editarColonia">
                        </div>

                        <div class="col-md-3">
                            <label>C.P. : <code></code></label>
                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                class="form-control form-control-border" name="editarCP" id="editarCP">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Correo electrónico principal: <code></code></label>
                            <input type="email" class="form-control form-control-border" name="editarCorreo1"
                                id="editarCorreo1">
                        </div>

                        <div class="col-md-3">
                            <label>Correo electrónico 2: <code></code></label>
                            <input type="email" class="form-control form-control-border" name="editarCorreo2"
                                id="editarCorreo2">
                        </div>

                        <div class="col-md-3">
                            <label>Número telefónico 1: <code></code></label>
                            <input type="tel" class="form-control form-control-border" name="editarTelefono1"
                                id="editarTelefono1" oninput="formatPhoneNumber(event)">
                        </div>

                        <div class="col-md-3">
                            <label>Número telefónico 2: <code></code></label>
                            <input type="tel" class="form-control form-control-border" name="editarTelefono2"
                                id="editarTelefono2" oninput="formatPhoneNumber(event)">
                        </div>
                    </div>





            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input type="reset" class="btn btn-warning">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <?php
              $editarProveedores= new ControladorProveedores();
              $editarProveedores-> ctrEditarProveedor();
            ?>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php
  $eliminarProveedor=new ControladorProveedores();
  $eliminarProveedor->ctrEliminarProveedor();
  