<?php
 require_once "../controladores/clientes.controlador.php";
 require_once "../modelos/clientes.modelo.php";

 class AjaxClientes{

    /**EDITAR Clientes */
    public $idClientes;

    public function ajaxEditarClientes(){

        $item= "id";
        $valor= $this->idClientes;
        $respuesta= ControladorClientes::ctrMostrarClientes($item,$valor);
        echo json_encode ($respuesta);


    }
 }

 /*EDITAR BANCOS*/
 if (isset($_POST["idClientes"])) {
    
    $banco= new AjaxClientes();
    $banco-> idClientes = $_POST["idClientes"];
    $banco->ajaxEditarClientes();

 }