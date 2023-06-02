<?php

require_once "conexion.php";

class ModeloProveedor
{

	static public function mdlIngresarProveedor($tabla, $datos)
	{
	
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla
		(apellido1,apellido2,nombre, referencia, rfc, formapagoId, bancoId,
		numeroCuenta, clabe, swift, diasCredito, creditoDisponible,
		diasEntrega, generarOrdenes, facturable, lunes, martes, miercoles, 
		jueves, viernes, sabado, domingo,pais, estado, ciudad, calle, numero, colonia,
		cp, correo1, correo2, telefono1, telefono2) 
		VALUES 
		(:apellido1, :apellido2, :nombre, :referencia, :rfc, :formapagoId, :bancoId,
		:numeroCuenta, :clabe, :swift, :diasCredito, :creditoDisponible,
		:diasEntrega, :generarOrdenes, :facturable, :lunes, :martes, :miercoles,
		:jueves, :viernes, :sabado, :domingo, :pais, :estado, :ciudad, :calle, :numero, :colonia,
		:cp, :correo1, :correo2, :telefono1, :telefono2)");
	
		$stmt->bindParam(":apellido1", $datos["apellido1"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido2", $datos["apellido2"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":formapagoId", $datos["formapagoId"], PDO::PARAM_INT);
		$stmt->bindParam(":bancoId", $datos["bancoId"], PDO::PARAM_INT);
		$stmt->bindParam(":numeroCuenta", $datos["numeroCuenta"], PDO::PARAM_STR);
		$stmt->bindParam(":clabe", $datos["clabe"], PDO::PARAM_STR);
		$stmt->bindParam(":swift", $datos["swift"], PDO::PARAM_STR);
		$stmt->bindParam(":diasCredito", $datos["diasCredito"], PDO::PARAM_INT);
		$stmt->bindParam(":creditoDisponible", $datos["creditoDisponible"], PDO::PARAM_STR);
		$stmt->bindParam(":diasEntrega", $datos["diasEntrega"], PDO::PARAM_INT);
		$stmt->bindParam(":generarOrdenes", $datos["generarOrdenes"], PDO::PARAM_INT);
		$stmt->bindParam(":facturable", $datos["facturable"], PDO::PARAM_INT);
		$stmt->bindParam(":lunes", $datos["lunes"], PDO::PARAM_INT);
		$stmt->bindParam(":martes", $datos["martes"], PDO::PARAM_INT);
		$stmt->bindParam(":miercoles", $datos["miercoles"], PDO::PARAM_INT);
		$stmt->bindParam(":jueves", $datos["jueves"], PDO::PARAM_INT);
		$stmt->bindParam(":viernes", $datos["viernes"], PDO::PARAM_INT);
		$stmt->bindParam(":sabado", $datos["sabado"], PDO::PARAM_INT);
		$stmt->bindParam(":domingo", $datos["domingo"], PDO::PARAM_INT);
		$stmt->bindParam(":pais", $datos["pais"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
		$stmt->bindParam(":calle", $datos["calle"], PDO::PARAM_STR);
		$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":colonia", $datos["colonia"], PDO::PARAM_STR);
		$stmt->bindParam(":cp", $datos["cp"], PDO::PARAM_STR);
		$stmt->bindParam(":correo1", $datos["correo1"], PDO::PARAM_STR);
		$stmt->bindParam(":correo2", $datos["correo2"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono1", $datos["telefono1"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono2", $datos["telefono2"], PDO::PARAM_STR);
	
		if ($stmt->execute()) {
	
			return "ok";
		} else {
	
			return "error";
		}
	
		$stmt->close();
		$stmt = null;
	}
	
	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarProveedores($tabla, $item, $valor)
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
	EDITAR PROVEEDOR
	=============================================*/

	static public function mdlEditarProveedor($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET apellido1=:apellido1, apellido2=:apellido2,nombre=:nombre, referencia=:referencia, 
		rfc=:rfc, formapagoId=:formapagoId,
		bancoId=:bancoId, numeroCuenta=:numeroCuenta, clabe=:clabe, swift=:swift, diasCredito=:diasCredito, creditoDisponible=:creditoDisponible,
		diasEntrega=:diasEntrega, generarOrdenes=:generarOrdenes, facturable=:facturable, lunes=:lunes, martes=:martes, miercoles=:miercoles, jueves=:jueves,
		viernes=:viernes, sabado=:sabado, domingo=:domingo, pais=:pais, estado=:estado, ciudad=:ciudad, calle=:calle, numero=:numero, colonia=:colonia,
		cp=:cp, correo1=:correo1, correo2=:correo2, telefono1=:telefono1, telefono2=:telefono2 WHERE id=:id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":apellido1", $datos["apellido1"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido2", $datos["apellido2"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":formapagoId", $datos["formapagoId"], PDO::PARAM_STR);
		$stmt->bindParam(":bancoId", $datos["bancoId"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroCuenta", $datos["numeroCuenta"], PDO::PARAM_STR);
		$stmt->bindParam(":clabe", $datos["clabe"], PDO::PARAM_STR);
		$stmt->bindParam(":swift", $datos["swift"], PDO::PARAM_STR);
		$stmt->bindParam(":diasCredito", $datos["diasCredito"], PDO::PARAM_INT);
		$stmt->bindParam(":creditoDisponible", $datos["creditoDisponible"], PDO::PARAM_STR);
		$stmt->bindParam(":diasEntrega", $datos["diasEntrega"], PDO::PARAM_INT);
		$stmt->bindParam(":generarOrdenes", $datos["generarOrdenes"], PDO::PARAM_INT);
		$stmt->bindParam(":facturable", $datos["facturable"], PDO::PARAM_STR);
		$stmt->bindParam(":lunes", $datos["lunes"], PDO::PARAM_STR);
		$stmt->bindParam(":martes", $datos["martes"], PDO::PARAM_STR);
		$stmt->bindParam(":miercoles", $datos["miercoles"], PDO::PARAM_STR);
		$stmt->bindParam(":jueves", $datos["jueves"], PDO::PARAM_STR);
		$stmt->bindParam(":viernes", $datos["viernes"], PDO::PARAM_STR);
		$stmt->bindParam(":sabado", $datos["sabado"], PDO::PARAM_STR);
		$stmt->bindParam(":domingo", $datos["domingo"], PDO::PARAM_STR);
		$stmt->bindParam(":pais", $datos["pais"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
		$stmt->bindParam(":calle", $datos["calle"], PDO::PARAM_STR);
		$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":colonia", $datos["colonia"], PDO::PARAM_STR);
		$stmt->bindParam(":cp", $datos["cp"], PDO::PARAM_STR);
		$stmt->bindParam(":correo1", $datos["correo1"], PDO::PARAM_STR);
		$stmt->bindParam(":correo2", $datos["correo2"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono1", $datos["telefono1"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono2", $datos["telefono2"], PDO::PARAM_STR);




		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}


		$stmt->close();
		$stmt = null;
	}


	/*=============================================
	ELIMINAR PROVEEDOR
	=============================================*/

	static public function mdlEliminarProveedor($tabla, $datos)
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

	/*=============================================
	VERIFICAR PRODUCTOS ASOCIADOS AL PROVEEDOR
	=============================================*/

	static public function mdlVerificarProductos($tablaProductos, $idProveedor){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM $tablaProductos WHERE proveedor_id = :id");

		$stmt->bindParam(":id", $idProveedor, PDO::PARAM_INT);

		$stmt->execute();

		// Retornamos el número de productos asociados al proveedor
		return $stmt->fetchColumn();
		
		$stmt->close();
		$stmt = null;
	}

}