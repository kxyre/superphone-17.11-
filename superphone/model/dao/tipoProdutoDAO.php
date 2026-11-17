<?php
    class tipoProdutoDAO {
        public function create($tipoProduto) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO tipoProduto(descricao) 
                    VALUES (:d)"
                );
                $query->bindValue(':d', $tipoProduto->getDescricao(), PDO::PARAM_STR);
                

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM tipoProduto");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listatipoProdutos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $tipoProduto = new tipoProduto(); // Classe bean
                    $tipoProduto->setId($linha['idtipoProduto']);
                    $tipoProduto->setDescricao($linha['descricao']);
                    
                    array_push($listatipoProdutos, $tipoProduto);
                }
                
                return $listatipoProdutos;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM tipoProduto WHERE idtipoProduto = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $tipoProduto = new tipoProduto(); // Classe bean
                    $tipoProduto->setId($linha['idtipoProduto']);
                    $tipoProduto->setDescricao($linha['descricao']);                    
                }
                
                return $tipoProduto;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }

        public function update($tipoProduto) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE tipoProduto
                    SET descricao = :d
                    WHERE id_tipoProduto = :i"
                );
                $query->bindValue(':d', $tipoProduto->getDescricao(), PDO::PARAM_STR);                
                $query->bindValue(':i', $tipoProduto->getId(), PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM tipoProduto
                    WHERE idtipoProduto = :i"
                );                
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }