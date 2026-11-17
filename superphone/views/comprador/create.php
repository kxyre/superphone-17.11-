
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastrar Comprador - Super-Phone</title>

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
            border-bottom: 1px solid #f5dce8;
            display: flex;
            align-items: center;
            padding: 0 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        .topo a {
            color: #c83f80;
            text-decoration: none;
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
            padding: 40px;
            background: #fff8fb;
        }

        .titulo {
            color: #49313e;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .card-formulario {
            background: white;
            border: 1px solid #f5dce8;
            border-radius: 15px;
            padding: 30px;
            max-width: 750px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.04);
        }

        .form-label {
            color: #49313e;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            border: 1px solid #e8c8d8;
            border-radius: 8px;
            padding: 11px;
        }

        .form-control:focus {
            border-color: #e85d9e;
            box-shadow: 0 0 0 0.2rem rgba(232, 93, 158, 0.15);
        }

        .botoes {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-rosa {
            background: #e85d9e;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 22px;
        }

        .btn-rosa:hover {
            background: #c83f80;
            color: white;
        }

        .btn-limpar {
            background: #f4e8ee;
            color: #704d60;
            border: none;
            border-radius: 8px;
            padding: 10px 22px;
        }

        .btn-limpar:hover {
            background: #ead5df;
            color: #704d60;
        }

        .btn-voltar {
            color: #c83f80;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn-voltar:hover {
            color: #e85d9e;
        }

        @media (max-width: 768px) {
            .layout {
                flex-direction: column;
            }

            .layout .menu-lateral {
                width: 100%;
                min-width: 100%;
                min-height: auto;
                flex-basis: auto;
            }

            .conteudo {
                padding: 20px;
            }

            .card-formulario {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <header class="topo">
        <a href="../home/index.php">
            <i class="bi bi-phone"></i> Super-Phone
        </a>
    </header>

    <div class="layout">

        <?php include "../menu/navbar.php"; ?>

        <main class="conteudo">

            <a href="index.php" class="btn-voltar">
                <i class="bi bi-arrow-left"></i>
                Voltar para compradores
            </a>

            <h1 class="titulo">
                <i class="bi bi-person-plus"></i>
                Cadastrar Comprador
            </h1>

            <div class="card-formulario">

                <form action="insert.php" method="post">

                    <div class="mb-3">
                        <label for="nome" class="form-label">
                            Nome
                        </label>

                        <input
                            type="text"
                            name="nome"
                            id="nome"
                            class="form-control"
                            placeholder="Digite o nome do comprador"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="cpf" class="form-label">
                            CPF
                        </label>

                        <input
                            type="text"
                            name="cpf"
                            id="cpf"
                            class="form-control"
                            placeholder="Digite o CPF do comprador"
                            maxlength="14"
                            required
                        >
                    </div>

                    <div class="botoes">

                        <input
                            type="reset"
                            value="Limpar"
                            class="btn btn-limpar"
                        >

                        <button type="submit" class="btn btn-rosa">
                            <i class="bi bi-check-circle"></i>
                            Salvar comprador
                        </button>

                    </div>

                </form>

            </div>

        </main>

    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>

</body>
</html>
