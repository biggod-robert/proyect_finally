<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <section class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <div class="card border border-light-subtle rounded-3 shadow-sm">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-3">
                                <a href="#!">
                                    <img src="../img/logo.png" alt="img-fluid" width="175" height="157">
                                </a>
                            </div>
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Restablecer Contraseña</h2>
                            <?php if ($show_form): ?>
                                <form id="ResetPasswordForm" action="controller_passwor.php" method="POST"
                                    onsubmit="return validatePassword()">
                                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="nueva_password" id="new_password"
                                            placeholder="Nueva contraseña" required pattern="(?=.*\d)(?=.*[!@#$%^&*]).{8,}"
                                            title="La contraseña debe tener al menos 8 caracteres, incluir un número y un símbolo">
                                        <label for="new_password" class="form-label">Nueva Contraseña</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="confirma_password"
                                            id="confirm_password" placeholder="Confirmar nueva contraseña" required>
                                        <label for="confirm_password" class="form-label">Confirmar Nueva Contraseña</label>
                                    </div>
                                    <div class="d-grid my-3">
                                        <button class="btn btn-primary btn-lg" type="submit">Restablecer</button>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function validatePassword() {
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            // Validar que las contraseñas coincidan
            if (newPassword !== confirmPassword) {
                Swal.fire("Error", "No coinciden las contraseñas", "error");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
