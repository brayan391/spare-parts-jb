<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$carrito = $_SESSION['carrito'] ?? [];
$total = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Carrito de Compras - Spare Parts JB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="card shadow-sm border-0 p-4">
            <h3 class="fw-bold mb-4 text-center">Tu Carrito de Compras</h3>

            <?php if (!empty($carrito)): ?>
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($carrito as $item): 
                                $subtotal = $item['precio'] * $item['cantidad'];
                                $total += $subtotal;
                            ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <?php if (!empty($item['imagen'])): ?>
                                                <img src="uploads/<?= htmlspecialchars($item['imagen']) ?>" 
                                                     onerror="this.src='../public/uploads/<?= htmlspecialchars($item['imagen']) ?>'"
                                                     style="width: 50px; height: 50px; object-fit: contain;">
                                            <?php else: ?>
                                                <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; font-size: 10px;">Sin foto</div>
                                            <?php endif; ?>
                                            <span class="fw-semibold"><?= htmlspecialchars($item['nombre']) ?></span>
                                        </div>
                                    </td>
                                    <td>$<?= number_format($item['precio'], 0, ',', '.') ?></td>
                                    <td><?= $item['cantidad'] ?></td>
                                    <td class="fw-bold">$<?= number_format($subtotal, 0, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top flex-wrap gap-3">
                    <a href="index.php?controlador=producto&accion=catalogo" class="btn btn-outline-dark fw-semibold">
                        Seguir Comprando
                    </a>
                    
                    <div class="text-end">
                        <h4 class="fw-bold mb-3">Total: <span class="text-danger">$<?= number_format($total, 0, ',', '.') ?></span></h4>
                        <a href="index.php?controlador=carrito&accion=finalizar" class="btn btn-success btn-lg fw-bold px-4">
                            Finalizar Compra
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-4">
                    <p class="text-muted fs-5 mb-2">El carrito está vacío.</p>
                    <a href="index.php?controlador=producto&accion=catalogo" class="text-primary text-decoration-underline fw-semibold">
                        Ver productos
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>