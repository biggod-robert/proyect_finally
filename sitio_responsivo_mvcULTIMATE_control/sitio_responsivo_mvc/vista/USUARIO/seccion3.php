<?php
$pageTitle = "Mi Perfil";
$content = '';

require_once '../../modelo/User.php';

$user = User::getUserById($_SESSION['id_documento']);

if ($user) {
    $content .= '<div class="row">
        <div class="col-md-4">
            <img src="' . ($user->foto_perfil ? $user->foto_perfil : '../../img/default-profile.png') . '" alt="Foto de perfil" class="img-fluid rounded-circle mb-3" id="profilePic">
        </div>
        <div class="col-md-8">
            <h2>' . htmlspecialchars($user->nombre_p . ' ' . $user->apellido_p) . '</h2>
            <p><strong>Correo:</strong> ' . htmlspecialchars($user->correo) . '</p>
            <p><strong>Edad:</strong> ' . htmlspecialchars($user->edad) . '</p>
            <p><strong>Fecha de Nacimiento:</strong> ' . htmlspecialchars($user->f_nacimiento) . '</p>
            <p><strong>Teléfono:</strong> ' . htmlspecialchars($user->telefono) . '</p>
            <a href="seccion2.php" class="btn btn-primary">Editar Perfil</a>
        </div>
    </div>';
} else {
    $content .= '<p>No se pudo cargar la información del usuario.</p>';
}

include 'plantilla.php';
?>