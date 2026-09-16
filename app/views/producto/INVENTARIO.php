<main class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Gestión de Inventario</h2>
        <a href="index.php?controlador=producto&accion=formulario" class="btn btn-warning fw-bold">
            + Agregar Nuevo Producto
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($productos)): ?>
                            <?php foreach ($productos as $p): ?>
                                <tr>
                                    <td><?= $p['id'] ?></td>
                                    <td>
                                        <?php if (!empty($p['imagen'])): ?>
                                            <img src="uploads/<?= htmlspecialchars($p['imagen']) ?>" width="50" height="50" style="object-fit: contain;">
                                        <?php else: ?>
                                            <span class="text-muted small">Sin imagen</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="fw-bold text-start"><?= htmlspecialchars($p['nombre']) ?></td>
                                    <td><span class="badge bg-secondary"><?= htmlspecialchars($p['categoria'] ?? 'General') ?></span></td>
                                    <td class="text-success fw-bold">$<?= number_format($p['precio'], 0, ',', '.') ?></td>
                                    <td><?= $p['stock'] ?? 0 ?> unds</td>
                                    <td>
                                        <a href="index.php?controlador=producto&accion=formulario&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-primary me-1">
                                            ✏️ Editar
                                        </a>
                                        <a href="index.php?controlador=producto&accion=eliminar&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                                            🗑️ Eliminar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="py-4 text-muted">No hay productos registrados en el inventario.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>