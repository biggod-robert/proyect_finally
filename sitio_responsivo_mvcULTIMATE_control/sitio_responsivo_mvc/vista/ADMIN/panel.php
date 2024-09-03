<?php
require_once "../../modelo/User.php";
require_once "superior.php";

// Verificar si el usuario está autenticado y es admin
if (!isset($_SESSION['id_documento']) || $_SESSION['id_categoria'] !== 1) {
    header('Location: ../../vista/inicioSesion.php');
    exit;
}

// Obtener todos los usuarios
$users = User::getAllUsers();
?>

<div class="container-fluid">

    <!-- Pagina usuarios -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard de Usuarios</h1>
    <p class="mb-4">Vista general de todos los usuarios registrados en el sistema.</p>

    <!-- tabla de usuarios -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Usuarios Registrados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['id_documento']); ?></td>
                            <td><?php echo htmlspecialchars($user['nombre_p']); ?></td>
                            <td><?php echo htmlspecialchars($user['apellido_p']); ?></td>
                            <td><?php echo htmlspecialchars($user['correo']); ?></td>
                            <td><?php echo htmlspecialchars($user['id_categoria']); ?></td>
                            <td>
                                <a href="?action=edit&id=<?php echo $user['id_documento']; ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="?action=delete&id=<?php echo $user['id_documento']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?');">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>




<?php require_once "inferior.php"; ?>
