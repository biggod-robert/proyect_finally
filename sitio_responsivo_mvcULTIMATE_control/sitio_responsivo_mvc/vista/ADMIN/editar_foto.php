<?php
require_once "../../modelo/User.php";

session_start();

if (!isset($_SESSION['id_documento'])) {
    header('Location: ../../vista/inicioSesion.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['nueva_foto'])) {
    $userId = $_SESSION['id_documento'];
    $file = $_FILES['nueva_foto'];
    
    // Validar el archivo
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $maxSize = 5 * 1024 * 1024; // 5MB
    
    if (!in_array($file['type'], $allowedTypes)) {
        $_SESSION['error'] = "Tipo de archivo no permitido. Por favor, sube una imagen JPEG, PNG o GIF.";
    } elseif ($file['size'] > $maxSize) {
        $_SESSION['error'] = "El archivo es demasiado grande. El tamaño máximo permitido es 5MB.";
    } else {
        $uploadDir = '../../uploads/profile_photos/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $fileName = $userId . '_' . time() . '_' . $file['name'];
        $filePath = $uploadDir . $fileName;
        
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            if (User::updateProfilePhoto($userId, $filePath)) {
                $_SESSION['success'] = "Foto de perfil actualizada con éxito.";
            } else {
                $_SESSION['error'] = "Error al actualizar la foto de perfil en la base de datos.";
            }
        } else {
            $_SESSION['error'] = "Error al subir el archivo.";
        }
    }
}

header('Location: perfil.php');
exit;