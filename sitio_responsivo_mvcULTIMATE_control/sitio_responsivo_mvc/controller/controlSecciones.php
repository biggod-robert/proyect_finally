<?php
session_start();

if (!isset($_SESSION['id_documento']) || $_SESSION['id_categoria'] !== 2) {
    header('Location: ../inicioSesion.php');
    exit;
}

$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'seccion1';

$allowed_sections = ['seccion1', 'seccion2', 'seccion3', 'perfil'];

if (!in_array($seccion, $allowed_sections)) {
    $seccion = 'seccion1';
}

$file = "USUARIO/{$seccion}.php";

if (file_exists($file)) {
    include $file;
} else {
    echo "La sección solicitada no existe.";
}
?>
