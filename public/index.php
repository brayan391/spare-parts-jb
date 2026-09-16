<?php
// OBLIGATORIO: Iniciar la sesión antes de procesar cualquier controlador
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../config/database.php';

// Capturar controlador y acción desde la URL
$controladorNombre = isset($_GET['controlador']) ? ucfirst($_GET['controlador']) . 'Controller' : 'ProductoController';
$accion = $_GET['accion'] ?? 'catalogo';

$rutaControlador = "../app/controllers/" . $controladorNombre . ".php";

if (file_exists($rutaControlador)) {
    require_once $rutaControlador;
    if (class_exists($controladorNombre)) {
        $controlador = new $controladorNombre();
        if (method_exists($controlador, $accion)) {
            $controlador->$accion();
        } else {
            die("La acción '$accion' no existe en el controlador.");
        }
    } else {
        die("La clase '$controladorNombre' no existe.");
    }
} else {
    die("El controlador '$controladorNombre' no existe.");
}