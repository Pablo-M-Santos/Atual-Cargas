<?php
include('conexao.php');
session_start();

if (isset($_POST['cadastrar'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $senha = $_POST['senha'];

    // Verificando se os campos obrigatórios não estão vazios
    if (empty($nome) || empty($email) || empty($senha)) {
        echo '<script type="text/javascript">';
        echo 'alert("Por favor, preencha todos os campos!");';
        echo '</script>';
    } else {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

        if ($mysqli->query($sql)) {
            echo '<script type="text/javascript">';
            echo 'alert("Usuário cadastrado com sucesso!");';
            echo '</script>';
            header("Location: login.php");
        } else {
            echo "Erro ao cadastrar usuário: " . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/cadastro.css">
    <title>Cadastro - Atual Cargas - Pablo</title>
</head>

<body>
    <div class="cadastro-atual">
        <div class="div">
            <div class="overlap">
                <img class="login-illustrator" src="assets/imagens/login-illustrator.svg" />
                <div class="navbar">
                    <div class="overlap-group">
                        <div class="navbar-textos-cadastro">
                            <div class="servicos-cadastro"><a href="home.php">SERVIÇOS</a></div>
                            <div class="servios">
                                <div class="nav-bar-cadastro"><a href="home.php">QUEM SOMOS</a></div>
                            </div>
                            <div class="contato">
                                <div class="nav-bar-cadastro"><a href="home.php">DIFERENCIAL</a></div>
                            </div>
                            <div class="privacidade">
                                <div class="nav-bar-cadastro"><a href="home.php">CONTATO</a></div>
                            </div>
                            <div class="usuario">
                                <div class="cadastro">
                                    <img class="choice" src="assets/imagens/Choice.png" alt="" />
                                    <div class="cadastro-cadastro"><a href="cadastro.php">CADASTRO</a></div>
                                </div>
                                <div class="entrar">
                                    <div class="entrar-cadastro"><a href="login.php" id="entrar">ENTRAR</a></div>
                                    <img class="user" src="assets/imagens/User (1).png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cadastro-form">
                <div class="overlap-2">
                    <img class="logo" src="assets/imagens/logo.png" />
                    <div class="text-wrapper-5">Faça seu cadastro</div>
                </div>
                <form method="POST" action="cadastro.php">
                    <div class="nome">
                        <p>Nome</p>
                        <input type="text" name="nome" id="nome" placeholder="Pablo Moreira Santos">
                        <div class="box-fundo">
                            <div class="fundo"></div>
                        </div>
                        <div class="bloco"></div>
                        <img class="user" src="assets/imagens/User (2).png" />
                    </div>

                    <div class="email">
                        <p class="p-email">Email</p>
                        <input type="email" name="email" id="email" placeholder="Pablomoreirasantos@gmail.com">
                        <div class="box-fundo-email">
                            <div class="fundo-email"></div>
                        </div>
                        <div class="bloco-email"></div>
                        <img class="user" src="assets/imagens/Vector.svg" />
                    </div>
                    <div class="senha">
                        <p class="p-senha">Senha</p>
                        <input type="password" name="senha" id="email" placeholder="Digite sua senha">
                        <div class="box-fundo-senha">
                            <div class="fundo-senha"></div>
                        </div>
                        <div class="bloco-senha"></div>
                        <img class="user" src="assets/imagens/Frame.svg" />
                    </div>
                    <button type="submit" name="cadatrar" id="button-1">Fazer Cadastro</button>
                    
                    <div class="linhas">
                        <img class="line" src="assets/imagens/Line 1.png" />
                        <img class="img-linha" src="assets/imagens/Line 2 (1).png" />
                        <div class="texto-linha">OU</div>
                    </div>
                    <a href="login.php">
                        <button type="button" id="button">Login</button>
                    </a>
                   
            </div>
            </form>
</body>

</html>