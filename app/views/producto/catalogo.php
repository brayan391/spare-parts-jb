<main class="container my-5">
    <h2 class="fw-bold mb-4">Catálogo de <?= htmlspecialchars($categoria) ?></h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $p): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <?php if (!empty($p['imagen'])): ?>
                            <img src="uploads/<?= htmlspecialchars($p['imagen']) ?>" class="card-img-top p-3" style="height: 200px; object-fit: contain;">
                        <?php else: ?>
                            <div class="bg-secondary text-white text-center py-5">Sin imagen</div>
                        <?php endif; ?>
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold"><?= htmlspecialchars($p['nombre']) ?></h5>
                            <p class="card-text text-muted small flex-grow-1"><?= htmlspecialchars($p['descripcion']) ?></p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fs-5 fw-bold text-success">$<?= number_format($p['precio'], 0, ',', '.') ?></span>
                                
                                <?php if (isset($_SESSION['usuario'])): ?>
                                    <a href="index.php?controlador=carrito&accion=agregar&id=<?= $p['id'] ?>" class="btn btn-warning fw-bold">
                                        🛒 Agregar
                                    </a>
                                <?php else: ?>
                                    <a href="index.php?controlador=auth&accion=login" class="btn btn-outline-dark fw-bold btn-sm">
                                        Inicia sesión para comprar
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-muted">No hay productos disponibles en esta categoría.</p>
            </div>
        <?php endif; ?>
    </div>
</main>