<?php
$usuario = 'root';
$senha = '';
$database = 'db_atual_cargas';
$host = 'localhost';
        
$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->connect_error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->connect_error);
}


$resultUsuarios = $mysqli->query("SHOW TABLES LIKE 'usuarios'");
if ($resultUsuarios->num_rows == 0) {
    $createUsuariosTable = "CREATE TABLE usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        senha VARCHAR(30) NOT NULL
    )";

    if ($mysqli->query($createUsuariosTable)) {
        echo '<script type="text/javascript">';
        echo 'alert("A tabela `usuarios` foi criada!");';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Erro ao criar a tabela `usuarios`: ' . $mysqli->error . '");';
        echo '</script>';
    }
}


$resultProdutos = $mysqli->query("SHOW TABLES LIKE 'produtos'");
if ($resultProdutos->num_rows == 0) {
    $createProdutosTable = "CREATE TABLE produtos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        codigo BIGINT(13) NOT NULL,
        nome VARCHAR(40) NOT NULL,
        quantidade INT NOT NULL,
        preco DECIMAL(6, 2) NOT NULL
    )";

    if ($mysqli->query($createProdutosTable)) {
        echo '<script type="text/javascript">';
        echo 'alert("A tabela `produtos` foi criada!");';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Erro ao criar a tabela `produtos`: ' . $mysqli->error . '");';
        echo '</script>';
    }
}
?>
