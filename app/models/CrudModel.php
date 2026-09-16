<?php
class CrudModel {
    private $db;

    public function __construct($databaseConnection) {
        $this->db = $databaseConnection;
    }

    // Obtener todos los registros
    public function obtenerTodos($tabla) {
        $stmt = $this->db->prepare("SELECT * FROM {$tabla}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener registro por ID
    public function obtenerPorId($tabla, $id) {
        $stmt = $this->db->prepare("SELECT * FROM {$tabla} WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Eliminar registro
    public function eliminar($tabla, $id) {
        $stmt = $this->db->prepare("DELETE FROM {$tabla} WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}