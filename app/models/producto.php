<?php
require_once '../config/database.php';

class Producto {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        $resultado = $this->db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorCategoria($categoria) {
        $stmt = $this->db->prepare("SELECT * FROM productos WHERE LOWER(categoria) = LOWER(?) ORDER BY id DESC");
        $stmt->bind_param("s", $categoria);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function crear($nombre, $descripcion, $precio, $stock, $categoria, $imagen) {
        $stmt = $this->db->prepare("INSERT INTO productos (nombre, descripcion, precio, stock, categoria, imagen) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdiss", $nombre, $descripcion, $precio, $stock, $categoria, $imagen);
        return $stmt->execute();
    }

    public function actualizar($id, $nombre, $descripcion, $precio, $stock, $categoria, $imagen) {
        if (!empty($imagen)) {
            $stmt = $this->db->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, stock=?, categoria=?, imagen=? WHERE id=?");
            $stmt->bind_param("ssdissi", $nombre, $descripcion, $precio, $stock, $categoria, $imagen, $id);
        } else {
            $stmt = $this->db->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, stock=?, categoria=? WHERE id=?");
            $stmt->bind_param("ssdisi", $nombre, $descripcion, $precio, $stock, $categoria, $id);
        }
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}