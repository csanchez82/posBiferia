<?php
 require_once "../controladores/bancos.controlador.php";
 require_once "../modelos/bancos.modelo.php";

 class AjaxBancos{

    /**EDITAR BANCO */
    public $idBancos;

    public function ajaxEditarBanco(){

        $item= "id";
        $valor= $this->idBancos;
        $respuesta= ControladorBancos::ctrMostrarBanco($item,$valor);
        echo json_encode ($respuesta);


    }
 }

 /*EDITAR BANCOS*/
 if (isset($_POST["idBancos"])) {
    
    $banco= new AjaxBancos();
    $banco-> idBancos = $_POST["idBancos"];
    $banco->ajaxEditarBanco();

 }