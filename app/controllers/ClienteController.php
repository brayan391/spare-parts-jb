<?php
require_once '../app/models/CrudModel.php';

class ClienteController {
    private $crudModel;

    public function __construct($db) {
        $this->crudModel = new CrudModel($db);
    }

    public function index() {
        $clientes = $this->crudModel->obtenerTodos('usuarios');
        require_once '../app/views/admin/clientes.php';
    }

    public function guardar($db, $datos) {
        if (!empty($datos['id'])) {
            $stmt = $db->prepare("UPDATE usuarios SET nombre = :nombre, email = :email, telefono = :telefono WHERE id = :id");
            $stmt->bindParam(':id', $datos['id']);
        } else {
            $stmt = $db->prepare("INSERT INTO usuarios (nombre, email, telefono, password) VALUES (:nombre, :email, :telefono, :password)");
            $passwordHash = password_hash('123456', PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $passwordHash);
        }

        $stmt->bindParam(':nombre', $datos['nombre']);
        $stmt->bindParam(':email', $datos['email']);
        $stmt->bindParam(':telefono', $datos['telefono']);
        $stmt->execute();

        header('Location: /spare-parts-jb/public/index.php?controlador=cliente&accion=index');
    }

    public function eliminar($id) {
        $this->crudModel->eliminar('usuarios', $id);
        header('Location: /spare-parts-jb/public/index.php?controlador=cliente&accion=index');
    }
}