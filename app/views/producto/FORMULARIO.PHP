<?php $esEdicion = isset($producto); ?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white fw-bold">
                    <?= $esEdicion ? 'Editar Producto #' . $producto['id'] : 'Agregar Nuevo Producto' ?>
                </div>
                <div class="card-body p-4">
                    <form action="index.php?controlador=producto&accion=guardar" method="POST" enctype="multipart/form-data">
                        <?php if ($esEdicion): ?>
                            <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                        <?php endif; ?>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del Producto</label>
                            <input type="text" name="nombre" class="form-control" required value="<?= $esEdicion ? htmlspecialchars($producto['nombre']) : '' ?>">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Categoría</label>
                                <select name="categoria" class="form-select" required>
                                    <option value="Cascos" <?= ($esEdicion && $producto['categoria'] === 'Cascos') ? 'selected' : '' ?>>Cascos</option>
                                    <option value="Repuestos" <?= ($esEdicion && $producto['categoria'] === 'Repuestos') ? 'selected' : '' ?>>Repuestos</option>
                                    <option value="Accesorios" <?= ($esEdicion && $producto['categoria'] === 'Accesorios') ? 'selected' : '' ?>>Accesorios</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Precio ($)</label>
                                <input type="number" name="precio" class="form-control" step="0.01" required value="<?= $esEdicion ? $producto['precio'] : '' ?>">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Stock</label>
                                <input type="number" name="stock" class="form-control" required value="<?= $esEdicion ? ($producto['stock'] ?? 10) : '10' ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="3"><?= $esEdicion ? htmlspecialchars($producto['descripcion']) : '' ?></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Imagen del Producto</label>
                            <input type="file" name="imagen" class="form-control" accept="image/*">
                            <?php if ($esEdicion && !empty($producto['imagen'])): ?>
                                <small class="text-muted d-block mt-1">Imagen actual: <?= htmlspecialchars($producto['imagen']) ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php?controlador=producto&accion=inventario" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">
                                <?= $esEdicion ? 'Actualizar Producto' : 'Guardar Producto' ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>