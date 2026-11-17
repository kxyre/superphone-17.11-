
<?php
    require "../../autoload.php";

    $dao = new tipoProdutoDAO();
    $tipoProduto = $dao->find($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo de Produto | Super-Phone</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * { box-sizing: border-box; }

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

        .titulo {
            color: #c83f80;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .subtitulo {
            color: #888;
            margin-bottom: 30px;
        }

        .card-formulario {
            background: white;
            border-radius: 15px;
            padding: 30px;
            max-width: 700px;
            box-shadow: 0 3px 15px rgba(200, 63, 128, 0.08);
        }

        .form-label {
            color: #555;
            font-weight: 600;
        }

        .form-control {
            border: 1px solid #f0c4da;
            border-radius: 8px;
            padding: 11px;
        }

        .form-control:focus {
            border-color: #e85d9e;
            box-shadow: 0 0 0 0.2rem rgba(232, 93, 158, 0.15);
        }

        .btn-salvar {
            background: #e85d9e;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 22px;
            font-weight: 600;
        }

        .btn-salvar:hover {
            background: #c83f80;
            color: white;
        }

        .btn-voltar {
            color: #c83f80;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .layout { flex-direction: column; }

            .layout .menu-lateral {
                flex: 0 0 auto;
                width: 100%;
                min-width: 100%;
                min-height: auto;
            }

            .conteudo { padding: 20px; }
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

            <a href="index.php" class="btn-voltar">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>

            <h2 class="titulo">
                <i class="bi bi-pencil-square"></i>
                Editar Tipo de Produto
            </h2>

            <p class="subtitulo">
                Altere a descrição do tipo de produto cadastrado.
            </p>

            <div class="card-formulario">

                <form action="update.php" method="post">

                    <input
                        type="hidden"
                        name="id"
                        value="<?= htmlspecialchars($tipoProduto->getId()) ?>"
                    >

                    <div class="mb-4">
                        <label for="descricao" class="form-label">
                            Descrição
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="descricao"
                            name="descricao"
                            value="<?= htmlspecialchars($tipoProduto->getDescricao()) ?>"
                            placeholder="Digite a descrição do tipo de produto"
                            required
                        >
                    </div>

                    <button type="submit" class="btn-salvar">
                        <i class="bi bi-check-circle"></i>
                        Atualizar
                    </button>

                </form>

            </div>

        </main>

    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>

</body>
</html>
