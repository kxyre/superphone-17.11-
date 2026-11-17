<?php
require "../../autoload.php";

$produto = new Produto();

$produto->setId($_POST['id']);
$produto->setDescricao($_POST['descricao']);
$produto->setPreco($_POST['preco']);
$produto->setMarca($_POST['marca']);
$produto->setModelo($_POST['modelo']);

$tipoProduto = new tipoProduto();
$tipoProduto->setId($_POST['tipoProduto']);

$produto->setTipoProduto($tipoProduto);

$dao = new produtoDAO();
$dao->update($produto);

header('Location: index.php');
exit;