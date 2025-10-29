<?php
require_once 'Produto.php';
session_start();

class ProdutoController {
    public function index() {
        $produtos = Produto::listar();
        require 'produtos.php';
    }

    public function novo() {
        require 'novo_produto.php';
    }

    public function salvar() {
        $nome = $_POST['nome'] ?? '';
        $preco = $_POST['preco'] ?? '';

        if ($nome && $preco) {
            Produto::adicionar($nome, $preco);
            header('Location: index.php');
        } else {
            echo "Preencha todos os campos!";
        }
    }

    public function editar($id) {
        $this->verificarLogin();
        $produto = Produto::buscarPorId($id);
        require 'editar.php';
    }

    public function atualizar($id) {
        $this->verificarLogin();
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        Produto::atualizar($id, $nome, $preco);
        header('Location: index.php');
    }

    public function excluir($id) {
        $this->verificarLogin();
        Produto::excluir($id);
        header('Location: index.php');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $usuario = Database::buscarUsuario($username);

            if ($usuario && password_verify($password, $usuario['password'])) {
                $_SESSION['usuario'] = $usuario['username'];
                header('Location: index.php');
            } else {
                echo "Usuário ou senha inválidos!";
            }
        } else {
            require 'login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?acao=login');
    }

    private function verificarLogin() {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php?acao=login');
            exit;
        }
    }
}
