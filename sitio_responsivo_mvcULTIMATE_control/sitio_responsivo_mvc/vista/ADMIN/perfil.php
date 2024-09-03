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

// Asumiendo que has añadido un método getUserById en la clase User
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Perfil de Usuario</h1>
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Foto de Perfil</h6>
                </div>
                <div class="card-body">
                    <img src="<?php echo $user['foto_perfil'] ?? '../../img/undraw_profile.svg'; ?>" class="img-fluid rounded-circle" alt="Foto de perfil">
                    <form action="actualizar_foto.php" method="post" enctype="multipart/form-data" class="mt-3">
                        <div class="form-group">
                            <input type="file" name="nueva_foto" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Actualizar Foto</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Información del Usuario</h6>
                </div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($user['nombre_p']); ?></p>
                    <p><strong>Apellido:</strong> <?php echo htmlspecialchars($user['apellido_p']); ?></p>
                    <p><strong>Correo:</strong> <?php echo htmlspecialchars($user['correo']); ?></p>
                    <p><strong>Edad:</strong> <?php echo htmlspecialchars($user['edad']); ?></p>
                    <p><strong>Fecha de Nacimiento:</strong> <?php echo htmlspecialchars($user['f_nacimiento']); ?></p>
                    <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($user['telefono']); ?></p>
                    <a href="editar_perfil.php" class="btn btn-primary">Editar Perfil</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "inferior.php"; ?>