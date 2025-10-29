<?php session_start(); ?>
<a href="app/views/login.php">Login</a> |
<?php if (isset($_SESSION['usuario'])): ?>
    <a href="app/controllers/AuthController.php?acao=logout">Logout</a>
<?php endif; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Produtos</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { width: 50%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #eee; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>
    <h1>Catálogo de Produtos</h1>

    <a href="index.php?acao=novo">Adicionar Novo Produto</a><br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço (R$)</th>
        </tr>
        <?php foreach ($produtos as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['nome']) ?></td>
            <td><?= number_format($p['peco'] ?? 0, 2, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
