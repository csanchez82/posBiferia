<?php
 require_once "../controladores/iva.controlador.php";
 require_once "../modelos/iva.modelo.php";

 class AjaxIVA{

    /**EDITAR IVA */
    public $idIVA;

    public function ajaxEditarIVA(){

        $item= "id";
        $valor= $this->idIVA;
        $respuesta= ControladorIVA::ctrMostrarIVA($item,$valor);
        echo json_encode ($respuesta);


    }
 }

 /*EDITAR IVA*/
 if (isset($_POST["idIVA"])) {
    
    $iva= new AjaxIVA();
    $iva-> idIVA = $_POST["idIVA"];
    $iva->ajaxEditarIVA();

 }