<?php
// index.php
require_once "conexao.php";

// Captura o módulo e a ação (padrão: produto / listar)
$modulo = $_GET['modulo'] ?? 'produto';
$acao = $_GET['acao'] ?? 'listar';

// Define o nome da classe do Controller e o caminho do arquivo
$controllerNome = $modulo . "controller"; // Ex: Produto Controller
$arquivoController = "controllers/{$controllerNome}.php";

// Verifica se o controller existe
if (file_exists($arquivoController)) {
    require_once $arquivoController;
    $controller = new $controllerNome();

    // Verifica se a ação (método) existe dentro da classe
    if (method_exists($controller, $acao)) {
        $controller->$acao();
    } else {
        echo "Ação não encontrada!";
    }
} else {
    echo "Página não encontrada!";
}