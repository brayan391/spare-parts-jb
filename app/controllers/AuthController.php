<?php
require_once '../app/models/Usuario.php';

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function login() {
        require_once '../app/views/layouts/header.php';
        require_once '../app/views/auth/login.php';
        require_once '../app/views/layouts/footer.php';
    }

    public function registro() {
        require_once '../app/views/layouts/header.php';
        require_once '../app/views/auth/registro.php';
        require_once '../app/views/layouts/footer.php';
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->usuarioModel->registrar($nombre, $email, $password)) {
                header('Location: index.php?controlador=auth&accion=login');
                exit();
            }
        }
    }

    public function autenticar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuario = $this->usuarioModel->obtenerPorEmail($email);

            if ($usuario && password_verify($password, $usuario['password'])) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['usuario'] = [
                    'id' => $usuario['id'],
                    'nombre' => $usuario['nombre'],
                    'email' => $usuario['email']
                ];
                header('Location: index.php?controlador=producto&accion=catalogo');
                exit();
            } else {
                header('Location: index.php?controlador=auth&accion=login&error=1');
                exit();
            }
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: index.php?controlador=producto&accion=catalogo');
        exit();
    }
}