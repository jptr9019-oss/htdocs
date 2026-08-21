<?php
    require_once "produto.php";

    $produto = new produto();
    $produto->setId(3);
    $produto->delete();
?>