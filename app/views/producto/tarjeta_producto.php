<div class="col-12 mb-3">
    <div class="product-card p-3 d-flex align-items-center justify-content-between bg-white rounded shadow-sm border">
        <div class="d-flex align-items-center gap-4">
            <?php 
                $imagen = !empty($producto['imagen']) ? $producto['imagen'] : 'default.jpg';
                
                // Si la imagen ya trae ruta completa o es un enlace externo
                if (filter_var($imagen, FILTER_VALIDATE_URL)) {
                    $rutaFinal = $imagen;
                } elseif (file_exists(__DIR__ . '/../../../public/uploads/' . $imagen)) {
                    $rutaFinal = '/spare-parts-jb/public/uploads/' . $imagen;
                } elseif (file_exists(__DIR__ . '/../../../public/images/' . $imagen)) {
                    $rutaFinal = '/spare-parts-jb/public/images/' . $imagen;
                } elseif (file_exists(__DIR__ . '/../../../public/img/' . $imagen)) {
                    $rutaFinal = '/spare-parts-jb/public/img/' . $imagen;
                } else {
                    $rutaFinal = '/spare-parts-jb/public/uploads/' . $imagen;
                }
            ?>
            <img src="<?= htmlspecialchars($rutaFinal) ?>" 
                 alt="<?= htmlspecialchars($producto['nombre']) ?>" 
                 class="product-img rounded" 
                 style="width: 100px; height: 100px; object-fit: contain; background-color: #f8f9fa;"
                 onerror="this.onerror=null; this.src='https://via.placeholder.com/100?text=Sin+Imagen';">
            
            <div>
                <h5 class="fw-bold mb-1"><?= htmlspecialchars($producto['nombre']) ?></h5>
                <p class="text-muted small mb-1"><?= htmlspecialchars($producto['descripcion'] ?? '') ?></p>
                <span class="badge bg-light text-dark border">
                    Tipo: <?= htmlspecialchars($producto['tipo'] ?? 'Universal') ?> | Stock: <?= $producto['stock'] ?? 0 ?>
                </span>
            </div>
        </div>

        <div class="text-end">
            <h4 class="fw-bold text-danger mb-2">$<?= number_format($producto['precio'], 0, ',', '.') ?></h4>
            <a href="index.php?controlador=carrito&accion=agregar&id=<?= $producto['id'] ?>" 
               class="btn btn-dark btn-sm fw-semibold px-3">
               Añadir al Carrito
            </a>
        </div>
    </div>
</div>