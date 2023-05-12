<?php

require_once "conexion.php";

class ModeloFamilias{
     /*AGREGAR FAMILIAS*/
     static public function mdlIngresarFamilia($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (familia,descripcion,departamento_id) 
        VALUES (:familia,:descripcion,:departamento_id)");

        $stmt->bindParam(':familia',$datos["familia"],PDO::PARAM_STR);
        $stmt->bindParam(':descripcion',$datos["descripcion"],PDO::PARAM_STR);
        $stmt->bindParam(':departamento_id',$datos["departamento_id"],PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt=null;
        
    }

     /*MOSTRAR FAMILIAS*/

     static public function mdlMostrarFamilias($tabla,$item,$valor){
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

      /*EDITAR FAMILIAS*/
      static public function mdlEditarFamilia($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET familia=:familia, descripcion=:descripcion, departamento_id=:departamento_id
        WHERE id=:id");

        $stmt->bindParam(':familia',$datos["familia"],PDO::PARAM_STR);
        $stmt->bindParam(':descripcion',$datos["descripcion"],PDO::PARAM_STR);
        $stmt->bindParam(':departamento_id',$datos["departamento_id"],PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos["id"],PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt=null;
        
    }

    //ELIMINAR FAMILIA
    static public function mdlBorrarFamilia($tabla,$datos){

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
     /*MOSTRAR FAMILIAS POR DEPARTAMENTO*/

     static public function mdlMostrarFamiliasporDepartamentos($tabla, $item, $valor){
    
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        
        $stmt -> execute();
        
        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    }