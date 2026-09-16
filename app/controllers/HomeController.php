<?php
class HomeController {
    public function index() {
        // Verificar que la base de datos responda
        $db = Database::getConnection();

        // Cargar las vistas
        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/home/index.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }
}