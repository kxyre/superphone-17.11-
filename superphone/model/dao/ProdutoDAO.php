
<?php
class produtoDAO {

    public function create($produto) {
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO produto(descricao, preco, marca, modelo, idtipoProduto)
                VALUES (:d, :p, :m, :o, :t)"
            );

            $query->bindValue(':d', $produto->getDescricao(), PDO::PARAM_STR);
            $query->bindValue(':p', $produto->getPreco());
            $query->bindValue(':m', $produto->getMarca(), PDO::PARAM_STR);
            $query->bindValue(':o', $produto->getModelo(), PDO::PARAM_STR);
            $query->bindValue(':t', $produto->getTipoProduto()->getId(), PDO::PARAM_INT);

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }
        }
        catch(PDOException $e) {
            echo "Erro #1: " . $e->getMessage();
        }
    }

    public function read() {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM produto");

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

            $listaProdutos = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $produto = new Produto();

                $produto->setId($linha['idProduto']);
                $produto->setDescricao($linha['descricao']);
                $produto->setPreco($linha['preco']);
                $produto->setMarca($linha['marca']);
                $produto->setModelo($linha['modelo']);

                $daoTipoProduto = new tipoProdutoDAO();
                $tipoProduto = $daoTipoProduto->find($linha['idtipoProduto']);

                $produto->setTipoProduto($tipoProduto);

                array_push($listaProdutos, $produto);
            }

            return $listaProdutos;
        }
        catch(PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
        }
    }

    public function find($id) {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM produto WHERE idProduto = :i"
            );

            $query->bindValue(':i', $id, PDO::PARAM_INT);

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

            $produto = null;

            if ($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                $produto = new Produto();

                $produto->setId($linha['idProduto']);
                $produto->setDescricao($linha['descricao']);
                $produto->setPreco($linha['preco']);
                $produto->setMarca($linha['marca']);
                $produto->setModelo($linha['modelo']);

                $daoTipoProduto = new tipoProdutoDAO();
                $tipoProduto = $daoTipoProduto->find($linha['idtipoProduto']);

                $produto->setTipoProduto($tipoProduto);
            }

            return $produto;
        }
        catch(PDOException $e) {
            echo "Erro #3: " . $e->getMessage();
        }
    }

    public function update($produto) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE produto
                SET descricao = :d,
                    preco = :p,
                    marca = :m,
                    modelo = :o,
                    idtipoProduto = :t
                WHERE idProduto = :i"
            );

            $query->bindValue(':d', $produto->getDescricao(), PDO::PARAM_STR);
            $query->bindValue(':p', $produto->getPreco());
            $query->bindValue(':m', $produto->getMarca(), PDO::PARAM_STR);
            $query->bindValue(':o', $produto->getModelo(), PDO::PARAM_STR);
            $query->bindValue(':t', $produto->getTipoProduto()->getId(), PDO::PARAM_INT);
            $query->bindValue(':i', $produto->getId(), PDO::PARAM_INT);

            if (!$query->execute()) {
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
                "DELETE FROM produto WHERE idProduto = :i"
            );

            $query->bindValue(':i', $id, PDO::PARAM_INT);

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }
        }
        catch(PDOException $e) {
            echo "Erro #5: " . $e->getMessage();
        }
    }
}
?>
