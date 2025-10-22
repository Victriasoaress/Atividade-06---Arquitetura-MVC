<?php
require_once 'ProdutoController.php';

$controller = new ProdutoController();

$acao = $_GET['acao'] ?? 'index';

if (method_exists($controller, $acao)) {
    $controller->$acao();
} else {
    echo "Ação inválida!";
}
