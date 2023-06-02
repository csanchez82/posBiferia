<?php
require_once "conexion.php";

class ModeloProductos{
    static public function mdlIngresarProducto($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla
        (nombre, tipo, descripcion, proveedor_id, departamento_id, familia_id, iva_id, ieps_id, minInventario, maxInventario, inventario, merma, granel, ocultar,
        incluyeImpuestos, codBarras, codAlterno, unidadMedida_id, clave_id, costo, precio1, precio2, precio3, obligar) 
        VALUES 
        (:nombre, :tipo, :descripcion, :proveedor_id, :departamento_id, :familia_id, :iva_id, :ieps_id, :minInventario, :maxInventario, :inventario, :merma, :granel, :ocultar, :incluyeImpuestos, :codBarras, :codAlterno, :unidadMedida_id, :clave_id, :costo, :precio1, :precio2, :precio3, :obligar)");
    
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":proveedor_id", $datos["proveedor_id"], PDO::PARAM_INT);
        $stmt->bindParam(":departamento_id", $datos["departamento_id"], PDO::PARAM_INT);
        $stmt->bindParam(":familia_id", $datos["familia_id"], PDO::PARAM_INT);
        $stmt->bindParam(":iva_id", $datos["iva_id"], PDO::PARAM_INT);
        $stmt->bindParam(":ieps_id", $datos["ieps_id"], PDO::PARAM_INT);
        $stmt->bindParam(":minInventario", $datos["minInventario"], PDO::PARAM_STR);
        $stmt->bindParam(":maxInventario", $datos["maxInventario"], PDO::PARAM_STR);
        $stmt->bindParam(":inventario", $datos["inventario"], PDO::PARAM_STR);
        $stmt->bindParam(":merma", $datos["merma"], PDO::PARAM_STR);
        $stmt->bindParam(":granel", $datos["granel"], PDO::PARAM_INT);
        $stmt->bindParam(":ocultar", $datos["ocultar"], PDO::PARAM_INT);
        $stmt->bindParam(":incluyeImpuestos", $datos["incluyeImpuestos"], PDO::PARAM_INT);
        $stmt->bindParam(":codBarras", $datos["codBarras"], PDO::PARAM_STR);
        $stmt->bindParam(":codAlterno", $datos["codAlterno"], PDO::PARAM_STR);
        $stmt->bindParam(":unidadMedida_id", $datos["unidadMedida_id"], PDO::PARAM_INT);
        $stmt->bindParam(":clave_id", $datos["clave_id"], PDO::PARAM_INT);
        $stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
        $stmt->bindParam(":precio1", $datos["precio1"], PDO::PARAM_STR);
        $stmt->bindParam(":precio2", $datos["precio2"], PDO::PARAM_STR);
        $stmt->bindParam(":precio3", $datos["precio3"], PDO::PARAM_STR);
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

       /*=============================================
	EDITAR PRODUCTO
	=============================================*/

    static public function mdlEditarProducto($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, 
            tipo = :tipo, descripcion = :descripcion, proveedor_id = :proveedor_id, departamento_id = :departamento_id, familia_id = :familia_id, 
            iva_id = :iva_id, ieps_id = :ieps_id, minInventario = :minInventario, 
            maxInventario = :maxInventario, inventario = :inventario, merma = :merma, granel = :granel, ocultar = :ocultar, incluyeImpuestos = :incluyeImpuestos,
            codBarras = :codBarras, codAlterno = :codAlterno, unidadMedida_id = :unidadMedida_id, clave_id = :clave_id, costo = :costo, precio1 = :precio1, precio2 = :precio2, precio3 = :precio3, 
            obligar = :obligar WHERE id = :id");
    
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":proveedor_id", $datos["proveedor_id"], PDO::PARAM_INT);
        $stmt->bindParam(":departamento_id", $datos["departamento_id"], PDO::PARAM_INT);
        $stmt->bindParam(":familia_id", $datos["familia_id"], PDO::PARAM_INT);
        $stmt->bindParam(":iva_id", $datos["iva_id"], PDO::PARAM_INT);
        $stmt->bindParam(":ieps_id", $datos["ieps_id"], PDO::PARAM_INT);
        $stmt->bindParam(":minInventario", $datos["minInventario"], PDO::PARAM_STR);
        $stmt->bindParam(":maxInventario", $datos["maxInventario"], PDO::PARAM_STR);
        $stmt->bindParam(":inventario", $datos["inventario"], PDO::PARAM_STR);
        $stmt->bindParam(":merma", $datos["merma"], PDO::PARAM_STR);
        $stmt->bindParam(":granel", $datos["granel"], PDO::PARAM_INT);
        $stmt->bindParam(":ocultar", $datos["ocultar"], PDO::PARAM_INT);
        $stmt->bindParam(":incluyeImpuestos", $datos["incluyeImpuestos"], PDO::PARAM_INT);
        $stmt->bindParam(":codBarras", $datos["codBarras"], PDO::PARAM_STR);
        $stmt->bindParam(":codAlterno", $datos["codAlterno"], PDO::PARAM_STR);
        $stmt->bindParam(":unidadMedida_id", $datos["unidadMedida_id"], PDO::PARAM_INT);
        $stmt->bindParam(":clave_id", $datos["clave_id"], PDO::PARAM_INT);
        $stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
        $stmt->bindParam(":precio1", $datos["precio1"], PDO::PARAM_STR);
        $stmt->bindParam(":precio2", $datos["precio2"], PDO::PARAM_STR);
        $stmt->bindParam(":precio3", $datos["precio3"], PDO::PARAM_STR);
        $stmt->bindParam(":obligar", $datos["obligar"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);    

        if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
    }

    /*=============================================
	ELIMINAR PRODUCTO
	=============================================*/

	static public function mdlEliminarProducto($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}

    //OBTENER NOMBRE DEL IVA
    public static function mdlObtenerNombreIVA($tabla, $ivaId) {
        $stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $ivaId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["nombre"];
    }
}