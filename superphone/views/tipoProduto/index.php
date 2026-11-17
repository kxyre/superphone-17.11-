
<?php
    // Incluir o arquivo para carregamento das classes
    require "../../autoload.php";

    // Instanciar um objeto da classe DAO
    $dao = new tipoProdutoDAO();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Produto | Super-Phone</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

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
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            position: relative;
            z-index: 10;
        }

        .logo {
            color: #e85d9e;
            font-size: 23px;
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
            padding: 40px;
            background: #fff8fb;
        }

        .cabecalho-conteudo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        .titulo {
            color: #c83f80;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .subtitulo {
            color: #888;
            margin: 0;
        }

        .btn-cadastrar {
            background: #e85d9e;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 11px 20px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
        }

        .btn-cadastrar:hover {
            background: #c83f80;
            color: white;
        }

        .card-tabela {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(200, 63, 128, 0.08);
        }

        .table {
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table thead th {
            background: #fff0f7;
            color: #c83f80;
            border-bottom: 2px solid #f0c4da;
            padding: 15px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 15px;
            color: #555;
            border-color: #f8e4ed;
        }

        .table tbody tr:hover {
            background: #fff8fb;
        }

        .acoes {
            display: flex;
            gap: 8px;
        }

        .btn-editar {
            background: #fff0f7;
            color: #c83f80;
            border: none;
            border-radius: 7px;
            padding: 7px 11px;
            text-decoration: none;
        }

        .btn-editar:hover {
            background: #f8d5e6;
            color: #a52f68;
        }

        .btn-excluir {
            background: #ffecec;
            color: #d9534f;
            border: none;
            border-radius: 7px;
            padding: 7px 11px;
            text-decoration: none;
        }

        .btn-excluir:hover {
            background: #f8d0d0;
            color: #b52b27;
        }

        .vazio {
            text-align: center;
            color: #999;
            padding: 30px !important;
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

            .cabecalho-conteudo {
                align-items: flex-start;
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

            <div class="cabecalho-conteudo">

                <div>
                    <h2 class="titulo">
                        <i class="bi bi-tags-fill"></i>
                        Gerenciamento de Tipos de Produto
                    </h2>

                    <p class="subtitulo">
                        Consulte, cadastre, edite e exclua os tipos de produtos.
                    </p>
                </div>

                <a href="create.php" class="btn-cadastrar">
                    <i class="bi bi-plus-circle"></i>
                    Cadastrar Tipo
                </a>

            </div>

            <div class="card-tabela">

                <div class="table-responsive">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach($dao->read() as $tipoProduto) : ?>

                                <tr>
                                    <td>
                                        <?= htmlspecialchars($tipoProduto->getId()) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($tipoProduto->getDescricao()) ?>
                                    </td>

                                    <td>
                                        <div class="acoes">

                                            <a
                                                href="edit.php?id=<?= urlencode($tipoProduto->getId()) ?>"
                                                class="btn-editar"
                                                title="Editar"
                                            >
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <a
                                                href="destroy.php?id=<?= urlencode($tipoProduto->getId()) ?>"
                                                class="btn-excluir"
                                                title="Excluir"
                                                onclick="return confirm('Tem certeza que deseja excluir este tipo de produto?')"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>

                            <?php endforeach ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>

</body>
</html>
