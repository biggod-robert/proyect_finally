<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <link rel="stylesheet" href="../css/resset.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="../img/b.png" alt="Logo del Sitio">
        </div>
        <h2>Recupera tu Contraseña</h2>
        <p>Introduce tu dirección de correo electrónico y te enviaremos un enlace para recuperar tu contraseña.</p>
        <form action="../controller/recuperar_password.php" method="post">
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <button type="submit">Enviar Enlace</button>
        </form>
    </div>
</body>
</html>