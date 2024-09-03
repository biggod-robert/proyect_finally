<?php
require_once 'BdConect.php';

class User
{
    public $id_documento;
    public $nombre_p;
    public $apellido_p;
    public $correo;
    public $edad;
    public $f_nacimiento;
    public $telefono;
    public $id_categoria;
    public $foto_perfil;

    public static function authenticate($correo, $clave)
    {
        // Conectar a la base de datos
        $db = conexionBD::getInstance()->getConnection();

        // Preparar la consulta
        $stmt = $db->prepare("SELECT id_documento, nombre_p, id_categoria, correo, clave  FROM usuarios WHERE correo = :correo");
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        /*echo '<pre>';
        var_dump($user);
        echo '</pre>';
        exit;*/


        // Verificar la contraseña
        if ($user && password_verify($clave, $user->clave)) {
            // Retornar el objeto User con propiedades id_documento y id_categoria
            $authenticatedUser = new User();
            $authenticatedUser->id_documento = $user->id_documento;
            $authenticatedUser->id_categoria = $user->id_categoria;
            $authenticatedUser->nombre_p = $user->nombre_p;
            $authenticatedUser->correo = $user->correo;
            $authenticatedUser->clave = $user->clave;

            return $authenticatedUser;
        } else {
            return false;
        }
    }

    public static function getAllUsers()
    {
        $db = conexionBD::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT id_documento, nombre_p, apellido_p, correo, id_categoria FROM usuarios");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUserById($id) {
        $db = conexionBD::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE id_documento = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateProfile($id, $nombre, $apellido, $correo, $edad, $fecha_nacimiento, $telefono) {
        $db = conexionBD::getInstance()->getConnection();
        $stmt = $db->prepare("UPDATE usuarios SET nombre_p = :nombre, apellido_p = :apellido, correo = :correo, edad = :edad, f_nacimiento = :fecha_nacimiento, telefono = :telefono WHERE id_documento = :id");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function updateProfilePhoto($id, $photoPath) {
        $db = conexionBD::getInstance()->getConnection();
        $stmt = $db->prepare("UPDATE usuarios SET foto_perfil = :foto WHERE id_documento = :id");
        $stmt->bindParam(':foto', $photoPath);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function registrar($documento, $nombre, $apellido, $correoUsuario, $clave, $edad, $fecha_nacimiento, $telefono)
    {
        $db = conexionBD::getInstance()->getConnection();

        $sql = "INSERT INTO usuarios (id_documento, id_categoria, nombre_p, apellido_p, correo, clave, edad, f_nacimiento, telefono) 
                VALUES (:documento, :id_categoria, :nombre, :apellido, :correoUsuario, :clave, :edad, :fecha_nacimiento, :telefono)";

        $stmt = $db->prepare($sql);

        // Encriptar la clave antes de guardarla en la base de datos
        $hashedPassword = password_hash($clave, PASSWORD_DEFAULT);

        $id_categoria = 2; // Por defecto, se asigna como usuario regular

        $stmt->bindParam(':documento', $documento);
        $stmt->bindParam(':id_categoria', $id_categoria);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':correoUsuario', $correoUsuario);
        $stmt->bindParam(':clave', $hashedPassword);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':telefono', $telefono);


        if ($stmt->execute()) {
            header("Location: ../vista/USUARIO/seccion1.php");
            exit();
        } else {
            die('Error al registrar el usuario.');
        }
    }
}

