<?php
    require_once 'conexao.php';
    class Produto {
        private $id;
        private $nome;
        private $preco;
        private $descricao;
        private $quantidade;

        

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
            $pdo = getConnection();
            if ($this->id){
                $sql = "UPDATE produto SET nome=:n, preco=:p, descricao=:d, quantidade=:q WHERE id_prod=:id";
                $stmt = $pdo->prepare($sql);
                return $stmt->execute([
                    ':n' => $this->nome,
                    ':p' => $this->preco,
                    ':d' => $this->descricao,
                    ':q' => $this->quantidade
                ]);
            } else {
                $sql = "INSERT INTO produto (nome, preco, descricao, quantidade) VALUES (:n, :p, :d, :q)";
                $stmt = $pdo->prepare($sql);
                $ok = $stmt->execute([
                    ':n' => $this->nome,
                    ':p' => $this->preco,
                    ':d' => $this->descricao,
                    ':q' => $this->quantidade
                ]);
                if($ok){
                    $this->id = $this->pdo->lastInsertId();
                }
                return $ok;
            }
        }
        public function load($id){
            $pdo = getConnection();
            $stmt = $pdo->prepare("SELECT * FROM produto WHERE id_prod = :id");
            $stmt->execute([':id' => $id]);
            if($dados = $stmt->fetch(PDO::FETCH_ASSOC)){
                $this->id = $dados['id_prod'];
                $this->nome = $dados['nome'];
                $this->preco = $dados['preco'];
                $this->descricao = $dados['descricao'];
                $this->quantidade = $dados['quantidade'];
                return true;
            }
            return false;
        }
    }
?>