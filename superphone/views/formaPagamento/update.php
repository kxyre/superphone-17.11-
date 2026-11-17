<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe comprador (bean)
    $formaPagamento = new formaPagamento();

    // Definir os valores dos atributos a partir dos dados do form
    $formaPagamento->setId($_POST['idformaPagamento']);
    $formaPagamento->setDescricao($_POST['descricao']);

    // Instanciar um objeto da classe compradorDAO
    $dao = new formaPagamentoDAO();

    // Invocar o método update da classe compradorDAO
    $dao->update($formaPagamento);

    // Redirecionar para o index
    header('Location: index.php');