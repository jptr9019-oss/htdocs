<?php

function getConnection(){

    $host    = 'localhost';
    $db      = 'loja_virtual';
    $user    = 'root';
    $pass    = '';
    try{
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,    PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }catch(PDOException $e){
        die("Deu problema na conexao");
    }
}

try {

    $pdo = getConnection();


    $sql = "INSERT INTO produto (nome, preco, descricao, quantidade) 
            VALUES (:nome, :preco, :descricao, :quantidade)";

    $stmt = $pdo->prepare($sql);

    extract($_POST);//CONVERTE O POST PARA VARIAVEIS

    $preco = str_replace(',', '.', $preco);
    $quantidade = str_replace(',', '.', $quantidade);
    if(!is_numeric($preco)){

        die("usuario do mal");
    }
    if(!is_numeric($quantidade)){

        die("usuario do mal");
    }
    $stmt->execute([
        ":nome" => $nome,
        ":preco" => $preco,
        ":descricao" => $descricao,
        ":quantidade" => $quantidade
    ]);

    echo "Produto inserido com sucesso! ID: " . $pdo->lastInsertId();

} catch (\PDOException $e) {
    // Se algo der errado na conexão ou no insert, o erro será capturado aqui
    echo "Erro no banco de dados: " . $e->getMessage();
}
?>