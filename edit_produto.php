<?php
include('conexao.php');
include('protect.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $resultado = $mysqli->query("SELECT * FROM produtos WHERE id='$product_id'");
    $linha = $resultado->fetch_assoc();
}

if (isset($_POST['edit_produto'])) {
    $product_id = $_POST['product_id'];
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade']; 
    $preco = $_POST['preco'];

    $sql = "UPDATE produtos SET codigo='$codigo', nome='$nome', quantidade='$quantidade', preco='$preco' WHERE  id='$product_id'";
    $mysqli->query($sql);

    // Redirect back to the listing page after editing
    header('Location: estoque.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/dados.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Poppins:wght@300;500;600&display=swap"
        rel="stylesheet">
    <title> Editar Produto - Atual Cargas - Pablo </title>
</head>

<body>
    <header>
        <img class="logo" src="assets/imagens/logo.png" alt="">

        <ul class="navbar">
            <li><a href="home.php">QUEM SOMOS</a></li>
            <li><a href="home.php">SERVIÇOS</a></li>
            <li><a href="home.php">DIFERENCIAL</a></li>
            <li><a href="home.php">CONTATO</a></li>
        </ul>

        <div class="usuario">
            <a href="login.php" class="user" id="entrar"><img src="assets/imagens/User (1).png" alt=""></i>ENTRAR</a>
            <a href="cadastro.php" class="cadastro"><img id="cadastro" src="assets/imagens/Choice.png"
                    alt="">CADASTRO</a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>
    <div class="estoque-nome">
        <div class="text-wrapper">Estoque</div>
        <div class="sua-entega-est-aqui">
            <div class="linha"></div>
            <div class="frame-add">
                <div class="nossos-produtos-edit">EDITE PRODUTOS</div>
            </div>
            <div class="div"></div>
        </div>
    </div>
    <div class="cadastro-add">
        <div class="texto-add-edit">Editar o Produto</div>
    </div>

    <form method="POST" class="edit_form">
        <input type="hidden" name="product_id" value="<?php echo $linha['id']; ?>">
        <div class="codigo">
            <p>Código</p>
            <input type="text" name="codigo" value="<?php echo $linha['codigo']; ?>" id="codigo"
                placeholder="Digite o código">
            <div class="box-fundo">
                <div class="fundo"></div>
            </div>
        </div>
        <div class="nome">
            <p class="p">Nome</p>
            <input type="text" name="nome" value="<?php echo $linha['nome']; ?>" id="nome" placeholder="Digite o nome">
            <div class="box-fundo-email">
                <div class="fundo-email"></div>
            </div>
        </div>
        <div class="quantidade">
            <p class="p">Quantidade</p>
            <input type="text" name="quantidade" value="<?php echo $linha['quantidade']; ?>" id="quantidade"
                placeholder="Digite a quantidade">
            <div class="box-fundo-senha">
                <div class="fundo-senha"></div>
            </div>
        </div>
        <div class="preco">
            <p class="p">Preço a unidade</p>
            <input type="text" name="preco" value="<?php echo $linha['preco']; ?>" id="preco"
                placeholder="Digite o preço">
            <div class="box-fundo-senha">
                <div class="fundo-senha"></div>
            </div>
        </div>

        <div class="button-container">
            <a href="estoque.php">
                <button type="submit" name="edit_produto" id="button-1">Editar Produto</button>
            </a>
            <a href="estoque.php" class="button-2">
                <button type="button" id="button">Voltar</button>
            </a>
        </div>
        <div class="img-add"></div>