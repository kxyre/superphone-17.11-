<?php
    class VendaDAO {

        public function create($venda) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO venda(data, valorTotal, idformaPagamento, idPessoa) 
                    VALUES (:d, :v, :f, :p)"
                );
                $query->bindValue(':d', $venda->getData(), PDO::PARAM_STR);
                $query->bindValue(':v', $venda->getValorTotal(), PDO::PARAM_STR);
                $query->bindValue(':f', $venda->getFormaPagamento()->getId(), PDO::PARAM_INT);
                $query->bindValue(':p', $venda->getComprador()->getId(), PDO::PARAM_INT);
                

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
                $query = BD::getConexao()->prepare("SELECT * FROM venda");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listavenda = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $venda = new venda(); // Classe bean

                    $venda->setId($linha['idVenda']);
                    $venda->setData($linha['data']);
                    $venda->setValorTotal($linha['valorTotal']);

                    $daoformaPagamento = new formaPagamentoDAO();
                    $formaPagamento = $daoformaPagamento->find($linha['idformaPagamento']);

                    $venda->setformaPagamento($formaPagamento);

                    $daoComprador = new CompradorDAO();
                    $comprador = $daoComprador->find($linha['idPessoa']);

                    $venda->setComprador($comprador);
                  
                    array_push($listavenda, $venda);
                }
                
                return $listavenda;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }

         public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM venda WHERE idVenda = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                 if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $venda = new venda(); // Classe bean

                    $venda->setId($linha['idVenda']);
                    $venda->setdata($linha['data']);
                    $venda->setvalorTotal($linha['valorTotal']);

                    $daoformaPagamento = new formaPagamentoDAO();
                    $formaPagamento = $daoformaPagamento->find($linha['idformaPagamento']);

                    $venda->setFormaPagamento($formaPagamento);

                    $daoComprador = new CompradorDAO();
                    $comprador = $daoComprador->find($linha['idPessoa']);

                    $venda->setComprador($comprador);
                }
                
                return $venda;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }
        public function update($venda) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE venda
                     SET data = :d, valorTotal= :v, idformaPagamento= :f, idPessoa= :p;
                     WHERE idVenda = :i" 
            
                );
                 $query->bindValue(':d', $venda->getData(), PDO::PARAM_STR);
                 $query->bindValue(':v', $venda->getValorTotal(), PDO::PARAM_STR);
                 $query->bindValue(':f', $venda->getFormaPagamento()->getId(), PDO::PARAM_INT);
                 $query->bindValue(':p', $venda->getComprador()->getId(), PDO::PARAM_INT);
                 $query->bindValue(':i', $venda->getId(), PDO::PARAM_INT);
                

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
                    "DELETE FROM venda WHERE idVenda = :i" 
            
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