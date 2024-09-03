<?php
require_once "superior.php";
require_once "../../modelo/User.php";

// Asegúrate de que el usuario esté autenticado
if (!isset($_SESSION['id_documento'])) {
    header('Location: ../../vista/inicioSesion.php');
    exit;
}

$userId = $_SESSION['id_documento'];
$user = User::getUserById($userId);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Procesar la actualización del perfil
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];

    if (User::updateProfile($userId, $nombre, $apellido, $correo, $edad, $fecha_nacimiento, $telefono)) {
        $mensaje = "Perfil actualizado con éxito.";
    } else {
        $error = "Hubo un error al actualizar el perfil.";
    }
}
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Editar Perfil</h1>
    <?php if (isset($mensaje)): ?>
        <div class="alert alert-success"><?php echo $mensaje; ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Información del Usuario</h6>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($user['nombre_p']); ?>">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo htmlspecialchars($user['apellido_p']); ?>">
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="<?php echo htmlspecialchars($user['correo']); ?>">
                </div>
                <div class="form-group">
                    <label for="edad">Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad" value="<?php echo htmlspecialchars($user['edad']); ?>">
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($user['f_nacimiento']); ?>">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($user['telefono']); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>

<?php require_once "inferior.php"; ?>