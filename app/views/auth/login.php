<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h3 class="fw-bold text-center mb-4">Iniciar Sesión</h3>

                    <form action="index.php?controlador=auth&accion=autenticar" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Correo electrónico:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Contraseña:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 fw-bold mb-3">Ingresar</button>

                        <div class="text-center">
                            <span class="text-muted">¿No tienes cuenta?</span>
                            <a href="index.php?controlador=auth&accion=registro" class="text-warning fw-bold ms-1">Regístrate aquí</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>