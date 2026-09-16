<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';

            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->autenticar($email, $password);

            if ($usuario) {
                $_SESSION['usuario'] = $usuario;
                header('Location: index.php?controlador=producto&accion=catalogo');
                exit();
            } else {
                $error = "Correo o contraseña incorrectos.";
            }
        }

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/auth/login.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    public function registro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';

            $usuarioModel = new Usuario();
            if ($usuarioModel->registrar($nombre, $email, $password)) {
                header('Location: index.php?controlador=usuario&accion=login');
                exit();
            } else {
                $error = "Error al registrar el usuario. El correo podría estar en uso.";
            }
        }

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/auth/registro.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    public function logout() {
        unset($_SESSION['usuario']);
        session_destroy();
        header('Location: index.php?controlador=producto&accion=catalogo');
        exit();
    }
}