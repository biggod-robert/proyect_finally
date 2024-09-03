<?php
$status = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $host = $_POST['servidor'];
    $username = $_POST['usuario'];
    $password = $_POST['password'];
    $dbname = $_POST['nombre_bd'];

    try {
        // Crear conexión
        $dsn = "mysql:servidor=$host;nombre_bd=$dbname";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Crear base de datos si no existe
        $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");

        // Seleccionar la base de datos
        $conn->exec("USE $dbname");

        // Leer el archivo SQL
        $dumpFile = '../BaseDatos/Tour_people.sql';
        $queries = file_get_contents($dumpFile);
        if ($queries === false) {
            $status = "Error al leer el archivo SQL.";
        } else {
            // Dividir el contenido en consultas
            $queries = explode(';', $queries);

            // Ejecutar las consultas
            foreach ($queries as $query) {
                $query = trim($query);
                if (!empty($query)) {
                    $conn->exec($query);
                }
            }

            // Insertar usuario admin
            $adminPassword = password_hash('Tour2024', PASSWORD_DEFAULT);
            

            // Actualizar el archivo de conexión
            $conexionFile = '../modelo/BdConect.php';
            $conexionContent = "<?php\n";
            $conexionContent .= "class conexionBD {\n";
            $conexionContent .= "    private static \$instance = null;\n";
            $conexionContent .= "    private static \$conn;\n";
            $conexionContent .= "    private static \$servidor = '$host';\n";
            $conexionContent .= "    private static \$namedb = '$dbname';\n";
            $conexionContent .= "    private static \$username = '$username';\n";
            $conexionContent .= "    private static \$password = '$password';\n";
            $conexionContent .= "    private function __construct() {}\n";
            $conexionContent .= "    public static function getInstance() {\n";
            $conexionContent .= "        if (!self::\$instance) {\n";
            $conexionContent .= "            try {\n";
            $conexionContent .= "                self::\$conn = new PDO(\"mysql:host=\" . self::\$servidor . \";dbname=\" . self::\$namedb, self::\$username, self::\$password);\n";
            $conexionContent .= "                self::\$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);\n";
            $conexionContent .= "                self::\$instance = new self();\n";
            $conexionContent .= "            } catch (PDOException \$e) {\n";
            $conexionContent .= "                echo \"Connection error: \" . \$e->getMessage();\n";
            $conexionContent .= "            }\n";
            $conexionContent .= "        }\n";
            $conexionContent .= "        return self::\$instance;\n";
            $conexionContent .= "    }\n";
            $conexionContent .= "    public static function getConnection() {\n";
            $conexionContent .= "        if (!self::\$conn) {\n";
            $conexionContent .= "            try {\n";
            $conexionContent .= "                self::\$conn = new PDO(\"mysql:host=\" . self::\$servidor . \";dbname=\" . self::\$namedb, self::\$username, self::\$password);\n";
            $conexionContent .= "                self::\$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);\n";
            $conexionContent .= "            } catch (PDOException \$e) {\n";
            $conexionContent .= "                echo \"Connection error: \" . \$e->getMessage();\n";
            $conexionContent .= "            }\n";
            $conexionContent .= "        }\n";
            $conexionContent .= "        return self::\$conn;\n";
            $conexionContent .= "    }\n";
            $conexionContent .= "}\n";
            $conexionContent .= "?>";

            if (file_put_contents($conexionFile, $conexionContent) === false) {
                $status = "Error al actualizar el archivo de conexión.";
            } else {
                $status = "Base de datos configurada y archivo de conexión actualizado.";
            }
        }
    } catch (PDOException $e) {
        $status = "Error al conectar a la base de datos: " . $e->getMessage();
    }

    // Mostrar la alerta y redirigir
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Instalador de Base de Datos</title>
        <link rel='stylesheet' href='https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css'>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>
        <script>
            Swal.fire({
                title: '" . (strpos($status, "Error") === false ? "Éxito" : "Error") . "',
                text: '$status',
                icon: '" . (strpos($status, "Error") === false ? "success" : "error") . "'
            }).then(() => { window.location.href = '../vista/principal.php'; });
        </script>
    </body>
    </html>";
    exit();
}
