<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Super-Phone | Início</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --rosa: #e85d9e;
            --rosa-escuro: #c83f80;
            --rosa-claro: #fff0f7;
            --rosa-fundo: #fff8fb;
            --texto: #51414a;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--rosa-fundo);
            color: var(--texto);
            font-family: Arial, sans-serif;
        }

        /* BARRA SUPERIOR */
        .barra-superior {
            height: 70px;
            background: white;
            border-bottom: 1px solid #f5dce9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 3px 12px rgba(180, 80, 130, 0.06);
        }

        .marca {
            color: var(--rosa-escuro);
            font-size: 21px;
            font-weight: bold;
            text-decoration: none;
        }

        .marca i {
            margin-right: 8px;
        }

        .usuario {
            color: #987b8b;
            font-size: 14px;
        }

        .usuario i {
            color: var(--rosa);
            font-size: 20px;
            margin-right: 7px;
        }

        /* ESTRUTURA PRINCIPAL */
        .layout {
            display: flex;
            align-items: stretch;
            width: 100%;
            min-height: calc(100vh - 70px);
        }

        /* CONTEÚDO */
        .conteudo {
            flex: 1;
            min-width: 0;
            padding: 35px;
        }

        .titulo-pagina {
            margin-bottom: 25px;
        }

        .titulo-pagina h1 {
            font-size: 28px;
            font-weight: bold;
            color: #543747;
            margin-bottom: 7px;
        }

        .titulo-pagina p {
            color: #a18a98;
            margin: 0;
            font-size: 14px;
        }

        /* CARTÃO DE BOAS-VINDAS */
        .boas-vindas {
            background: linear-gradient(120deg, #e85d9e, #f49bc5);
            color: white;
            border-radius: 20px;
            padding: 35px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(232, 93, 158, 0.18);
        }

        .boas-vindas h2 {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .boas-vindas p {
            font-size: 14px;
            max-width: 550px;
            margin-bottom: 0;
            line-height: 1.7;
        }

        .boas-vindas i {
            position: absolute;
            right: 45px;
            top: 25px;
            font-size: 100px;
            opacity: 0.18;
        }

        /* ATALHOS */
        .titulo-secao {
            font-size: 19px;
            font-weight: bold;
            color: #543747;
            margin-bottom: 18px;
        }

        .atalho {
            background: white;
            border: 1px solid #f5e1eb;
            border-radius: 16px;
            padding: 22px 18px;
            height: 100%;
            text-decoration: none;
            display: block;
            transition: 0.2s;
            box-shadow: 0 4px 14px rgba(180, 80, 130, 0.04);
        }

        .atalho:hover {
            transform: translateY(-5px);
            box-shadow: 0 9px 22px rgba(180, 80, 130, 0.12);
            border-color: #f0b5d1;
        }

        .atalho-icone {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: var(--rosa-claro);
            color: var(--rosa);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 15px;
        }

        .atalho h5 {
            color: #624657;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .atalho p {
            color: #a18a98;
            font-size: 12px;
            margin: 0;
        }

        /* RODAPÉ */
        .rodape {
            text-align: center;
            color: #b49eac;
            font-size: 12px;
            padding: 35px 0 10px;
        }

        /* RESPONSIVIDADE */
        @media (max-width: 768px) {
            .layout {
                flex-direction: column;
            }

            .conteudo {
                padding: 22px 16px;
            }

            .barra-superior {
                padding: 0 15px;
            }

            .boas-vindas {
                padding: 25px;
            }

            .boas-vindas i {
                right: 15px;
                font-size: 65px;
            }
        }
    </style>
</head>

<body>

    <!-- BARRA SUPERIOR -->
    <header class="barra-superior">

        <a href="index.php" class="marca">
            <i class="bi bi-phone-fill"></i>
            Super-Phone
        </a>

        <div class="usuario">
            <i class="bi bi-person-circle"></i>
            Área administrativa
        </div>

    </header>

    <div class="layout">

        <!-- MENU LATERAL -->
        <?php include "../menu/navbar.php"; ?>

        <!-- CONTEÚDO PRINCIPAL -->
        <main class="conteudo">

            <div class="titulo-pagina">
                <h1>Bem-vindo ao Super-Phone!</h1>

                <p>
                    Gerencie sua loja de eletrônicos de maneira simples e organizada.
                </p>
            </div>

            <!-- BOAS-VINDAS -->
            <section class="boas-vindas">

                <h2>Olá! Seja bem-vindo 💗</h2>

                <p>
                    Este é o sistema de gerenciamento da Super-Phone.
                    Aqui você pode cadastrar produtos, compradores,
                    formas de pagamento e acompanhar as vendas da loja.
                </p>

                <i class="bi bi-phone"></i>

            </section>

            <!-- ATALHOS -->
            <h3 class="titulo-secao">Acesso rápido</h3>

            <div class="row g-4">

                <div class="col-sm-6 col-lg-4">
                    <a href="../produto/index.php" class="atalho">

                        <div class="atalho-icone">
                            <i class="bi bi-phone"></i>
                        </div>

                        <h5>Produtos</h5>

                        <p>Cadastre e gerencie os produtos da loja.</p>

                    </a>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <a href="../comprador/index.php" class="atalho">

                        <div class="atalho-icone">
                            <i class="bi bi-people-fill"></i>
                        </div>

                        <h5>Compradores</h5>

                        <p>Consulte e organize os dados dos compradores.</p>

                    </a>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <a href="../tipoProduto/index.php" class="atalho">

                        <div class="atalho-icone">
                            <i class="bi bi-tags-fill"></i>
                        </div>

                        <h5>Tipos de produto</h5>

                        <p>Organize os tipos e categorias dos produtos.</p>

                    </a>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <a href="../formaPagamento/index.php" class="atalho">

                        <div class="atalho-icone">
                            <i class="bi bi-credit-card-fill"></i>
                        </div>

                        <h5>Formas de pagamento</h5>

                        <p>Gerencie as opções de pagamento disponíveis.</p>

                    </a>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <a href="../venda/index.php" class="atalho">

                        <div class="atalho-icone">
                            <i class="bi bi-cart-fill"></i>
                        </div>

                        <h5>Vendas</h5>

                        <p>Acesse e acompanhe as vendas realizadas.</p>

                    </a>
                </div>

            </div>

            <div class="rodape">
                Super-Phone © 2026 — Sistema desenvolvido para gerenciamento de loja de eletrônicos.
            </div>

        </main>

    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>

</body>
</html>