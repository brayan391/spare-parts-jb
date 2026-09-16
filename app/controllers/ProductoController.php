<?php
require_once '../app/models/Producto.php';

class ProductoController {
    private $productoModel;

    public function __construct() {
        $this->productoModel = new Producto();
    }

    public function catalogo() {
        $categoria = $_GET['categoria'] ?? 'Cascos';
        $productos = $this->productoModel->obtenerPorCategoria($categoria);

        require_once '../app/views/layouts/header.php';
        require_once '../app/views/producto/catalogo.php';
        require_once '../app/views/layouts/footer.php';
    }

    public function inventario() {
        $productos = $this->productoModel->obtenerTodos();

        require_once '../app/views/layouts/header.php';
        require_once '../app/views/producto/inventario.php';
        require_once '../app/views/layouts/footer.php';
    }

    public function formulario() {
        $producto = null;
        if (isset($_GET['id'])) {
            $producto = $this->productoModel->obtenerPorId($_GET['id']);
        }

        require_once '../app/views/layouts/header.php';
        require_once '../app/views/producto/formulario.php';
        require_once '../app/views/layouts/footer.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $categoria = $_POST['categoria'];

            $imagen = '';
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $nombreImagen = time() . '_' . basename($_FILES['imagen']['name']);
                $rutaDestino = '../public/uploads/' . $nombreImagen;
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                    $imagen = $nombreImagen;
                }
            }

            if ($id) {
                $this->productoModel->actualizar($id, $nombre, $descripcion, $precio, $stock, $categoria, $imagen);
            } else {
                $this->productoModel->crear($nombre, $descripcion, $precio, $stock, $categoria, $imagen);
            }

            header('Location: index.php?controlador=producto&accion=inventario');
            exit();
        }
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->productoModel->eliminar($_GET['id']);
        }
        header('Location: index.php?controlador=producto&accion=inventario');
        exit();
    }
}