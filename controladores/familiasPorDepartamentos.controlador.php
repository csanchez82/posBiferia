<?php

class ControladorFamiliasporDepartamentos{
    /*FILTRAR FAMILIAS*/

    static public function ctrMostrarFamiliasporDepartamentos($departamentoID) {
    
        $respuesta = ModeloFamilias::mdlMostrarFamiliasporDepartamentos("familias", "departamento_id", $departamentoID);
        return $respuesta;
    }

}