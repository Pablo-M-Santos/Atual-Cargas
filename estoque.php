<?php
include('protect.php');
include('conexao.php');

if (isset($_GET['delete_product'])) {
    $product_id = $_GET['delete_product'];
    $sql = "DELETE FROM produtos WHERE id='$product_id'";       
    if ($mysqli->query($sql)) {
        $sucesso_mensagem = "Produto excluído com sucesso!";
    } else {
        $mensagem_erro = "Erro ao excluir o produto.";
    }
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
    <title> Estoque - Atual Cargas - Pablo </title>
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
            <div class="frame">
                <div class="nossos-produtos">NOSSOS PRODUTOS</div>
            </div>
            <div class="div"></div>
        </div>
        <a href="add_produto.php" id="esto">
            <button type="submit" id="button-esto">Cadastrar Produto</button>
        </a>
    </div>

    <table border="1" class="product-table">
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        <?php
        if (!empty($sucesso_message)) {
            echo '<script type="text/javascript">';
            echo 'alert("' . $sucesso_message . '");';
            echo '</script>';
        }
        if (!empty($mensagem_erro)) {
            echo '<script type="text/javascript">';
            echo 'alert("' . $mensagem_erro . '");';
            echo '</script>';
        }
        if (!empty($product_message)) {
            echo '<script type="text/javascript">';
            echo 'alert("' . $cadastro_message . '");';
            echo '</script>';
        }
        ?>

        <?php
        $result = $mysqli->query("SELECT * FROM produtos"); 
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['codigo']}</td>";
            echo "<td>{$row['nome']}</td>";
            echo "<td>{$row['quantidade']}</td>";
            echo "<td>{$row['preco']}</td>";
            echo "<td>
      <a class=\"editar\" href=\"edit_produto.php?id={$row['id']}\">Editar</a>
      <a class=\"excluir\" href=\"estoque.php?delete_product={$row['id']}\" onclick=\"return confirm('Tem certeza que deseja excluir este produto?')\">Excluir</a>
      </td>";

            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>