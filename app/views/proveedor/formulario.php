<?php $esEdicion = isset($proveedor); ?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white fw-bold">
                    <?= $esEdicion ? 'Editar Proveedor #' . $proveedor['id'] : 'Registrar Nuevo Proveedor' ?>
                </div>
                <div class="card-body p-4">
                    <form action="index.php?controlador=proveedor&accion=guardar" method="POST">
                        <?php if ($esEdicion): ?>
                            <input type="hidden" name="id" value="<?= $proveedor['id'] ?>">
                        <?php endif; ?>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre de la Empresa / Proveedor</label>
                            <input type="text" name="nombre" class="form-control" required value="<?= $esEdicion ? htmlspecialchars($proveedor['nombre']) : '' ?>">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">NIT / Cédula</label>
                                <input type="text" name="nit" class="form-control" required value="<?= $esEdicion ? htmlspecialchars($proveedor['nit']) : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Teléfono</label>
                                <input type="text" name="telefono" class="form-control" required value="<?= $esEdicion ? htmlspecialchars($proveedor['telefono']) : '' ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" required value="<?= $esEdicion ? htmlspecialchars($proveedor['email']) : '' ?>">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Dirección</label>
                            <input type="text" name="direccion" class="form-control" required value="<?= $esEdicion ? htmlspecialchars($proveedor['direccion']) : '' ?>">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php?controlador=proveedor&accion=listar" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">
                                <?= $esEdicion ? 'Actualizar Proveedor' : 'Guardar Proveedor' ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>