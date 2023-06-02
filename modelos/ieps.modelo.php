<?php

require_once "conexion.php";

class ModeloIEPS{
     /*AGREGAR IEPS*/
     static public function mdlIngresarIEPS($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (porcentaje) 
        VALUES (:porcentaje)");

        $stmt->bindParam(':porcentaje',$datos["porcentaje"],PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt=null;
        
    }

    static public function mdlMostrarIEPS($tabla,$item,$valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
    
            $result = $stmt -> fetch();
    
            if ($result) {
                $result["porcentaje"] = intval($result["porcentaje"]) == $result["porcentaje"] ? intval($result["porcentaje"]) : $result["porcentaje"];
            }
    
            return $result;
    
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
    
            $results = $stmt -> fetchAll();
    
            foreach ($results as $key => $value) {
                $results[$key]["porcentaje"] = intval($value["porcentaje"]) == $value["porcentaje"] ? intval($value["porcentaje"]) : $value["porcentaje"];
            }
    
            return $results;
        }
    
        $stmt->close();
        $stmt=null;
    }
    
      /*EDITAR IEPS*/
      static public function mdlEditarIEPS($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET porcentaje = :porcentaje WHERE id=:id");

        $stmt->bindParam(':porcentaje',$datos["porcentaje"],PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos["id"],PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt=null;
        
    }

    
    //ELIMINAR IEPS
    static public function mdlEliminarIEPS($tabla,$datos){

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