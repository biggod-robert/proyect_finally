<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id_documento'])) {
    header('Location: ../vista/inicioSesion.php'); // Redirigir al inicio de sesión si no está autenticado
    exit;
}

// Verificar si el usuario está intentando acceder a una página no autorizada
// Impedir que un administrador acceda a páginas de usuario regular
if ($_SESSION['id_categoria'] === 1 && strpos($_SERVER['REQUEST_URI'], '/USUARIO/') !== false) {
    header('Location: ../vista/ADMIN/panel.php'); // Redirigir al admin a su dashboard
    exit;
}

// Impedir que un usuario regular acceda a páginas de administrador
if ($_SESSION['id_categoria'] === 2 && strpos($_SERVER['REQUEST_URI'], '/ADMIN/') !== false) {
    header('Location: ../vista/USUARIO/seccion1.php'); // Redirigir al usuario regular a su sección
    exit;
}


?>