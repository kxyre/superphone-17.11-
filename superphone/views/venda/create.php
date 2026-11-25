
<?php
require "../../autoload.php";

$tipoDao = new formaPagamentoDAO();
$tipos = $tipoDao->read();

$compradorDao = new CompradorDAO();
$compradores = $compradorDao->read();

$produtoDao = new produtoDAO();
$produtos = $produtoDao->read();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar venda - Super-Phone</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            margin: 0;
            background: #fff8fb;
            font-family: Arial, sans-serif;
        }

        .topo {
            height: 65px;
            background: white;
            display: flex;
            align-items: center;
            padding: 0 30px;
            box-shadow: 0 2px 8px #00000010;
        }

        .logo {
            color: #c83f80;
            font-size: 23px;
            font-weight: bold;
        }

        .layout {
            display: flex;
            min-height: calc(100vh - 65px);
        }

        .layout .menu-lateral {
            flex: 0 0 250px;
            width: 250px;
            min-width: 250px;
            min-height: calc(100vh - 65px);
        }

        .conteudo {
            flex: 1;
            min-width: 0;
            padding: 40px;
        }

        .card-formulario {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 3px 15px #0000000d;
            max-width: 750px;
        }

        h2 {
            color: #c83f80;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: bold;
            color: #555;
        }

        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px;
        }

        .lista-produtos {
            border: 1px solid #f3c5da;
            border-radius: 10px;
            padding: 15px;
            max-height: 300px;
            overflow-y: auto;
        }

        .produto-item {
            padding: 10px;
            border-bottom: 1px solid #f8e1eb;
        }

        .produto-item:last-child {
            border-bottom: none;
        }

        .form-check-input:checked {
            background-color: #e85d9e;
            border-color: #e85d9e;
        }

        .btn-rosa {
            background: #e85d9e;
            color: white;
            border: none;
        }

        .btn-rosa:hover {
            background: #c83f80;
            color: white;
        }

        @media (max-width: 768px) {
            .layout {
                flex-direction: column;
            }

            .layout .menu-lateral {
                flex: 0 0 auto;
                width: 100%;
                min-width: 100%;
                min-height: auto;
            }

            .conteudo {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<header class="topo">
    <div class="logo">
        <i class="bi bi-phone"></i> Super-Phone
    </div>
</header>

<div class="layout">

    <?php include "../menu/navbar.php"; ?>

    <main class="conteudo">

        <h2><i class="bi bi-plus-circle"></i> Cadastrar venda</h2>

        <div class="card-formulario">

            <form action="insert.php" method="post">

                <div class="mb-3">
                    <label class="form-label">Data</label>
                    <input type="date" name="data" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Valor Total</label>
                    <input type="number" name="valorTotal" class="form-control"
                           step="0.01" min="0" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Forma de pagamento</label>

                    <select name="formaPagamento" class="form-select" required>
                        <option value="">Selecione uma forma de pagamento</option>

                        <?php foreach ($tipos as $tipo) { ?>
                            <option value="<?= $tipo->getId() ?>">
                                <?= htmlspecialchars($tipo->getDescricao()) ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Cliente</label>

                    <select name="idPessoa" class="form-select" required>
                        <option value="">Selecione um comprador</option>

                        <?php foreach ($compradores as $comprador) { ?>
                            <option value="<?= $comprador->getId() ?>">
                                <?= htmlspecialchars($comprador->getNome()) ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-box-seam"></i> Selecione os produtos
                    </label>

                    <p class="text-muted small">
                        Você pode selecionar mais de um produto para esta venda.
                    </p>

                    <div class="lista-produtos">

                        <?php foreach ($produtos as $produto) { ?>

                            <div class="produto-item">
                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="produtos[]"
                                        value="<?= $produto->getId() ?>"
                                        id="produto<?= $produto->getId() ?>"
                                    >

                                    <label class="form-check-label"
                                           for="produto<?= $produto->getId() ?>">

                                        <strong>
                                            <?= htmlspecialchars($produto->getDescricao()) ?>
                                        </strong>

                                        <br>

                                        <small class="text-muted">
                                            <?= htmlspecialchars($produto->getMarca()) ?>
                                            -
                                            <?= htmlspecialchars($produto->getModelo()) ?>
                                            | R$
                                            <?= number_format($produto->getPreco(), 2, ',', '.') ?>
                                        </small>

                                    </label>

                                </div>
                            </div>

                        <?php } ?>

                        <?php if (empty($produtos)) { ?>
                            <p class="text-muted text-center mb-0">
                                Nenhum produto cadastrado.
                            </p>
                        <?php } ?>

                    </div>
                </div>

                <a href="index.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>

                <button type="reset" class="btn btn-outline-secondary">
                    Limpar
                </button>

                <button type="submit" class="btn btn-rosa">
                    <i class="bi bi-check-circle"></i> Salvar
                </button>

            </form>

        </div>

    </main>
</div>

<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
