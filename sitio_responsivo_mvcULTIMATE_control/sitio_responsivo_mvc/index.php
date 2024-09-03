<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalador</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">INSTALAR BASE DE DATOS TOURS PEOPLE</h1>
        <img src="img/logo.png" alt="img-fluid" width="155" height="155" border-radius="50%">
        <form method="POST" action="controller/procesar_instalacion.php" class="mt-4">
            <div class="mb-3">
                <label for="host" class="form-label">Host</label>
                <input type="text" class="form-control" id="host" name="servidor" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="usuario" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="dbname" class="form-label">Nombre de la Base de Datos</label>
                <input type="text" class="form-control" id="dbname" name="nombre_bd" value="Tour_people" required >
            </div>
            <button type="submit" class="btn btn-primary">Instalar</button>
        </form>
    </div>
</body>
</html>