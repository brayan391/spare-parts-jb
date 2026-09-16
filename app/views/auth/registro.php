<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h3 class="fw-bold text-center mb-4">Crear Cuenta</h3>
                    
                    <form action="index.php?controlador=auth&accion=registrar" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre Completo</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ej. Juan Pérez" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" placeholder="correo@ejemplo.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-warning w-100 fw-bold mb-3">Registrarse</button>

                        <div class="text-center">
                            <span class="text-muted">¿Ya tienes una cuenta?</span>
                            <a href="index.php?controlador=auth&accion=login" class="text-dark fw-bold ms-1">Inicia Sesión</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>