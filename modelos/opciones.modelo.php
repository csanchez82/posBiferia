<?php

require_once "conexion.php";

class ModeloOpciones {
    /* AGREGAR OPCIÓN */
    static public function mdlIngresarOpcion($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");

        $stmt->bindParam(':nombre', $datos["nombre"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}