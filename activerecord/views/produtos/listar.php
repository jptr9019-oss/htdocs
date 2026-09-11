<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Lista de Produtos</title>
    </head>
    <body>
        <h1>Produtos</h1>
        <a href="index.php?modulo-produto&acao=criar">Novo Produto</a>
        <ul>
            <?php foreach ($produtos as $p): ?>
                <li>
                    <?= htmlspecialchars($p['nome']) ?> -
                    R$ <?= number_format($p['preco'], 2, ',', '.') ?> -
                    <?= htmlspecialchars($p['descricao']) ?> -
                    <?= number_format($p['quantidade'], 2, ',', '.') ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>