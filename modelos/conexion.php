<?php

class Conexion{

    public static function conectar(){

        $link=new PDO("mysql:host=localhost;dbname=kwrbe475_posBiferia",
        "kwrbe475_negsoft",
        "kwrbe475_negsoft");
        $link->exec("set names utf8");
        return $link;
    }
}