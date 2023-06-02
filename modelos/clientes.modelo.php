<?php

require_once "conexion.php";

class ModeloClientes {
    /* AGREGAR CLIENTE */
    static public function mdlIngresarCliente($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (
            apellido1, apellido2, nombre, rfc, regimenFiscal_id, registroIdentidadFiscal_id, 
            usoCFDI_id, moneda_id, formaPago_id, calle, colonia, numero, cp, 
            localidad, estado, pais, diasCredito, limiteCredito, 
            correo1, correo2, telefono, celular, numeroCuenta
        ) VALUES (
            :apellido1, :apellido2, :nombre, :rfc, :regimenFiscal_id, :registroIdentidadFiscal_id,
            :usoCFDI_id, :moneda_id, :formaPago_id, :calle, :colonia, :numero, :cp, 
            :localidad, :estado, :pais, :diasCredito, :limiteCredito, 
            :correo1, :correo2, :telefono, :celular, :numeroCuenta
        )");

        $stmt->bindParam(':apellido1', $datos["apellido1"], PDO::PARAM_STR);
        $stmt->bindParam(':apellido2', $datos["apellido2"], PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(':rfc', $datos["rfc"], PDO::PARAM_STR);
        $stmt->bindParam(':regimenFiscal_id', $datos["regimenFiscal_id"], PDO::PARAM_INT);
        $stmt->bindParam(':registroIdentidadFiscal_id', $datos["registroIdentidadFiscal_id"], PDO::PARAM_INT);
        $stmt->bindParam(':usoCFDI_id', $datos["usoCFDI_id"], PDO::PARAM_INT);
        $stmt->bindParam(':moneda_id', $datos["moneda_id"], PDO::PARAM_INT);
        $stmt->bindParam(':formaPago_id', $datos["formaPago_id"], PDO::PARAM_INT);
        $stmt->bindParam(':calle', $datos["calle"], PDO::PARAM_STR);
        $stmt->bindParam(':colonia', $datos["colonia"], PDO::PARAM_STR);
        $stmt->bindParam(':numero', $datos["numero"], PDO::PARAM_STR);
        $stmt->bindParam(':cp', $datos["cp"], PDO::PARAM_STR);
        $stmt->bindParam(':localidad', $datos["localidad"], PDO::PARAM_STR);
        $stmt->bindParam(':estado', $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(':pais', $datos["pais"], PDO::PARAM_STR);
        $stmt->bindParam(':diasCredito', $datos["diasCredito"], PDO::PARAM_INT);
        $stmt->bindParam(':limiteCredito', $datos["limiteCredito"], PDO::PARAM_STR);
        $stmt->bindParam(':correo1', $datos["correo1"], PDO::PARAM_STR);
        $stmt->bindParam(':correo2', $datos["correo2"], PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(':celular', $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(':numeroCuenta', $datos["numeroCuenta"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
     /*MOSTRAR CLIENTES*/

     static public function mdlMostrarClientes($tabla,$item,$valor){
        if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
            $stmt->close();
            $stmt=null;
    }
    static public function mdlEditarCliente($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("
            UPDATE $tabla SET 
                nombre = :nombre,
                apellido1 = :apellido1,
                apellido2 = :apellido2,
                rfc = :rfc,
                regimenFiscal_id = :regimenFiscal_id,
                registroIdentidadFiscal_id = :registroIdentidadFiscal_id,
                usoCFDI_id = :usoCFDI_id,
                moneda_id = :moneda_id,
                formaPago_id = :formaPago_id,
                calle = :calle,
                colonia = :colonia,
                numero = :numero,
                cp = :cp,
                localidad = :localidad,
                estado = :estado,
                pais = :pais,
                diasCredito = :diasCredito,
                limiteCredito = :limiteCredito,
                correo1 = :correo1,
                correo2 = :correo2,
                telefono = :telefono,
                celular = :celular,
                numeroCuenta = :numeroCuenta
            WHERE id = :id");
    
        // Bindeamos los parámetros al objeto de la declaración
        $stmt->bindParam(':nombre', $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(':apellido1', $datos["apellido1"], PDO::PARAM_STR);
        $stmt->bindParam(':apellido2', $datos["apellido2"], PDO::PARAM_STR);
        $stmt->bindParam(':rfc', $datos["rfc"], PDO::PARAM_STR);
        $stmt->bindParam(':regimenFiscal_id', $datos["regimenFiscal_id"], PDO::PARAM_INT);
        $stmt->bindParam(':registroIdentidadFiscal_id', $datos["registroIdentidadFiscal_id"], PDO::PARAM_INT);
        $stmt->bindParam(':usoCFDI_id', $datos["usoCFDI_id"], PDO::PARAM_INT);
        $stmt->bindParam(':moneda_id', $datos["moneda_id"], PDO::PARAM_INT);
        $stmt->bindParam(':formaPago_id', $datos["formaPago_id"], PDO::PARAM_INT);
        $stmt->bindParam(':calle', $datos["calle"], PDO::PARAM_STR);
        $stmt->bindParam(':colonia', $datos["colonia"], PDO::PARAM_STR);
        $stmt->bindParam(':numero', $datos["numero"], PDO::PARAM_STR);
        $stmt->bindParam(':cp', $datos["cp"], PDO::PARAM_STR);
        $stmt->bindParam(':localidad', $datos["localidad"], PDO::PARAM_STR);
        $stmt->bindParam(':estado', $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(':pais', $datos["pais"], PDO::PARAM_STR);
        $stmt->bindParam(':diasCredito', $datos["diasCredito"], PDO::PARAM_INT);
        $stmt->bindParam(':limiteCredito', $datos["limiteCredito"], PDO::PARAM_STR); // Usa PARAM_STR si necesitas la precisión decimal. Si no, usa PARAM_INT
        $stmt->bindParam(':correo1', $datos["correo1"], PDO::PARAM_STR);
        $stmt->bindParam(':correo2', $datos["correo2"], PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(':celular', $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(':numeroCuenta', $datos["numeroCuenta"], PDO::PARAM_STR);
        $stmt->bindParam(':id', $datos["id"], PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    
        $stmt->close();
        $stmt = null;
    }
  //ELIMINAR CLIENTES
  static public function mdlEliminarCliente($tabla,$datos){

    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
    $stmt->bindParam(':id',$datos,PDO::PARAM_STR);


    if ($stmt->execute()) {
        return "ok";
    } else {
        return "error";
    }
    $stmt->close();
    $stmt=null;
}

}