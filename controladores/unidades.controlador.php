<?php
class ControladorUnidades {
    /*MOSTRAR UNIDADES*/
    static public function ctrMostrarUnidad($item, $valor) {
        $tabla= "sat_claveunidad";
        $respuesta = ModeloUnidades::mdlMostrarUnidad($tabla, $item, $valor);
        return $respuesta;
    }
}