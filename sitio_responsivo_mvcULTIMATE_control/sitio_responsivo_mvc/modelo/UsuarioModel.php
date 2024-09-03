<?php
require_once 'BdConect.php';

class UsuarioModel {

    public static function verificarToken($token) {
        $conn = conexionBD::getConnection();
        $sql = "SELECT id_documento FROM reseteo_contraseña WHERE token = ? AND expire_date > NOW()";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$token]);

        return $stmt->fetchColumn();
    }

    public static function actualizarContrasena($user_id, $hashed_password) {
        $conn = conexionBD::getConnection();
        $sql = "UPDATE usuarios SET clave = ? WHERE id_documento = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$hashed_password, $user_id]);
    }

    public static function eliminarToken($token) {
        $conn = conexionBD::getConnection();
        $sql = "DELETE FROM reseteo_contraseña WHERE token = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$token]);
    }
}
