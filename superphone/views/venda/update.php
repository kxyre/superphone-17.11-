
<?php
require "../../autoload.php";

$venda = new Venda();

$venda->setId($_POST['id']);
$venda->setData($_POST['data']);
$venda->setValorTotal($_POST['valorTotal']);

$formaPagamento = new formaPagamento();
$formaPagamento->setId($_POST['formaPagamento']);

$venda->setFormaPagamento($formaPagamento);

$comprador = new Comprador();
$comprador->setId($_POST['idPessoa']);

$venda->setComprador($comprador);

$dao = new VendaDAO();
$dao->update($venda, $_POST['produtos']);

header('Location: index.php');
?>
