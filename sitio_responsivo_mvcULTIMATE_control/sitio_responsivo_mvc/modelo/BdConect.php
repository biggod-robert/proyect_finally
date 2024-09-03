<?php
class conexionBD {
    private static $instance = null;
    private static $conn;

    private static $servidor = 'localhost';
    private static $namedb = 'Tour_people';
    private static $username = 'root';
    private static $password = '';

    private function __construct() {}

    public static function getInstance() {
        if (!self::$instance) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$servidor . ";dbname=" . self::$namedb, self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance = new self();
            } catch (PDOException $e) {
                echo "Connection error: " . $e->getMessage();
            }
        }
        return self::$instance;
    }

    public static function getConnection() {
        if (!self::$conn) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$servidor . ";dbname=" . self::$namedb, self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection error: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
}
