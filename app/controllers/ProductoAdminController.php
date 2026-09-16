<?php
require_once '../app/models/CrudModel.php';

class ProductoAdminController {
    private $crudModel;

    public function __construct($db) {
        $this->crudModel = new CrudModel($db);
    }

    public function index() {
        $productos = $this->crudModel->obtenerTodos('productos');
        require_once '../app/views/admin/productos.php';
    }

    public function guardar($db, $datos, $archivos) {
        $nombreImagen = $datos['imagen_actual'] ?? 'default.png';

        if (!empty($archivos['imagen']['name'])) {
            $nombreImagen = basename($archivos['imagen']['name']);
            $rutaDestino = '../public/uploads/' . $nombreImagen;
            move_uploaded_file($archivos['imagen']['tmp_name'], $rutaDestino);
        }

        if (!empty($datos['id'])) {
            $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, 
                    categoria_id = :categoria_id, tipo_moto = :tipo_moto, stock = :stock, imagen = :imagen WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $datos['id']);
        } else {
            $sql = "INSERT INTO productos (nombre, descripcion, precio, categoria_id, tipo_moto, stock, imagen) 
                    VALUES (:nombre, :descripcion, :precio, :categoria_id, :tipo_moto, :stock, :imagen)";
            $stmt = $db->prepare($sql);
        }

        $stmt->bindParam(':nombre', $datos['nombre']);
        $stmt->bindParam(':descripcion', $datos['descripcion']);
        $stmt->bindParam(':precio', $datos['precio']);
        $stmt->bindParam(':categoria_id', $datos['categoria_id']);
        $stmt->bindParam(':tipo_moto', $datos['tipo_moto']);
        $stmt->bindParam(':stock', $datos['stock']);
        $stmt->bindParam(':imagen', $nombreImagen);
        $stmt->execute();

        header('Location: /spare-parts-jb/public/index.php?controlador=productoAdmin&accion=index');
    }

    public function eliminar($id) {
        $this->crudModel->eliminar('productos', $id);
        header('Location: /spare-parts-jb/public/index.php?controlador=productoAdmin&accion=index');
    }
}