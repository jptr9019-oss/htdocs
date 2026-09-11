<?php
    require_once "models/produto.php";

    $produto = new produto();
    $produto->setId(3);
    $produto->delete();
?>