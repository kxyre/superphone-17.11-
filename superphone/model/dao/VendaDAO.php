
<?php
class VendaDAO {

    public function create($venda, $produtos) {
        $conexao = BD::getConexao();

        try {
            $conexao->beginTransaction();

            $query = $conexao->prepare(
                "INSERT INTO venda(data, valorTotal, idformaPagamento, idPessoa)
                VALUES (:d, :v, :f, :p)"
            );

            $query->bindValue(':d', $venda->getData(), PDO::PARAM_STR);
            $query->bindValue(':v', $venda->getValorTotal());
            $query->bindValue(':f', $venda->getFormaPagamento()->getId(), PDO::PARAM_INT);
            $query->bindValue(':p', $venda->getComprador()->getId(), PDO::PARAM_INT);

            $query->execute();

            // Recupera o ID da venda cadastrada
            $idVenda = $conexao->lastInsertId();

            // Prepara o cadastro dos produtos
            $queryProduto = $conexao->prepare(
                "INSERT INTO Venda_has_Produto(idVenda, idProduto)
                VALUES (:v, :p)"
            );

            foreach ($produtos as $idProduto) {
                $queryProduto->bindValue(':v', $idVenda, PDO::PARAM_INT);
                $queryProduto->bindValue(':p', $idProduto, PDO::PARAM_INT);
                $queryProduto->execute();
            }

            $conexao->commit();

        }
        catch(PDOException $e) {
            if ($conexao->inTransaction()) {
                $conexao->rollBack();
            }

            echo "Erro ao cadastrar venda: " . $e->getMessage();
        }
    }

    public function read() {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM venda");

            $query->execute();

            $listavenda = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {

                $venda = new venda();

                $venda->setId($linha['idVenda']);
                $venda->setData($linha['data']);
                $venda->setValorTotal($linha['valorTotal']);

                $daoformaPagamento = new formaPagamentoDAO();
                $formaPagamento = $daoformaPagamento->find($linha['idformaPagamento']);

                $venda->setFormaPagamento($formaPagamento);

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
            $query = BD::getConexao()->prepare(
                "SELECT * FROM venda WHERE idVenda = :i"
            );

            $query->bindValue(':i', $id, PDO::PARAM_INT);
            $query->execute();

            if ($linha = $query->fetch(PDO::FETCH_ASSOC)) {

                $venda = new venda();

                $venda->setId($linha['idVenda']);
                $venda->setData($linha['data']);
                $venda->setValorTotal($linha['valorTotal']);

                $daoformaPagamento = new formaPagamentoDAO();
                $formaPagamento = $daoformaPagamento->find($linha['idformaPagamento']);

                $venda->setFormaPagamento($formaPagamento);

                $daoComprador = new CompradorDAO();
                $comprador = $daoComprador->find($linha['idPessoa']);

                $venda->setComprador($comprador);

                return $venda;
            }

            return null;

        }
        catch(PDOException $e) {
            echo "Erro #3: " . $e->getMessage();
        }
    }

    // Busca os produtos que pertencem a uma venda
    public function getProdutosIds($idVenda) {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT idProduto
                FROM Venda_has_Produto
                WHERE idVenda = :v"
            );

            $query->bindValue(':v', $idVenda, PDO::PARAM_INT);
            $query->execute();

            $produtos = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $produtos[] = $linha['idProduto'];
            }

            return $produtos;

        }
        catch(PDOException $e) {
            echo "Erro ao buscar produtos da venda: " . $e->getMessage();
            return array();
        }
    }

    public function update($venda, $produtos) {
        $conexao = BD::getConexao();

        try {
            $conexao->beginTransaction();

            $query = $conexao->prepare(
                "UPDATE venda
                SET data = :d,
                    valorTotal = :v,
                    idformaPagamento = :f,
                    idPessoa = :p
                WHERE idVenda = :i"
            );

            $query->bindValue(':d', $venda->getData(), PDO::PARAM_STR);
            $query->bindValue(':v', $venda->getValorTotal());
            $query->bindValue(':f', $venda->getFormaPagamento()->getId(), PDO::PARAM_INT);
            $query->bindValue(':p', $venda->getComprador()->getId(), PDO::PARAM_INT);
            $query->bindValue(':i', $venda->getId(), PDO::PARAM_INT);

            $query->execute();

            // Remove os relacionamentos antigos
            $queryDelete = $conexao->prepare(
                "DELETE FROM Venda_has_Produto
                WHERE idVenda = :v"
            );

            $queryDelete->bindValue(':v', $venda->getId(), PDO::PARAM_INT);
            $queryDelete->execute();

            // Cadastra novamente os produtos selecionados
            $queryProduto = $conexao->prepare(
                "INSERT INTO Venda_has_Produto(idVenda, idProduto)
                VALUES (:v, :p)"
            );

            foreach ($produtos as $idProduto) {
                $queryProduto->bindValue(':v', $venda->getId(), PDO::PARAM_INT);
                $queryProduto->bindValue(':p', $idProduto, PDO::PARAM_INT);
                $queryProduto->execute();
            }

            $conexao->commit();

        }
        catch(PDOException $e) {
            if ($conexao->inTransaction()) {
                $conexao->rollBack();
            }

            echo "Erro #4: " . $e->getMessage();
        }
    }

    public function destroy($id) {
        $conexao = BD::getConexao();

        try {
            $conexao->beginTransaction();

            // Exclui primeiro os relacionamentos
            $query = $conexao->prepare(
                "DELETE FROM Venda_has_Produto WHERE idVenda = :i"
            );

            $query->bindValue(':i', $id, PDO::PARAM_INT);
            $query->execute();

            // Depois exclui a venda
            $query = $conexao->prepare(
                "DELETE FROM venda WHERE idVenda = :i"
            );

            $query->bindValue(':i', $id, PDO::PARAM_INT);
            $query->execute();

            $conexao->commit();

        }
        catch(PDOException $e) {
            if ($conexao->inTransaction()) {
                $conexao->rollBack();
            }

            echo "Erro #5: " . $e->getMessage();
        }
    }

}
