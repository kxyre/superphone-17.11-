
<?php
require "../../autoload.php";

$dao = new CompradorDAO();
$lista = $dao->read();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compradores | Super-Phone</title>

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
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            position: relative;
            z-index: 2;
        }

        .logo {
            color: #e85d9e;
            font-size: 22px;
            font-weight: bold;
        }

        .layout {
            display: flex;
            align-items: stretch;
            width: 100%;
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
            padding: 35px;
            background: #fff8fb;
        }

        .cabecalho-pagina {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 15px;
            flex-wrap: wrap;
        }

        .titulo {
            color: #d83f83;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .subtitulo {
            color: #888;
            margin: 0;
            font-size: 15px;
        }

        .btn-cadastrar {
            background: #e85d9e;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 19px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-cadastrar:hover {
            background: #c83f80;
            color: white;
        }

        .card-tabela {
            background: white;
            border-radius: 15px;
            padding: 23px;
            box-shadow: 0 4px 15px rgba(200, 63, 128, 0.06);
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #fff0f7;
            color: #d83f83;
            font-weight: 600;
            border-bottom: 2px solid #f5b9d4;
            padding: 15px;
        }

        .table tbody td {
            padding: 14px;
            border-bottom: 1px solid #f8dce9;
            color: #444;
            vertical-align: middle;
        }

        .acoes {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-acao {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-editar {
            background: #fff0f7;
            color: #e83e8c;
        }

        .btn-editar:hover {
            background: #f9d5e6;
            color: #c83f80;
        }

        .btn-excluir {
            background: #ffeded;
            color: #dc3545;
        }

        .btn-excluir:hover {
            background: #f8d0d0;
            color: #b02a37;
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

            .titulo {
                font-size: 23px;
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

        <div class="cabecalho-pagina">

            <div>
                <h2 class="titulo">
                    <i class="bi bi-people-fill"></i>
                    Gerenciamento de Compradores
                </h2>

                <p class="subtitulo">
                    Consulte, cadastre, edite e exclua os compradores.
                </p>
            </div>

            <a href="create.php" class="btn-cadastrar">
                <i class="bi bi-plus-circle"></i>
                Cadastrar Comprador
            </a>

        </div>

        <div class="card-tabela">

            <div class="table-responsive">
                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($lista as $comprador) { ?>

                            <tr>
                                <td>
                                    <?= $comprador->getId(); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($comprador->getNome()); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($comprador->getCpf()); ?>
                                </td>

                                <td>
                                    <div class="acoes">

                                        <a href="edit.php?id=<?= $comprador->getId(); ?>"
                                           class="btn-acao btn-editar"
                                           title="Editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <a href="destroy.php?id=<?= $comprador->getId(); ?>"
                                           class="btn-acao btn-excluir"
                                           title="Excluir"
                                           onclick="return confirm('Deseja realmente excluir este comprador?');">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>

                        <?php } ?>

                        <?php if (empty($lista)) { ?>

                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    Nenhum comprador cadastrado.
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>
            </div>

        </div>

    </main>

</div>

<script src="../../js/bootstrap.bundle.min.js"></script>

</body>
</html>
