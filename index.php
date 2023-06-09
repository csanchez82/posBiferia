<?php

require_once "controladores/bancos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/departamentos.controlador.php";
require_once "controladores/familias.controlador.php";
require_once "controladores/familiasPorDepartamentos.controlador.php";
require_once "controladores/ieps.controlador.php";
require_once "controladores/iva.controlador.php";
require_once "controladores/opciones.controlador.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/prodservs.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/unidades.controlador.php";
require_once "controladores/usuarios.controlador.php";

require_once "modelos/bancos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/departamentos.modelo.php";
require_once "modelos/familias.modelo.php";
require_once "modelos/ieps.modelo.php";
require_once "modelos/iva.modelo.php";
require_once "modelos/opciones.modelo.php";
require_once "modelos/prodservs.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/unidades.modelo.php";
require_once "modelos/usuarios.modelo.php";
 
$plantilla= new ControladorPlantilla();
$plantilla->ctrPlantilla();