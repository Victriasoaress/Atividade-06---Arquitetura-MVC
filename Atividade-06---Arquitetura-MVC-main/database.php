<?php
class Database {
    private static $host = 'localhost';
    private static $db   = 'catalogo';
    private static $user = 'root';
    private static $pass = '';
    private static $conn;

    public static function conectar() {
        if (!self::$conn) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$pass);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro de conexão: " . $e->getMessage());
            }
        }
        return self::$conn;
    }

    // New method to fetch user by username
    public static function buscarUsuario($username) {
        $conn = self::conectar();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
