
<?php
require "../../autoload.php";

if (empty($_POST['produtos']) || !is_array($_POST['produtos'])) {
    echo "<script>alert('Selecione pelo menos um produto!'); history.back();</script>";
    exit;
}

$venda = new Venda();

$venda->setData($_POST['data']);
$venda->setValorTotal($_POST['valorTotal']);

$formaPagamento = new formaPagamento();
$formaPagamento->setId($_POST['formaPagamento']);

$venda->setFormaPagamento($formaPagamento);

$comprador = new Comprador();
$comprador->setId($_POST['idPessoa']);

$venda->setComprador($comprador);

$dao = new VendaDAO();

$dao->create($venda, $_POST['produtos']);

header('Location: index.php');
exit;
