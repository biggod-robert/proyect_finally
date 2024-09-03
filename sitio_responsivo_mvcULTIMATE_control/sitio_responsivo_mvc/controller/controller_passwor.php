<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require_once '../modelo/UsuarioModel.php';
require_once '../libs/PHPMailer/src/PHPMailer.php';
require_once '../mailer/src/SMTP.php';
require_once '../modelo/mailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PasswordController {

    public function resetPassword() {
        $token = $_GET['token'] ?? '';
        $show_form = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $token = $_POST['token'];
            $new_password = $_POST['nueva_password'];
            $confirm_password = $_POST['confirma_password'];

            if ($new_password !== $confirm_password) {
                $this->sendError("Las contraseñas no coinciden", "../vista/nueva_contraseña.php?token=$token");
                return;
            }

            $user_id = UsuarioModel::verificarToken($token);

            if ($user_id) {
                $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
                UsuarioModel::actualizarContrasena($user_id, $hashed_password);
                UsuarioModel::eliminarToken($token);

                $this->sendSuccess("Tu contraseña ha sido restablecida", "../vista/inicioSesion.p
                
                hp");
            } else {
                $this->sendError("El token es inválido o ha expirado", "../vista/formu_recuperar.php");
            }
        } else {
            $show_form = UsuarioModel::verificarToken($token) ? true : false;
            require '../vista/nueva_contraseña.php';
        }
    }

    private function sendError($message, $redirectUrl) {
        echo "<script>Swal.fire('Error', '$message', 'error').then(() => { window.location.href = '$redirectUrl'; });</script>";
    }

    private function sendSuccess($message, $redirectUrl) {
        echo "<script>Swal.fire('Éxito', '$message', 'success').then(() => { window.location.href = '$redirectUrl'; });</script>";
    }
}