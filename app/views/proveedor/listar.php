<main class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Gestión de Proveedores</h2>
        <a href="index.php?controlador=proveedor&accion=formulario" class="btn btn-warning fw-bold">
            + Nuevo Proveedor
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre / Empresa</th>
                            <th>NIT / Cédula</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($proveedores)): ?>
                            <?php foreach ($proveedores as $prov): ?>
                                <tr>
                                    <td><?= $prov['id'] ?></td>
                                    <td class="fw-bold text-start"><?= htmlspecialchars($prov['nombre']) ?></td>
                                    <td><?= htmlspecialchars($prov['nit']) ?></td>
                                    <td><?= htmlspecialchars($prov['telefono']) ?></td>
                                    <td><?= htmlspecialchars($prov['email']) ?></td>
                                    <td><?= htmlspecialchars($prov['direccion']) ?></td>
                                    <td>
                                        <a href="index.php?controlador=proveedor&accion=formulario&id=<?= $prov['id'] ?>" class="btn btn-sm btn-outline-primary me-1">Editar</a>
                                        <a href="index.php?controlador=proveedor&accion=eliminar&id=<?= $prov['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Seguro de eliminar este proveedor?')">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="py-4 text-muted">No hay proveedores registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>