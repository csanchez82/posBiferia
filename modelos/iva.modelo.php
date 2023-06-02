<?php

require_once "conexion.php";

class ModeloIVA{
     /*AGREGAR IVA*/
     static public function mdlIngresarIVA($tabla,$datos){

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

     /*MOSTRAR IVA*/

     static public function mdlMostrarIVA($tabla,$item,$valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            $iva = $stmt -> fetch();
    
            // Comprueba si el valor del IVA es un número entero
            if (intval($iva["porcentaje"]) == $iva["porcentaje"]) {
                // Si es un número entero, convierte a entero para eliminar los decimales
                $iva["porcentaje"] = intval($iva["porcentaje"]);
            }
    
            return $iva;
    
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            $ivas = $stmt -> fetchAll();
    
            // Asume que 'porcentaje' es una columna en tu tabla de IVA
            foreach ($ivas as &$iva) {
                if (intval($iva["porcentaje"]) == $iva["porcentaje"]) {
                    $iva["porcentaje"] = intval($iva["porcentaje"]);
                }
            }
    
            return $ivas;
        }
            
        $stmt->close();
        $stmt=null;
    }
    

      /*EDITAR IVA*/
      static public function mdlEditarIVA($tabla,$datos){

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

    
    //ELIMINAR IVA
    static public function mdlEliminarIVA($tabla,$datos){

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