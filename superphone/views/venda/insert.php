<?php
require "../../autoload.php";

$venda = new Venda();

$venda->setData($_POST['data']);
$venda->setValorTotal($_POST['valorTotal']);

$formaPagamento = new formaPagamento();
$formaPagamento->setId($_POST['formaPagamento']);

$venda->setformaPagamento($formaPagamento);

$comprador = new Comprador();
$comprador->setId($_POST['idPessoa']);

$venda->setComprador($comprador);

$dao = new vendaDAO();
$dao->create($venda);

 header('Location: index.php');
exit;