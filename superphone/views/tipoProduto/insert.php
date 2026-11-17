
<?php
    require "../../autoload.php";

    $tipoProduto = new tipoProduto();

    $tipoProduto->setDescricao($_POST['descricao']);

    $dao = new tipoProdutoDAO();
    $dao->create($tipoProduto);

    header('Location: index.php');
    exit;

