<?php
require_once "conexion.php";

class ModeloProductos{

    /*=============================================
	CREAR PRODUCTO
	=============================================*/

    static public function mdlIngresarProducto ($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla
        (nombre, tipo, descripcion, proveedor_id, departamento_id, familia_id, iva, ieps,minFrac, maxFrac,minUnit, maxUnit,merma,granel,ocultar,
        incluyeImpuestos,codBarras,codAlterno, unidadMedida, clave, costo, precio1, precio2, precio3, existencia, obligar) 
        VALUES 
        (:nombre,:tipo, :descripcion, :proveedor_id, :departamento_id, :familia_id, :iva, :ieps,:minFrac, :maxFrac,:minUnit, :maxUnit,:merma,
        :granel, :ocultar, :incluyeImpuestos,:codBarras,:codAlterno, :unidadMedida, :clave, :costo, :precio1, :precio2, :precio3,:existencia, :obligar)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":proveedor_id", $datos["proveedor_id"], PDO::PARAM_STR);
        $stmt->bindParam(":departamento_id", $datos["departamento_id"], PDO::PARAM_STR);
        $stmt->bindParam(":familia_id", $datos["familia_id"], PDO::PARAM_STR);
        $stmt->bindParam(":iva", $datos["iva"], PDO::PARAM_STR);
        $stmt->bindParam(":ieps", $datos["ieps"], PDO::PARAM_STR);
        $stmt->bindParam(":minFrac", $datos["minFrac"], PDO::PARAM_STR);
        $stmt->bindParam(":maxFrac", $datos["maxFrac"], PDO::PARAM_STR);
        $stmt->bindParam(":minUnit", $datos["minUnit"], PDO::PARAM_STR);
        $stmt->bindParam(":maxUnit", $datos["maxUnit"], PDO::PARAM_STR);
        $stmt->bindParam(":merma", $datos["merma"], PDO::PARAM_STR);
        $stmt->bindParam(":granel", $datos["granel"], PDO::PARAM_STR);
        $stmt->bindParam(":ocultar", $datos["ocultar"], PDO::PARAM_STR);
        $stmt->bindParam(":incluyeImpuestos", $datos["incluyeImpuestos"], PDO::PARAM_STR);
        $stmt->bindParam(":codBarras", $datos["codBarras"], PDO::PARAM_STR);
        $stmt->bindParam(":codAlterno", $datos["codAlterno"], PDO::PARAM_STR);
        $stmt->bindParam(":unidadMedida", $datos["unidadMedida"], PDO::PARAM_STR);
        $stmt->bindParam(":clave", $datos["clave"], PDO::PARAM_STR);
        $stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
        $stmt->bindParam(":precio1", $datos["precio1"], PDO::PARAM_STR);
        $stmt->bindParam(":precio2", $datos["precio2"], PDO::PARAM_STR);
        $stmt->bindParam(":precio3", $datos["precio3"], PDO::PARAM_STR);
        $stmt->bindParam(":existencia", $datos["existencia"], PDO::PARAM_STR);
        $stmt->bindParam(":obligar", $datos["obligar"], PDO::PARAM_STR);
        

        if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
    }

    /*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}
}