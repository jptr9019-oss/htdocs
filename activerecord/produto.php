<?php
    class Produto {
        private $id;
        private $nome;
        private $preco;
        private $descricao;
        private $quantidade;

        private $pdo;

        public function __construct(PDO $pdo){
            $this->pdo = $pdo;
        }

        public function getId(){
            return $this->$id;
        }
        public function getNome(){
            return $this->$nome;
        }
        public function getPreco(){
            return $this->$preco;
        }
        public function getDescricao(){
            return $this->$descricao;
        }
        public function getQuantidade(){
            return $this->$quantidade;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setPreco($preco){
            $this->preco = $preco;
        }
        public function setNome($descricao){
            $this->descricao = $descricao;
        }
        public function setNome($quantidade){
            $this->quantidade = $quantidade;
        }

        public function save(){
            if ($this->id){
                $sql = "UPDATE produto SET nome=:n, preco=:p, descricao=:d, quantidade=:q WHERE id=:id";
                $stmt = $this->pdo->prepare($sql);
                return $stmt->execute([
                    ':n' => $this->nome,
                    ':p' => $this->preco,
                    ':d' => $this->descricao,
                    ':q' => $this->quantidade
                ]);
            }
        }
    }
?>