
<?php
    require "../../autoload.php";

    $tipoProduto = new tipoProduto();

    $tipoProduto->setId($_POST['id']);
    $tipoProduto->setDescricao($_POST['descricao']);

    $dao = new tipoProdutoDAO();
    $dao->update($tipoProduto);

    header('Location: index.php');
    exit;
