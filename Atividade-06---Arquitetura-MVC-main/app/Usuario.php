<?php
require_once __DIR__ . '/../../database.php';

class Usuario {
    public static function autenticar($username, $password) {
        $usuario = Database::buscarUsuario($username);
        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }
        return false;
    }
}
?>