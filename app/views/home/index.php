<?php
require_once __DIR__ . '/../../models/Producto.php';
$productoModel = new Producto();
$productos = $productoModel->obtenerTodos();
?>

<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <div style="text-align: center; margin-bottom: 2rem; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <h1 style="margin: 0 0 10px 0; color: #1e293b;">Bienvenido a Spare Parts JB</h1>
        <p style="margin: 0; color: #64748b;">Encuentra repuestos y accesorios originales para tu motocicleta con envío rápido y seguro.</p>
    </div>

    <!-- Catálogo de productos funcional -->
    <?php require_once __DIR__ . '/../producto/catalogo.php'; ?>
</div>