<?php
class CarritoController {

    public function agregar() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php?controlador=auth&accion=login');
            exit();
        }

        $idProducto = $_GET['id'] ?? null;
        if ($idProducto) {
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }
            $_SESSION['carrito'][$idProducto] = ($_SESSION['carrito'][$idProducto] ?? 0) + 1;
        }

        header('Location: index.php?controlador=carrito&accion=ver');
        exit();
    }

    public function ver() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php?controlador=auth&accion=login');
            exit();
        }

        require_once '../app/views/layouts/header.php';
        require_once '../app/views/carrito/ver.php';
        require_once '../app/views/layouts/footer.php';
    }

    // Método para procesar y finalizar la compra
    public function finalizar() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php?controlador=auth&accion=login');
            exit();
        }

        // Vacía el carrito una vez confirmada la compra
        unset($_SESSION['carrito']);

        require_once '../app/views/layouts/header.php';
        require_once '../app/views/carrito/confirmacion.php';
        require_once '../app/views/layouts/footer.php';
    }
}