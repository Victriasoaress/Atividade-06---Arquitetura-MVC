<?php
require_once 'Produto.php';

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
}
