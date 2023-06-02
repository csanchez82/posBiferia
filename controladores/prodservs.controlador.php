<?php
class ControladorProdServs {
    /*MOSTRAR PRODUCTO/SERVICIO*/
    static public function ctrMostrarProdServ($item, $valor) {
        $tabla= "sat_claveprodserv";
        $respuesta = ModeloProdServs::mdlMostrarProdServ($tabla, $item, $valor);
        return $respuesta;
    }
}