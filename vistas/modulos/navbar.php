<style>
.divider {
    border-top: 1px solid #fff;
    margin: 10px 0;
}

.submenu {
    margin-left: 20px;
    /* Ajusta el margen izquierdo para posicionarlo a la derecha */
    margin-top: 10px;
    /* Ajusta el margen superior para separarlo verticalmente */
}
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="https://negsoft.com" target="_blank" class="brand-link">
        <img src="vistas/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">NegSoft México</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $_SESSION["foto"];?>" class="img-circle elevation-2" alt="Usuario">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION["nombre"];?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="inicio" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Panel de control
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Inventario
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview submenu">
                        <li class="nav-item">
                            <a href="productos" class="nav-link">
                                <i class="nav-icon fas fa-drumstick-bite"></i>
                                <p>
                                    Productos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="opciones-productos" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Opciones de productos
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="proveedores" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>
                            Proveedores
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="clientes" class="nav-link">
                        <i class="nav-icon fas fa-grin-stars"></i>
                        <p>
                            Clientes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Deps. y Familias
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview submenu">
                        <li class="nav-item">
                            <a href="departamentos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Departamentos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="familias" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Familias</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Configuración
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview submenu">
                        <li class="nav-item">
                            <a href="empresa" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Empresa </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="empresa" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sucursales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="usuarios" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="iva" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>IVA</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="ieps" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>IEPS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="bancos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bancos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="divider"></li> <!-- línea divisoria -->
                <li class="nav-item">
                    <a href="salir" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Salir
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>