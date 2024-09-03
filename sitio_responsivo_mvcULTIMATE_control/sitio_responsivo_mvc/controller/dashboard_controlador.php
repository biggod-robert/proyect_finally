<?php
require_once '../modelo/User.php';

class DashboardController {
    public function index()
    {
        // Verificar si el usuario está autenticado y es admin
        if (!isset($_SESSION['id_documento']) || $_SESSION['id_categoria'] !== 1) {
            header('Location: ../vista/inicioSesion.php');
            exit;
        }

        $users = User::getAllUsers();
        include '../vista/ADMIN/panel.php';
    }
}