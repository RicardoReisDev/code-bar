<?php

$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'codebar';

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conexao->connect_error);
}

$sql = "SELECT * FROM produtos";
$resultado = $conexao->query($sql);

?>
<!DOCTYPE html>
<html>

<head>
	<title>Painel de Produtos</title>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/painelstyle.css">
	<script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script>
</head>

<body>
	<header>
		<img src="./assets/logo.png" alt="Logo da Empresa" class="logo">
		<h1>Painel de Produtos</h1>
	</header>
	<h2>Tabela</h2> <?php
    if ($resultado->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Código de Barras</th><th>Nome</th><th>Quantidade</th><th>Preço</th></tr>";

        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['codigo_barras'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['quantidade'] . "</td>";
            echo "<td>" . $row['preco'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum produto cadastrado.";
    }

    $conexao->close();
    ?> <a href="admin.html" class="back-button">Painel do Adm</a>
	<footer> &copy; 2024 Ricardo C. Reis. Todos os direitos reservados. </footer>
</body>

</html>