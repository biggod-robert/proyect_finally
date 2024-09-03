<?php
session_start();

// Si ya tiene una sesión iniciada, redirigir a la sección correspondiente
if (isset($_SESSION['id_documento'])) {
    if ($_SESSION['id_categoria'] === 1) { // Administrador
        header('Location: ../vista/ADMIN/dashboard_ADMIN.php');
    } else { // Usuario
        header('Location: ControlSecciones.php?seccion=seccion1');
    }
    exit;
}

// Desactivar caché para evitar el uso del botón de retroceso
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>REGISTRO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/stylesRegistro.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="../js/captcha.js"></script>
    <script defer src="../js/error.js"></script>

    <script src="../js/validar.js"></script>>
    <script>
        window.onpopstate = function(event) {
            history.go(1);
        };
    </script>

</head>

<body>

    <div class="container">
        <img class="img-fluid" alt="logoEmpresa" src="../img/logo.png">
        <h1
            style="color: white; font-size: 40px; font-family: 'Arial Black', sans-serif; text-align: center; margin-top: 20px; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
            TOUR PEOPLE</h1><br>
        <div class="form-container">
            <form method="POST" id="loginForm" class="form" action="../controller/authController.php?action=login">
                <h2>Iniciar Sesión</h2>
                <label for="loginEmail">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" placeholder="Introduce tu correo electrónico" required>
                <label for="loginPassword">Contraseña</label>
                <input type="password" id="password" name="clave" placeholder="Introduce tu contraseña" required>
                <div id="captcha"></div>
                <div class="captcha-input">
                    <input type="text" id="captchaInput" name="captchaInput" placeholder="Ingrese el CAPTCHA" />
                    <input type="hidden" id="captchaHidden" name="captchaHidden"
                        value=" <?php echo $captchaHidden; ?>" />

                    <button type="button" onclick="generateCaptcha()">Recargar CAPTCHA</button>
                </div>
                <button type="submit">Iniciar Sesión</button>
                <p>¿Olvidaste tu contraseña? <a href="formu_recuperar.php">Recupérala aquí</a></p>
                <p>¿No tienes una cuenta? <a href="#" id="showRegisterForm">Regístrate</a></p>
            </form>
            <div id="error-message"></div>

            <form id="registerForm" class="form hidden" action="../controller/authController.php?action=register"
                method="POST">
                <h2>REGISTRATE</h2>
                <label for="registerUsername">Documento</label>
                <input type="int" id="registerUsername" name="id_documento" placeholder="Introduce tu documento"
                    required>
                <label for="nombreusuario">Nombres</label>
                <input type="text" class="form-control" id="nombreusuario" name="nombre_p"
                    placeholder="digita tu nombre">
                <label for="dateOfBirth"> Apellidos </label>
                <input type="text" class="form-control" id="dateOfBirth" name="apellido_p"
                    placeholder="Introduce tus apellidos">
                <label for="email_nombre">Correo </label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="escribe el correo">
                <label for="registerPassword">Contraseña</label>
                <input type="password" id="Password" name="clave" placeholder="Introduce tu contraseña"
                    required>
                <label for="registerConfirmPassword">Confirmar Contraseña</label>
                <input type="password" id="confirm-password" name="confirm_password"
                    placeholder="Confirma tu contraseña" required>
                <label for="edad">edad</label>
                <input type="number" class="form-control" id="date" name="edad" placeholder="tu edad">
                <label for="fechcumple">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fechcumple" name="f_nacimiento" placeholder="">
                <label for="registerPhone">Teléfono</label>
                <input type="tel" id="registerPhone" name="telefono" placeholder="Introduce tu número de teléfono"
                    required>

                <button type="submit">Registrarse</button>
                <p>¿Ya tienes una cuenta? <a href="seccion4.php" id="showLoginForm">Iniciar
                        Sesión</a></p>
            </form>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script defer src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>