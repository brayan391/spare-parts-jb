<?php
require_once '../app/models/Producto.php';
$productoModel = new Producto();

$itemsCarrito = [];
$totalGeneral = 0;

if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $idProducto => $cantidad) {
        $prod = $productoModel->obtenerPorId($idProducto);
        if ($prod) {
            $prod['cantidad'] = $cantidad;
            $prod['subtotal'] = $prod['precio'] * $cantidad;
            $totalGeneral += $prod['subtotal'];
            $itemsCarrito[] = $prod;
        }
    }
}
?>

<main class="container my-5">
    <h2 class="fw-bold mb-4">🛒 Tu Carrito de Compras</h2>

    <?php if (!empty($itemsCarrito)): ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0 text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($itemsCarrito as $item): ?>
                                        <tr>
                                            <td class="text-start fw-bold">
                                                <?= htmlspecialchars($item['nombre']) ?>
                                            </td>
                                            <td>$<?= number_format($item['precio'], 0, ',', '.') ?></td>
                                            <td>
                                                <span class="badge bg-secondary px-3 py-2 fs-6">
                                                    <?= $item['cantidad'] ?>
                                                </span>
                                            </td>
                                            <td class="fw-bold text-success">
                                                $<?= number_format($item['subtotal'], 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3">Resumen del Pedido</h4>
                        <hr>
                        <div class="d-flex justify-content-between fs-5 fw-bold mb-4">
                            <span>Total:</span>
                            <span class="text-success">$<?= number_format($totalGeneral, 0, ',', '.') ?></span>
                        </div>
                        
                        <!-- Enlace funcional de compra -->
                        <a href="index.php?controlador=carrito&accion=finalizar" class="btn btn-warning w-100 fw-bold py-2 fs-5 mb-2">
                            Finalizar Compra
                        </a>
                        
                        <a href="index.php?controlador=producto&accion=catalogo" class="btn btn-outline-dark w-100 fw-semibold">
                            Seguir Comprando
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center py-5">
            <h4 class="text-muted mb-3">Tu carrito está vacío.</h4>
            <a href="index.php?controlador=producto&accion=catalogo" class="btn btn-warning fw-bold px-4 py-2">
                Explorar Productos
            </a>
        </div>
    <?php endif; ?>
</main>