<?php
    require_once "models/produto.php";

    class ProdutoController {
        private $model;

        public function listarTodos(){
            $model = new Produto();
            $produtos = $model->all();

            
        }
    }
?>