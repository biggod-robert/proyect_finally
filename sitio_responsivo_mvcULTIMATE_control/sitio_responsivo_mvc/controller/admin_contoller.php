<?php
require_once '../modelo/BdConect.php';
class AdminController {
    private $UserModel;

    public function __construct() {
        $this->UserModel = new UserModel(); // Instancia del modelo
    }

    public function mostrarUsuarios() {
        $usuarios = $this->UserModel->getAllUsers(); // Obtener todos los usuarios

        if (empty($usuarios)) {
            echo "No hay usuarios para mostrar.";
        } else {
            include '../vista/ADMIN/panel.php';
        }
    }
}
?>
