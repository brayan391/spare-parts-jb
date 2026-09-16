<?php
class Database {
    public static function conectar() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "spare_parts_jb"; // Nombre de tu base de datos

        $conexion = new mysqli($host, $user, $password, $database);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $conexion->set_charset("utf8");
        return $conexion;
    }
}