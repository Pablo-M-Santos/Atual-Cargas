<?php
include('conexao.php');
include('protect.php');

$sucesso_message = "";
$mensagem_erro = "";

if (isset($_POST['add_produto'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    if (empty($codigo) || empty($nome) || empty($quantidade) || empty($preco)) {
        $mensagem_erro = "Preencha todos os campos.";
    } elseif ($quantidade <= 0 || $preco <= 0) {
        $mensagem_erro = "A quantidade e o preço devem ser maiores que 0.";
    } else {
        // Assuming $mysqli is your database connection
        $sql = "INSERT INTO produtos (codigo, nome, quantidade, preco) VALUES ('$codigo', '$nome', '$quantidade', '$preco')";

        if ($mysqli->query($sql)) {
            $sucesso_message = "Produto cadastrado com sucesso!";
        } else {
            $mensagem_erro = "Erro ao cadastrar o produto: " . $mysqli->error;
        }
    }
}

// Resetar o ID
// ALTER TABLE produtos AUTO_INCREMENT = 1;
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
    <title> Cadastrar Produto - Atual Cargas - Pablo </title>
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
                <div class="nossos-produtos">CADASTRE PRODUTOS</div>
            </div>
            <div class="div"></div>
        </div>
    </div>
    <div class="cadastro-add">
        <div class="texto-add">Cadastro do Produto</div>
    </div>
    <div class="add_produto">
        <form method="POST">
            <div class="codigo">
                <p>Código</p>
                <input type="text" name="codigo" id="codigo" placeholder="Digite o código">
                <div class="box-fundo">
                    <div class="fundo"></div>
                </div>
            </div>
            <div class="nome">
                <p class="p">Nome</p>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome">
                <div class="box-fundo-email">
                    <div class="fundo-email"></div>
                </div>
            </div>
            <div class="quantidade">
                <p class="p">Quantidade</p>
                <input type="text" name="quantidade" id="quantidade" placeholder="Digite a quantidade">
                <div class="box-fundo-senha">
                    <div class="fundo-senha"></div>
                </div>
            </div>
            <div class="preco">
                <p class="p">Preço a unidade</p>
                <input type="text" name="preco" id="preco" placeholder="Digite o preço">
                <div class="box-fundo-senha">
                    <div class="fundo-senha"></div>
                </div>
            </div>

            <div class="button-container">
                <a href="estoque.php">
                    <button type="submit" id="button-1" name="add_produto">Cadastrar Produto</button>
                </a>
                <a href="estoque.php" class="button-2">
                    <button type="button" id="button">Voltar</button>
                </a>
            </div>
            <div class="img-add"></div>
        </form>
        <?php
        if (!empty($sucesso_message)) {
            echo '<script type="text/javascript">';
            echo 'alert("' . $sucesso_message . '");';
            echo 'window.location.href = "estoque.php";';
            echo '</script>';
        }
        if (!empty($mensagem_erro)) {
            echo '<script type="text/javascript">';
            echo 'alert("' . $mensagem_erro . '");';
            echo '</script>';
        }
        ?>
    </div>