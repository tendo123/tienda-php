<?php

class Database {

    public static function conectar() {
        $conexion = new mysqli("localhost", "root", "", "tienda_master2", 3309);
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }

}

?>