<?php
require_once '../app/models/Proveedor.php';

class ProveedorController {
    private $proveedorModel;

    public function __construct() {
        $this->proveedorModel = new Proveedor();
    }

    public function listar() {
        $proveedores = $this->proveedorModel->obtenerTodos();

        require_once '../app/views/layouts/header.php';
        require_once '../app/views/proveedor/listar.php';
        require_once '../app/views/layouts/footer.php';
    }

    public function formulario() {
        $proveedor = null;
        if (isset($_GET['id'])) {
            $proveedor = $this->proveedorModel->obtenerPorId($_GET['id']);
        }

        require_once '../app/views/layouts/header.php';
        require_once '../app/views/proveedor/formulario.php';
        require_once '../app/views/layouts/footer.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $nombre = $_POST['nombre'];
            $nit = $_POST['nit'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $direccion = $_POST['direccion'];

            if ($id) {
                $this->proveedorModel->actualizar($id, $nombre, $nit, $telefono, $email, $direccion);
            } else {
                $this->proveedorModel->crear($nombre, $nit, $telefono, $email, $direccion);
            }

            header('Location: index.php?controlador=proveedor&accion=listar');
            exit();
        }
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->proveedorModel->eliminar($_GET['id']);
        }
        header('Location: index.php?controlador=proveedor&accion=listar');
        exit();
    }
}