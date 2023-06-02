<?php

require_once "conexion.php";

class ModeloBancos{
     /*AGREGAR BANCO*/
     static public function mdlIngresarBanco($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,notas) 
        VALUES (:nombre,:notas)");

        $stmt->bindParam(':nombre',$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(':notas',$datos["notas"],PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt=null;
        
    }

     /*MOSTRAR BANCO*/

     static public function mdlMostrarBanco($tabla,$item,$valor){
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
    

      /*EDITAR BANCOS*/
      static public function mdlEditarBanco($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,notas=:notas WHERE id=:id");

        $stmt->bindParam(':nombre',$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(':notas',$datos["notas"],PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos["id"],PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt=null;
        
    }

    
    //ELIMINAR BANCOS
    static public function mdlEliminarBanco($tabla,$datos){

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