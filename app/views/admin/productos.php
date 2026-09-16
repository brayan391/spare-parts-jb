<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Repuestos y Accesorios - Spare Parts JB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <!-- Encabezado con botón para regresar a la tienda -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0">Administración de Inventario (Repuestos y Accesorios)</h2>
        <a href="/spare-parts-jb/public/index.php?controlador=producto&accion=catalogo" class="btn btn-dark">
            ← Volver a la Tienda
        </a>
    </div>

    <!-- Formulario Crear/Editar -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body p-4">
            <h5 class="card-title mb-3" id="form-title">Agregar Nuevo Producto</h5>
            <form action="index.php?controlador=productoAdmin&accion=guardar" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="prod_id">
                <input type="hidden" name="imagen_actual" id="prod_imagen_actual">

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label font-weight-bold">Nombre del Producto</label>
                        <input type="text" name="nombre" id="prod_nombre" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Precio ($)</label>
                        <input type="number" step="0.01" name="precio" id="prod_precio" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Stock</label>
                        <input type="number" name="stock" id="prod_stock" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Categoría</label>
                        <select name="categoria_id" id="prod_categoria" class="form-select" required>
                            <option value="1">Accesorios</option>
                            <option value="2">Baterías</option>
                            <option value="3">Filtros</option>
                            <option value="4">Frenos</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tipo Moto</label>
                        <input type="text" name="tipo_moto" id="prod_tipo" class="form-control" placeholder="Ej: Enduro, Universal" required>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Descripción</label>
                        <input type="text" name="descripcion" id="prod_descripcion" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Imagen</label>
                        <input type="file" name="imagen" class="form-control">
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-danger">Guardar Producto</button>
                    <button type="button" onclick="limpiarFormulario()" class="btn btn-secondary">Cancelar / Nuevo</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabla de Productos -->
    <div class="table-responsive bg-white rounded shadow-sm p-3">
        <table class="table table-striped table-hover align-middle m-0">
            <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Tipo</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $p): ?>
                <tr>
                    <td>
                        <img src="/spare-parts-jb/public/uploads/<?= htmlspecialchars($p['imagen']) ?>" width="50" height="50" style="object-fit: contain;">
                    </td>
                    <td><?= htmlspecialchars($p['nombre']) ?></td>
                    <td>$<?= number_format($p['precio'], 0, ',', '.') ?></td>
                    <td><?= $p['stock'] ?></td>
                    <td><?= htmlspecialchars($p['tipo_moto']) ?></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-warning me-1" onclick='editar(<?= json_encode($p) ?>)'>Editar</button>
                        <a href="index.php?controlador=productoAdmin&accion=eliminar&id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function editar(producto) {
    document.getElementById('form-title').innerText = 'Editar Producto';
    document.getElementById('prod_id').value = producto.id;
    document.getElementById('prod_nombre').value = producto.nombre;
    document.getElementById('prod_precio').value = producto.precio;
    document.getElementById('prod_stock').value = producto.stock;
    document.getElementById('prod_categoria').value = producto.categoria_id;
    document.getElementById('prod_tipo').value = producto.tipo_moto;
    document.getElementById('prod_descripcion').value = producto.descripcion;
    document.getElementById('prod_imagen_actual').value = producto.imagen;
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function limpiarFormulario() {
    document.getElementById('form-title').innerText = 'Agregar Nuevo Producto';
    document.getElementById('prod_id').value = '';
    document.getElementById('prod_nombre').value = '';
    document.getElementById('prod_precio').value = '';
    document.getElementById('prod_stock').value = '';
    document.getElementById('prod_tipo').value = '';
    document.getElementById('prod_descripcion').value = '';
    document.getElementById('prod_imagen_actual').value = '';
}
</script>
</body>
</html>