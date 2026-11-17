<?php
    require "../../autoload.php";

    // Verificar se o ID foi informado pela URL
    if (!isset($_GET['id'])) {
        header('Location: index.php');
        exit;
    }

    // Pegar o ID do comprador
    $id = $_GET['id'];

    // Criar o objeto DAO
    $dao = new CompradorDAO();

    // Excluir o comprador
    $dao->destroy($id);

    // Voltar para a listagem de compradores
    header('Location: index.php');
    exit;
?>