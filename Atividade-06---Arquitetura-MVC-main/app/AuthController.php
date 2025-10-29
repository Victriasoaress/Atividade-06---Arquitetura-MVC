<?php
require_once __DIR__ . '/../models/Usuario.php';

class AuthController {
    public function login() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $usuario = Usuario::autenticar($username, $password);

            if ($usuario) {
                $_SESSION['usuario'] = $usuario;
                header('Location: ../index.php');
                exit;
            } else {
                $erro = "Usuário ou senha inválidos!";
                require __DIR__ . '/../views/login.php';
            }
        } else {
            require __DIR__ . '/../views/login.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ../index.php');
        exit;
    }
}
?>