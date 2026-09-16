<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Obtener el controlador y la acción actual para detectar el botón activo
$controladorActual = $_GET['controlador'] ?? 'producto';
$accionActual = $_GET['accion'] ?? 'catalogo';

// Calcular total de items en el carrito
$totalCarrito = 0;
if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $cantidad) {
        $totalCarrito += $cantidad;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spare Parts JB - Repuestos y Accesorios para Motos</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            letter-spacing: 1px;
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Navbar Principal -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
        <div class="container-fluid px-4">
            <!-- LOGO A LA IZQUIERDA DEL TEXTO -->
            <a class="navbar-brand fw-bold text-warning fs-3 me-4 d-flex align-items-center gap-2" href="index.php?controlador=producto&accion=catalogo">
                <span>🏍️</span>
                <span>Spare Parts JB</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center">
                    
                    <!-- CATÁLOGO -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold <?= ($controladorActual == 'producto' && $accionActual == 'catalogo') ? 'btn btn-outline-info text-info border-info px-3 py-1 me-2' : '' ?>" href="#" id="navbarDropdownCatalogo" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catálogo
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownCatalogo">
                            <li>
                                <a class="dropdown-item" href="index.php?controlador=producto&accion=catalogo">
                                    Todos los Productos
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="index.php?controlador=producto&accion=catalogo&categoria=cascos">
                                    Cascos
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?controlador=producto&accion=catalogo&categoria=repuestos">
                                    Repuestos
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?controlador=producto&accion=catalogo&categoria=accesorios">
                                    Accesorios
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- INVENTARIO -->
                    <li class="nav-item">
                        <a class="nav-link fw-semibold <?= ($controladorActual == 'producto' && $accionActual == 'inventario') ? 'btn btn-outline-info text-info border-info px-3 py-1 me-2' : '' ?>" href="index.php?controlador=producto&accion=inventario">
                            Inventario
                        </a>
                    </li>

                    <!-- PROVEEDORES -->
                    <li class="nav-item">
                        <a class="nav-link fw-semibold <?= ($controladorActual == 'proveedor') ? 'btn btn-outline-info text-info border-info px-3 py-1 me-2' : '' ?>" href="index.php?controlador=proveedor&accion=listar">
                            Proveedores
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <!-- Botón Carrito -->
                    <a href="index.php?controlador=carrito&accion=ver" class="btn btn-warning fw-bold position-relative me-2">
                        🛒 Carrito
                        <?php if ($totalCarrito > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $totalCarrito ?>
                            </span>
                        <?php endif; ?>
                    </a>

                    <!-- Opciones de Usuario / Saludo dinámico -->
                    <?php if (isset($_SESSION['usuario'])): ?>
                        <span class="text-white fw-bold me-2">
                            Hola, <?= htmlspecialchars($_SESSION['usuario']['nombre'] ?? 'Usuario') ?>
                        </span>
                        <a href="index.php?controlador=auth&accion=logout" class="btn btn-outline-danger btn-sm fw-bold">
                            Cerrar Sesión
                        </a>
                    <?php else: ?>
                        <a href="index.php?controlador=auth&accion=login" class="btn btn-outline-light btn-sm fw-bold">
                            Iniciar Sesión
                        </a>
                        <a href="index.php?controlador=auth&accion=registro" class="btn btn-warning btn-sm fw-bold">
                            Registrarse
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>