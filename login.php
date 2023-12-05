<?php
include('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {

    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {
        $usuario = $sql_query->fetch_assoc();
        $senha_armazenada = $usuario['senha'];

        // Verificando a senha diretamente (sem criptografia)
        if ($senha === $senha_armazenada) {
            session_start();
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: estoque.php");
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Falha ao logar! E-mail ou senha incorretos");';
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Falha ao logar! E-mail ou senha incorretos");';
        echo '</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="p-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/cadastro.css">
    <title> Login - Atual Cargas - Pablo </title>
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
                    <div class="text-wrapper-5">Faça seu Login</div>
                </div>
                <form method="POST" action="login.php" >
                    <div class="email" id="email-login">
                        <p class="p-email">Email</p>
                        <input type="email" name="email" id="email" placeholder="Pablomoreirasantos@gmail.com"  >
                        <div class="box-fundo-email">
                            <div class="fundo-email"></div>
                        </div>
                        <div class="bloco-email"></div>
                        <img class="user" src="assets/imagens/Vector.svg" />
                    </div>
                    <div class="senha" id="senha-login">
                        <p class="p-senha">Senha</p>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" >
                        <div class="box-fundo-senha">
                            <div class="fundo-senha"></div>
                        </div>
                        <div class="bloco-senha"></div>
                        <img class="user" src="assets/imagens/Frame.svg" />
                    </div>
                    <div class="button" id="button-login">
                        <button  id="button-1">Fazer Login</button>
                    </div>
                    <div class="linhas" id="linhas-login">
                        <img class="line" src="assets/imagens/Line 1.png" />
                        <img class="img-linha" src="assets/imagens/Line 2 (1).png" />
                        <div class="texto-linha">OU</div>
                    </div>
                    <a href="cadastro.php" class="button-2" id="button-2-login">
                        <button type="button" id="button">Cadastro</button>
                    </a>
            </div>
            </form>
</body>

</html>