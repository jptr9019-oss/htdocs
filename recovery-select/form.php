<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    
        <form   action="produto.php" method="post" enctype="multipart/form-data">
            <label>
                Nome <input type="text" name=":nome_prod">
            </label>
            <label>
                Preço: <input type="text" name=":preco_prod" >
            </label>
            <label>
                Descrição: <input type="text" name=":descricao_prod" >
            </label>
            <label>
                Quantidade: <input type="text" name=":quantidade_prod" >
            </label>
            <button>Salvar</button>
        </form>

        <table border>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Quantidade</th>
            </tr>
            <?php

                // 1. Configurações do Banco de Dados
                $host = 'localhost';
                $db   = 'loja_virtual';
                $user = 'root';
                $pass = '';

                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);

                    $sql = "SELECT * FROM produto ORDER BY id DESC";
                    $stmt = $pdo->prepare($sql);

                    $stmt->execute();
                    $resultado = $stmt->fetchall();
                } catch (PDOException $e) {
                    // Caso dê algum erro na conexão ou na query
                    echo "Erro: " . $e->getMessage();
                }
    
                foreach($resultado as $produto):
            ?>
            <tr>
                <td>
                    <?= $produto['nome'] ?>
                </td>
                <td>
                    <?= $produto['preco'] ?>
                </td>
                <td>
                    <?= $produto['descricao'] ?>
                </td>
                <td>
                    <?= $produto['quantidade'] ?>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </table>

    </body>
</html>