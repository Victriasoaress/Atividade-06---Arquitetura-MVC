<?php
require_once 'database.php';

class Produto {
    public static function listar() {
        $conn = Database::conectar();
        $stmt = $conn->prepare("SELECT * FROM produtos ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function adicionar($nome, $preco) {
        $conn = Database::conectar();
        $stmt = $conn->prepare("INSERT INTO produtos (nome, peco) VALUES (:nome, :peco)"); 
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':peco', $preco); 
        return $stmt->execute();
    }

    // Método para buscar usuário por nome de usuário
    public static function buscarUsuario($username) {
        $conn = Database::conectar();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
