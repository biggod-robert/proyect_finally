<?php
require_once 'BdConect.php';
class UserModel {
    private $db;

    public function __construct() {
        $this->db = conexionBD::getConnection(); // Usa la conexión desde tu clase de conexión
    }

    public function getAllUsers() {
        try {
            $query = $this->conn->query("SELECT * FROM usuarios");
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            var_dump($result); // Para ver la salida en bruto de la consulta
            return $result;
        } catch (PDOException $e) {
            echo "Error al obtener usuarios: " . $e->getMessage();
            return [];
        }
    }
}
?>