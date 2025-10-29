<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($erro)): ?>
        <p style="color: red;"><?= $erro ?></p>
    <?php endif; ?>
    <form method="POST" action="app/controllers/AuthController.php?acao=login">
        <label>Usuário:</label>
        <input type="text" name="username" required><br><br>
        <label>Senha:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>