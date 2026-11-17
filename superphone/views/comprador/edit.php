
<?php
    require "../../autoload.php";

    $dao = new CompradorDAO();
    $comprador = $dao->find($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comprador - Super-Phone</title>

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
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .logo {
            color: #e85d9e;
            font-size: 23px;
            font-weight: bold;
        }

        .logo i {
            margin-right: 8px;
        }

        .usuario {
            color: #777;
            font-size: 14px;
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

        .titulo-pagina {
            margin-bottom: 30px;
        }

        .titulo-pagina h1 {
            color: #c83f80;
            font-size: 28px;
            font-weight: bold;
        }

        .titulo-pagina p {
            color: #888;
            margin-top: 5px;
        }

        .formulario {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(200, 63, 128, 0.08);
            max-width: 750px;
        }

        .formulario label {
            color: #555;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .formulario .form-control {
            border: 1px solid #f0c5da;
            border-radius: 8px;
            padding: 11px;
            margin-bottom: 20px;
        }

        .formulario .form-control:focus {
            border-color: #e85d9e;
            box-shadow: 0 0 0 0.2rem rgba(232, 93, 158, 0.15);
        }

        .btn-salvar {
            background: #e85d9e;
            color: white;
            border: none;
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-salvar:hover {
            background: #c83f80;
            color: white;
        }

        .btn-limpar {
            background: #f3e4ec;
            color: #9d3768;
            border: none;
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-limpar:hover {
            background: #ead0df;
            color: #9d3768;
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

            .topo {
                padding: 0 15px;
            }
        }
    </style>
</head>

<body>

    <header class="topo">
        <div class="logo">
            <i class="bi bi-phone"></i>
            Super-Phone
        </div>

        <div class="usuario">
            <i class="bi bi-person-circle"></i>
            Área administrativa
        </div>
    </header>

    <div class="layout">

        <?php include "../menu/navbar.php"; ?>

        <main class="conteudo">

            <div class="titulo-pagina">
                <h1><i class="bi bi-pencil-square"></i> Editar comprador</h1>
                <p>Altere as informações do comprador cadastrado.</p>
            </div>

            <div class="formulario">

                <form action="update.php" method="post">

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input
                            type="text"
                            name="nome"
                            id="nome"
                            value="<?= htmlspecialchars($comprador->getNome()) ?>"
                            class="form-control"
                            placeholder="Digite o nome do comprador"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input
                            type="text"
                            name="cpf"
                            id="cpf"
                            value="<?= htmlspecialchars($comprador->getCpf()) ?>"
                            class="form-control"
                            placeholder="Digite o CPF do comprador"
                            required
                        >
                    </div>

                    <input
                        type="hidden"
                        name="id"
                        value="<?= htmlspecialchars($comprador->getId()) ?>"
                    >

                    <div class="d-flex gap-2 mt-3">
                        <button type="reset" class="btn btn-limpar">
                            <i class="bi bi-eraser"></i> Limpar
                        </button>

                        <button type="submit" class="btn btn-salvar">
                            <i class="bi bi-check-circle"></i> Salvar alterações
                        </button>
                    </div>

                </form>

            </div>

        </main>

    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>

</body>
</html>
