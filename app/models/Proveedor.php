<?php
require_once '../config/database.php';

class Proveedor {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM proveedores ORDER BY id DESC";
        $resultado = $this->db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM proveedores WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function crear($nombre, $nit, $telefono, $email, $direccion) {
        $stmt = $this->db->prepare("INSERT INTO proveedores (nombre, nit, telefono, email, direccion) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nombre, $nit, $telefono, $email, $direccion);
        return $stmt->execute();
    }

    public function actualizar($id, $nombre, $nit, $telefono, $email, $direccion) {
        $stmt = $this->db->prepare("UPDATE proveedores SET nombre=?, nit=?, telefono=?, email=?, direccion=? WHERE id=?");
        $stmt->bind_param("sssssi", $nombre, $nit, $telefono, $email, $direccion, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM proveedores WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}