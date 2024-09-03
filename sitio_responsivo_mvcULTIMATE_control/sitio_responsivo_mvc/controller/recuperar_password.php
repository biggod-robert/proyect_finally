<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
<?php

// Usar las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;



// Incluir los archivos de PHPMailer
require '../modelo/mailer/src/PHPMailer.php';
require '../modelo/mailer/src/SMTP.php';
require '../modelo/mailer/src/Exception.php';
require_once '../modelo/BdConect.php';



// Crear conexión
$conn = conexionBD::getConnection();

/**
 * Verifica la conexión a la base de datos.
 *
 * @return void
 */

// Crear conexión
$conn = conexionBD::getConnection();

/**
 * Verifica la conexión a la base de datos.
 *
 * @return void
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['correo']; // Dirección de correo electrónico enviada por POST
    
    /**
     * Verifica si el correo existe en la base de datos.
     *
     * @param string $email Dirección de correo electrónico a verificar.
     *
     * @return void
     */
    $sql = "SELECT id_documento FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]); // Ejecuta la consulta pasando el correo como parámetro

    if ($stmt->rowCount() > 0) { // Si el correo existe en la base de datos
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene el ID del usuario
        
        // Generar un token único para la recuperación de contraseña
        $token = bin2hex(random_bytes(50)); // Token generado de forma segura
        $expire_date = date("Y-m-d H:i:s", strtotime('+1 hour')); // Fecha de expiración del token
        
        // Guardar el token en la base de datos
        $sql = "INSERT INTO reseteo_contraseña (id_usuario, token, expire_date) VALUES (?, ?, ?)
                ON DUPLICATE KEY UPDATE token = VALUES(token), expire_date = VALUES(expire_date)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user['id'], $token, $expire_date]); // Vincula los parámetros de la consulta y ejecuta
        
        // Enviar el correo de recuperación de contraseña
        $mail = new PHPMailer(true);
        
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.mailersend.net'; // Servidor SMTP
            $mail->SMTPAuth   = true;
            $mail->Username   = 'MS_nsZuj6@trial-ynrw7gy89qn42k8e.mlsender.net'; // Usuario SMTP
            $mail->Password   = 'hJPtKVGkhvMJBjSm'; // Contraseña SMTP
            $mail->SMTPSecure = 'tls'; // Habilitar cifrado TLS
            $mail->Port       = 587; // Puerto SMTP
            
            // Remitente
            $mail->setFrom('MS_nsZuj6@trial-ynrw7gy89qn42k8e.mlsender.net', 'Newwins');
            
            // Destinatario
            $mail->addAddress($email);
            
            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Restablecimiento de contraseña';
            $mail->Body    = "Haz clic en el siguiente enlace para restablecer tu contrasena de TourPeople: <a href='http://localhost/sitio_responsivo_mvcPRICA11/sitio_responsivo_mvc/vista/nueva_contraseña.php?token=$token'>Restablecer contraseña</a>";
            $mail->AltBody = "Haz clic en el siguiente enlace para restablecer tu contrasena de TourPeople: http://localhost/sitio_responsivo_mvcPRICA11/sitio_responsivo_mvc/vista/nueva_contraseña.php?token=$token";
            
            $mail->send();
            echo '<script>
                Swal.fire("Éxito", "El correo de recuperación ha sido enviado", "success")
                .then(() => { window.location.href = "../view/principal.php"; });
            </script>';
        } catch (Exception $e) {
            echo '<script>Swal.fire("Error", "El mensaje no pudo ser enviado. Error: ' . $mail->ErrorInfo . '", "error");</script>';
        }
    } else {
        echo '<script>Swal.fire("Error", "El correo no existe en nuestros registros", "error");</script>';
    }
}
?>