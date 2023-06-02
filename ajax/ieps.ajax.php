<?php
 require_once "../controladores/ieps.controlador.php";
 require_once "../modelos/ieps.modelo.php";

 class AjaxIEPS{

    /**EDITAR IEPS */
    public $idIEPS;

    public function ajaxEditarIEPS(){

        $item= "id";
        $valor= $this->idIEPS;
        $respuesta= ControladorIEPS::ctrMostrarIEPS($item,$valor);
        echo json_encode ($respuesta);


    }
 }

 /*EDITAR IEPS*/
 if (isset($_POST["idIEPS"])) {
    
    $iva= new AjaxIEPS();
    $iva-> idIEPS = $_POST["idIEPS"];
    $iva->ajaxEditarIEPS();

 }