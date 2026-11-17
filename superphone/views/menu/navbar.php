<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .menu-lateral {
        box-sizing: border-box;
        flex: 0 0 250px;
        width: 250px;
        min-width: 250px;
        min-height: calc(100vh - 70px);
        background: linear-gradient(180deg, #e85d9e 0%, #c83f80 100%);
        padding: 25px 15px;
        display: flex;
        flex-direction: column;
        color: white;
        box-shadow: 3px 0 12px rgba(0, 0, 0, 0.08);
    }

    .menu-lateral .menu-logo {
        padding: 5px 12px 25px;
        border-bottom: 1px solid rgba(255,255,255,0.25);
        margin-bottom: 20px;
    }

    .menu-lateral .menu-logo h4 {
        color: white;
        font-size: 23px;
        font-weight: bold;
        margin: 0 0 5px;
    }

    .menu-lateral .menu-logo p {
        color: #ffe4f0;
        font-size: 13px;
        margin: 0;
    }

    .menu-lateral .menu-titulo {
        color: #ffd9e9;
        font-size: 11px;
        font-weight: bold;
        letter-spacing: 1.2px;
        margin: 18px 12px 8px;
        text-transform: uppercase;
    }

    .menu-lateral .menu-link {
        display: flex;
        align-items: center;
        gap: 12px;
        color: white !important;
        text-decoration: none !important;
        padding: 11px 13px;
        margin: 3px 0;
        border-radius: 9px;
        font-size: 14px;
        transition: 0.2s;
    }

    .menu-lateral .menu-link i {
        font-size: 17px;
        width: 20px;
        text-align: center;
    }

    .menu-lateral .menu-link:hover {
        background-color: rgba(255,255,255,0.2);
        color: white !important;
        transform: translateX(3px);
    }

    .menu-lateral .menu-rodape {
        margin-top: auto;
        padding: 20px 10px 5px;
        border-top: 1px solid rgba(255,255,255,0.25);
        color: #ffe4f0;
        font-size: 12px;
    }

    .menu-lateral .menu-rodape strong {
        color: white;
    }

    @media (max-width: 768px) {
        .menu-lateral {
            flex: 0 0 auto;
            width: 100%;
            min-width: 100%;
            min-height: auto;
        }

        .menu-lateral .menu-rodape {
            margin-top: 20px;
        }
    }
</style>

<aside class="menu-lateral">

    <div class="menu-logo">
        <h4><i class="bi bi-phone"></i> Super-Phone</h4>
        <p>Painel administrativo</p>
    </div>

    <nav>
        <div class="menu-titulo">Menu principal</div>

        <a href="../home/index.php" class="menu-link">
            <i class="bi bi-house-door-fill"></i>
            Início
        </a>

        <div class="menu-titulo">Cadastros</div>

        <a href="../produto/index.php" class="menu-link">
            <i class="bi bi-phone"></i>
            Produtos
        </a>

        <a href="../tipoProduto/index.php" class="menu-link">
            <i class="bi bi-tags-fill"></i>
            Tipos de produto
        </a>

        <a href="../comprador/index.php" class="menu-link">
            <i class="bi bi-people-fill"></i>
            Compradores
        </a>

        <a href="../formaPagamento/index.php" class="menu-link">
            <i class="bi bi-credit-card-fill"></i>
            Formas de pagamento
        </a>

        <div class="menu-titulo">Movimentações</div>

        <a href="../venda/index.php" class="menu-link">
            <i class="bi bi-cart-fill"></i>
            Vendas
        </a>

    </nav>

    <div class="menu-rodape">
        <strong><i class="bi bi-heart-fill"></i> Super-Phone</strong>
        <br>
        Sistema de gerenciamento
    </div>

</aside>