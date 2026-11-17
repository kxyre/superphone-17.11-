
<?php
require "../../autoload.php";

$dao = new formaPagamentoDAO();
$formaPagamento = $dao->find($_GET['id']);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Forma de Pagamento - Super-Phone</title>

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

        h2 {
            color: #c83f80;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .card-formulario {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 3px 15px #0000000d;
            max-width: 650px;
        }

        .form-label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px;
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

            <h2>
                <i class="bi bi-pencil-square"></i>
                Editar Forma de Pagamento
            </h2>

            <div class="card-formulario">

                <form action="update.php" method="post">

                    <input type="hidden" name="idformaPagamento"
                        value="<?= htmlspecialchars($formaPagamento->getId()) ?>">

                    <div class="mb-4">
                        <label for="descricao" class="form-label">
                            Descrição
                        </label>

                        <input
                            type="text"
                            name="descricao"
                            id="descricao"
                            class="form-control"
                            value="<?= htmlspecialchars($formaPagamento->getDescricao()) ?>"
                            placeholder="Digite a descrição da forma de pagamento"
                            required
                        >
                    </div>

                    <div class="d-flex gap-2 flex-wrap">

                        <a href="index.php" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Voltar
                        </a>

                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="bi bi-eraser"></i> Limpar
                        </button>

                        <button type="submit" class="btn btn-rosa">
                            <i class="bi bi-check-circle"></i> Salvar Alterações
                        </button>

                    </div>

                </form>

            </div>

        </main>

    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>

</body>
</html>